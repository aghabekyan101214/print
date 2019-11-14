<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessServiceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_service_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("business_service_id");
            $table->foreign("business_service_id")->references("id")->on("business_services")->onDelete("cascade")->onUpdate("cascade");
            $table->string("image", 255);
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
        Schema::dropIfExists('business_service_images');
    }
}
