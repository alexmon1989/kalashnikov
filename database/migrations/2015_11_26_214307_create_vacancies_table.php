<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('full_text')->nullable();
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
        Schema::table('vacancies', function(Blueprint $table)
        {
            $table->dropIfExists();
        });
    }
}
