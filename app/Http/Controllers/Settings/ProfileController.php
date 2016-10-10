<?php

namespace App\Http\Controllers\Settings;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ProfileController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        return view('settings.index', $this->userRepository->MyInfo($request))->with('mode', 'profile');
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $result = $this->userRepository
            ->UpdateUser($request, $user)
            ->update();

        if ($result) {
            return redirect()->to('settings/profile')->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }
}
