<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VeiculoEditRequest extends FormRequest
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
        $id = $this->route('veiculo');

        return [
            'marca' => [
                'required',
                'min:3'
            ],
            'modelo' => [
                'required',
                'min:3'
            ],
            'placa' => [
                'required',
                'min:3',
                Rule::unique('veiculo', 'placa')->ignore($id, 'id_veiculo')
            ]
        ];
    
    }

    public function messages()
    {
        return [
            'marca.required' => 'O campo marca do veículo é obrigatório!',
            'marca.min' => 'A Marca do veículo deve ter no mínimo 3 caracteres!',
            'modelo.required' => 'O campo modelo do veículo é obrigatório!',
            'modelo.min' => 'O Modelo do veículo deve ter no mínimo 3 caracteres!',
            'placa.required' => 'O campo marca do veículo é obrigatório!',
            'placa.min' => 'A Placa do veículo deve ter no mínimo 3 caracteres!',
            'placa.unique' => 'Já existe um veículo cadastrado com a mesma placa!'
        ];
    }
}
