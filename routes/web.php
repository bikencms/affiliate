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

Route::get('/order', 'OrderController@index')->name('order');
Route::post('/order/active', 'OrderController@active');
Route::post('/order/delete/{id}', 'OrderController@delete');

Route::get('/user', 'UserController@index')->name('user-manager');

Route::get('/affiliate', 'AffiliateController@index')->name('affiliate');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->middleware('auth');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->middleware('auth');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->middleware('auth');
