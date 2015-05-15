<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('file_name')->nullable();
			$table->text('description')->nullable();
			$table->integer('parent_id')->unsigned()->nullable();
			$table->boolean('enabled')->default(TRUE);
			$table->timestamps();

            $table->foreign('parent_id')
                ->references('id')->on('product_categories')
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
		Schema::drop('product_categories');
	}

}
