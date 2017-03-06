<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;

class HomeController extends Controller
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * 超级用户控制台.
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.index', $this->adminRepository->DashboardResources())->with('mode', 'center');
    }
}
