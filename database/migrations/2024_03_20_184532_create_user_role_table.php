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
        // Create a new table named 'user_role' in the database
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();

            // Add 'user_id' and 'role_id' columns (foreign keys)
            $table->foreignID('user_id');
            $table->foreignID('role_id');

            // Define foreign key constraints for 'user_id' and 'role_id'
            // On update, cascade the changes
            // On delete, restrict the operation
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};
