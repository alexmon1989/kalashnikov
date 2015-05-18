<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('category_id')->unsigned();
			$table->integer('manufacturer_id')->unsigned();
			$table->integer('provider_id')->unsigned();
			$table->string('packing');
			$table->string('weight');
			$table->boolean('enabled')->default(FALSE);
			$table->timestamps();

            // Внешние ключи
            $table->foreign('category_id')
                    ->references('id')
                    ->on('product_categories')
                    ->onDelete('no action')
                    ->onUpdate('cascade');
            $table->foreign('manufacturer_id')
                    ->references('id')
                    ->on('product_manufacturers')
                    ->onDelete('no action')
                    ->onUpdate('cascade');
            $table->foreign('provider_id')
                    ->references('id')
                    ->on('product_providers')
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
		Schema::drop('products');
	}

}
