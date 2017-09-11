<?php

namespace App\Http\Controllers\Settings;

use App\Contracts\Repositories\UserRepositoryContract;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
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
     * ProfileController constructor.
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 个人资料设置.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return view('settings.index', $this->userRepository->myInfo($request))->with('mode', 'profile');
    }

    /**
     * 个人资料更新.
     *
     * @param UserRequest $request
     * @param User $user
     * @return mixed
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', [$user]);
        return response()->update($this->userRepository->updateUser($request, $user)->update());
    }
}
