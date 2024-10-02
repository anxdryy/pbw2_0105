<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('landingPage');
});

Route::get('/admin',function(){
    return view('admin/dashboard');
});

Route::resource('buku', controller: BukuController::class);
