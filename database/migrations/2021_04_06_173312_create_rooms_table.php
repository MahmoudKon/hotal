<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number')->unique();
            $table->boolean('is_available')->default(1);
            $table->text('info')->nullable();
            $table->unsignedInteger('people_count')->nullable();
            $table->unsignedDouble('price');
            $table->unsignedBigInteger('floor_id');
            $table->timestamps();

            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
