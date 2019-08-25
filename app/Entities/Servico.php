<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Servico.
 *
 * @package namespace Was\Entities;
 */
class Servico extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'servicos';

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
