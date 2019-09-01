<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\RotaRepository;
use Was\Entities\Rota;
use Was\Validators\RotaValidator;

/**
 * Class RotaRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class RotaRepositoryEloquent extends BaseRepository implements RotaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rota::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function searshBySetor($setor)
    {
        $query = \DB::table('rotas')
            ->where('setores_id', $setor)
            ->select([
                'id',
                'nome'
            ]);

        return $query->get();
    }
    
}
