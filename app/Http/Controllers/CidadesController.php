<?php

namespace App\Http\Controllers;

use App\cidades;

class CidadesController extends Controller
{
    public function getCidades($state_id)
    {
        $cities = cidades::where('estado_id', $state_id)->get();
        return response()->json($cities);
    }
}
