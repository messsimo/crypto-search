<?php

use Illuminate\Support\Facades\Route;
// Подключение контроллеров
use App\Http\Controllers\CryptoController;

// Обработчик главной страницы
Route::get('/', [CryptoController::class, 'showPrice']);