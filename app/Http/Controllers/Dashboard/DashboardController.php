<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // method to load latestEvents
    public function loadLatestEvents()
    {
        $latestEvents = Event::orderBy('created_at')->latest()->take(5)->get();
        // dd($latestEvents);
        return view('dashboard.index', compact('latestEvents'));
    }
}
