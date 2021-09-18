<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Models\Education;
use App\Models\Fund;
use App\Models\Location;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home', [
            'scholarships' => Opportunity::latest_scholarships(),
            'deadlines' => Opportunity::deadlines(9),
            'latest' => Opportunity::latests(9)
        ]);
    }

    public function opportunity(Opportunity $opportunity)
    {
        return view('site.opportunity')->with([
            'opportunity' => $opportunity,
            'related_opps' => Opportunity::related_opps($opportunity, 6)
        ]);
    }

    public function opportunities(Request $request)
    {
        $data = [];
        $opportunities = Opportunity::with('category');

        if($this->isNumber($request->query('category_id')))
        {
            $opportunities = $opportunities->where('category_id', $request->query('category_id'));
        }
        $data['category_id'] = $request->query('category_id');

        if($this->isNumber($request->query('fund_id')))
        {
            $opportunities = $opportunities->where('fund_id', $request->query('fund_id'));
        }
        $data['fund_id'] = $request->query('fund_id');

        if($this->isNumber($request->query('location_id')))
        {
            $this->location_id = $request->query('location_id');
            $opportunities = $opportunities->whereHas('locations', function($l) {
                return $l->where('locations.id', $this->location_id);
            });
        }
        $data['location_id'] = $request->query('location_id');

        $this->edu_ids = $this->isNumberArray($request->query('education_ids', ''));
        if($this->edu_ids)
        {
            $opportunities = $opportunities->whereHas('education', function($l) {
                return $l->whereIn('education.id', $this->edu_ids);
            });
        }
        $data['education_ids'] = $this->edu_ids;

        $this->area_ids = $this->isNumberArray($request->query('area_ids', ''));
        if($this->area_ids)
        {
            $opportunities = $opportunities->whereHas('areas', function($l) {
                return $l->whereIn('areas.id', $this->area_ids);
            });
        }
        $data['area_ids'] = $this->area_ids;

        if($request->query('query'))
        {
            $opportunities->where('name', 'like', '%'.$request->query('query').'%');
        }
        $data['query'] = $request->query('query');

        $opportunities = $opportunities->where('published', true)->orderBy('created_at')->simplePaginate(8);

        $data['opportunities'] = $opportunities;
        $data['categories'] = DB::table('categories')->select('id', 'name')->get();
        $data['locations'] = DB::table('locations')->select('id', 'name')->orderBy('name')->get();
        $data['funds'] = DB::table('funds')->select('id', 'name')->get();
        $data['education'] = DB::table('education')->select('id', 'name')->get();
        $data['areas'] = DB::table('areas')->select('id', 'name')->orderBy('name')->get();
        return view('site.opportunities')->with($data);
    }

    public function isNumber($value) {
        return $value && is_numeric($value);
    }

    public function isNumberArray($value) {
        $values = explode(',', $value);
        foreach ($values as $v)
        {
            if (! $this->isNumber($v)) {
                return [];
            }
        }
        return $values;
    }
}
