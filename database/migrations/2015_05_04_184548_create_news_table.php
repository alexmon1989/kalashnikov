<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('full_text')->nullable();
            $table->text('preview_text_small')->nullable();
            $table->text('preview_text_mid')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_on_main')->default(FALSE);
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
		Schema::table('news', function(Blueprint $table)
		{
            $table->dropIfExists();
		});
	}

}
