<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\EmbalagemRepository;
use Was\Services\BaseService;

class EmbalagemService extends BaseService
{

    public function __construct(EmbalagemRepository $repository)
    {
        parent::__construct($repository);
    }

}