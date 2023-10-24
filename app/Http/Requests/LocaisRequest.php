<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class LocaisRequest extends FormRequest
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
        $id = $this->route('locai');
        
        return [
            'estado_id' => [
                'required'
            ],
            'cidade_id' => [
                'required'
            ],
            'nome_local' => [
                'required',
                'min:6',
                Rule::unique('locais', 'nome_local')->ignore($id, 'id_local')
            ],
            'endereco' => [
                'required',
                'min:6'
            ],
            'n_endereco' => [
                'required',
                'min:1'
            ],
            'CEP' => [
                'required',
                'min:8'
            ],
        ];
    
    }

    public function messages()
    {
        return [
            'nome_local' => 'O Campo nome do local é obrigatório!',
            'nome_local' => 'O Nome do local deve ter no mínimo 6 caracteres!',
            'nome_local.unique' => 'O Local já foi cadastrado!',
            'endereco.required' => 'O Endereço do local é obrigatório!',
            'endereco.min' => 'O Endereço do local deve ter no mínimo 6 caracteres!',
            'n_endereco.required' => 'O campo Nº do endereço é obrigatório!',
            'n_endereco.min' => 'O Nº do endereço deve ter no mínimo 1 caracteres!',
            'CEP.required' => 'O campo CEP do Local é obrigatório!',
            'CEP.min' => 'O CEP do local deve ter no mínimo 8 caracteres!'
        ];
    }
}
