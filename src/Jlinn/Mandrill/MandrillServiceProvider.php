<?php

namespace Jlinn\Mandrill;

use Illuminate\Support\ServiceProvider;

class MandrillServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->package('jlinn/mandrill-api-php');

        $this->app['mandrill'] = $this->app->share(function ($app)
        {
            $config = $app->config->get('mandrill-api-php::config');
            $factory = "\\{$config['factory']}";
            return new $factory($config['secret']);
        });
    }

    public function provides()
    {
        return ['mandrill'];
    }
}