<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class veiculo extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'placa',
        'km_inicial',
        'km_atual',
        'status',
        'data_registro'
    ];

    public $timestamps = false;

    protected $primaryKey = 'id_veiculo';

    protected $table = 'veiculo';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_veiculo', 'veiculo_id', 'user_id');
    }

    public function userVeiculos()
    {
        return $this->hasMany(userVeiculo::class, 'veiculo_id');
    }
}
