<?php

class CompanysTableSeeder extends Seeder {
	public function run() {
		DB::table('companys')->insert(array(
			array('id'=>1, 'name'=>"SkyAperture"),
			array('id'=>2, 'name'=>"StackExchange"),
			array('id'=>3, 'name'=>"WordPress"),
			array('id'=>4, 'name'=>"WooCommerce"),
			array('id'=>5, 'name'=>"EngineYard"),
		));
	}
}
