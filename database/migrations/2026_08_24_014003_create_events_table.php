<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('name', 255);

            $table->text('description');

            $table->string('location_name', 255);

            $table->string('address', 500);

            // $table->string('city', 100);
            $table->foreignId('city_id')->constrained('cities','id')->restrictOnDelete();

            $table->string('primary_image', 255)->nullable();

            $table->string('cover_image', 255)->nullable();

            $table->string('map_url', 2048)->nullable();

            $table->string('type', 50)->default('free'); // free | paid

            $table->unsignedBigInteger('price')->default(0);

            $table->boolean('is_featured')->default(false);

            $table->dateTime('start_at');

            $table->dateTime('end_at');

            $table->unsignedInteger('max_attendees')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
