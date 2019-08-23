<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Web\Services;

use Was\Repositories\UserRepository;
use Was\Services\BaseService;
use Was\User;

class UserService extends BaseService
{

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

        #Verificando se foi criado no banco de dados
        if(!$user) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $user;
    }
}