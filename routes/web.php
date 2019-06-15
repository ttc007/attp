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
Route::get('/view_ward_ss/{id}','HomeController@view_ward_ss');



Route::group(['prefix'=>'food_safety/','middleware' => ['auth']],function() {
    Route::post('/store', 'FoodSafetyController@store')->name('food_safety.store');
    Route::get('/upfile_csv', 'FoodSafetyController@upfile_csv');
    // Route::get('/{category}', 'FoodSafetyController@getByCate');
    Route::post('/upfile_csv', 'FoodSafetyController@upfile_csv_store');
});

Route::get('/food_safety/report', 'FoodSafetyController@report');
Route::get('/food_safety/reportMaster', 'FoodSafetyController@reportMaster');
Route::get('/food_safety/reportUnexpected', 'FoodSafetyController@reportUnexpected');
Route::get('/food_safety/reportUnexpectedWard', 'FoodSafetyController@reportUnexpectedWard');

Route::get('/food_safety/reportTest', 'FoodSafetyController@reportTest');
Route::get('/food_safety/reportTestMaster', 'FoodSafetyController@reportTestMaster');

Route::get('/post', 'PostController@index');
Route::post('/post/store', 'PostController@store');
Route::get('/communication', 'PostController@communication');
Route::get('/lawSystem', 'PostController@lawSystem');

Route::get('/food_safety/{category}', 'FoodSafetyController@getByCate');

Route::get('/updateDataWard', 'FoodSafetyController@updateDataWard');

Route::group(['prefix'=>'village/','middleware' => ['auth']],function() {
    Route::get('/', 'VillageController@index')->name('village');
});

