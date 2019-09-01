<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\TipoVeiculoRepository;
use Was\Entities\TipoVeiculo;
use Was\Validators\TipoVeiculoValidator;

/**
 * Class TipoVeiculoRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class TipoVeiculoRepositoryEloquent extends BaseRepository implements TipoVeiculoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoVeiculo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
