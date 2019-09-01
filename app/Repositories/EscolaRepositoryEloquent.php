<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\EscolaRepository;
use Was\Entities\Escola;
use Was\Validators\EscolaValidator;

/**
 * Class EscolaRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class EscolaRepositoryEloquent extends BaseRepository implements EscolaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Escola::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function searshByRota($rota)
    {
        $query = \DB::table('escolas')
            ->where('rotas_id', $rota)
            ->select([
                'id',
                'nome'
            ]);

        return $query->get();
    }
}
