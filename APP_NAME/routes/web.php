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

Route::get('/job', function () {
    App\Jobs\FileAdd::dispatch("https://www.thiswaifudoesnotexist.net/example-46271.jpg");
});

// upload form

// action upload

Route::get('/form', function () {

    return view('form');
});

Route::get('/downloads', 'App\Http\Controllers\UploadController@home');


Route::get('/test', 'App\Http\Controllers\UploadController@test');

//Route::get('/downloads/{id}', 'App\Http\Controllers\DownloadFile@loadFile')->name('downloadFile');

Route::get('/downloads/{name}',
    'App\Http\Controllers\DownloadFile@loadFile'
);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/store', 'App\Http\Controllers\UploadController@store');
    Route::post('/upload', 'App\Http\Controllers\UploadController@upload');

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/store');
