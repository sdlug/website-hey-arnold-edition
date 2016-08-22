<?php

Route::group(['prefix' => 'api/v1'], function() {
	Route::get('gettags', 'TagController@getTags');
});

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('articles', 'ArticleController');
Route::resource('tags', 'TagController', ['only' => ['index', 'show', 'store']]);
Route::resource('presenters', 'PresenterController', ['only' => ['index', 'show']]);
