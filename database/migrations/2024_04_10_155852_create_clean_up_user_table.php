<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clean_up_user', function (Blueprint $table) {
            $table->id();
            // Add 'user_id' and 'clean_up_id' columns (foreign keys)
            // They are constrained to reference 'id' on 'users' and 'clean_ups' tables respectively
            // On delete, cascade the operation
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('clean_up_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clean_up_user');
    }
};
