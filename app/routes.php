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

Route::get('/about', function()
{
	return View::make('about');
});

Route::get('/contact', function()
{
	return View::make('contact');
});

Route::get('/explain', function()
{
	return View::make('secondpage');
});

Route::get('/place', function()
{
	return View::make('place');
});

Route::get('/people/{location?}', array('as' => 'people.location', 'uses' => 'PeopleController@getPeople'));

Route::get('/product/{location?}', array('as' => 'product.location', 'uses' => 'ProductController@getProduct'));

Route::get('/price', function()
{
	return View::make('price');
});

Route::get('/advertising', function()
{
	return View::make('advertising');
});

Route::get('/', function()
{
	return View::make('index');
});