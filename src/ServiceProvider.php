<?php

namespace Mactape\TgVarDumper;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $configPath = __DIR__ . '/../config/tg-var-dump.php';

        $this->mergeConfigFrom($configPath, 'tg-var-dump');
    }
}
