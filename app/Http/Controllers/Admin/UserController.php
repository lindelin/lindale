<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\UserRepositoryContract;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * 用户资源库.
     * @var UserRepositoryContract
     */
    protected $userRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * UserController constructor.
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 超级用户控制台->用户控制台主页.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $this->authorize('admin', [$request->user()]);

        return view('admin.user.index', $this->userRepository->allUser())->with('mode', 'user');
    }

    /**
     * 超级用户控制台->用户创建表单.
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $this->authorize('admin', [$request->user()]);

        return view('admin.user.create')->with('mode', 'user');
    }

    /**
     * 超级用户控制台->创建用户.
     *
     * @param UserRequest $request
     * @return mixed
     */
    public function store(UserRequest $request)
    {
        $this->authorize('admin', [$request->user()]);

        $result = $this->userRepository->createUser($request)->save();

        if ($result) {
            return redirect()->to('/admin/user')->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-fail'));
        }
    }

    /**
     * 超级用户控制台->删除用户.
     *
     * @param Request $request
     * @param User $user
     * @return mixed
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('admin', [$request->user()]);

        //$this->userRepository->DeleteUser($user);

        if ($user->delete()) {
            return redirect()->to('/admin/user')->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
