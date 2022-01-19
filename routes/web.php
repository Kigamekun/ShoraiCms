<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\BannerController;
use App\Models\User;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/berita', function () {
    return view('berita');
})->name('berita');


require __DIR__.'/auth.php';

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('management')->group(function () {

    Route::get('/', 'DashboardController@index')->name('management');

Route::prefix('berita')->name('berita.')->group(function () {
    // crud routing
    Route::get('/', 'BeritaController@index')->name('index');
    Route::get('/create', 'BeritaController@create')->name('create');
    Route::post('/store', 'BeritaController@store')->name('store');
    Route::get('/{id}/edit', 'BeritaController@edit')->name('edit');
    Route::post('/{id}/update', 'BeritaController@update')->name('update');
    Route::get('/{id}/delete', 'BeritaController@destroy')->name('delete');

});

Route::prefix('banner')->name('banner.')->group(function () {
    // crud routing
    Route::get('/', 'BannerController@index')->name('index');
    Route::get('/create', 'BannerController@create')->name('create');
    Route::post('/store', 'BannerController@store')->name('store');
    Route::get('/{id}/edit', 'BannerController@edit')->name('edit');
    Route::post('/{id}/update', 'BannerController@update')->name('update');
    Route::get('/{id}/delete', 'BannerController@destroy')->name('delete');

});


Route::prefix('slider')->name('slider.')->group(function () {
    // crud routing
    Route::get('/', 'SliderController@index')->name('index');
    Route::get('/create', 'SliderController@create')->name('create');
    Route::post('/store', 'SliderController@store')->name('store');
    Route::get('/{id}/edit', 'SliderController@edit')->name('edit');
    Route::post('/{id}/update', 'SliderController@update')->name('update');
    Route::get('/{id}/delete', 'SliderController@destroy')->name('delete');
});



Route::prefix('staff')->name('staff.')->group(function () {
    // crud routing
    Route::get('/', 'StaffController@index')->name('index');
    Route::get('/create', 'StaffController@create')->name('create');
    Route::post('/store', 'StaffController@store')->name('store');
    Route::get('/{id}/edit', 'StaffController@edit')->name('edit');
    Route::post('/{id}/update', 'StaffController@update')->name('update');
    Route::get('/{id}/delete', 'StaffController@destroy')->name('delete');


});

Route::prefix('link')->name('link.')->group(function () {
    // crud routing
    Route::get('/', 'LinkController@index')->name('index');
    Route::get('/create', 'LinkController@create')->name('create');
    Route::post('/store', 'LinkController@store')->name('store');
    Route::get('/{id}/edit', 'LinkController@edit')->name('edit');
    Route::post('/{id}/update', 'LinkController@update')->name('update');
    Route::get('/{id}/delete', 'LinkController@destroy')->name('delete');


});

Route::prefix('maps')->name('maps.')->group(function () {
    // crud routing
    Route::get('/', 'MapsController@index')->name('index');
    Route::get('/create', 'MapsController@create')->name('create');
    Route::post('/store', 'MapsController@store')->name('store');
    Route::get('/{id}/edit', 'MapsController@edit')->name('edit');
    Route::post('/{id}/update', 'MapsController@update')->name('update');
    Route::get('/{id}/delete', 'MapsController@destroy')->name('delete');


});



Route::prefix('agenda')->name('agenda.')->group(function () {
    // crud routing
    Route::get('/', 'AgendaController@index')->name('index');
    Route::get('/create', 'AgendaController@create')->name('create');
    Route::post('/store', 'AgendaController@store')->name('store');
    Route::get('/{id}/edit', 'AgendaController@edit')->name('edit');
    Route::post('/{id}/update', 'AgendaController@update')->name('update');
    Route::get('/{id}/delete', 'AgendaController@destroy')->name('delete');


});

Route::prefix('category')->name('category.')->group(function () {
    // crud routing
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/create', 'CategoryController@create')->name('create');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
    Route::post('/{id}/update', 'CategoryController@update')->name('update');
    Route::get('/{id}/delete', 'CategoryController@destroy')->name('delete');


});




Route::prefix('page')->name('page.')->group(function () {
    // crud routing
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/create', 'PageController@create')->name('create');
    Route::post('/store', 'PageController@store')->name('store');
    Route::get('/{id}/edit', 'PageController@edit')->name('edit');
    Route::post('/{id}/update', 'PageController@update')->name('update');
    Route::get('/{id}/delete', 'PageController@destroy')->name('delete');


});

Route::prefix('video')->name('video.')->group(function () {
    // crud routing
    Route::get('/', 'VideoController@index')->name('index');
    Route::get('/create', 'VideoController@create')->name('create');
    Route::post('/store', 'VideoController@store')->name('store');
    Route::get('/{id}/edit', 'VideoController@edit')->name('edit');
    Route::post('/{id}/update', 'VideoController@update')->name('update');
    Route::get('/{id}/delete', 'VideoController@destroy')->name('delete');


});


Route::prefix('gallery')->name('gallery.')->group(function () {
    // crud routing
    Route::get('/', 'GalleryController@index')->name('index');
    Route::get('/create', 'GalleryController@create')->name('create');
    Route::post('/store', 'GalleryController@store')->name('store');
    Route::get('/{id}/edit', 'GalleryController@edit')->name('edit');
    Route::post('/{id}/update', 'GalleryController@update')->name('update');
    Route::get('/{id}/delete', 'GalleryController@destroy')->name('delete');


});



Route::prefix('admin')->name('admin.')->group(function () {
    // crud routing

    Route::prefix('users')->name('users.')->group(function () {

        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('/{id}/edit', 'UserController@edit')->name('edit');
        Route::post('/{id}/update', 'UserController@update')->name('update');
        Route::get('/{id}/delete', 'UserController@destroy')->name('delete');

    });

});



});


