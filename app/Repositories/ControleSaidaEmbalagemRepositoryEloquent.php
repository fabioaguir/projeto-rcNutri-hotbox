<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\ControleSaidaEmbalagemRepository;
use Was\Entities\ControleSaidaEmbalagem;
use Was\Validators\ControleSaidaEmbalagemValidator;

/**
 * Class ControleSaidaEmbalagemRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class ControleSaidaEmbalagemRepositoryEloquent extends BaseRepository implements ControleSaidaEmbalagemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ControleSaidaEmbalagem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
