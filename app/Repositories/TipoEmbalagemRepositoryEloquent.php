<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\TipoEmbalagemRepository;
use Was\Entities\TipoEmbalagem;
use Was\Validators\TipoEmbalagemValidator;

/**
 * Class TipoEmbalagemRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class TipoEmbalagemRepositoryEloquent extends BaseRepository implements TipoEmbalagemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoEmbalagem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
