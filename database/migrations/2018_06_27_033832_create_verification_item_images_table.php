<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificationItemImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_item_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('verification_item_id');
            $table->string('path');
            $table->foreign('verification_item_id')
                  ->references('id')->on('verification_items')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verification_item_images');
    }
}
