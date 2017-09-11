<?php

namespace App\Contracts\Repositories;

interface AdminRepositoryContract
{
    /**
     * 仪表盘資源取得契約.
     * @return mixed
     */
    public function dashboardResources();
}
