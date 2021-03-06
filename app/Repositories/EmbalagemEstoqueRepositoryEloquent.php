<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\EmbalagemEstoqueRepository;
use Was\Entities\EmbalagemEstoque;
use Was\Validators\EmbalagemEstoqueValidator;

/**
 * Class EmbalagemEstoqueRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class EmbalagemEstoqueRepositoryEloquent extends BaseRepository implements EmbalagemEstoqueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmbalagemEstoque::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function estoque(int $idEmbalagem)
    {
        $query = \DB::table('embalagens_estoque')
            ->where('embalagens_id', $idEmbalagem)
            ->select([
                \DB::raw("SUM(quantidade) as quantidade")
            ])
            ->groupBy('embalagens_id');

        return $query->first();
    }
}
