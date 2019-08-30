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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home','HomeController@index')->name('home');
Route::get('/admin_view_choose','HomeController@admin_view_choose');
Route::get('/view_ward_ss/{id}','HomeController@view_ward_ss')->name('view_ward_ss');



Route::group(['prefix'=>'food_safety/','middleware' => ['auth']],function() {
    Route::post('/store', 'FoodSafetyController@store')->name('food_safety.store');
    Route::get('/upfile_csv', 'FoodSafetyController@upfile_csv');
    // Route::get('/{category}', 'FoodSafetyController@getByCate');
    Route::post('/upfile_csv', 'FoodSafetyController@upfile_csv_store');

    
});
Route::post('/store_checked', 'FoodSafetyController@store_checked')->name('store_checked');

Route::get('/food_safety/report', 'FoodSafetyController@report');
Route::get('/food_safety/reportMaster', 'FoodSafetyController@reportMaster');
Route::get('/food_safety/reportUnexpected', 'FoodSafetyController@reportUnexpected');
Route::get('/food_safety/reportUnexpectedWard', 'FoodSafetyController@reportUnexpectedWard');

Route::get('/food_safety/reportTest', 'FoodSafetyController@reportTest');
Route::get('/food_safety/reportTestMaster', 'FoodSafetyController@reportTestMaster');

Route::get('/food_safety/filter', 'FoodSafetyController@filter');

Route::get('/food_safety/{category}', 'FoodSafetyController@getByCate');


Route::get('/post', 'PostController@index');
Route::post('/post/store', 'PostController@store');
Route::get('/post/delete/{id}', 'PostController@destroy');

Route::get('/communication', 'PostController@communication');
Route::get('/lawSystem', 'PostController@lawSystem');



Route::get('/updateDataWard', 'FoodSafetyController@updateDataWard');

Route::group(['prefix'=>'village/','middleware' => ['auth']],function() {
    Route::get('/', 'VillageController@index')->name('village');
});

Route::group(['prefix'=>'ward/','middleware' => ['auth']],function() {
    Route::get('/', 'WardController@index');
});
Route::group(['prefix'=>'test/','middleware' => ['auth']],function() {
    Route::get('/', 'TestController@index');
});

Route::group(['prefix'=>'user/','middleware' => ['auth']],function() {
    Route::get('/', 'UserController@index');
    Route::post('/update_role/{id}', 'UserController@update_role');
});

Route::group(['prefix'=>'category/','middleware' => ['auth']],function() {
        Route::get('/', 'CategoryController@index')->name('category');
        Route::get('/{id}', 'CategoryController@edit');
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('route:clear');
   Artisan::call('clear-compiled');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   
   return "Cleared!";

});
Route::get('/updateDB', 'UpdateDataController@updateDB');