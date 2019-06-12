<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sitebold_lead','UploadFileCSVController@sitebold_lead');

Route::get('/month_report/{month}','ReportController@month_report');
Route::get('/month_report_master/{month}','ReportController@month_report_master');
Route::get('/reportByDate','ReportController@reportByDate');
Route::get('/reportByDateWard','ReportController@reportByDateWard');



Route::post('/village','VillageController@api_store');
Route::get('/village','VillageController@api_get');
Route::post('/village/delete','VillageController@api_delete');
Route::get('/village/{id}','VillageController@api_show');

Route::post('/ward','WardController@api_store');
Route::get('/ward','WardController@api_get');
Route::post('/ward/delete','WardController@api_delete');
Route::get('/ward/{id}','WardController@api_show');


Route::get('/category_store','CategoryController@api_store');
Route::get('/category','CategoryController@api_get');
Route::post('/category/delete','CategoryController@api_delete');
Route::get('/category/{id}','CategoryController@api_show');



Route::post('/food_safety','FoodSafetyController@api_store');
Route::get('/food_safety','FoodSafetyController@api_get');
Route::post('/food_safety/delete','FoodSafetyController@api_delete');
Route::get('/food_safety/{id}','FoodSafetyController@api_show');

Route::get('/template_email/{id}', 'TemplateController@get_template_email');
Route::get('/template_email', 'TemplateController@get_list_template_email');

Route::post('/contract/them1lienhe','ContractController@them1lienhe');
Route::get('/contract/xoa1lienhe/{id}','ContractController@xoa1lienhe');
Route::post('/contract/them1company','ContractController@them1company');
Route::post('/contract/update/{id}','ContractController@contractUpdate');
Route::post('/contract/createbycontact','ContractController@createbycontact');

Route::post('/company/them1lienhe','CompanyController@them1lienhe');
Route::get('/company/xoa1lienhe/{id}','CompanyController@xoa1lienhe');


Route::post('/contact/them1company','ContactController@them1company');
Route::post('/contact/them1hopdong','ContactController@them1hopdong');


Route::get('/kpi', 'KpiController@index');
Route::post('/kpi_addType','Api\KpiController@kpi_addType');
Route::post('/kpi_addCategory','Api\KpiController@kpi_addCategory');
Route::post('/kpitype_loadCategories','Api\KpiController@kpitype_loadCategories');
Route::post('/category_get_kpi','Api\KpiController@category_get_kpi');


Route::get('/company', 'CompanyController@apiCompany');
Route::get('/company/delete/{id}', 'CompanyController@apiDelete');
Route::post('/company', 'CompanyController@apiStore');
Route::put('/company/{id}', 'CompanyController@apiUpdate');

Route::get('/document', 'DocumentController@apiDocument');

Route::get('/work', 'WorkController@ApiWork');
Route::get('/work/{id}', 'WorkController@ApiWork');
Route::get('/approve/{id}', 'WorkController@ApiApprove');
Route::get('/type/{id}', 'WorkController@ApiKPIbyType');
Route::get('/task', 'TaskController@ApiTask');
Route::get('/task/{id}', 'TaskController@ApiTask');
Route::get('/project', 'ProjectController@ApiProject');
Route::get('/science', 'ScienceController@apiScience');
Route::get('/acceptance', 'AcceptanceController@apiAcceptance');
Route::get('/acceptance/{id}', 'AcceptanceController@apiAcceptanceRow');

Route::get('/campaign', 'CampaignController@apiCampaign');

Route::resource('/project','ProjectController');
Route::resource('/campaign','CampaignController');
Route::resource('/projectStage','ProjectStageController');
Route::resource('/work','WorkController');



Route::get('/getKM/{project_id}','WorkController@getKM');

Route::post('/updateStage','ProjectStageController@updateStage');
Route::post('/addUserProject','ProjectController@addUserProject');

Route::get('/lead', 'LeadController@apiRead');

Route::get('/sales/{app_id}/contacts', 'ReportsController@getReportSales');
Route::get('/sales/{app_id}/total', 'ReportsController@getReportSalesTotal');
Route::get('/sales/{app_id}/activity', 'ReportsController@getReportActivity');

Route::group(['namespace' => 'Api'], function() {
    Route::resource('user', 'UserController',[
        'only' => [
            'index',
        ]
    ]);

    Route::resource('contact', 'ContactController');
    Route::post('contact/delete', 'ContactController@destroy');



    // Route::resource('company', 'CompanyController');

    Route::get('lead/search', 'LeadController@search');
    Route::resource('lead', 'LeadController',[
        'except' => [
            'create',
            'destroy',
        ]
    ]);
    Route::post('lead/delete', 'LeadController@destroy');
    


    Route::resource('kpi', 'KpiController',[
        'except' => [
            'create',
        ]
    ]);

    Route::resource('account', 'AccountController',[
        'except' => [
            'create',
            'destroy',
        ]
    ]);
    Route::post('account/delete', 'AccountController@destroy');

    Route::post('contract', 'ContractController@store');
    Route::resource('contract', 'ContractController');

    Route::resource('campaign', 'CampaignController',[
        'except' => [
            'create',
            'destroy',
        ]
    ]);
    Route::post('campaign/delete', 'CampaignController@destroy');
    
    Route::get('/type', 'TypeController@index');

    Route::group(['prefix' => 'statistic'], function() {
        Route::get('/project', 'StatisticController@projects');
        Route::get('/project/{id}', 'StatisticController@showProject');
        Route::get('/user', 'StatisticController@users');
        Route::get('/user/{id}', 'StatisticController@showUser');
        Route::get('/project/{project}/user/{user}', 'StatisticController@projectUser');
    });
    
});

