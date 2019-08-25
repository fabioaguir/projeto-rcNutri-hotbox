<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Setor.
 *
 * @package namespace Was\Entities;
 */
class Setor extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'setores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rotas(){
        return $this->hasMany(Rota::class, 'setores_id', 'id');
    }
}
