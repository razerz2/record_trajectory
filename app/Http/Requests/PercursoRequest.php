<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PercursoRequest extends FormRequest
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
            'km_inicial' => [
                'required'
            ],
            'km_final' => [
                'required',
                'numeric',
                'gt:km_inicial'
            ],
            'observacao' => [
                'nullable',
                'min:10'
            ],
            'data_registro' => [
                'required'
            ],
            'itens_locais' => [
                'required',
                'array',
                'min:1'
            ],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'O Usuário deve ser selecionado!',
            'veiculo_id.required' => 'O Veículo deve ser selecionado!',
            'km_inicial.required' => 'O campo KM Inicial é obrigatório!',
            'km_final.required' => 'O campo KM Final é obrigatório!',
            'km_final.numeric' => 'O campo KM final deve ser atribuido apenas números!',
            'km_final.gt' => 'O campo kM Final deve ser maior que a quilometragem inicial!',
            'observacao.min' => 'O campo Observação deve possuir ao mínimo 10 caractéres!',
            'data_registro.required' => 'O campo Data da Corrida é obrigatório!',
            'itens_locais.required' => 'Por favor adicione os locais percorridos da corrida!',
            
        ];
    }
}
