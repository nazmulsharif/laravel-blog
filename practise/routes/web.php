<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontEnd\PagesController@index')->name('index');
Route::get('/create', 'FrontEnd\PostController@create')->name('post.create');
Route::post('store','FrontEnd\PostController@store')->name('post.store');
Route::get('post/{id}','FrontEnd\PostController@view')->name('post.view');
Route::get('category/{id}/{name}','FrontEnd\CategoryController@category')->name('category');

/*
|--------------------------------------------------------------------------
	FrontEnd Pages
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontEnd\PagesController@index')->name('index');



/*
|----------------------------------------------------
|	Admin Routes
|----------------------------------------------------
*/
Route::group(['prefix'=>'ad'], function(){
	Route::get('/','Admin\PagesController@index')->name('admin.index');
	Route::get('/icons/create','Admin\PagesController@socialIconsCreate')->name('admin.icon.create');
	Route::post('/icons/store','Admin\PagesController@socialIconsStore')->name('admin.icon.store');
	Route::get('/icons/manage','Admin\PagesController@socialIcons')->name('admin.icon.manage');
	Route::post('/icons/update','Admin\PagesController@socialIconsUpdate')->name('admin.icon.update');
	Route::get('/icons/delete/{id}','Admin\PagesController@socialIconsDelete')->name('admin.icon.delete');
	Route::get('/headerBottom/manage','Admin\PagesController@headerManage')->name('admin.headerBottom.manage');
	Route::post('/headerBottom/update','Admin\PagesController@headerUpdate')->name('admin.headerBottom.update');
	
});

Route::group(['prefix'=>'cate'], function(){
	Route::get('/manage','Admin\CategoryController@index')->name('admin.category.manage');
	Route::get('/create','Admin\CategoryController@create')->name('admin.category.create');
	Route::post('/store','Admin\CategoryController@store')->name('admin.category.store');
	Route::post('/update','Admin\CategoryController@update')->name('admin.category.update');
	Route::get('/delete/{id}','Admin\CategoryController@delete')->name('admin.category.delete');
});
Route::group(['prefix'=>'admin/post'], function(){
	Route::get('/manage','Admin\PostController@index')->name('admin.post.manage');
	Route::get('/create','Admin\PostController@create')->name('admin.post.create');
	Route::post('/store','Admin\PostController@store')->name('admin.post.store');
	Route::post('/update','Admin\PostController@update')->name('admin.post.update');
	Route::get('/delete/{id}','Admin\PostController@delete')->name('admin.post.delete');
});
Route::group(['prefix'=>'user'], function(){
	Route::get('/create','Admin\UsersController@create')->name('admin.user.create');
	Route::post('/store','Admin\UsersController@store')->name('admin.user.store');
	Route::get('/manage','Admin\UsersController@manage')->name('admin.user.manage');
	Route::get('/delete/{id}','Admin\UsersController@delete')->name('admin.user.delete');
	
});
Route::group(['prefix'=>'comment'], function(){
	Route::get('/manage','Admin\CommentsController@manage')->name('admin.comment.manage');
	Route::post('/delete/','Admin\CommentsController@delete')->name('comment.del');
	Route::get('/change/{id}','Admin\CommentsController@change')->name('comment.change');
	
});
Route::group(['prefix'=>'coverPhoto'], function(){
	Route::get('/create','Admin\CoverPhotosController@create')->name('admin.coverPhoto.create');
	Route::post('/store','Admin\CoverPhotosController@store')->name('admin.coverPhoto.store');
	Route::get('/manage','Admin\CoverPhotosController@manage')->name('admin.coverPhoto.manage');
	Route::post('/update','Admin\CoverPhotosController@update')->name('admin.coverPhoto.update');
	Route::get('/delete/{id}','Admin\CoverPhotosController@delete')->name('admin.coverPhoto.delete');
	
});

/*-------------------------------------------------------
|-------------------------------------------------------
			user Routes
|-------------------------------------------------------
*/


/*Route::group(['prefix'=>'user'], function(){
	Route::get('/register', 'Auth\User\RegisterController@showRegistrationForm')->name('user.reg');
	Route::post('/register/show', 'Auth\User\RegisterController@register')->name('user.reg.show');
	Route::get('/login', 'Auth\User\LoginController@showLoginForm')->name('user.login');
	Route::post('/login/show', 'Auth\User\LoginController@login')->name('user.login.show');
});*/
/*-------------------------------------------------------
|-------------------------------------------------------
			Comment Routes
|-------------------------------------------------------
*/


Route::group(['prefix'=>'comment'], function(){
	Route::post('/store','FrontEnd\CommentsController@store')->name('comment.store');
	Route::get('/update/{id}','FrontEnd\CommentsController@update')->name('comment.update');
	Route::get('/delete/{id}','FrontEnd\CommentsController@delete')->name('comment.delete');
	
});

Route::group(['prefix'=>'reply'], function(){
	Route::post('/store','FrontEnd\ReplyController@store')->name('reply.store');
});
Route::group(['prefix'=>'replyreply'], function(){
	Route::post('/store','FrontEnd\ReplyReplyController@store')->name('replyreply.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify/{token}','Auth\VerificationController@verify')->name('admin.verification');
Route::get('/wel',function(){
	return view('frontEnd.welcome');
});