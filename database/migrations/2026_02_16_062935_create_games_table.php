<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('platform'); // PS4 atau PS5
        $table->string('genre')->nullable();
        $table->string('cover_image'); // Path ke file gambar
        $table->boolean('is_featured')->default(false); // Muncul di home?
        $table->timestamps();
    });
}
};
