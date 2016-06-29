<?php


Route::get('admin/upload', 'Admin\UploadController@index');
Route::post('admin/upload/file', 'Admin\UploadController@uploadFile');
Route::delete('admin/upload/file', 'Admin\UploadController@deleteFile');
Route::post('admin/upload/folder', 'Admin\UploadController@createFolder');
Route::delete('admin/upload/folder', 'Admin\UploadController@deleteFolder');


Route::group(['prefix' => LaravelLocalization::getCurrentLocale()], function ()
{
    Route::group([
        'prefix'     => 'admin',

        'middleware' => ['before', 'sentinel.auth', 'sentinel.permission']
    ], function ()
    {

        Route::resource('products', 'ProductController', ['before' => 'hasAccess:products', 'except' => [  'show' ]]);
        Route::get('products/{id}/delete', [
            'as'   => 'admin.products.delete',
            'uses' => 'ProductController@confirmDestroy'
        ])->where('id', '\d+');

    });
});
