<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'location_name', 'address', 'city', 'latitude', 'longitude',
        'map_url', 'type', 'price', 'start_at', 'end_at', 'max_attendees'
        ];    
}
