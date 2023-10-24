<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gastosPercurso extends Model
{
    protected $fillable = [
        'gasto_id',
        'percurso_id',
        'veiculo_id'
    ];

    public $timestamps = false;

    protected $table = 'gastos_percurso';

    public $incrementing = false; // Desabilita o incremento automático

    protected $primaryKey = null; // Indica que não tem chave primária
}
