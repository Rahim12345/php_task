<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('generate-shorten-link', 'ShortLinkController@index');
//Route::post('generate-shorten-link', 'ShortLinkController@store')->name('generate.shorten.link.post');
//
//Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');

Route::resource('/',ShortLinkController::class);

Route::get('{code}', [ShortLinkController::class,'show'])->name('show');
