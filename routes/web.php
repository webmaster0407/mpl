<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController as adminHomeController;

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


/*
|--------------------------------------------------------------------------
| begin::multi-language 
|--------------------------------------------------------------------------
*/
Route::get('language/en', function () {
    app()->setLocale('en');
    session()->put('locale', 'en');
    return redirect()->back();
})->name('en');

Route::get('language/zh-cn', function () {
    app()->setLocale('zh-cn');
    session()->put('locale', 'zh-cn');
    return redirect()->back();
})->name('zh-cn');

Route::get('language/zh-hk', function () {
    app()->setLocale('zh-hk');
    session()->put('locale', 'zh-hk');
    return redirect()->back();
})->name('zh-hk');
/*
|--------------------------------------------------------------------------
|  end::multi-language 
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| begin::front panel 
|--------------------------------------------------------------------------
*/
// begin::HomeController routes
Route::get('/',     ['as' => 'base_url',    'uses' => 'App\Http\Controllers\HomeController@index']);
Route::get('login', ['as' => 'login',    'uses' => 'App\Http\Controllers\HomeController@login']);
Route::post('doLogin', ['as' => 'doLogin',    'uses' => 'App\Http\Controllers\HomeController@doLogin']);
Route::get('register', ['as' => 'register',    'uses' => 'App\Http\Controllers\HomeController@register']);
Route::get('clientRegister', ['as' => 'clientRegister',    'uses' => 'App\Http\Controllers\HomeController@clientRegister']);
Route::get('talentRegister', ['as' => 'talentRegister',    'uses' => 'App\Http\Controllers\HomeController@talentRegister']);
Route::post('doRegister', ['as' => 'doRegister',    'uses' => 'App\Http\Controllers\HomeController@doRegister']);
Route::get('changePassword', ['as' => 'changePassword',    'uses' => 'App\Http\Controllers\HomeController@changePassword']);
Route::post('doChangePassword', ['as' => 'doChangePassword',    'uses' => 'App\Http\Controllers\HomeController@doChangePassword']);
Route::post('uploadPhotosBeforeRegister', ['as' => 'uploadPhotosBeforeRegister',    'uses' => 'App\Http\Controllers\HomeController@uploadPhotosBeforeRegister']);
Route::post('deletePhotosBeforeRegister', ['as' => 'deletePhotosBeforeRegister',    'uses' => 'App\Http\Controllers\HomeController@deletePhotosBeforeRegister']);
Route::get('logout', ['as' => 'logout',    'uses' => 'App\Http\Controllers\HomeController@logout']);
// end::HomeController Routes

// begin::TalentController Routes 
Route::get('findTalents', ['as' => 'viewFindTalent',    'uses' => 'App\Http\Controllers\TalentController@viewFindTalent']);
Route::get('searchTalents', ['as' => 'searchTalents',    'uses' => 'App\Http\Controllers\TalentController@searchTalents']);
Route::get('listTalentsByCategory', ['as' => 'listTalentsByCategory',    'uses' => 'App\Http\Controllers\TalentController@listTalentsByCategory']);
Route::get('viewTalentDetail', ['as' => 'viewTalentDetail', 'uses' => 'App\Http\Controllers\TalentController@viewTalentDetail']);
// end::TalentController Routes

// begin::ProfileController Routes 
Route::get('profile', ['as' => 'profile',    'uses' => 'App\Http\Controllers\ProfileController@viewProfile']);
Route::get('editprofile', ['as' => 'editTalentprofile',    'uses' => 'App\Http\Controllers\ProfileController@editTalentprofile']);
Route::post('editProfile', ['as' => 'editProfile',    'uses' => 'App\Http\Controllers\ProfileController@editProfile']);
Route::post('uploadPhotos', ['as' => 'uploadPhotos',    'uses' => 'App\Http\Controllers\ProfileController@uploadPhotos']);
Route::post('deletePhotos', ['as' => 'deletePhotos',    'uses' => 'App\Http\Controllers\ProfileController@deletePhotos']);
Route::post('deletePhotoUploadedJustByDropzone', ['as' => 'deletePhotoUploadedJustByDropzone',    'uses' => 'App\Http\Controllers\ProfileController@deletePhotoUploadedJustByDropzone']);
// end::ProfileController Routes deletePhotoUploadedJustByDropzone

// test controller
// Route::get('test', ['as' => 'test',    'uses' => 'App\Http\Controllers\TestController@index']);


