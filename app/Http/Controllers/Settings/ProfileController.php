<?php

namespace App\Http\Controllers\Settings;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class ProfileController extends Controller
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
     * ProfileController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
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
        return view('settings.index', $this->userRepository->MyInfo($request))->with('mode', 'profile');
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

        $result = $this->userRepository
            ->UpdateUser($request, $user)
            ->update();

        return response()->update($result);
    }
}
