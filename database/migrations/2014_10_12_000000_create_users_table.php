<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id'); // Primary key as big integer
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->string('name', 200)->nullable();
            $table->timestamp('datehire')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->string('datehire');
            $table->text('role');
            $table->string('status', 200)->default('OFFLINE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

