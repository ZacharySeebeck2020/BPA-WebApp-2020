<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voik ,, d
     */
    public function up()
    {
        Schema::create('shipping_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->integer('zip');
            $table->string('city');
            $table->string('state');
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
        Schema::dropIfExists('shipping_information');
    }
}
