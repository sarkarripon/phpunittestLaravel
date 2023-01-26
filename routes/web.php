<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\ContactController@listData')->name('home');

Route::get('contact', 'App\Http\Controllers\ContactController@contact')->name('contact');

Route::post('contact/store', 'App\Http\Controllers\ContactController@store')->name('contact.store');
Route::get('contact/edit/{id}', 'App\Http\Controllers\ContactController@edit')->name('contact.edit');


Route::post('contact/update/{id}', 'App\Http\Controllers\ContactController@update')->name('contact.update');
Route::delete('contact/delete/', 'App\Http\Controllers\ContactController@destroy')->name('contact.delete');

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
