<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("main_banner", 255);
            $table->string("main_title");
            $table->text("main_text");
            $table->string("about_title");
            $table->text("about_text");
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
        Schema::dropIfExists('static_data');
    }
}
