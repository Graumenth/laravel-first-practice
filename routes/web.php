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

// Route::get('/', 'HomeController@index');
// Route::get('/example', 'Example@index');

Route::resource('/', 'HomeController');
Route::get('/example', 'Example@index');
Route::get('/read', 'Example@read');
Route::get('/insert', 'Example@insert');
Route::get('/find', 'Example@find');
Route::get('/findwhere', 'Example@findwhere');
Route::get('/findmore', 'Example@findmore');
Route::get('/basicinsert', 'Example@basicinsert');
Route::get('/basicupdate', 'Example@basicupdate');
Route::get('/create', 'Example@create');
Route::get('/update', 'Example@update');
Route::get('/delete', 'Example@delete');
Route::get('/softdelete', 'Example@softdelete');
Route::get('/readsoftdelete', 'Example@readsoftdelete');
Route::get('/restore', 'Example@restore');
Route::get('/forcedelete', 'Example@forcedelete');
Route::get('/user/{id}/post', 'Example@userpost'); //one to one relationship
Route::get('/post/{id}/user', 'Example@postuser');
Route::get('/posts/{id}', 'Example@posts');
Route::get('/user/{id}/role', 'Example@userrole');
Route::get('/user/pivot', 'Example@userpivot');
Route::get('/user/country', 'Example@usercountry');
//Polymorphic Relations
Route::get('/user/photos', 'Example@userphotos');
Route::get('/post/photos', 'Example@postphotos');


//
//Route::get('/read', function (){
//    $results = DB::select('select * from posts where id = ?', [1]);
//    return var_dump($results);
//});
//
//Route::get('/update', function (){
//    $update = DB::update('update posts set title="Updated" where id = ?', [1]);
//    return $update;
//});
//
// Route::get('/delete', function (){
//     $delete = DB::delete('delete from posts where id = ?', [1]);
//     return $delete;
// });
