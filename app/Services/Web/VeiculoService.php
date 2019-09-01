<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\VeiculoRepository;
use Was\Services\BaseService;

class VeiculoService extends BaseService
{

    public function __construct(VeiculoRepository $repository)
    {
        parent::__construct($repository);
    }

}