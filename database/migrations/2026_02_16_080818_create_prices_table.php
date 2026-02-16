<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('prices', function (Blueprint $table) {
        $table->id();
        $table->string('duration'); // Pastikan kolom ini ada!
        $table->integer('price');
        $table->boolean('is_highlight')->default(false);
        $table->timestamps();
    });
}
};
