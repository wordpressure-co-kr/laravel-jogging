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

Route::get('jobs/now', function() {
	return View::make('jobs.now');
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

Route::get('jobs/create', function() {
	$job = new Job;
	return View::make('jobs.edit')
		->with('job', $job)
		->with('method', 'post');
});

Route::get('jobs/{job}/edit', function(Job $job) {
	return View::make('jobs.edit')
	->with('job', $job)
	->with('method', 'put');
});

Route::get('jobs/{job}/delete', function(Job $job) {
	return View::make('jobs.edit')
	->with('job', $job)
	->with('method', 'delete');
});

Route::post('jobs', function() {
	$job = Job::create(Input::all());
	return Redirect::to('jobs' . $job->id)
		->with('message', 'Successfully created page!');
});

Route::put('jobs/{job}', function(Job $job) {
	$job->update(Input::all());
	return Redirect::to('jobs/' . $job->id)
		->with('message', 'Successfully updated page!');
});

Route::delete('jobs/{job}', function(Job $job) {
	$job->delete();
	return Redirect::to('jobs')
		->with('message', 'Successfully deleted page!');
});

View::composer('jobs.edit', function($view) {
	$companys = Company::all();
	if ( count($companys) > 0 ) {
		$company_options = array_combine( $companys->lists('id'), $companys->lists('name'));
	} else {
		$company_options = array( null, 'Unspecified' );
	}
	$view->with('company_options', $company_options);
});


