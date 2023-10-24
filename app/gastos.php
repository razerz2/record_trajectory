<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gastos extends Model
{
    protected $fillable = [
        'user_id',
        'veiculo_id',
        'tipo_gastos',
        'valor',
        'descricao',
        'litros',
        'data_registro'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_gasto';

    protected $table = 'gastos';
}
