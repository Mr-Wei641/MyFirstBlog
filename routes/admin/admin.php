<?php

Route::group(['prefix'=>'admin'],function(){
    Route::get('login','LoginController@index')->name('admin.login');
    Route::post('login','LoginController@login')->name('admin.login');

    Route::get('index','IndexController@index')->name('admin.index');

    Route::get('user/add','UserController@add')->name('admin.user.add');
    Route::post('user/insert','UserController@insert')->name('admin.user.insert');
    Route::get('user/list','UserController@list')->name('admin.user.list');
});