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
        Schema::create('timein', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key as big integer
            $table->unsignedBigInteger('user_id'); // Foreign key type must match the primary key type
            $table->text('time');
            $table->text('out')->nullable();
            $table->text('date');
            $table->timestamps(); // Including timestamps might be useful

            // Define the foreign key constraint
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timein');
    }
};
