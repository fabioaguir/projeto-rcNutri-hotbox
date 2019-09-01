<?php

namespace Was\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RotaRepository.
 *
 * @package namespace Was\Repositories;
 */
interface RotaRepository extends RepositoryInterface
{
    public function searshBySetor($setor);
}
