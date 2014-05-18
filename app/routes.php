<?php

Route::get('/', 'TestAppController@showHomeScreen');

Route::get('/register', 'TestAppController@showRegisterScreen');
Route::post('/register_user', 'TestAppController@registerUser');

Route::get('/login', 'TestAppController@showLoginScreen');
Route::post('/login_user', 'TestAppController@loginUser');

Route::post('/make_search', 'TestAppController@makeSearch');
Route::get('/results', 'TestAppController@showResultsScreen');
