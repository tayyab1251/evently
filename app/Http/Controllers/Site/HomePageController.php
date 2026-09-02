<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SweetAlert2\Laravel\Swal;

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

    public function getEventDetails(string $id)
    {
        $event = Event::findOrFail($id);
        $randomEvents = Event::inRandomOrder()->limit(5)->get();
        return view('site.details', compact('event', 'randomEvents'));
    }


    //==========================================Checkout
    public function checkout(Request $request)
    {
        $eventId = $request->event_id;
        $userId = auth()->id();

        // get event that user wants to book
        $event = Event::findOrFail($eventId);
        // return $event;

        // return $event;  
        // check is the event is free, if free -> let the user book without checkout processing
        if ($event->type == 'free') {
            // radnom orderID
            $bookingReference = 'BOOK-' . strtoupper(Str::random(10));
            try {
                $booking = Booking::create([
                    'user_id' => $userId,
                    'event_id' => $eventId,
                    'booking_reference' => $bookingReference,
                    'status' => 'paid',
                ]);
                Swal::success([
                    'title' => 'Booking Success',
                    'text'  => 'Booking has been confirmed'
                ]);

                return view('site.success', compact('event', 'booking'));
            } catch (\Exception $e) {
                Swal::error([
                    'title' => 'Booking Failed!',
                    'text' => 'Something went wrong : ' .  $e->getMessage(),
                ]);

                return redirect()->back();
            }
        }
    }


    // method that loads success page after successfull checkout
    public function success()
    {
        return view('site.success');
    }
}
