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
            $table->string('location', 255);
            $table->string('type', 50)->default('free'); // free | paid
            $table->unsignedBigInteger('price')->default(0);
            $table->dateTime('starting_time');
            $table->dateTime('ending_time');
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
