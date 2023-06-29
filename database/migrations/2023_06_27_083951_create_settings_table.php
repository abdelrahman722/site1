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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description1');
            $table->string('description2');
            $table->string('img');
            $table->string('address');
            $table->string('location');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('phone3');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('skype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
