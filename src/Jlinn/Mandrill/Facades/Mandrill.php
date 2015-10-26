<?php

namespace Jlinn\Mandrill\Facades;

use Illuminate\Support\Facades\Facade;

class Mandrill extends Facade
{
    protected static function getFacadeAccessor() { return 'mandrill'; }
}