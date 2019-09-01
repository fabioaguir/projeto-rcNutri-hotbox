<?php

namespace Was\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmbalagemEstoqueRequest extends FormRequest
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
            'quantidade' => 'required',
            'data_entrada' => 'required',
            'embalagens_id' => 'required',
        ];
    }
}
