<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    // get featured events
    public function getFeaturedEvents()
    {
        $featuredEvents = Event::where('is_featured', 1)->get();

        // get upocoming event
        $upcomingEvents = Event::where('start_at', '>', now())
            ->orderBy('start_at')
            ->get();
        // return $upcomingEvents;
        return view('site.home', compact('featuredEvents', 'upcomingEvents'));
    }

    public function getEventDetails(string $id){
        $event = Event::findOrFail($id);
        $randomEvents = Event::inRandomOrder()->limit(5)->get();
        return view('site.details', compact('event', 'randomEvents'));
    }
}
