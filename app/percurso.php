<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class percurso extends Model
{
    protected $fillable = [
        'user_id',
        'veiculo_id',
        'km_inicial',
        'km_final',
        'km_percorrido',
        'observacao',
        'data_registro'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_percurso';

    protected $table = 'percurso';
}
