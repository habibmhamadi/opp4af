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
        abort_if(Gate::denies('admin'), 401);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('admin'), 401);
        $user->update($request->validate(['name' => 'required|min:3|string']));
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
