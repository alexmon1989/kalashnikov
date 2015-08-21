<?php

/**
 * Миграция для переименования таблицы clients в partners.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameClientsTable extends Migration {
    public $from = 'clients';
    public $to = 'partners';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::rename($this->from, $this->to);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::rename($this->to, $this->from);
	}

}
