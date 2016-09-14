<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

class ColorableRepository
{

    public static function panel()
    {
        return Collection::make([
            'panel-primary',
            'panel-success',
            'panel-info',
            'panel-warning',
            'panel-danger',
            'panel-default',
        ])->random();
    }

    public static function lindale()
    {
        return Collection::make([
            'background-color: #d8282e;color: #FFFFFF;',
            'background-color: #c7171e;color: #FFFFFF;',
            'background-color: #de5c63;color: #FFFFFF;',
            'background-color: #f8b551;color: #FFFFFF;',
            'background-color: #ed6942;color: #FFFFFF;',
            'background-color: #f2914a;color: #FFFFFF;',
            'background-color: #ffce00;color: #FFFFFF;',
            'background-color: #fff45c;color: #000000;',
            'background-color: #7fb236;color: #FFFFFF;',
            'background-color: #58b8b6;color: #FFFFFF;',
            'background-color: #0069ae;color: #FFFFFF;',
            'background-color: #2799c8;color: #FFFFFF;',
            'background-color: #eb68a3;color: #FFFFFF;',
            'background-color: #ff6ead;color: #FFFFFF;',
            'background-color: #000000;color: #FFFFFF;',
        ])->random();
    }

}