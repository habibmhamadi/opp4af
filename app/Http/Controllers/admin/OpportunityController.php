<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Education;
use App\Models\Fund;
use App\Models\Location;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function __construct(Request $request)
    {
        $this->category_id = $request->query('category_id', 0);
        $this->education_id = $request->query('education_id', 0);
        $this->location_id = $request->query('location_id', 0);
        $this->state = $request->query('state', 'unpublished');
    }
    public function index(Request $request)
    {
        $opportunities = Opportunity::with('category')
            ->select('id', 'name', 'category_id', 'fund_id', 'created_at');
        if($this->category_id > 0)
        {
            $opportunities = $opportunities->where('category_id', $this->category_id);
        }
        if($this->education_id > 0)
        {
            $opportunities = $opportunities->whereHas('education', function($e) {
                return $e->where('education.id', $this->education_id);
            });
        }
        if($this->location_id > 0)
        {
            $opportunities = $opportunities->whereHas('locations', function($l) {
                return $l->where('locations.id', $this->location_id);
            });
        }
        if($this->state == 'published')
        {
            $opportunities = $opportunities->where('published', true);
        }
        else if($this->state == 'open')
        {
            $opportunities = $opportunities->where('deadline', '>', now());
        }
        else if($this->state == 'closed')
        {
            $opportunities = $opportunities->where('deadline', '<', now());
        }
        else if ($this->state == 'unpublished')
        {
            $opportunities = $opportunities->where('published', false);
        }
        $opportunities = $opportunities->latest()->simplePaginate(10);
        return view('admin.opportunity.index', [
            'opportunities' => $opportunities,
            'count' => ($request->query('page', 1) - 1) * 10,
            'categories' => Category::select('id', 'name')->get(),
            'education' => Education::select('id', 'name')->get(),
            'locations' => Location::select('id', 'name')->get()
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
