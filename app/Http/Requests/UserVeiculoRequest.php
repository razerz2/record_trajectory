<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueUserVeiculo;

class UserVeiculoRequest extends FormRequest
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
            'user_id' => [
                'required',
                new UniqueUserVeiculo($this->user_id, $this->veiculo_id),
            ],
            'veiculo_id' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'É obrigatório selecionar usuário!',
            'veiculo_id.required' => 'É obrigatório selecionar veículo!'
        ];
    }
}
