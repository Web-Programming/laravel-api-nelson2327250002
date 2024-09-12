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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->double(column:'amount');
            $table->unsignedBigInteger(column:'funding_id');
            $table->unsignedBigInteger(column:'user_id');
            $table->foreign(columns: 'funding_id')
                ->references(columns: 'id')
                ->on(table: 'fundings');
            $table->foreign(columns: 'user_id')
                ->references(columns: 'id')
                ->on(table: 'users');//Donatur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
