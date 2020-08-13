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
Route::get('/',function(){
    return view('welcome');
});


Route::group(['prefix'=>'nedmin','namespace'=>'Backend'],function(){
    Route::get('/dashboard','DefaultController@index')->name('nedmin.Index')->middleware('admin');
    Route::get('/','DefaultController@login')->name('nedmin.Login');
    Route::get('/logout','DefaultController@logout')->name('nedmin.Logout');
    Route::post('/login','DefaultController@authenticate')->name('nedmin.Authenticate');
});


Route::group(['namespace' => 'Backend', 'prefix' => 'nedmin/settings','middleware'=>['admin']], function () {
    
    Route::get('/','SettingsController@index')->name('settings.Index');
    Route::post('','SettingsController@sortable')->name('settings.Sortable');
    Route::get('/delete/{id}','SettingsController@destroy')->name('settings.Destroy');
    Route::get('/edit/{id}','SettingsController@edit')->name('settings.Edit');
    Route::post('','SettingsController@sortable')->name('settings.Sortable');
    Route::post('/{id}','SettingsController@update')->name('settings.Update');
    
});

Route::group(['namespace' => 'Backend', 'prefix' => 'nedmin','middleware'=>['admin'] ], function () {

    Route::resource('blog','BlogController');
    Route::post('blog/sortable','BlogController@sortable')->name('blog.Sortable');

    Route::resource('page','PageController');
    Route::post('page/sortable','PageController@sortable')->name('page.Sortable');
    
    Route::resource('slider','SliderController');
    Route::post('slider/sortable','SliderController@sortable')->name('slider.Sortable');
    
    Route::resource('user','UserController');
    Route::post('user/sortable','UserController@sortable')->name('user.Sortable');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
