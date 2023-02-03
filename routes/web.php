<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

Route::resource('/',ShortLinkController::class);

Route::get('{code}', [ShortLinkController::class,'show'])->name('show');
