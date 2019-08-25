<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TipoEmbalagem.
 *
 * @package namespace Was\Entities;
 */
class TipoEmbalagem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tipo_embalagens';

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
    public function embalagens(){
        return $this->hasMany(Embalagem::class, 'tipo_embalagens_id', 'id');
    }

}
