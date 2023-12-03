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
        Schema::create('advertising_to_platform', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advertising_id');
            $table->unsignedBigInteger('platform_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertising_to_platform');
    }
};
