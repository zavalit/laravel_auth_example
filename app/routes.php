<?php

Route::get('/', 'UserController@showHomeScreen');

Route::get('/register', 'UserController@showRegisterScreen');
Route::post('/register_user', 'UserController@registerUser');

Route::get('/login', 'UserController@showLoginScreen');
Route::post('/login_user', 'UserController@loginUser');
Route::get('/logout', 'UserController@logoutUser');

Route::post('/make_search', 'SearchController@makeSearch');
Route::get('/results', array('as'=>'search_results', 'uses'=>'SearchController@showResultsScreen'));
