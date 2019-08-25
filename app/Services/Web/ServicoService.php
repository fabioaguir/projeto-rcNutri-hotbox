<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\ServicoRepository;
use Was\Services\BaseService;

class ServicoService extends BaseService
{

    public function __construct(ServicoRepository $repository)
    {
        parent::__construct($repository);
    }

}