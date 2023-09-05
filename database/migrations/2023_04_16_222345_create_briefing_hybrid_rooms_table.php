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
        Schema::create('briefing_hybrid_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('briefing_hybrid_id')->constrained('briefing_hybrids');
            $table->string('name');
            $table->string('room_format');
            $table->text('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('briefing_hybrid_rooms');
    }
};
