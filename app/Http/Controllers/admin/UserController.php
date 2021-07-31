<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        abort_if(Gate::denies('admin'), 403);
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('admin'), 403);
        User::create($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed|string'
        ]));
        return redirect()->route('admin.user.index')->with(['success' => __('Create success.')]);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('admin'), 403);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('admin'), 403);
        $user->update($request->validate(['name' => 'required|min:3|string']));
        return redirect()->route('admin.user.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('admin'), 403);
        if($user->is_admin)
        {
            return redirect()->route('admin.user.index')->with(['error' => __('Unable to delete Admin.')]);
        }
        $user->delete();
        return redirect()->route('admin.user.index')->with(['success' => __('Delete success.')]);
    }
}
