<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Veiculo.
 *
 * @package namespace Was\Entities;
 */
class Veiculo extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'veiculos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'tipo_veiculos_id',
        'cor',
        'placa',
        'ano',
        'renavan'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoVeiculo(){
        return $this->belongsTo(TipoVeiculo::class, 'tipo_veiculos_id', 'id');
    }

}
