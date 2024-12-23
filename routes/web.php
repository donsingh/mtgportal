<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/{any?}', function () {
    return view('app'); // Use the same Blade file for all SPA-like routes
})->where('any', '.*');