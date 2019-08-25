<?php

namespace Was\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Was\Repositories\ServicoRepository;
use Was\Entities\Servico;
use Was\Validators\ServicoValidator;

/**
 * Class ServicoRepositoryEloquent.
 *
 * @package namespace Was\Repositories;
 */
class ServicoRepositoryEloquent extends BaseRepository implements ServicoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Servico::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