/*
|--------------------------------------------------------------------------
| end::front panel ( cms page route is in last )
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| begin::admin panel  
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {

    // begin::routes of HomeController
    Route::get('/', function () {
        return redirect('/admin/login');
    });
    Route::get('home',      ['as' => 'admin.home',      'uses' => 'App\Http\Controllers\admin\HomeController@index']);
    Route::get('login',     ['as' => 'admin.login',     'uses' => 'App\Http\Controllers\admin\HomeController@login']);
    Route::post('do_login', ['as' => 'admin.doLogin',   'uses' => 'App\Http\Controllers\admin\HomeController@doLogin']);
    Route::get('logout',    ['as' => 'admin.logout',    'uses' => 'App\Http\Controllers\admin\HomeController@logout']);
    Route::get('changePassword', ['as' => 'admin.changePassword', 'uses' => 'App\Http\Controllers\admin\HomeController@changePassword']);
    Route::post('doChangePassword', ['as' => 'admin.doChangePassword', 'uses' => 'App\Http\Controllers\admin\HomeController@doChangePassword']);
    Route::get('updateProfile', ['as' => 'admin.updateProfile', 'uses' => 'App\Http\Controllers\admin\HomeController@updateProfile']);
    Route::post('doUpdateProfile', ['as' => 'admin.doUpdateProfile', 'uses' => 'App\Http\Controllers\admin\HomeController@doUpdateProfile']);
    // end::routes of HomeController

    // begin::routes of CmsController
    Route::group(['prefix' => 'cms'], function() {
        Route::get('/', ['as' => 'admin.cms.index', 'uses' => 'App\Http\Controllers\admin\CmsController@index']);
        Route::get('getCmsData', ['as' => 'admin.cms.getCmsData', 'uses' => 'App\Http\Controllers\admin\CmsController@getCmsData']);
        Route::post('updateIsActiveState', ['as' => 'admin.cms.updateIsActiveState', 'uses' => 'App\Http\Controllers\admin\CmsController@updateIsActiveState']);
        Route::post('updateIsMenuState', ['as' => 'admin.cms.updateIsMenuState', 'uses' => 'App\Http\Controllers\admin\CmsController@updateIsMenuState']);
        Route::post('updateIsHeaderState', ['as' => 'admin.cms.updateIsHeaderState', 'uses' => 'App\Http\Controllers\admin\CmsController@updateIsHeaderState']);
        Route::post('updateIsFooterState', ['as' => 'admin.cms.updateIsFooterState', 'uses' => 'App\Http\Controllers\admin\CmsController@updateIsFooterState']);
        Route::post('updateCmsPage', ['as' => 'admin.cms.updateCmsPage', 'uses' => 'App\Http\Controllers\admin\CmsController@updateCmsPage']);
        Route::post('deleteCmsPage', ['as' => 'admin.cms.deleteCmsPage', 'uses' => 'App\Http\Controllers\admin\CmsController@deleteCmsPage']);
        Route::post('addNewCmsPage', ['as' => 'admin.cms.addNewCmsPage', 'uses' => 'App\Http\Controllers\admin\CmsController@addNewCmsPage']);
        Route::get('getCmsDetail', ['as' => 'admin.cms.getCmsDetail', 'uses' => 'App\Http\Controllers\admin\CmsController@getCmsDetail']);
    });
    // end::routes of CmsController

    // begin::routes of page management
    Route::group(['prefix' => 'pages'], function() {
        // homepage management
        Route::get('homepage', ['as' => 'admin.pages.homepage', 'uses' => 'App\Http\Controllers\admin\HomePageController@index']);
        Route::post('homepage/getSectionData', ['as' => 'admin.pages.homepage.getSectionData', 'uses' => 'App\Http\Controllers\admin\HomePageController@getSectionDataByLocale']);
        Route::post('homepage/update', ['as' => 'admin.pages.homepage.update', 'uses' => 'App\Http\Controllers\admin\HomePageController@sectionUpdate']);
        
        // Findtalent page management
        Route::get('findtalent', ['as' => 'admin.pages.findtalent', 'uses' => 'App\Http\Controllers\admin\FindTalentPageController@index']);
        Route::post('uploadftPhotos', ['as' => 'admin.pages.uploadftphotos', 'uses' => 'App\Http\Controllers\admin\FindTalentPageController@uploadftPhotos']);
        Route::get('getUploadedftPhotos', ['as' => 'admin.pages.getUploadedftPhotos', 'uses' => 'App\Http\Controllers\admin\FindTalentPageController@getUploadedftPhotos']);
        Route::post('deleteftPhoto', ['as' => 'admin.pages.deleteftPhoto', 'uses' => 'App\Http\Controllers\admin\FindTalentPageController@deleteftPhoto']);
        Route::post('selectftPhoto', ['as' => 'admin.pages.selectftPhoto', 'uses' => 'App\Http\Controllers\admin\FindTalentPageController@selectftPhoto']);
    });
    // end::routes of page management

    // begin::routes of user management
    Route::group(['prefix' => 'users'], function() {
        // begin::talents management
        Route::get('talents', ['as' => 'admin.users.talents', 'uses' => 'App\Http\Controllers\admin\TalentController@index']);
        Route::get('getTalentsData', ['as' => 'admin.users.getTalentsData', 'uses' => 'App\Http\Controllers\admin\TalentController@getTalentsData']);
        Route::get('getTalentDetail', ['as' => 'admin.users.getTalentDetail', 'uses' => 'App\Http\Controllers\admin\TalentController@getTalentDetail']);
        Route::post('updateTalent', ['as' => 'admin.users.updateTalent', 'uses' => 'App\Http\Controllers\admin\TalentController@updateTalent']);
        Route::post('updateTalentState', ['as' => 'admin.users.updateTalentState', 'uses' => 'App\Http\Controllers\admin\TalentController@updateTalentState']);
        Route::post('deleteTalent', ['as' => 'admin.users.deleteTalent', 'uses' => 'App\Http\Controllers\admin\TalentController@deleteTalent']);
        Route::post('photoPermissionStateChange', ['as' => 'admin.users.photoPermissionStateChange', 'uses' => 'App\Http\Controllers\admin\TalentController@photoPermissionStateChange']);
        Route::post('deleteTalentPhoto', ['as' => 'admin.users.deleteTalentPhoto', 'uses' => 'App\Http\Controllers\admin\TalentController@deleteTalentPhoto']);
        // end::talents management

        // begin::clients management
        Route::get('clients', ['as' => 'admin.users.clients', 'uses' => 'App\Http\Controllers\admin\ClientController@index']);
        Route::get('getClientsData', ['as' => 'admin.users.getClientsData', 'uses' => 'App\Http\Controllers\admin\ClientController@getClientsData']);
        Route::get('getClientDetail', ['as' => 'admin.users.getClientDetail', 'uses' => 'App\Http\Controllers\admin\ClientController@getClientDetail']);
        Route::post('updateClient', ['as' => 'admin.users.updateClient', 'uses' => 'App\Http\Controllers\admin\ClientController@updateClient']);
        Route::post('updateClientState', ['as' => 'admin.users.updateClientState', 'uses' => 'App\Http\Controllers\admin\ClientController@updateClientState']);
        Route::post('deleteClient', ['as' => 'admin.users.deleteClient', 'uses' => 'App\Http\Controllers\admin\ClientController@deleteClient']);
        // end::talents management
    });
    // end::routes of user management

    // begin::routes of category management
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', ['as' => 'admin.categories', 'uses' => 'App\Http\Controllers\admin\CategoryController@index']);
        Route::get('getCategoriesData', ['as' => 'admin.categories.getCategoriesData', 'uses' => 'App\Http\Controllers\admin\CategoryController@getCategoriesData']);
        Route::post('getCategoryDetail', ['as' => 'admin.categories.getCategoryDetail', 'uses' => 'App\Http\Controllers\admin\CategoryController@getCategoryDetail']);
        Route::post('addCategory', ['as' => 'admin.categories.addCategory', 'uses' => 'App\Http\Controllers\admin\CategoryController@addCategory']);
        Route::post('updateCategory', ['as' => 'admin.categories.updateCategory', 'uses' => 'App\Http\Controllers\admin\CategoryController@updateCategory']); 
        Route::post('updatePermissionState', ['as' => 'admin.categories.updatePermissionState', 'uses' => 'App\Http\Controllers\admin\CategoryController@updatePermissionState']); 
        Route::post('deleteCategory', ['as' => 'admin.categories.deleteCategory', 'uses' => 'App\Http\Controllers\admin\CategoryController@deleteCategory']);
    });
    // end::routes of category management
});
/*
|--------------------------------------------------------------------------
| end::admin panel
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| begin::initial setup 
|--------------------------------------------------------------------------
*/
Route::get('/initsetup', function () {
    if (!Schema::hasTable('users')) {
        $output = [];
        // \Artisan::call('key:generate', $output);
        // \Artisan::call('config:clear', $output);
        \Artisan::call('migrate', $output);
        \Artisan::call('db:seed', $output);
        dd($output);
    }
});
Route::get('/clear-cache', function () {
    $output = [];
    \Artisan::call('cache:clear', $output);
    dd($output);
});
/*
|--------------------------------------------------------------------------
| end::initial setup
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| begin::cms pages
|--------------------------------------------------------------------------
*/
Route::get('/{slug}', 'App\Http\Controllers\CmsPageController@displayCmsPages');
/*
|--------------------------------------------------------------------------
| end::cms pages
|--------------------------------------------------------------------------
*/