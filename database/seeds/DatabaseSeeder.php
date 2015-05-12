<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('ArticlesTableSeeder');
		$this->call('GalleryCategoriesTableSeeder');
		$this->call('GalleryImagesTableSeeder');
		$this->call('SlidersImagesTableSeeder');
	}

}