Route::group(['prefix'=>'ward/','middleware' => ['auth']],function() {
    Route::get('/', 'WardController@index');
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






Route::post('/upload_file_lead', 'UploadFileCSVController@upload_lead')->name('upload_file_lead');

Route::post('/send_mail_contact', 'MailController@send_mail_contact')->name('send_mail_contact');


Route::get('/init', 'AppController@init_app');
Route::get('/initialization', 'AppController@initialization');
Route::get('/app_register/{app_id}', 'AppController@app_register');
Route::get('/app_manager/{app_id}', 'AppController@app_manager');
Route::post('/app_store_user', 'AppController@app_store_user')->name('app.store.user');

Route::get('/workplace/document/detail/{file}', 'ScienceController@detail');
Route::get('/marketing/document/detail/{file}', 'ScienceController@detail');

Route::get('/access', 'AppController@app_access');
Route::get('/dashboard', 'AppController@reports_dashboard');








Route::group(['prefix'=>'workplace/','middleware' => 'set_app'],function() {
    
    Route::get('/', 'AppController@workplace')->name('workplace');

    Route::group(['prefix'=>'kpi/','middleware' => ['auth', 'manager']],function() {
        Route::get('/', 'KPIController@index')->name('kpi');
        Route::get('/add', 'KPIController@create')->name('kpi.add');
        Route::post('/store', 'KPIController@Store');
        Route::get('/{id}/edit', 'KPIController@edit');
    });

    Route::group(['prefix'=>'template/','middleware' => ['auth']], function() {
        Route::get('/', 'TemplateController@index');
        Route::get('/add', 'TemplateController@create');
        Route::post('/store', 'TemplateController@store')->name('template_email.store');
        Route::get('/edit/{id}', 'TemplateController@edit');
        Route::post('/update', 'TemplateController@update')->name('template_email.update');
    });

    Route::group(['prefix'=>'work/','middleware' => ['auth']],function() {
        Route::get('/', 'WorkController@View')->name('work');
        Route::get('/mywork', 'WorkController@View')->name('mywork');
        Route::get('/report/{type}', 'WorkController@Report')->name('worktype');
        Route::post('/store', 'WorkController@Storeweb')->name('storeWork');
        Route::post('/storeKT', 'WorkController@StorewebKT')->name('storeWorkKT');
        Route::get('/{id}/edit', 'WorkController@edit');
        Route::put('/{id}', 'WorkController@Updateweb')->name('work.update');

        Route::get('/report', 'WorkController@selectType')->name('report');

        Route::get('/{id}/review', 'WorkController@review');
    });

    Route::group(['prefix'=>'task/','middleware' => ['auth']],function(){
    	Route::get('/', 'TaskController@View')->name('task');
        Route::get('/mytask', 'TaskController@View');
        Route::get('/add', 'TaskController@Form')->middleware('auth');
        Route::post('/store', 'TaskController@Store');
    });


    Route::group(['prefix'=>'project/','middleware' => ['auth']],function(){
        Route::get('/', 'ProjectController@View')->name('project');
        Route::get('/add', 'ProjectController@form')->middleware('manager')->name('project.add');
        Route::post('/store', 'ProjectController@store');
        Route::get('/{id}', 'ProjectController@show');
        Route::get('/detail/{id}', 'ProjectController@detail');

    });

    Route::group(['prefix'=>'contact/','middleware' => ['auth']],function(){
        Route::get('/', 'ContactController@View')->name('contact');
        Route::get('/add', 'ContactController@add')->middleware('manager')->name('contact.add');
        Route::post('/store', 'ContactController@store');
        Route::get('/{id}', 'ContactController@show');
        Route::get('/detail/{id}', 'ContactController@detail');

    });


    Route::group(['prefix'=>'document/','middleware' => ['auth']],function() {
        Route::get('/', 'ScienceController@View')->name('science.index')->name('science');
        Route::get('/add', 'ScienceController@add')->name('science.add');
        Route::post('/store', 'ScienceController@store')->name('science.store');
        Route::get('/delete/{file}', 'ScienceController@delete');
    });


    Route::group(['prefix' => 'statistic'], function() {
        Route::get('/', 'StatisticController@index')->name('statistic.index');
        Route::get('project', 'StatisticController@projects')->name('statistic.project.index');
        Route::get('project/{id}', 'StatisticController@showProject')->name('statistic.project.show');
        Route::get('user', 'StatisticController@users')->name('statistic.user.index');
        Route::get('user/{id}', 'StatisticController@showUser')->name('statistic.user.show');
        Route::get('project/{project}/user/{user}', 'StatisticController@projectUser')->name('statistic.project.user');
    });

});

Route::group(['prefix'=>'sales/','middleware' => 'set_app'] ,function() {

    Route::get('/', 'AppController@sales')->name('sales');

    Route::resource('contract', 'ContractController', [
    'only' => [
        'index', 
        'edit',    ]
    ])->middleware('auth');

    Route::get('/contract/{id}/show', 'ContractController@show');

    Route::resource('contract', 'ContractController', [
        'only' => [
            'create', 
        ]
    ])->middleware(['auth', 'manager']);


    Route::group(['prefix'=>'acceptance/','middleware' => ['auth', 'manager']],function() {
        Route::get('/', 'AcceptanceController@index')->name('acceptance');
        Route::get('/add', 'AcceptanceController@add');
        Route::post('/store', 'AcceptanceController@store')->name('acceptance.store');
        Route::get('/view/{id}', 'AcceptanceController@view');
    });


     Route::resource('account', 'AccountController', [
    'only' => [
        'index', 
        'edit',    ]
    ])->middleware('auth');


    Route::resource('account', 'AccountController', [
        'only' => [
            'create', 
            'edit', 
        ]
    ])->middleware(['auth', 'manager']);


    Route::group(['prefix'=>'lead/','middleware' => ['auth']],function(){
        Route::get('/', 'LeadController@index');
        Route::get('/create', 'LeadController@create');
        Route::get('/upload_file_view', 'LeadController@upload_file_view');
        Route::get('/{id}/edit', 'LeadController@edit');
        Route::post('lead_update_note', 'LeadController@lead_update_note')->name('lead_update_note');
    });

     Route::resource('lead', 'LeadController', [
        'only' => [
            'create', 
            'store',
        ]
    ])->middleware(['auth', 'manager']);

    Route::group(['prefix'=>'contact/','middleware' => ['auth']],function(){
        Route::get('/', 'ContactController@View')->name('contact');
        Route::get('/add', 'ContactController@add')->name('contact.add');
        Route::post('/store', 'ContactController@store');
        Route::get('/{id}', 'ContactController@show');
        Route::get('/detail/{id}', 'ContactController@detail')->name('contact.detail');

        Route::post('/store/task', 'ContactController@store_task')->name('contact.store_task');
    });

    Route::group(['prefix'=>'company/','middleware' => ['auth']],function(){
        Route::get('/', 'CompanyController@view')->name('company');
        Route::get('/add', 'CompanyController@add')->name('contact.add');
        Route::post('/store', 'CompanyController@store');
        Route::get('/{id}', 'CompanyController@show');
        Route::get('/detail/{id}', 'CompanyController@detail');

    });

    Route::group(['prefix'=>'task/','middleware' => ['auth']],function(){
        Route::get('/', 'TaskController@View')->name('sales.task');
        Route::get('/mytask', 'TaskController@View');
        Route::get('/add', 'TaskController@Form')->middleware('auth');
        Route::post('/store', 'TaskController@Store');
        Route::get('/board', 'TaskController@board');
    });

     Route::group(['prefix'=>'activity/','middleware' => ['auth']],function(){
        Route::get('/feed', 'AppController@activity')->name('sales.activity');
    });

    Route::group(['prefix'=>'calendar/','middleware' => ['auth']],function(){
        Route::get('/', 'AppController@calendar')->name('sales.calendar');
    });
    

});

Route::group(['prefix'=>'marketing/' , 'middleware' => 'set_app'], function() {
    
    Route::get('/', 'AppController@marketing')->name('marketing');    

    Route::group(['prefix'=>'campaign/','middleware' => ['auth']],function(){
        Route::get('/', 'CampaignController@view')->name('campaign');
        Route::get('/add', 'CampaignController@add')->name('campaign.add');
        Route::get('/{id}', 'CampaignController@show');
        Route::get('/{id}/edit', 'CampaignController@edit');
        Route::post('/storeWeb', 'CampaignController@storeWeb')->name('campaignWeb');
    });

    Route::group(['prefix'=>'document/','middleware' => ['auth']],function() {
        Route::get('/', 'ScienceController@View')->name('science.index')->name('science');
        Route::get('/add', 'ScienceController@add')->name('science.add');
        Route::post('/store', 'ScienceController@store')->name('science.store');
        
        Route::get('/delete/{file}', 'ScienceController@delete');
    });


    Route::group(['prefix'=>'template/','middleware' => ['auth']], function() {
        Route::get('/', 'TemplateController@index');
        Route::get('/add', 'TemplateController@create');
        Route::post('/store', 'TemplateController@store')->name('template_email.store');
        Route::get('/edit/{id}', 'TemplateController@edit');
        Route::post('/update', 'TemplateController@update')->name('template_email.update');
    });
});




Route::get('messenger', function () {
    return view('message.messenger');
});

Route::get('/projectEmployess/{id}','ProjectController@projectEmployess');




//Calling
Route::get('/call', 'VoiceController@call');
Route::get('/outbound/{salesPhone}', 'VoiceController@outbound');

