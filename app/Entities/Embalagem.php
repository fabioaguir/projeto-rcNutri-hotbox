<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Embalagem.
 *
 * @package namespace Was\Entities;
 */
class Embalagem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'embalagens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'etiqueta',
        'tipo_embalagens_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoEmbalagem(){
        return $this->belongsTo(TipoEmbalagem::class, 'tipo_embalagens_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estoques(){
        return $this->hasMany(EmbalagemEstoque::class, 'embalagens_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function controleSaidaEmbalagens(){
        return $this->hasMany(ControleSaidaEmbalagem::class, 'embalagens_id', 'id');
    }
}
