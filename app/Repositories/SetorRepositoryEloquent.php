<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\SetorRepository;
use Was\Entities\Setor;
use Was\Validators\SetorValidator;

/**
 * Class SetorRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class SetorRepositoryEloquent extends BaseRepository implements SetorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Setor::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
