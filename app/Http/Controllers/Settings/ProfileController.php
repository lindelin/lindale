<?php

namespace App\Http\Controllers\Settings;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        return view('settings.index', $this->userRepository->MyInfo($request))->with('mode', 'profile');
    }

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
