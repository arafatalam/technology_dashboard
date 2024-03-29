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

// TODO Common Fields related routes
Route::get('/commonfields', array('as' => 'commonfields', 'before ' => 'auth', 'uses' => 'CommonFieldController@showCommonFields'));
Route::post('/savecommonfield', array('as' => 'savecommonfield', 'before ' => 'auth', 'uses' => 'CommonFieldController@saveCommonField'));
Route::post('/deletecommonfield', array('as' => 'deletecommonfield', 'before ' => 'auth', 'uses' => 'CommonFieldController@deleteCommonField'));
Route::get('/getdatacommonfields', array('as' => 'getdatacommonfields', 'before ' => 'auth', 'uses' => 'CommonFieldController@getDataCommonFields'));
Route::get('/getdatacommonfield/{fieldId}', array('as' => 'getdatacommonfield', 'before ' => 'auth', 'uses' => 'CommonFieldController@getDataCommonField'));

// TODO Module related routes
Route::get('/createmodule', array('as' => 'createmodule', 'before ' => 'auth', 'uses' => 'ModuleController@showCreateModule'));
Route::get('/modulelist', array('as' => 'modulelist', 'before ' => 'auth', 'uses' => 'ModuleController@showModuleList'));
Route::post('/savemodule', array('as' => 'savemodule', 'before ' => 'auth', 'uses' => 'ModuleController@saveModule'));
Route::post('/savefield', array('as' => 'savefield', 'before ' => 'auth', 'uses' => 'ModuleController@saveField'));
Route::post('/deletefield', array('as' => 'deletefield', 'before ' => 'auth', 'uses' => 'ModuleController@deleteField'));
Route::post('/savemilestone', array('as' => 'savemilestone', 'before ' => 'auth', 'uses' => 'ModuleController@saveMilestone'));
Route::post('/deletemilestone', array('as' => 'deletemilestone', 'before ' => 'auth', 'uses' => 'ModuleController@deleteMilestone'));
Route::get('/getdatamodulelist', array('as' => 'getdatamodulelist', 'before ' => 'auth', 'uses' => 'ModuleController@getDataModuleList'));
Route::get('/getdatamodule/{moduleId}', array('as' => 'getdatamodule', 'before ' => 'auth', 'uses' => 'ModuleController@getDataModule'));


Route::post('/getdatamodulefields/{moduleId}', array('as' => 'getdatamodulefields', 'before ' => 'auth', 'uses' => 'ModuleController@getDataModuleFields'));
Route::get('/getdatamodulefields/{moduleId}', array('as' => 'getdatamodulefields', 'before ' => 'auth', 'uses' => 'ModuleController@getDataModuleFields'));


Route::get('/getdatamodulefield/{moduleFieldId}', array('as' => 'getdatamodulefield', 'before ' => 'auth', 'uses' => 'ModuleController@getDataModuleField'));
Route::get('/getdatadefaultmilestones/{moduleId}', array('as' => 'getdatadefaultmilestones', 'before ' => 'auth', 'uses' => 'ModuleController@getDataDefaultMilestones'));
Route::get('/getdatadefaultmilestone/{milestoneId}', array('as' => 'getdatadefaultmilestone', 'before ' => 'auth', 'uses' => 'ModuleController@getDataDefaultMilestone'));


//TODO Project Related Routes
Route::get('/redcreateproject/{moduleId}', array('as' => 'redcreateproject','before' => 'auth', 'uses' => 'ProjectController@redCreateProject'));
Route::get('/createproject', array('as' => 'createproject','before' => 'auth', 'uses' => 'ProjectController@showCreateProject'));
Route::post('/saveproject', array('as' => 'saveproject','before' => 'auth', 'uses' => 'ProjectController@saveProject'));


//TODO Vendor Related Routes
Route::get('/addvendor', array('as' => 'addvendor','before' => 'auth', 'uses' => 'VendorController@showAddVendor'));
Route::post('/savevendor', array('as' => 'savevendor','before' => 'auth', 'uses' => 'VendorController@saveVendor'));
Route::get('/vendorlist', array('as' => 'vendorlist','before' => 'auth', 'uses' => 'VendorController@showVendorList'));
Route::get('/getdatavendorlist', array('as' => 'getdatavendorlist','before' => 'auth', 'uses' => 'VendorController@getDataVendorList'));
Route::get('/getdatavendorstatus/{vendorId}', array('as' => 'getdatavendorstatus','before' => 'auth', 'uses' => 'VendorController@getDataVendorStatus'));
Route::get('/redvendordetails/{vendorId}', array('as' => 'redvendordetails','before' => 'auth', 'uses' => 'VendorController@redVendorDetails'));
Route::get('/vendordetails', array('as' => 'vendordetails','before' => 'auth', 'uses' => 'VendorController@vendorDetails'));
Route::get('/getdatavendorservicelist/{vendorId}', array('as' => 'getdatavendorservicelist','before' => 'auth', 'uses' => 'VendorController@getDataVendorServiceList'));
Route::get('/getdatavendorissuelist/{vendorId}', array('as' => 'getdatavendorissuelist','before' => 'auth', 'uses' => 'VendorController@getDataVendorIssueList'));
//TODO Service Related Routes
Route::get('/addservice', array('as' => 'addservice','before' => 'auth', 'uses' => 'ServiceController@showAddService'));
Route::post('/saveservice', array('as' => 'saveservice','before' => 'auth', 'uses' => 'ServiceController@saveService'));
Route::get('/servicelist', array('as' => 'servicelist','before' => 'auth', 'uses' => 'ServiceController@showServiceList'));
Route::get('/getdataservicelist', array('as' => 'getdataservicelist','before' => 'auth', 'uses' => 'ServiceController@getDataServiceList'));

//TODO Issue Related Routes

Route::get('/redshowaddissue/{serviceId}', array('as' => 'redshowaddissue','before' => 'auth', 'uses' => 'IssueController@redShowAddIssue'));
Route::get('/showaddissue', array('as' => 'showaddissue','before' => 'auth', 'uses' => 'IssueController@showAddIssue'));
Route::post('/saveissue', array('as' => 'saveissue','before' => 'auth', 'uses' => 'IssueController@saveIssue'));

//TODO CR Related Routes
Route::get('/redshowaddcr/{serviceId}', array('as' => 'redshowaddcr','before' => 'auth', 'uses' => 'ChangeRequestController@redShowAddCR'));
Route::get('/showaddcr', array('as' => 'showaddcr','before' => 'auth', 'uses' => 'ChangeRequestController@showAddCR'));