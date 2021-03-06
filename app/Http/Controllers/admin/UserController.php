<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.user.index', [
            'users' => User::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        abort_if(Gate::denies('admin'), 401);
        User::create($request->validated());
        return redirect()->route('admin.user.index')->with(['success' => __('Create success.')]);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('alter-profile', $user), 401);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('alter-profile', $user), 401);
        $validator = ['name' => 'required|min:3|string'];
        if($request->input('new_password') || $request->input('current_password'))
        {
            $validator['current_password'] = ['required', function($attr, $val, $fail) use ($user) {
                if(!\Hash::check($val, $user->password))
                {
                    return $fail('The current password is invalid.');
                }
            }];
            $validator['new_password'] = 'required|min:6|confirmed|string';
        }
        $user->update($request->validate($validator));
        return redirect()->route('admin.user.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('admin'), 401);
        if($user->is_admin)
        {
            return redirect()->route('admin.user.index')->with(['error' => __('Unable to delete Admin.')]);
        }
        $user->delete();
        return redirect()->route('admin.user.index')->with(['success' => __('Delete success.')]);
    }
}
