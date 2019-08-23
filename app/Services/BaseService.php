<?php
/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 21/08/2019
 * Time: 19:21
 */

namespace Was\Services;


use Prettus\Repository\Contracts\RepositoryInterface;

class BaseService implements ServiceInterface
{

    use TraitService;

    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function find(int $id)
    {
        #Recuperando o registro no banco de dados
        $user = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$user) {
            throw new \Exception('Usuário não encontrado!');
        }

        #retorno
        return $user;
    }

    public function store(array $data)
    {
        $objeto = $this->repository->create($data);

        if(!$objeto) {
            throw new \Exception("Erro ao realizar o cadastro");
        }

        return $objeto;
    }

    public function update(array $data, int $id)
    {
        $objeto = $this->repository->update($data, $id);

        if(!$objeto) {
            throw new \Exception("Erro ao realizar a atualização");
        }

        return $objeto;
    }

    public function delete(int $id)
    {
        $objeto = $this->repository->delete($id);

        if(!$objeto) {
            throw new \Exception("Erro ao deletar");
        }

        return true;
    }
}