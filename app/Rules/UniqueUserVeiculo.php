<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\userVeiculo;

class UniqueUserVeiculo implements Rule
{
    private $userId;
    private $veiculoId;

    public function __construct($userId, $veiculoId)
    {
        $this->userId = $userId;
        $this->veiculoId = $veiculoId;
    }

    public function passes($attribute, $value)
    {
        return !userVeiculo::where('user_id', $this->userId)
            ->where('veiculo_id', $this->veiculoId)
            ->exists();
    }

    public function message()
    {
        return 'Este usuário já está associado a este veículo.';
    }
}
