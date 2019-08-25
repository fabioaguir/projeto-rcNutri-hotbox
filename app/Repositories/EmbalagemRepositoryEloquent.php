<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\EmbalagemRepository;
use Was\Entities\Embalagem;
use Was\Validators\EmbalagemValidator;

/**
 * Class EmbalagemRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class EmbalagemRepositoryEloquent extends BaseRepository implements EmbalagemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Embalagem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
