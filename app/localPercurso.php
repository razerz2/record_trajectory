<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class localPercurso extends Model
{
    protected $fillable = [
        'percurso_id',
        'local_id'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_lp';

    protected $table = 'local_percurso';
}
