<?php
/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 21/08/2019
 * Time: 19:21
 */

namespace Was\Services;


use PhpOption\Tests\Repository;

class BaseService implements ServiceInterface
{

    use TraitService;

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
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