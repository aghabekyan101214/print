<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormValuePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_value_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("form_value_id");
            $table->foreign("form_value_id")->references("id")->on("form_values")->onDelete("cascade");

            $table->unsignedBigInteger("product_price_id");
            $table->foreign("product_price_id")->references("id")->on("product_prices")->onDelete("cascade");
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
        Schema::dropIfExists('form_value_prices');
    }
}
