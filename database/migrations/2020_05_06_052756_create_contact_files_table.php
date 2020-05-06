<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("contact_id");
            $table->foreign("contact_id")->references("id")->on("contacts")->onDelete("cascade");
            $table->string("file", 191);
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
        Schema::dropIfExists('contact_files');
    }
}
