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
        Schema::create('clean_ups', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->time('time');
            $table->date('date');
            $table->text('description');
            
            // $table->foreignId('image_id');
            // $table->foreign('image_id')->references('id')->on('images');

            $table->foreignId('group_id');
            $table->foreign('group_id')->references('id')->on('groups');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clean_ups');
    }
};
