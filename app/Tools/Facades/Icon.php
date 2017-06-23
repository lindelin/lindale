<?php
/**
 * Created by PhpStorm.
 * User: LINDALE
 * Date: 2017/06/21
 * Time: 午後6:26.
 */

namespace App\Tools\Facades;

use Illuminate\Support\Facades\Facade;

class Icon extends Facade
{
    /**
     * IoCに移管
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'icon';
    }
}
