<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'booking_reference',
        'amount',
        'status',
        'payment_provider',
        'payment_status',
        'stripe_checkout_session_id',
        'stripe_payment_intent_id',
        'paid_at'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
