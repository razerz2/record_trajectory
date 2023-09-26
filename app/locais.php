<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locais extends Model
{
    protected $fillable = [
        'estado_id',
        'cidade_id',
        'nome_local',
        'endereco',
        'n_endereco',
        'CEP',
        'n_visitas'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_local';

    protected $table = 'locais';
}
