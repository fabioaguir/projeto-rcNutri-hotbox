<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Entities\Motorista;
use Was\Repositories\MotoristaRepository;
use Was\Services\BaseService;
use Was\User;

class MotoristaService extends BaseService
{

    /**
     * @var string
     */
    private $destinationPath = "images/motorista";

    public function __construct(MotoristaRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return Motorista
     * @throws \Exception
     */
    public function store(array $data) : Motorista
    {
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
        $motorista =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$motorista) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $motorista;
    }

    /**
     * @param array $data
     * @param int $id
     * @return Motorista
     * @throws \Exception
     */
    public function update(array $data, int $id) : Motorista
    {

        #Salvando o registro pincipal
        $motorista =  $this->repository->update($data, $id);

        #tratando a imagem
        if(isset($data['img'])) {
            $file     = $data['img'];
            $fileName = md5(uniqid(rand(), true)) . "." . $file->getClientOriginalExtension();

            #removendo a imagem antiga
            if($motorista->path_image != null) {
                unlink(public_path($this->destinationPath . $motorista->path_image));
            }

            #Movendo a imagem
            $file->move($this->destinationPath, $fileName);

            #setando o nome da imagem no model
            $motorista->path_image = $fileName;
            $motorista->save();

            #destruindo o img do array
            unset($data['img']);
        }

        #Verificando se foi criado no banco de dados
        if(!$motorista) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $motorista;
    }
}