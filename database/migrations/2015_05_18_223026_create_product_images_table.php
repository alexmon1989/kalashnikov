<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('file_name');
            $table->integer('product_id')->unsigned();
            $table->timestamps();

            // Внешние ключи
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('no action')
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
        Schema::drop('product_images');
    }

}