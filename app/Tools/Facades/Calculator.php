<?php

namespace App\Tools\Facades;

use Illuminate\Support\Facades\Facade;

class Calculator extends Facade
{
    /**
     * IoCに移管
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'calculator';
    }
}
