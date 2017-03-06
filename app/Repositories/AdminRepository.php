<?php
/**
 * Created by kgo.
 * Date: 2017/03/05
 * Time: 18:08
 */

namespace App\Repositories;

use Charts;
use App\User;

class AdminRepository
{
    public function DashboardResources()
    {
        $UserChart = Charts::multiDatabase('bar', 'highcharts')
            ->title('ユーザ状況')
            ->dataset('新規ユーザ', User::select('created_at')->get())
            ->dataset('活発ユーザ', User::select('updated_at AS created_at')->get())
            ->elementLabel('人')
            ->lastByDay();
        ;

        return compact('UserChart');
    }
}