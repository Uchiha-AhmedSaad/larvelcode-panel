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

Route::get('/adminpanel'                            , 'admincpcontroller@index')->name('mainpage');

//Users
Route::get('adminpanel/users'                       , 'userscontroller@index'  )->name('allusers');
Route::get('adminpanel/create_registration'         , 'userscontroller@create' )->name('create_registration');
Route::post('/adminpanel/store_registration'        , 'userscontroller@store'  )->name('store_registration');
Route::get('adminpanel/edit_user/{slug}'            , 'userscontroller@edit'   )->name('edit_user');
Route::patch('adminpanel/update_userinfo/{slug}'    , 'userscontroller@update' )->name('update_userinfo');
Route::post('adminpanel/delete_users'               , 'userscontroller@destory')->name('delete_user');
Route::post('adminpanel/delete_all_users'               , 'userscontroller@destoryall')->name('delete_all_users');
Route::post('adminpanel/users/select_user_picture'  ,'userscontroller@select_picutre')->name('select_user_picture');
Route::post('adminpanel/users/delete_user_picture'  ,'userscontroller@delete_picture')->name('delete_user_picture');
