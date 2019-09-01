<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Motorista.
 *
 * @package namespace Was\Entities;
 */
class Motorista extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'motoristas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'telefone',
        'path_image'
    ];

}
