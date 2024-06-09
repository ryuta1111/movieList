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
        Schema::create('movie_lists', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name',50);
            $table->boolean('status')->default(false);
            $table->integer('evaluations')->nullable();
            $table->integer('how_to_watch')->nullable();
            $table->string('comments',100)->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_lists');
    }
};
