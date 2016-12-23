<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





Route::group(['middleware'=>['web']],function(){
});



Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\_\-]+');

Route::get('contact','PagesController@getContact');
Route::get('about','PagesController@getAbout');
Route::get('/','PagesController@getIndex');
Route::get('/admin','PagesController@getAdmin');

Route::resource('posts','PostController');

Route::get('posts/show/image/{filename}',['as'=>'image.show','uses'=>'ImageController@show']);
Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImageController@getForm'));
Route::get('/preview/{id}', array('as' => 'adjustImages','uses' => 'ImageController@getPreview'));
Route::get('/getimage/{img}', array('as' => 'getImages','uses' => 'ImageController@getImage'));
Route::post('/totalpreview/{id}', array('as' => 'totalPreview','uses' => 'ImageController@totalPreview'));
Route::get('/deleteimage/{id}', array('as' => 'image.delete','uses' => 'ImageController@deleteImage'));
Route::get('/previewoverview/{type}', array('as' => 'post.preview','uses' => 'BlogController@showpreview'));
Route::get('/previewoverview/{type}', array('as' => 'post.preview','uses' => 'BlogController@showpreview'));

Route::get('/previewoverview/single/{id}',array('as' => 'image.singlepreview','uses' =>'ImageController@showSingleImage'));

Route::post('posts/show/image/upload/{id}',['as'=>'image.upload','uses'=>'ImageController@upload']);

Route::auth();

Route::get('/home', 'HomeController@index');
