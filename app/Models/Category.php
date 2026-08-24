<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // set accessors and mutators for Category name
    protected function name(): Attribute
    {
        return Attribute::make(
            // Accessor: Capitalizes the first letter when read
            get: fn(string $value) => ucfirst($value),
            
            // Mutator: Converts to lowercase before saving
            set: fn(string $value) => strtolower($value),
        );
    }
}
