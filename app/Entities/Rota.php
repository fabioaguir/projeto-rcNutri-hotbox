<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Rota.
 *
 * @package namespace Was\Entities;
 */
class Rota extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'rotas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'setores_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function setor(){
        return $this->belongsTo(Setor::class, 'setores_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function escolas(){
        return $this->hasMany(Escola::class, 'rotas_id', 'id');
    }
}
