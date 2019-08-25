<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Escola.
 *
 * @package namespace Was\Entities;
 */
class Escola extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'escolas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'rotas_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function setor(){
        return $this->belongsTo(Rota::class, 'rotas_id', 'id');
    }

}
