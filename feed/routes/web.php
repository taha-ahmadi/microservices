<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/feeds', "FeedController@index");
$router->post('/feeds', "FeedController@store");

$router->get('/feeds/{feed}', "FeedController@show");

$router->put('/feeds/{feed}', "FeedController@update");
$router->delete('/feeds/{feed}', "FeedController@destroy");