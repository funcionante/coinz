<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCoinRequest extends Request
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
            'country_id' => 'required',
            'value' => 'required',
            'img_back' =>'image|mimes:jpg,png,gif'
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'country_id.required' => 'O país é obrigatório.',
            'value.required' => 'O valor da moeda é obrigatório.',
            'img_back.image' => 'O ficheiro tem de ser uma imagem.',
            'img_back.mimes' => 'Apenas são permitidos imagens do tipo jpg, png e gif.',
        ];
    }
}
