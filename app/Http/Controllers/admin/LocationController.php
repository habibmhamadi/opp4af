<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Location;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.location.index', [
            'locations' => Location::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), 403);
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('admin'), 403);
        Location::create($request->validate(['name' => 'required|min:3|unique:locations,name']));
        return redirect()->route('admin.location.index')->with(['success' => __('Create success.')]);
    }

    public function edit(Location $location)
    {
        abort_if(Gate::denies('admin'), 403);
        return view('admin.location.edit', ['location' => $location]);
    }

    public function update(Request $request, Location $location)
    {
        abort_if(Gate::denies('admin'), 403);
        $location->update($request->validate(['name' => 'required|min:3|unique:locations,name']));
        return redirect()->route('admin.location.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(Location $location)
    {
        abort_if(Gate::denies('admin'), 403);
        $location->delete();
        return redirect()->route('admin.location.index')->with(['success' => __('Delete success.')]);
    }
}
