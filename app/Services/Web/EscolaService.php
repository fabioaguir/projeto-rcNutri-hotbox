<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\EscolaRepository;
use Was\Services\BaseService;

class EscolaService extends BaseService
{

    public function __construct(EscolaRepository $repository)
    {
        parent::__construct($repository);
    }

}