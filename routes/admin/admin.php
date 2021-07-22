<?php

Route::group(['prefix'=>'admin'],function(){
    Route::get('login','LoginController@index')->name('admin.login');
    Route::post('login','LoginController@login')->name('admin.login');

    Route::get('index','IndexController@index')->name('admin.index');
    //用户管理
    Route::get('user/add','UserController@add')->name('admin.user.add');
    Route::post('user/insert','UserController@insert')->name('admin.user.insert');
    Route::get('user/list','UserController@list')->name('admin.user.list');
    Route::get('user/anyData','UserController@anyData')->name('admin.user.anyData');
    Route::get('user/delete/{id}','UserController@delete')->name('admin.user.delete');
    Route::get('user/edit/{id}','UserController@edit')->name('admin.user.edit');
    Route::put('user/update/{id}','UserController@update')->name('admin.user.update');
    //分类管理
    Route::get('cate/anyData','CateController@anyData')->name('admin.cate.anyData');
    Route::resource('cate','CateController');
    //标签管理
    Route::get('tag/anyData','TagController@anyData')->name('admin.tag.anyData');
    Route::resource('tag','TagController');
    //文章管理
    Route::get('post/anyData','PostController@anyData')->name('admin.post.anyData');
    Route::resource('post','PostController');
}); 