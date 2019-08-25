<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\SetorRepository;
use Was\Services\BaseService;

class SetorService extends BaseService
{

    public function __construct(SetorRepository $repository)
    {
        parent::__construct($repository);
    }

}