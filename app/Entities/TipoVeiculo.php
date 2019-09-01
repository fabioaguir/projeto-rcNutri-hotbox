<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TipoVeiculo.
 *
 * @package namespace Was\Entities;
 */
class TipoVeiculo extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tipo_veiculos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome'
    ];

}
