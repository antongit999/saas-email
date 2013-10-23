<?php

namespace Saas\Email\Facades;

use Illuminate\Support\Facades\Facade;

class Foo extends Facade
{
    protected static function getFacadeAccessor() { return 'email.foo'; }
}