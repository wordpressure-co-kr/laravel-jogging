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
	return "All Jobs";
});

Route::get('jobs/{id}', function($id){
	return "Job #$id";
})->where('id', '[0-9]+');

