<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cidades extends Model
{
    protected $fillable = [
        'estado_id',
        'uf',
        'nome_cidade'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_cidade';

    protected $table = 'cidades';
}
