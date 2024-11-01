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
        Schema::create('boord_directors', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->columnType('VARCHAR')->nullable();
            $table->string('image',100)->columnType('VARCHAR')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boord_directors');
    }
};
