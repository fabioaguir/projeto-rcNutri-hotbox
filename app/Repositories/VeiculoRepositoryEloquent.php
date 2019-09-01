<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\VeiculoRepository;
use Was\Entities\Veiculo;
use Was\Validators\VeiculoValidator;

/**
 * Class VeiculoRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class VeiculoRepositoryEloquent extends BaseRepository implements VeiculoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Veiculo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
