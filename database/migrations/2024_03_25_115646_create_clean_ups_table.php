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
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);

            $table->foreignId('group_id'); // Add a 'group_id' column (foreign key)
            $table->foreign('group_id')->references('id')->on('groups'); // Define foreign key constraint for 'group_id'
            
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
