<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Was\Utils\CarbonDateFormat;

/**
 * Class EmbalagemEstoque.
 *
 * @package namespace Was\Entities;
 */
class EmbalagemEstoque extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'embalagens_estoque';

    /**
     * @var array
     *
     * Campos do tipo data
     */
    protected $dates    = [
        'data_entrada'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'quantidade',
        'data_entrada',
        'embalagens_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function embalagem(){
        return $this->belongsTo(Embalagem::class, 'embalagens_id', 'id');
    }

    /**
     * @param $value
     */
    public function setDataEntradaAttribute($value)
    {
        $this->attributes['data_entrada'] = CarbonDateFormat::toUsa($value, 'date');
    }

    /**
     * @return mixed
     */
    public function getDataEntradaAttribute()
    {
        return CarbonDateFormat::toBrazil($this->attributes['data_entrada'], 'date');
    }

}
