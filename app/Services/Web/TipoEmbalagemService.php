<?php

/**
 * Created by PhpStorm.
 * User: Fabio Aguiar
 * Date: 22/08/2019
 * Time: 20:22
 */

namespace Was\Services\Web;

use Was\Repositories\TipoEmbalagemRepository;
use Was\Services\BaseService;

class TipoEmbalagemService extends BaseService
{

    public function __construct(TipoEmbalagemRepository $repository)
    {
        parent::__construct($repository);
    }

}