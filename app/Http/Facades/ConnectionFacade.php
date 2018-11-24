<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class ConnectionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'connection'; }
}