<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('description_1');
            $table->string('description_2');
            $table->string('file_name');
            $table->string('url');
            $table->string('btn_text');
            $table->integer('order');
            $table->boolean('enabled')->default(TRUE);
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
		Schema::drop('sliders');
	}

}
