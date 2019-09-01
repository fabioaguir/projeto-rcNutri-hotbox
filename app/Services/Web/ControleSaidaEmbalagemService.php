<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Entities\ControleSaidaEmbalagem;
use Was\Repositories\ControleSaidaEmbalagemRepository;
use Was\Services\BaseService;

class ControleSaidaEmbalagemService extends BaseService
{
    public function __construct(ControleSaidaEmbalagemRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return ControleSaidaEmbalagem
     * @throws \Exception
     */
    public function store(array $data) : ControleSaidaEmbalagem
    {

        $usuario = \Auth::guard('web')->user();

        // Setando o usuário no controle de saída
        $data['users_id'] = $usuario->id;

        #Salvando o registro pincipal
        $controle =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$controle) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $controle;
    }

    public function find(int $id)
    {
        $relations = [
            'escola.rota.setor'
        ];

        #Recuperando o registro no banco de dados
        $user = $this->repository->with($relations)->find($id);

        #Verificando se o registro foi encontrado
        if(!$user) {
            throw new \Exception('Usuário não encontrado!');
        }

        #retorno
        return $user;
    }

    public function confirmarBaixa(array $data, int $id)
    {

        // Finalizando a saída da embalagem
        $data['finalizado'] = 1;
        //dd($data);

        $objeto = $this->repository->update($data, $id);

        if(!$objeto) {
            throw new \Exception("Erro ao realizar a baixa da saída");
        }

        return $objeto;
    }
}