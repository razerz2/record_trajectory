<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    protected $fillable = [
        'uf',
        'nome_estado'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_estado';

    protected $table = 'estados';
}
