<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->double('original_price');
            $table->double('sale_price')->nullable();
            $table->boolean('on_sale')->default(false);
            $table->json('features')->default('{}');
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
        Schema::dropIfExists('sellables');
    }
}
