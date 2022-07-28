<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('offer_id');
            $table->string('mark');
            $table->string('model');
            $table->string('generation')->nullable();
            $table->integer('year');
            $table->integer('run');
            $table->string('color')->nullable();
            $table->string('body-type');
            $table->string('engine-type');
            $table->enum('transmission', ['Автоматическая', 'Механическая', 'Вариатор', 'Робот']);
            $table->enum('gear-type', ['Полный', 'Задний', 'Передний']);
            $table->string('generation_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
