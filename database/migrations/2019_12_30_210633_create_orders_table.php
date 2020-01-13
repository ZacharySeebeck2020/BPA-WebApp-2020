<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['OPEN', 'READY', 'SHIPPED', 'DELIVERED', 'CLOSED']);
            $table->enum('type', ['USER', 'ONETIME']);
            $table->string('identifier');
            $table->integer('shipping_info');
            $table->integer('contact_info');
            $table->date('date_shipped')->nullable();
            $table->date('date_delivered')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
