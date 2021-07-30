<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Fund;

class FundController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.fund.index', [
            'funds' => Fund::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), 403);
        return view('admin.fund.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('admin'), 403);
        Fund::create($request->validate(['name' => 'required|min:3|unique:funds,name']));
        return redirect()->route('admin.fund.index')->with(['success' => __('Create success.')]);
    }

    public function edit(Fund $fund)
    {
        abort_if(Gate::denies('admin'), 403);
        return view('admin.fund.edit', ['fund' => $fund]);
    }

    public function update(Request $request, Fund $fund)
    {
        abort_if(Gate::denies('admin'), 403);
        $fund->update($request->validate(['name' => 'required|min:3|unique:funds,name']));
        return redirect()->route('admin.fund.index')->with(['success' => __('Edit success.')]);
    }

    public function destroy(Fund $fund)
    {
        abort_if(Gate::denies('admin'), 403);
        $fund->delete();
        return redirect()->route('admin.fund.index')->with(['success' => __('Delete success.')]);
    }
}
