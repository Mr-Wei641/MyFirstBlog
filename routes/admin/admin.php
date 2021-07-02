<?php

Route::group(['prefix'=>'admin'],function(){
    Route::get('login','LoginController@index')->name('admin.login');
    Route::post('login','LoginController@login')->name('admin.login');
});