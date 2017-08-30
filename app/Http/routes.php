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

// This is default route.
// Route::get('/', function () {
// 	return view('welcome');
// });

use Illuminate\Http\Request;

	Route::get('/', function(){
		return view('welcome');
	});
	// Route::get('/login', function()	{
	// 	return view('auth.login');
	// });

	Route::get('/login', 'HomeController@index');
	Route::post('/login', 'Auth\AuthController@login');
	Route::get('/logout', 'Auth\AuthController@logout');
Route::group(['middleware' => 'auth'], function () {

// Contract Route
	Route::resource('contract', 'ContractController');

// Contract addendum route
	Route::resource('contractaddendum', 'ContractAddendumController');

// Bond Route
	Route::resource('bond', 'BondController');

// Insurance Route
	Route::resource('insurance', 'InsuranceController');

	Route::resource('employee', 'EmployeeController');

	Route::resource('contractor','ContractorController');

	Route::resource('profile', 'ProfileController');

	Route::resource('code', 'CodeController');

	Route::resource('license', 'LicenseController');
	
	Route::resource('asset', 'AssetController');

	Route::resource('information', 'InformationController');


	Route::group(['prefix' => 'employeejoin'], function()
		{
		route::get('/', ['as' => 'employeejoin.index', 'uses'=>'EmployeejoinController@index']);

		Route::get('/create/{id}',function($id){
			$data['id'] = $id;
			return view('employee.createjoin')->with($data);
		});
		Route::post('/create/', ['as' => 'employeejoin.store','uses'=>'EmployeejoinController@store']);
		Route::get('/{employeeid}/{joinid}/edit',['as' => 'employeejoin.edit','uses'=>'EmployeejoinController@edit']);
		Route::post('/{id}/edit',['as' => 'employeejoin.post','uses'=>'EmployeejoinController@post']);
		Route::put('/{employeeid}{joinid}/edit',['as' => 'employeejoin.update','uses'=>'EmployeejoinController@update']);
		});
	Route::get('/employee/contacts');

	//show codebook list
	Route::get('/code', function () {
	    $codes = \App\Code::orderBy('tableName','fieldName','code','asc')->get();
	    return view('code.list',['codes' => $codes ]);
	});



	Route::group(['prefix' => 'policy'], function() {
    	Route::get('/',[
			'as' => 'policy', function(){
				return view('policy.hrm');
		}]);

		Route::get('/hrm',[
			'as' => 'policy', function(){
				return view('policy.hrm');
		}]);
	});


});//end of groupware web