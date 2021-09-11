<?php

namespace App\Http\Controllers\admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.subscriber.index')->with([
            'subscribers' => Subscriber::latest()->paginate(10),
            'count' => ($request->query('page', 1) - 1) * 10
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:subscribers,email']);
        Subscriber::create(['email' => $request->email]);
        return back()->with(['success' => _('You have successfully subscribed.')]);
    }
}
