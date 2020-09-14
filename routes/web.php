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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'as' => 'front.',
    'namespace' => 'Client'
], function () {
    Route::group([
        'middleware' => ['auth']
    ], function () {
        Route::group([
            'as' => 'questions.',
            'prefix' => 'questions'
        ], function () {
            Route::get('create', 'QuestionController@create')
                ->name('create');
            Route::post('store', 'QuestionController@store')
                ->name('store');
        });
    });

    Route::resource('questions', 'QuestionController')
        ->only(['show', 'index']);
    Route::resource('answers', 'AnswerController')
        ->only(['store']);
    Route::resource('comments', 'CommentController')
        ->only(['store']);
});
