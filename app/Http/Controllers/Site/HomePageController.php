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

        // Get event
        $event = Event::findOrFail($eventId);

        // Check if user already has a booking for this event
        $existingBooking = Booking::where('user_id', $userId)
            ->where('event_id', $event->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->first();

        if ($existingBooking) {
            Swal::info([
                'title' => 'Already Booked',
                'text' => 'You already have a booking for this event.',
            ]);

            return redirect()->back();
        }

        // Check seat availability
        if ($event->remaining_attendees <= 0) {
            Swal::error([
                'title' => 'Booking Failed!',
                'text' => 'No seat available to book, please try a different event.',
            ]);

            return redirect()->back();
        }

        // Free event
        if ($event->type === 'free') {

            try {

                $booking = Booking::create([
                    'user_id' => $userId,
                    'event_id' => $event->id,
                    'booking_reference' => 'BOOK-' . strtoupper(Str::random(10)),
                    'amount' => 0,
                    'status' => 'confirmed',
                    'payment_provider' => null,
                    'payment_status' => 'not_required',
                ]);

                // Decrease remaining attendees
                $event->decrement('remaining_attendees');

                Swal::success([
                    'title' => 'Booking Success',
                    'text' => 'Your booking has been confirmed.',
                ]);

                return redirect()->route('checkout.success', [
                    'booking' => $booking->id,
                ]);
            } catch (\Exception $e) {

                Swal::error([
                    'title' => 'Booking Failed!',
                    'text' => 'Something went wrong while creating your booking.',
                ]);

                return redirect()->back();
            }
        }

        // Paid event
        if ($event->type === 'paid') {

            try {

                $booking = Booking::create([
                    'user_id' => $userId,
                    'event_id' => $event->id,
                    'booking_reference' => 'BOOK-' . strtoupper(Str::random(10)),
                    'amount' => $event->getRawOriginal('price'),
                    'status' => 'pending',
                    'payment_provider' => 'stripe',
                    'payment_status' => 'pending',
                ]);

                $stripe = new \Stripe\StripeClient(
                    config('services.stripe.secret')
                );

                $session = $stripe->checkout->sessions->create([
                    'line_items' => [
                        [
                            'price_data' => [
                                'currency' => 'usd',
                                'product_data' => [
                                    'name' => $event->name,
                                ],
                                'unit_amount' => $booking->amount,
                            ],
                            'quantity' => 1,
                        ],
                    ],

                    'mode' => 'payment',

                    'metadata' => [
                        'booking_id' => $booking->id,
                        'booking_reference' => $booking->booking_reference,
                        'event_id' => $event->id,
                    ],

                    'success_url' => url('/checkout/success')
                        . '?session_id={CHECKOUT_SESSION_ID}',

                    'cancel_url' => url('/checkout/cancel')
                        . '?session_id={CHECKOUT_SESSION_ID}',
                ]);

                $booking->update([
                    'stripe_checkout_session_id' => $session->id,
                ]);

                return redirect()->away($session->url);
            } catch (\Exception $e) {

                Swal::error([
                    'title' => 'Payment Error',
                    'text' => 'We could not start the payment process. Please try again.',
                ]);

                return redirect()->back();
            }
        }
    }


    // method that loads success page after successfull checkout
    public function success(Request $request)
    {
        if ($request->filled('booking')) {

            $booking = Booking::where('id', $request->booking)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $event = $booking->event;

            return view('site.success', [
                'booking' => $booking,
                'event' => $event,
                'session' => null,
            ]);
        }



        $request->validate([
            'session_id' => ['required', 'string'],
        ]);

        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );

        $session = $stripe->checkout->sessions->retrieve(
            $request->session_id
        );

        // Payment successful?
        if ($session->payment_status !== 'paid') {
            return redirect()->route('checkout.cancel', [
                'session_id' => $session->id,
            ]);
        }

        // Find booking
        $booking = Booking::where(
            'stripe_checkout_session_id',
            $session->id
        )
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $event = $booking->event;


        if ($booking->status !== 'confirmed') {

            $booking->update([
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'stripe_payment_intent_id' => $session->payment_intent,
                'paid_at' => now(),
            ]);

            // Decrease available seats only once
            $event->decrement('remaining_attendees');
        }


        return view('site.success', [
            'booking' => $booking,
            'event' => $event,
            'session' => $session,
        ]);
    }
}
