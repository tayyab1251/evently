<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // method to load latestEvents
    public function loadLatestEvents()
    {
        $latestEvents = Event::orderBy('created_at')->latest()->take(5)->get();
        // $userBookedEvents = Booking::where('user_id', auth()->id())
        //     ->with('event')
        //     ->get();

        $userBookings = Booking::where('user_id', auth()->id())
            ->with('event.category')
            ->latest()
            ->get();
        // dd($latestEvents);
        return view('dashboard.index', compact('latestEvents', 'userBookings'));
    }
}
