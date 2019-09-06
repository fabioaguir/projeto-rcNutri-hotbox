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

    public function totalDeSaidas(int $idEmbalagem)
    {
        $query = \DB::table('controle_saida_embalagens')
            ->where('embalagens_id', $idEmbalagem)
            ->where('finalizado', 0)
            ->select([
                \DB::raw("SUM(qtd_saida) as quantidade")
            ])
            ->groupBy('embalagens_id');

        return $query->first();
    }

    public function embalagensNaoRetornadas(int $idEmbalagem)
    {
        $query = \DB::table('controle_saida_embalagens')
            ->where('embalagens_id', $idEmbalagem)
            ->where('finalizado', 1)
            ->select([
                \DB::raw("(SUM(qtd_saida) - SUM(qtd_volta)) as quantidade")
            ])
            ->groupBy('embalagens_id');

        return $query->first();
    }
    
}
