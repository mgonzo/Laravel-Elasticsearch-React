<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('article/{id}', 'ArticleController@showArticle');
Route::get('article/{id}/amp', 'ArticleController@showArticleAmp');

Route::get('list/{channel}', 'ArticleController@fetchArticleList');

Route::get('channel/{slug}', 'ChannelController@showChannel');
Route::get('channel/{slug}/amp', 'ChannelController@showChannelAmp');
