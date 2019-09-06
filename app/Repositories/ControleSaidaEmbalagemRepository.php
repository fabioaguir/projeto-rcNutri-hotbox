<?php

namespace Was\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ControleSaidaEmbalagemRepository.
 *
 * @package namespace Was\Repositories;
 */
interface ControleSaidaEmbalagemRepository extends RepositoryInterface
{
    public function totalDeSaidas(int $idEmbalagem);
    public function embalagensNaoRetornadas(int $idEmbalagem);
}
