<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * 用户资源库.
     *
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 超级用户控制台->用户控制台主页.
     *
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $this->authorize('admin', [$request->user()]);

        return view('admin.user.index', $this->userRepository->AllUser())->with('mode', 'user');
    }

    /**
     * 超级用户控制台->用户创建表单.
     *
     * @return $this
     */
    public function create()
    {
        return view('admin.user.create')->with('mode', 'user');
    }

    /**
     * 超级用户控制台->创建用户.
     *
     * @param UserRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->authorize('admin', [$request->user()]);

        $user = new User();

        $result = $this->userRepository
            ->CreateUser($request, $user)
            ->save();

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
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('admin', [$request->user()]);

        $this->userRepository->DeleteUser($user);

        if ($user->delete()) {
            return redirect()->to('/admin/user')->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
