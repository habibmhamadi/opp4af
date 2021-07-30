<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.opportunity.index', [
            'opportunities' => Opportunity::with('category')->latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        return back()->with(['success' => 'Create not available yet!']);
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Opportunity $opportunity)
    {
        return back()->with(['success' => 'Edit not available yet!']);
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        //
    }

    public function destroy(Opportunity $opportunity)
    {
        return back()->with(['success' => 'Delete not available yet!']);
    }
}
