<?php
/**
* Home
*/
Route::get('/', [
	'uses' => '\socialsite\Http\Controllers\HomeController@index',
	'as' => 'home', 
]);

Route::get('/alert', function () {
	return redirect()->route('home')->with('info', 'You have signed up!');
});

/**
* Authentication
*/

Route::get('/signup', [
		'uses' => '\socialsite\Http\Controllers\AuthController@getSignup',
		'as' => 'auth.signup',
		'middleware' => ['guest'],
]);

Route::post('/signup', [
		'uses' => '\socialsite\Http\Controllers\AuthController@postSignup',
		'middleware' => ['guest'],
		
]);



Route::get('/signin', [
		'uses' => '\socialsite\Http\Controllers\AuthController@getSignin',
		'as' => 'auth.signin',
		'middleware' => ['guest'],
]);

Route::post('/signin', [
		'uses' => '\socialsite\Http\Controllers\AuthController@postSignin',
		'middleware' => ['guest'],
		
]);

Route::get('/signout', [
		'uses' => '\socialsite\Http\Controllers\AuthController@getSignout',
		'as' => 'auth.signout',
]);

/**
*Search
*/

Route::get('/search', [
	'uses' => '\socialsite\Http\Controllers\SearchController@getResults',
	'as' => 'search.results',
]);

/**
* User Profile
*/

Route::get('/user/{username}', [
	'uses' => '\socialsite\Http\Controllers\ProfileController@getProfile',
	'as' => 'profile.index',
]);

Route::get('/profile/edit', [
	'uses' => '\socialsite\Http\Controllers\ProfileController@getEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
	'uses' => '\socialsite\Http\Controllers\ProfileController@postEdit',
	'middleware' => ['auth'],
]);

/**
*Friends
*/

Route::get('/friends', [
	'uses' => '\socialsite\Http\Controllers\FriendController@getIndex',
	'as' => 'friend.index',
	'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}', [
	'uses' => '\socialsite\Http\Controllers\FriendController@getAdd',
	'as' => 'friend.add',
	'middleware' => ['auth'],
]);


Route::get('/friends/accept/{username}', [
	'uses' => '\socialsite\Http\Controllers\FriendController@getAccept',
	'as' => 'friend.accept',
	'middleware' => ['auth'],
]);

Route::post('/friends/delete/{username}', [
	'uses' => '\socialsite\Http\Controllers\FriendController@postDelete',
	'as' => 'friend.delete',
	'middleware' => ['auth'],
]);


/**
*Statuses
*/

Route::post('/status', [
	'uses' => '\socialsite\Http\Controllers\StatusController@postStatus',
	'as' => 'status.post',
	'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
	'uses' => '\socialsite\Http\Controllers\StatusController@postReply',
	'as' => 'status.reply',
	'middleware' => ['auth'],
]);


Route::get('/status/{statusId}/like', [
	'uses' => '\socialsite\Http\Controllers\StatusController@getLike',
	'as' => 'status.like',
	'middleware' => ['auth'],
]);
