<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class percursoLocal extends Model
{
    protected $fillable = [
        'percurso_id',
        'local_id',
        'order'
    ];

    public $timestamps = false;

    protected $table = 'percurso_local';

    public $incrementing = false; // Desabilita o incremento automático

    protected $primaryKey = null;
}
