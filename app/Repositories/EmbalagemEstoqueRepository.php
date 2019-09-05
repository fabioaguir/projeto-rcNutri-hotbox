<?php

namespace Was\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface EmbalagemEstoqueRepository.
 *
 * @package namespace Was\Repositories;
 */
interface EmbalagemEstoqueRepository extends RepositoryInterface
{
    public function estoque(int $idEmbalagem);
}
