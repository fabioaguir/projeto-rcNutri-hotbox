<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\EmbalagemEstoqueRepository;
use Was\Services\BaseService;

class EmbalagemEstoqueService extends BaseService
{
    public function __construct(EmbalagemEstoqueRepository $repository)
    {
        parent::__construct($repository);
    }

}