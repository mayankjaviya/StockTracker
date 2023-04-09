<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_updates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->dateTime('trade_date');
            $table->double('open');
            $table->double('close');
            $table->double('high');
            $table->double('low');
            $table->double('current_price');
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
        Schema::dropIfExists('share_updates');
    }
};
