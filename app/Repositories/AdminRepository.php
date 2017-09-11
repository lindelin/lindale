<?php

namespace App\Repositories;

use App\Contracts\Repositories\AdminRepositoryContract;
use Charts;
use App\User;

class AdminRepository implements AdminRepositoryContract
{
    /**
     * 仪表盘資源取得
     * @return array
     */
    public function dashboardResources()
    {
        $UserChart = Charts::multiDatabase('bar', 'highcharts')
            ->title('ユーザ状況')
            ->dataset('新規ユーザ', User::select('created_at')->get())
            ->dataset('活発ユーザ', User::select('updated_at AS created_at')->get())
            ->elementLabel('人')
            ->lastByDay();

        return compact('UserChart');
    }
}
