<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unlock_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('unlockable_id');
            $table->string('unlockable_type');
            $table->enum('status', ['active', 'completed'])->default('active');
            $table->integer('unlock_cost')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'unlockable_id', 'unlockable_type'], 'user_unlockable_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unlock_sessions');
    }
};
