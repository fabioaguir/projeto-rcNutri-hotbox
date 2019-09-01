<?php

namespace Was\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Was\User;
use Was\Utils\CarbonDateFormat;

/**
 * Class ControleSaidaEmbalagem.
 *
 * @package namespace Was\Entities;
 */
class ControleSaidaEmbalagem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'controle_saida_embalagens';

    /**
     * @var array
     *
     * Campos do tipo data
     */
    protected $dates    = [
        'data_saida',
        'data_volta'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'escolas_id',
        'servicos_id',
        'veiculos_id',
        'motoristas_id',
        'embalagens_id',
        'users_id',
        'data_saida',
        'data_volta',
        'finalizado',
        'qtd_saida',
        'qtd_volta'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function escola(){
        return $this->belongsTo(Escola::class, 'escolas_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servico(){
        return $this->belongsTo(Servico::class, 'servicos_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function veiculo(){
        return $this->belongsTo(Veiculo::class, 'veiculos_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function motorista(){
        return $this->belongsTo(Motorista::class, 'motoristas_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function embalagem(){
        return $this->belongsTo(Embalagem::class, 'embalagens_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    /**
     * @param $value
     */
    public function setDataSaidaAttribute($value)
    {
        $this->attributes['data_saida'] = CarbonDateFormat::toUsa($value, 'date');
    }

    /**
     * @return mixed
     */
    public function getDataSaidaAttribute()
    {
        return CarbonDateFormat::toBrazil($this->attributes['data_saida'], 'date');
    }

    /**
     * @param $value
     */
    public function setDataVoltaAttribute($value)
    {
        $this->attributes['data_volta'] = CarbonDateFormat::toUsa($value, 'date');
    }

    /**
     * @return mixed
     */
    public function getDataVoltaAttribute()
    {
        return CarbonDateFormat::toBrazil($this->attributes['data_volta'], 'date');
    }
}
