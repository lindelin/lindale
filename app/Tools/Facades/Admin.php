<?php

namespace App\Tools\Facades;


use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    /**
     * IoCに移管
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'admin';
    }
}