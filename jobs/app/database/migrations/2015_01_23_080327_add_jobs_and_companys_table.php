<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobsAndCompanysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function($table){
			$table->increments('id');
			$table->string('title');
			$table->date('date_of_register');
			$table->integer('company_id')->nullable();
			$table->integer('salary');
			$table->string('field');
			$table->timestamps();
		});
		Schema::create('companys', function($table){
			$table->increments('id');
			$table->string('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jobs');
		Schema::drop('companys');
	}

}
