<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GastosRequest extends FormRequest
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
                'required'
            ],
            'veiculo_id' => [
                'required'
            ],
            'tipo_gastos' => [
                'required'
            ],
            'valor' => [
                'required',
                'numeric'                
            ],
            'descricao' => [
                'nullable',
                'min:10'
            ],
            'litros' => [
                'required',
            ],
            'data_registro' => [
                'required'
            ],
            
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'O Usuário deve ser selecionado!',
            'veiculo_id.required' => 'O Veículo deve ser selecionado!',
            'tipo_gastos.required' => 'O campo Tipo de Gastos é obrigatório!',
            'valor.required' => 'O campo Valor é obrigatório!',
            'valor.numeric' => 'O campo Valor deve ser atribuido apenas números!',
            'descricao.min' => 'O campo Observação deve possuir ao mínimo 10 caractéres!',
            'litros.required' => 'O campo Litros é obrigatório!',
            'data_registro.required' => 'O campo Data é obrigatório!',
        ];
    }
}

