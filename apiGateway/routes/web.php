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


$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /**
     * Routes for Feeds
     */
    $router->get('/feeds', "FeedController@index");
    $router->post('/feeds', "FeedController@store");
    $router->get('/feeds/show/{feed}', "FeedController@show");
    $router->put('/feeds/{feed}', "FeedController@update");
    $router->delete('/feeds/{feed}', "FeedController@destroy");
    $router->get('/feeds/{hashtag}', "FeedController@feedsWithHashtag");

    /**
     * Routes for hashtags
     */
    $router->get('/hashtags', 'HashtagController@index');
    $router->get('/hashtags/{name}', 'HashtagController@show');
    $router->post('/hashtags', "HashtagController@store");
    $router->put('/hashtags/{hashtag}', "HashtagController@update");
    $router->delete('/hashtags/{hashtag}', "HashtagController@destroy");
});
