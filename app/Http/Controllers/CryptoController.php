<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Подключение сервиса
use App\Services\CryptoService;

class CryptoController extends Controller {
    // Сервис
    protected $cryptoService;


    public function __construct(CryptoService $cryptoService) {
        $this->cryptoService = $cryptoService;
    }

    // Функция показа информации о крипте
    public function showPrice() {
        $cryptos = $this->cryptoService->getTopCryptos();
        
        // Преобразуем в ассоциативный массив, где ключами будут идентификаторы
        $cryptosAssoc = [];
        foreach ($cryptos as $crypto) {
            $cryptosAssoc[$crypto['id']] = $crypto;
        }
    
        return view('main', ['cryptos' => $cryptosAssoc]);
    }
}
