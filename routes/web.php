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

//without using controller return view page
// Route::get('/', function () {
//     return view('welcome');
// });

//without using controller return view page 2nd way
// Route::view('home', 'welcome');



Route::get('/', 'BlogController@BlogPost');

Route::get('/about','HelloController@beginnerShow');
Route::get('/contactContactContact','HelloController@ShowContact')->name('contact');


// Route::get('/contact',function(){
//     return 'This is the contact page';
// })->middleware('age');

// Route::get('/guru','HelloController@guruShow');
// Route::get('/helloPage',function(){
//     return 'hello world';
// });


Route::get('/extend', function(){
    return view('extend');
});

// Categories URl..
Route::get('all/category','BlogController@AllCategory')->name('all.category');
Route::get('add/category','BlogController@add_category')->name('add.category');
Route::post('store/category','BlogController@StoreCategory')->name('store.category');
Route::get('view/category/{id}', 'BlogController@ViewCategory');
Route::get('delete/category/{id}', 'BlogController@DeleteCategory');
Route::get('edit/category/{id}', 'BlogController@EditCategory');
Route::post('update/category/{id}', 'BlogController@UpdateCategory');


//Posts URl..
Route::get('write/post','PostController@write_post')->name('write');
Route::post('store/post','PostController@StorePost');
Route::get('all/post','PostController@all_post')->name('all.post');
Route::get('view/post/{id}', 'PostController@ViewPost');
Route::get('edit/post/{id}' , 'PostController@EditPost');
Route::get('delete/post/{id}' , 'PostController@DeletePost');
Route::post('update/post/{id}', 'PostController@UpdatePost');

//Blogger URl... 
Route::get('bloggers', 'BloggerController@create');
Route::post('store/blogger', 'BloggerController@store')->name('store.blogger');
Route::get('all/blogger','BloggerController@index')->name('all.blogger');
Route::get('view/blogger/{id}', 'BloggerController@show');
Route::get('delete/blogger/{id}', 'BloggerController@destroy');
Route::get('edit/blogger/{id}', 'BloggerController@edit');
Route::post('update/blogger/{id}','BloggerController@update')->name('update.blogger');







