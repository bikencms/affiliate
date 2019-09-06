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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@home')->name('home-index');

Route::get('/package', 'PackageController@index')->name('package');
Route::get('/add-package', 'PackageController@addPackage')->name('add-package');
Route::get('/package_success', function () {
    if(Session::has('flash_order_message')) {
        return view('package_success');
    } else {
        return redirect('/');
    }
});

Route::get('/package/manager', 'PackageController@manager')->name('package-manager');
Route::post('/package/manager/create', 'PackageController@create')->name('package-create');
Route::post('/package/manager/delete', 'PackageController@delete')->name('package-delete');
Route::get('/package/manager/edit/{id}', 'PackageController@edit')->name('package-edit');
Route::post('/package/manager/update/{id}', 'PackageController@update')->name('package-update');

Route::get('/order', 'OrderController@index')->name('order');
Route::post('/order/active', 'OrderController@active');
Route::post('/order/delete/{id}', 'OrderController@delete');

Route::get('/user', 'UserController@index')->name('user-manager');
Route::get('/user/show-tree/{id}', 'UserController@showTree')->name('show-tree');

Route::get('/affiliate/{order_id}', 'AffiliateController@index')->name('affiliate');
Route::post('/affiliate-bonus', 'AffiliateController@bonus')->name('affiliate-bonus');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/show-tree', 'ProfileController@showTree')->name('profile-show-tree');
Route::get('/setting', 'ProfileController@setting')->name('setting');
Route::post('/setting', 'ProfileController@saveSetting')->name('setting');

Route::post('/user/delete/{id}', 'UserController@delete')->name('user-delete');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->middleware('auth');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->middleware('auth');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->middleware('auth');
