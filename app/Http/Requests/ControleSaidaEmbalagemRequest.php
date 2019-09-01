<?php

namespace Was\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControleSaidaEmbalagemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'escolas_id' => 'required',
            'servicos_id' => 'required',
            'veiculos_id' => 'required',
            'motoristas_id' => 'required',
            'embalagens_id' => 'required',
            'data_saida' => 'required',
            'qtd_saida' => 'required'
        ];
    }
}
