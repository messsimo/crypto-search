<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;
// Подключение сервиса
use App\Services\CryptoService;

class CryptoController extends Controller {
    // Сервис
    protected $cryptoService;


    public function __construct(CryptoService $cryptoService) {
        $this->cryptoService = $cryptoService;
    }

    // Функция отображения инфомрации о монетах
    public function showPrice() {
        $cryptos = $this->cryptoService->getTopCryptos();
        
    
        // Преобразование в ассоциативный массив
        $cryptosAssoc = [];
        foreach ($cryptos as $crypto) {
            $cryptosAssoc[$crypto['id']] = $crypto;
        }
    
        // Преобразование массив в коллекцию
        $cryptosCollection = collect($cryptosAssoc);
    
        // Настройка пагинации
        $perPage = 10; // Количество элементов на странице
        $currentPage = Paginator::resolveCurrentPage();
        $currentItems = $cryptosCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedCryptos = new LengthAwarePaginator($currentItems, $cryptosCollection->count(), $perPage, $currentPage, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    
        // Передача данных в шаблон
        return view('main', ['cryptos' => $paginatedCryptos, 'mainCryptos' => $cryptosAssoc]);
    }
}
