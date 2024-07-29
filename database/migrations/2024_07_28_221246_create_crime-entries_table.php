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
        Schema::create('crime-entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('crime_type')->index();
            $table->mediumText('location');
            $table->timestamp('incident_time');
            $table->string('photo_evidence')->nullable();
            $table->string('car_type')->nullable();
            $table->string('car_color')->nullable();
            $table->string('car_year')->nullable();
            $table->string('building_entry_method')->nullable();
            $table->text('taken_items')->nullable();
            $table->boolean('status')->default(false);
            $table->text('other_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crime-entries');
    }
};
