<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ResourceTableSeeder');
		$this->call('GroupTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('DepartmentTableSeeder');
		$this->call('OptionTableSeeder');
		// $this->call('StoreTableSeeder');
		// $this->call('StoreDataTableSeeder');
	}

}