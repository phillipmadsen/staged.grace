<?php


Route::group(['prefix' => LaravelLocalization::getCurrentLocale()], function ()
{
        Route::group([
        'prefix'     => 'admin',

        'middleware' => ['before', 'sentinel.auth', 'sentinel.permission']
    ], function ()
    {
        Route::get('upload', 'Admin\UploadController@index');
        Route::post('upload/file', 'Admin\UploadController@uploadFile');
        Route::delete('upload/file', 'Admin\UploadController@deleteFile');
        Route::post('upload/folder', 'Admin\UploadController@createFolder');
        Route::delete('upload/folder', 'Admin\UploadController@deleteFolder');
    });
});

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

// Route::get('{view}', function ($view) {
//     try {
//       return view('static.'.$view);
//     } catch (\Exception $e) {
//       abort(404);
//     }
//   })->where('view', '.*');

// Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {
//     Route::post('model/upload_image', '\Stillpoint\Http\Controllers\Admin\ImagesController@store');
//     Route::post('model/get_images', '\Stillpoint\Http\Controllers\Admin\ImagesController@index');
//     Route::post('model/upload_attachment', 'Admin\AttachmentsController@store');
//     Route::get('/', function(){
//         return redirect()->to('admin/news');
// });
// });
