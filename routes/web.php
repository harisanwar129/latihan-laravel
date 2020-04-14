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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/{name?}',function($name=null){
    if($name==null){
 return 'hello';
    }else{
        return 'hello'.$name;
    }
   
})->name('profile');

// Route::get('/coba', function () {
//     return view('coba');
// });
Route::get('/coba',"CobaController@show");
Route::resource('mhs','MhsController');

Route::get('/boostrap', function () {
    return view('boostrap');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
