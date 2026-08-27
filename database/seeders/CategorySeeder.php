<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'conferences'],
            ['name' => 'workshops'],
            ['name' => 'seminars'],
            ['name' => 'webinars'],
            ['name' => 'meetups'],
            ['name' => 'networking'],
            ['name' => 'concerts & Music'],
            ['name' => 'festivals'],
            ['name' => 'sports'],
            ['name' => 'exhibitions'],
            ['name' => 'career & Jobs'],
            ['name' => 'education'],
            ['name' => 'technology'],
            ['name' => 'arts & Culture'],
            ['name' => 'food & Drink'],
            ['name' => 'health & Wellness'],
            ['name' => 'community'],
            ['name' => 'entertainment'],
            ['name' => 'other'],
        ]);
    }
}
