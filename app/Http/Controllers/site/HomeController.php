<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home', [
            'scholarships' => Opportunity::latest_scholarships(),
            'deadlines' => Opportunity::deadlines(),
            'latests' => Opportunity::latests()
        ]);
    }

    public function opportunity(Opportunity $opportunity)
    {
        return view('site.opportunity')->with([
            'opportunity' => $opportunity,
            'related_opps' => Opportunity::related_opps($opportunity->category->id, 4)
        ]);
    }
}
