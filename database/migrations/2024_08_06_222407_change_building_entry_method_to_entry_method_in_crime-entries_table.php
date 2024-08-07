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
        //
        Schema::table('crime-entries', function (Blueprint $table) {
            $table->renameColumn('building_entry_method', 'entry_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('crime-entries', function (Blueprint $table) {
            $table->renameColumn('entry_method', 'building_entry_method');
        });
    }
};
