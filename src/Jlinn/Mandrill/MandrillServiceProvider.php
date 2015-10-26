<?php

namespace Jlinn\Mandrill;

use Illuminate\Support\ServiceProvider;

class MandrillServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->package('jlinn/mandrill-api-php');
    }

    public function register()
    {
        $this->app->bind('mandrill', function ()
        {
            $config = $this->app->config->get('mandrill-api-php::config');
            return new MandrillFactory($config['secret']);
        });
    }

    public function provides()
    {
        return ['mandrill'];
    }
}