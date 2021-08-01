<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.organization.index', [
            'organizations' => Organization::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.organization.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('admin'), 401);
        Organization::create($request->validate(['name' => 'required|min:3|unique:organizations,name']));
        return redirect()->route('admin.organization.index')->with(['success' => __('Create success.')]);
    }

    public function edit(Organization $organization)
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.organization.edit', ['organization' => $organization]);
    }

    public function update(Request $request, Organization $organization)
    {
        abort_if(Gate::denies('admin'), 401);
        $organization->update($request->validate(['name' => 'required|min:3|unique:organizations,name']));
        return redirect()->route('admin.organization.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('admin'), 401);
        $organization->delete();
        return redirect()->route('admin.organization.index')->with(['success' => __('Delete success.')]);
    }
}
