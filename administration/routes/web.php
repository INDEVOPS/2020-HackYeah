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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    
    Auth::routes([
        'register' => false,
        'reset' => false,
    ]);

    Route::get('/', function () {
        return redirect()->action('QuestionController@index');
    })->name('home');

    Route::resource('questions', 'QuestionController');
    Route::resource('q/{question}/alternative', 'AlternativeQuestionController');

    Route::get('/export', 'ExportController@index');
});

Route::get('/export/answers', 'ExportController@answers');
Route::get('/export/questions', 'ExportController@questions');

