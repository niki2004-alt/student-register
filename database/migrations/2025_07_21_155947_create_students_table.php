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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('number');
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'LGBT']);
            $table->string('year');
            $table->unsignedBigInteger('major_id'); // Foreign key column
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('major_id')->references('id')->on('major_subject')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
