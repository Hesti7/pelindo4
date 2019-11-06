<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Index');
});

Route::get('/tes', function () {
    return view('admin.DataCustomer');
});



Route::get('/admin/userdata1','AdminController@getDataUser');//json data user


Auth::routes();
Route::post('/postlogin', 'LoginController@postLogin');
Route::post('/ceklogin', 'LoginController@cekLogin');
Route::get('/logout', 'LoginController@logOut');
Route::get('/admin/dashboard1', 'AdminController@getDashboardData');


// ADMIN
Route::group(['middleware'=> 'ceklogin'], function(){
    Route::get('/admin/dashboardview', 'AdminController@dashboardView'); //tampil view dashboard clear 
    Route::get('/admin/dashboarddata','AdminController@getDashboardData'); //json dashboard 
        Route::get('/admin/datacustomer', 'AdminController@getDataCustomers'); //json data customer
        Route::get('/admin/customerview', 'AdminController@customerView'); // tampil view customer
        Route::get('/admin/detailcustomer/{localcode}', 'AdminController@getDetailCustomer');
    Route::get('/admin/userview', 'AdminController@userView');
    Route::get('/admin/userdata','AdminController@getDataUser');//json data user
    Route::get('/admin/branchdata', 'AdminController@getDataBranch');//json data branch
    Route::post('/admin/insertuser', 'AdminController@insertUser'); //insertuser
    Route::get('/admin/deleteuser/{iduser}', 'AdminController@deleteUser');//delete user
    Route::get('admin/resetuser/{iduser}', 'AdminController@resetUser'); //resetuser
        Route::get('/admin/updatepass', 'AdminController@updatePassView');//tampil view update password
        Route::post('/admin/updatepassword', 'AdminController@updatePassword') ; //json untuk update password
    
});

Route::get('/tes/{idcustomer}', 'UserController@getDataCustomerUpdate');

// USER
Route::group(['middleware'=> 'ceklogin'], function(){
    Route::get('/user/dashboardview', 'UserController@dashboardView'); //tampil view dashboard 
    Route::get('/user/dashboarddata','UserController@getDashboardData'); //json dashboard 
    Route::get('/user/datacustomer', 'UserController@getDataCustomer'); //json data customer
    Route::get('/user/customerview', 'UserController@customerView'); // tampil view customer
    Route::get('/user/datacustomerupdate/{idcustomer}', 'UserController@getDataCustomerUpdate');
    Route::post('/user/updateunlockstatus', 'UserController@updateUnlockStatus');
    Route::post('/user/updatelockstatus', 'UserController@updateLockStatus');
    // Route::get('/user/detailcustomer/{localcode}', 'UserController@getDetailCustomer');
    Route::get('/user/updatepass', 'UserController@updatePassView');//tampil view update password
    Route::post('/user/updatepassword', 'UserController@updatePassword') ; //json untuk update password
    
    // Route::get('/admin/updatepass', 'AdminController@updatePassView');//tampil view update password
    // Route::post('/admin/updatepassword', 'AdminController@updatePassword') ; //json untuk update password
   
});

// Route::group(['middleware'=> 'ceklogin'], function(){
// Route::get('/user/dashboard/{codebranch}', 'UserController@getDashboardData');
// Route::get('/user/datacustomer/{codebranch}', 'UserController@getDataCustomers');
// Route::get('/user/datacustomer', 'UserController@getDataCustomer');
// Route::get('/user/formupdatepass', 'UserController@formUpdatePassword');
// Route::get('/user/updatepassword', 'UserController@updatePassword');
// Route::get('user/updatestatuslock', 'UserController@updateStatusLock');
// });


