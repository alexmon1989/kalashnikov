<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('full_text')->nullable();
            $table->text('preview_text')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('enabled')->default(FALSE);
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
        Schema::table('promotions', function(Blueprint $table)
        {
            $table->dropIfExists();
        });
    }
}
