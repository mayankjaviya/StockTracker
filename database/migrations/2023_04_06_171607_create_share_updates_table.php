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
            $table->unsignedBigInteger('share_id');
            $table->dateTime('trade_date');
            $table->double('open');
            $table->double('close');
            $table->double('high');
            $table->double('low');
            $table->double('current_price');
            $table->timestamps();

            $table->foreign('share_id')->references('id')->on('my_shares');
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
