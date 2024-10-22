<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adaptation.css') }}">
    <!-- Название страницы сайта -->
    <title>Coindom - Crypto Search</title>
</head>
<body>
    <!-- Подключение секций -->
    @yield("main")

    <!-- Подключение JS -->
    <script src="{{ url('js/burger.js') }}"></script>
</body>
</html>