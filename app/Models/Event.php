<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'location_name',
        'address',
        'city_id',
        'primary_image',
        'cover_image',
        'map_url',
        'type',
        'price',
        'start_at',
        'end_at',
        'max_attendees'
    ];



    // an event can belongs to a one category so we have to define a belongsTo relation with category
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // method that casts the Database
    // protected $casts = [
    //     'start_at' => 'datetime:M d, Y',
    //     'end_at' => 'datetime:M d, Y',
    //     'price' => 'decimal:2',
    // ];


    // format start_at date
    protected function startAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::parse($value)->format('d M, Y - h:i A') : null
        );
    }

    // format end_at date
    protected function endAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::parse($value)->format('d M, Y - h:i A') : null
        );
    }

    // accessor for status
    protected function status(): Attribute
    {
        return Attribute::get(function () {

            $startAt = $this->getRawOriginal('start_at');
            $endAt = $this->getRawOriginal('end_at');

            if (!$startAt || !$endAt) {
                return 'Not Scheduled';
            }

            $startAt = Carbon::parse($startAt);
            $endAt = Carbon::parse($endAt);

            $now = now();

            if ($now->lt($startAt)) {
                return 'Upcoming';
            }

            if ($now->gte($startAt) && $now->lt($endAt)) {
                return 'Ongoing';
            }

            return 'Completed';
        });
    }

    // method to set and get price in cents
    protected function price(): Attribute
    {
        return Attribute::make(
            // Accessor:
            get: fn(string $price) => $price / 100,

            // Mutator:
            set: fn(string $price) => $price * 100,
        );
    }
}
