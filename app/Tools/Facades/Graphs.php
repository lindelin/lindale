<?php
/**
 * Created by kgo.
 *
 * Date: 2017/07/21
 * Time: 18:12
 */

namespace App\Tools\Facades;


use Illuminate\Support\Facades\Facade;

class Graphs extends Facade
{
    /**
     * IoCに移管
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'progressCharts';
    }
}