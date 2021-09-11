<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOpportunityRequest;
use App\Http\Requests\UpdateOpportunityRequest;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Traits\ImageUpload;

class OpportunityController extends Controller
{
    use ImageUpload;

    public function __construct(Request $request)
    {
        $this->getRouteFilters($request);
    }

    public function index(Request $request)
    {
        $opportunities = Opportunity::with('category')
            ->select('id', 'name', 'category_id', 'fund_id', 'created_at');

        $opportunities = $this->applyRouteFilters($opportunities)->latest('id')->simplePaginate(10);
        $datas = $this->getRouteDatas(false);
        $datas['opportunities'] = $opportunities;
        $datas['count'] = ($request->query('page', 1) - 1) * 10;
        return view('admin.opportunity.index', $datas);
    }

    public function create()
    {
        return view('admin.opportunity.create', $this->getRouteDatas());
    }

    public function store(StoreOpportunityRequest $request)
    {
        $validated = $request->except(['image', 'location_ids', 'education_ids', 'area_ids']);
        $validated['image'] = $this->uploadImage($request->file('image'));
        $opportunity = auth()->user()->opportunities()
            ->create($validated);

        $opportunity->education()->attach($request->only('education_ids')['education_ids']);
        $opportunity->locations()->attach($request->only('location_ids')['location_ids']);
        $opportunity->areas()->attach($request->only('area_ids')['area_ids']);

        return redirect()->route('admin.opportunity.index')->with(['success' => 'Create success.']);
    }

    public function show(Opportunity $opportunity)
    {
        return view('admin.opportunity.show', [
            'opportunity' => $opportunity
        ]);
    }

    public function edit(Opportunity $opportunity)
    {
        abort_if(Gate::denies('alter-opportunity', $opportunity), 401);
        $datas = $this->getRouteDatas();
        $datas['opportunity'] = $opportunity;
        return view('admin.opportunity.edit', $datas);
    }

    public function update(UpdateOpportunityRequest $request, Opportunity $opportunity)
    {
        abort_if(Gate::denies('alter-opportunity', $opportunity), 401);
        $validated = $request->validated();
        $validated['published'] = false;
        if($request->hasFile('image'))
        {
            $this->deleteImage($opportunity->image);
            $validated['image'] = $this->uploadImage($request->file('image'));
        }
        $opportunity->update($validated);

        $opportunity->education()->detach();
        $opportunity->locations()->detach();
        $opportunity->areas()->detach();

        $opportunity->education()->attach($request->only('education_ids')['education_ids']);
        $opportunity->locations()->attach($request->only('location_ids')['location_ids']);
        $opportunity->areas()->attach($request->only('area_ids')['area_ids']);

        return redirect()->route('admin.opportunity.index')->with(['success' => 'Edit success.']);
    }

    public function destroy(Opportunity $opportunity)
    {
        abort_if(Gate::denies('alter-opportunity', $opportunity), 401);
        $this->deleteImage($opportunity->image);
        $opportunity->delete();
        return back()->with(['success' => 'Delete success.']);
    }

    public function publish(Opportunity $opportunity)
    {
        abort_if(Gate::denies('admin'), 401);
        $opportunity->update(['published' => true]);
        return redirect()->route('admin.opportunity.index')->with(['success' => 'Publish success.']);
    }

    public function unPublish(Opportunity $opportunity)
    {
        abort_if(Gate::denies('admin'), 401);
        $opportunity->update(['published' => false]);
        return redirect()->route('admin.opportunity.index')->with(['success' => 'Un-publish success.']);
    }

    private function getRouteDatas($allData = true)
    {
        $datas = [
            'categories' => DB::table('categories')->get(['id', 'name']),
            'education' => DB::table('education')->get(['id', 'name']),
            'locations' => DB::table('locations')->get(['id', 'name']),
        ];

        if($allData)
        {
            $datas['organizations'] = DB::table('organizations')->get(['id', 'name']);
            $datas['funds'] = DB::table('funds')->get(['id', 'name']);
            $datas['areas'] = DB::table('areas')->get(['id', 'name']);
        }
        return $datas;
    }

    private function getRouteFilters(Request $request)
    {
        $this->category_id = $request->query('category_id', 0);
        $this->education_id = $request->query('education_id', 0);
        $this->location_id = $request->query('location_id', 0);
        $this->state = $request->query('state', );
    }

    private function applyRouteFilters($opportunities)
    {
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
        return $opportunities;
    }
}
