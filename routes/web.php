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


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
});
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('like/{pid}/{uid}', 'actioncontroller@like');
Route::get('unlike/{pid}/{uid}', 'actioncontroller@unlike');



Route::group(
    ['middleware' => ['admin']],
    function () {
        Route::get('admin/routes', 'HomeController@admin');
        Route::get('admin/routes/makepost', array('as' => 'makepost', 'uses' =>  'PostController@make_post'));
        Route::get('admin/routes/viewpost', 'PostController@view_post')->name('viewpost');
        Route::post('admin/routes/savepost', 'PostController@store_post');
        Route::get('admin/routes/publishpost/{id}', 'PostController@publish_post');
        Route::get('admin/routes/unpublishpost/{id}', 'PostController@unpublish_post');
        Route::get('admin/routes/deletepost/{id}/{img}', 'PostController@delete_post');
        Route::get('admin/routes/editpost/{id}/{description}', 'PostController@edit_post');
        Route::get('admin/routes/add_details/{id}/{details}', 'PostController@add_details');

      
    }
);
Route::get('auth/admin/logout/{name_slug}', array('as' => 'Logout', 'uses' => 'SystemAuthController@authLogout'));
