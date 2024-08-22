<?php

use Illuminate\Support\Facades\Route;

// Отображение главной страницы
Route::get('/', function () {
    return view('main');
});
