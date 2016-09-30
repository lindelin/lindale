<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('admin', [$request->user()]);

        return view('admin.user.index', $this->userRepository->AllUser())->with('mode', 'user');
    }

    public function create()
    {
        return view('admin.user.create')->with('mode', 'user');
    }

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
