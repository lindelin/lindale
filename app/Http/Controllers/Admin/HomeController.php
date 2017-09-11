<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\AdminRepositoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;

class HomeController extends Controller
{
    /**
     * @var AdminRepositoryContract
     */
    protected $adminRepository;

    /**
     * HomeController constructor.
     * @param AdminRepositoryContract $adminRepository
     */
    public function __construct(AdminRepositoryContract $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * 超级用户控制台.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $this->authorize('admin', [$request->user()]);

        return view('admin.index', $this->adminRepository->dashboardResources())->with('mode', 'center');
    }
}
