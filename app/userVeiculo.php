<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userVeiculo extends Model
{
    protected $fillable = [
        'user_id',
        'veiculo_id'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_uv';

    protected $table = 'user_veiculo';
}
