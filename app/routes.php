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

Route::get('/', function()
{
	return View::make('tech_dashboard.pages.administration.commonfieldlist');
});


Route::get('/login', array('as' => 'login', 'uses' => 'LoginController@showLogin'));
Route::post('/dologin', array('as' => 'dologin', 'uses' => 'LoginController@doLogin'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'LoginController@doLogout'));


Route::get('/landing', array('as' => 'landing', 'before ' => 'auth', 'uses' => 'CommonFieldController@showCommonFields'));


Route::get('/commonfields', array('as' => 'commonfields', 'before ' => 'auth', 'uses' => 'CommonFieldController@showCommonFields'));
Route::post('/savecommonfield', array('as' => 'savecommonfield', 'before ' => 'auth', 'uses' => 'CommonFieldController@saveCommonField'));
Route::post('/deletecommonfield', array('as' => 'deletecommonfield', 'before ' => 'auth', 'uses' => 'CommonFieldController@deleteCommonField'));
Route::get('/getdatacommonfields', array('as' => 'getdatacommonfields', 'before ' => 'auth', 'uses' => 'CommonFieldController@getDataCommonFields'));
Route::get('/getdatacommonfield/{fieldId}', array('as' => 'getdatacommonfield', 'before ' => 'auth', 'uses' => 'CommonFieldController@getDataCommonField'));


Route::get('/createmodule', array('as' => 'createmodule', 'before ' => 'auth', 'uses' => 'ModuleController@showCreateModule'));
Route::post('/savemodule', array('as' => 'savemodule', 'before ' => 'auth', 'uses' => 'ModuleController@saveModule'));
Route::post('/savefield', array('as' => 'savefield', 'before ' => 'auth', 'uses' => 'ModuleController@saveField'));
Route::post('/savemilestone', array('as' => 'savemilestone', 'before ' => 'auth', 'uses' => 'ModuleController@saveMilestone'));