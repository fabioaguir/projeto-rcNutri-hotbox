<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\RotaRepository;
use Was\Services\BaseService;

class RotaService extends BaseService
{

    public function __construct(RotaRepository $repository)
    {
        parent::__construct($repository);
    }

}