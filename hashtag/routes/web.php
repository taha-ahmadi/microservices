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

$router->get('/hashtags', 'HashtagController@index');
$router->get('/hashtags/{name}', 'HashtagController@show');
$router->get('/hashtags/feeds/{hashtag}', "HashtagController@feedHashtag");
$router->post('/hashtags', "HashtagController@store");
$router->put('/hashtags/{hashtag}', "HashtagController@update");
$router->delete('/hashtags/{hashtag}', "HashtagController@destroy");