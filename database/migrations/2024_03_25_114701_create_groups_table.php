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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->integer('no_of_users');
            $table->integer('no_of_cleanups');

            // $table->foreignId('user_id');

            // $table->foreign('user_id')->references('id')->on('users');

            // $table->foreignId('clean-up_id');

            // $table->foreign('clean-up_id')->references('id')->on('clean-ups');

            // $table->foreignId('image_id');

            // $table->foreign('image_id')->references('id')->on('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};