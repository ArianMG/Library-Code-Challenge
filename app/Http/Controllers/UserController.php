<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateUserPwdRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.create', [
            'yesno' => ['' => 'Make a Selection'] + collect(['1' => 'Yes', '0' => 'No'])->toArray()
        ]);
    }

    public function show(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        // $data = $request->only(['name', 'email', 'enabled', 'password']);
        $data = $request->only(['name', 'email', 'password']);

        try {
            $user = User::create(array_merge($data, [
                'password' => Hash::make($data['password'])
            ]));

            return redirect()->route('user.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('user.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        try {
            $user->update($data);

            return redirect()->route('user.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }

    public function updatePwd(UpdateUserPwdRequest $request, User $user)
    {
        $data = $request->validated();

        try {
            $user->update([
                'password' => Hash::make($data['password'])
            ]);

            return redirect()->route('user.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }
}
