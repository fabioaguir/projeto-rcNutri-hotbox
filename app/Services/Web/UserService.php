<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\UserRepository;
use Was\Services\BaseService;
use Was\User;

class UserService extends BaseService
{

    /**
     * @var string
     */
    private $destinationPath = "images/";

    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return User
     * @throws \Exception
     */
    public function store(array $data) : User
    {
        #tratando a senha
        $data['password'] = bcrypt($data['password']);

        #tratando a imagem
        if(isset($data['img'])) {
            $file     = $data['img'];
            $fileName = md5(uniqid(rand(), true)) . "." . $file->getClientOriginalExtension();

            #Movendo a imagem
            $file->move($this->destinationPath, $fileName);

            #setando o nome da imagem no model
            $data['path_image'] = $fileName;

            #destruindo o img do array
            unset($data['img']);
        }

        #Salvando o registro pincipal
        $user =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$user) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $user;
    }

    /**
     * @param array $data
     * @param int $id
     * @return User
     * @throws \Exception
     */
    public function update(array $data, int $id) : User
    {
        # Variável que armazenará a nova senha
        $newPassword = "";

        #tratando a senha
        if(empty($data['password'])) {
            unset($data['password']);
        } else {
            $newPassword = \bcrypt($data['password']);
        }

        #Salvando o registro pincipal
        $user =  $this->repository->update($data, $id);

        # Alterando a senha do usuário
        if($newPassword) {
            $user->fill([
                'password' => $newPassword
            ])->save();
        }

        #tratando a imagem
        if(isset($data['img'])) {
            $file     = $data['img'];
            $fileName = md5(uniqid(rand(), true)) . "." . $file->getClientOriginalExtension();

            #removendo a imagem antiga
            if($user->path_image != null) {
                unlink(public_path($this->destinationPath . $user->path_image));
            }

            #Movendo a imagem
            $file->move($this->destinationPath, $fileName);

            #setando o nome da imagem no model
            $user->path_image = $fileName;
            $user->save();

            #destruindo o img do array
            unset($data['img']);
        }

        #Verificando se foi criado no banco de dados
        if(!$user) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $user;
    }
}