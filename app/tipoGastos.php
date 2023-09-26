<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoGastos extends Model
{
    protected $fillable = [
        'nome_gasto'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_tp_gastos';

    protected $table = 'tipo_gastos';
}
