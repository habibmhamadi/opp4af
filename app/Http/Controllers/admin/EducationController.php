<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Education;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.education.index', [
            'education' => Education::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('admin'), 401);
        Education::create($request->validate(['name' => 'required|min:3|unique:education,name']));
        return redirect()->route('admin.education.index')->with(['success' => __('Create success.')]);
    }

    public function edit(Education $education)
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.education.edit', ['education' => $education]);
    }

    public function update(Request $request, Education $education)
    {
        abort_if(Gate::denies('admin'), 401);
        $education->update($request->validate(['name' => 'required|min:3|unique:education,name']));
        return redirect()->route('admin.education.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(Education $education)
    {
        abort_if(Gate::denies('admin'), 401);
        $education->delete();
        return redirect()->route('admin.education.index')->with(['success' => __('Delete success.')]);
    }
}
