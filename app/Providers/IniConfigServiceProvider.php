<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class IniConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Carregar o arquivo config.ini
        $config = parse_ini_file(base_path('config/config.ini'), true);

        // Definir as configurações no array de configuração do Laravel
        Config::set('custom', $config);
    }

    public function boot()
    {
        //
    }
}
