<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("customer_id");
            $table->bigInteger("advertisement_id");
            $table->date("start");
            $table->date("end");
            $table->integer("days");
            $table->integer("income");
            $table->string("ads_photo");
            $table->bigInteger("user_id");
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
        Schema::dropIfExists('customer_advertisements');
    }
}
