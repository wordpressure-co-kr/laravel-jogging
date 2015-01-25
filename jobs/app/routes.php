<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');
	return Redirect::to('jobs');
});

Route::get('jobs', function(){
	$jobs = Job::all();
	return View::make('jobs.index')->with('jobs', $jobs);
});

Route::get('jobs/companys/{name}', function($name){
	$company = Company::whereName($name)->with('jobs')->first();
	return View::make('jobs.index')
		->with('company', $company)
		->with('jobs', $company->jobs);
});

Route::get('jobs/{id}', function($id){
	return "Job #$id";
})->where('id', '[0-9]+');

Route::get('about', function(){
	return View::make('about')->with('number_of_jobs', 9000);
});

Route::get('jobs/{id}', function($id) {
	$job = Job::find($id);
	return View::make('jobs.single')
		->with('job', $job);
});

