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
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
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
        $this->authorize('admin', [$request->user()]);

        return view('admin.user.index', $this->userRepository->AllUser())->with('mode', 'user');
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('admin.user.create')->with('mode', 'user');
    }

    /**
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
