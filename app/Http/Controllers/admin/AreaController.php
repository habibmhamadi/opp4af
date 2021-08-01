<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.area.index', [
            'areas' => Area::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.area.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('admin'), 401);
        Area::create($request->validate(['name' => 'required|min:3|unique:areas,name']));
        return redirect()->route('admin.area.index')->with(['success' => __('Create success.')]);
    }

    public function edit(Area $area)
    {
        abort_if(Gate::denies('admin'), 401);
        return view('admin.area.edit', ['area' => $area]);
    }

    public function update(Request $request, Area $area)
    {
        abort_if(Gate::denies('admin'), 401);
        $area->update($request->validate(['name' => 'required|min:3|unique:areas,name']));
        return redirect()->route('admin.area.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(Area $area)
    {
        abort_if(Gate::denies('admin'), 401);
        $area->delete();
        return redirect()->route('admin.area.index')->with(['success' => __('Delete success.')]);
    }
}
