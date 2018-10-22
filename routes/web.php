<?php

Auth::routes();
Route::get('user/activation/{token}', 'Auth\RegisterController@userActivation');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get("/", 'HomeController@index')->name('home');
Route::post('subscribe', 'HomeController@subscribe')->name('subscribe');
Route::post('contact', 'HomeController@contact')->name('contact');


// Start Admin Panel
Route::get('admin/login','Admin\SessionsController@getLogin')->name('admin.login');
Route::post('admin/login', 'Admin\SessionsController@postLogin');

Route::group(['middleware'=>'admin','prefix'=>'admin','namespace'=>'Admin',], function(){ 
    // dashborad 
    Route::get('/', 'DashboardController@index')->name('admin-dashboard');
    // logout
    Route::get('logout','SessionsController@getLogout')->name('admin.logout');
    // change - profile
    Route::get('change-profile', 'SessionsController@getProfile')->name('change-profile');
    Route::post('change-profile', 'SessionsController@postProfile')->name('admin.change_profile');
    // change - password
    Route::get('change-password', 'SessionsController@getChangePassword')->name('get-change-pass');
    Route::post('change-password', 'SessionsController@postChangePassword')->name('change-pass');
    // user save-update-delete
    Route::resource('users','UsersController');
    // Employee
    Route::resource('employees','EmployeesController');
    Route::resource('user.qualifications','UserQualificationsController');
    // user experience save-update-delete
    Route::resource('user.experiences','UserExperiencesController');
    // user reference save-update-delete
    Route::resource('user.references','UserReferencesController');
    // set user status( active/deactive )
    Route::get('switchstatus/{id}', 'UsersController@SwitchStatus')->name('users.switch');
    // departments
    Route::resource('departments','DepartmentController');
    // extras
    Route::resource('extra','ExtrasController');
    // Questions
    Route::resource('questions','QuestionsController');
    //site settings
    Route::get('site-settings', 'DashboardController@site_settings')->name('site-settings-get');
    Route::post('site-settings', 'DashboardController@post_site_settings')->name('site-settings');
    //take test
    Route::get('start-test', 'UsersController@test')->name('start-test');
    Route::post('submit-test', 'UsersController@submit')->name('submit-test');
    //generate ids
    Route::get('generate', 'DashboardController@generate')->name('generate');
    Route::post('generate', 'DashboardController@post_generate')->name('post.generate');
    // dashborad 
    Route::get('user-profile/{id}', 'UsersController@profile')->name('users.profile');
    // thank you
    Route::get('thankyou', 'UsersController@thankyou')->name('thankyou');
});
// End Admin Panel