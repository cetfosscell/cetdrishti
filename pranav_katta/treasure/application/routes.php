<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	
	return View::make('home.index');


});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::controller(Controller::detect());

Route::get('login', 'home@auth');

Route::get('logout', 'home@logout');

Route::any('answer', 'home@ans');

Route::get('board','home@board');

Route::get('sudo','sudo@index');

Route::get('rules',function(){
	return View::make('home.rules');
});

Route::get('L43',function(){
	if (Auth::user()->level==43)
		return "enter answer only in  box no. ".Auth::user()->flip." from top <b>else you will be banned </b> ";
	else
		return "indravattam";
});

Route::get('rq',function(){
	if (Auth::check()) {
		
		$string = Auth::user()->username;
		$length = strlen($string);
		$string = Str::lower($string);
		$name = array();
		for ($i=0; $i<$length; $i++) {
    		$name[$i] = $string[$i];
		}
		$s_name = "";
		$i=0;
		
		foreach ($name as $key) {
			if ($key == 'a'||$key == 'b'||$key == 'c'||$key == '2') {
				$s_name=$s_name.'2';
				
			}
			elseif ($key == 'd'||$key == 'e'||$key == 'f'||$key == '3') {
				$s_name=$s_name.'3';
				
			}
			elseif ($key == 'g'||$key == 'h'||$key == 'i'||$key == '4') {
				$s_name=$s_name.'4';
				
			}
			elseif ($key == 'j'||$key == 'k'||$key == 'l'||$key == '5') {
				$s_name=$s_name.'5';
				
			}
			elseif ($key == 'm'||$key == 'n'||$key == 'o'||$key == '6') {
				$s_name=$s_name.'6';
				
			}
			elseif ($key == 'p'||$key == 'q'||$key == 'r'||$key == 's'||$key == '7') {
				$s_name=$s_name.'7';
				
			}
			elseif ($key == 't'||$key == 'u'||$key == 'v'||$key == '8') {
				$s_name=$s_name.'8';
				
			}
			elseif ($key == 'w'||$key == 'x'||$key == 'y'||$key == 'z'||$key == '9') {
				$s_name=$s_name.'9';
				
			}else{
				$s_name=$s_name.'0';
				
			}
			$i++;
		}
		echo $s_name;
		$data = DB::table('data')->where('id', '=', Auth::user()->level)->first();
		$data->question = $s_name;
			$rank = 1;
			if (!$data) {
				return Redirect::to('/logout');
			}
			//return View::make('home.dash')->with('data',$data)->with('rank',$rank);	
	}
});
