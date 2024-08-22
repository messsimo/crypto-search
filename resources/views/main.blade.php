<!-- Подключение файла сборщика -->
@extends("layouts.app")

<!-- Основаная секция -->
@section("main")
<div class="wrapper">
<!-- Блок шапки сайта -->
<header>
    <div class="container-header">
        <h1>COINDOM</h1>

        <nav>
            <ul>
                <a href="#"><li>Home</li></a>
                <a href="#"><li>Market</li></a>
                <a href="#"><li>Choose Us</li></a>
                <a href="#"><li>Join</li></a>
            </ul>
        </nav>

        <div class="socials">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                <path d="M247.39,68.94A8,8,0,0,0,240,64H209.57A48.66,48.66,0,0,0,168.1,40a46.91,46.91,0,0,0-33.75,13.7A47.9,47.9,0,0,0,120,88v6.09C79.74,83.47,46.81,50.72,46.46,50.37a8,8,0,0,0-13.65,4.92c-4.31,47.79,9.57,79.77,22,98.18a110.93,110.93,0,0,0,21.88,24.2c-15.23,17.53-39.21,26.74-39.47,26.84a8,8,0,0,0-3.85,11.93c.75,1.12,3.75,5.05,11.08,8.72C53.51,229.7,65.48,232,80,232c70.67,0,129.72-54.42,135.75-124.44l29.91-29.9A8,8,0,0,0,247.39,68.94Zm-45,29.41a8,8,0,0,0-2.32,5.14C196,166.58,143.28,216,80,216c-10.56,0-18-1.4-23.22-3.08,11.51-6.25,27.56-17,37.88-32.48A8,8,0,0,0,92,169.08c-.47-.27-43.91-26.34-44-96,16,13,45.25,33.17,78.67,38.79A8,8,0,0,0,136,104V88a32,32,0,0,1,9.6-22.92A30.94,30.94,0,0,1,167.9,56c12.66.16,24.49,7.88,29.44,19.21A8,8,0,0,0,204.67,80h16Z"></path>
            </svg>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z"></path>
            </svg>
        </div>
    </div>
</header>

<!-- Блок Hero -->
<div class="hero">
    <div class="hero-texts">
        <img src="{{ asset('images/bitcoin.png') }}" alt="Bitcoin">

        <div class="main-text">
            <h1>Track and Trade</h1>
            <span>Crypto currencies</span>
        </div>

        <img src="{{ asset('images/ethereum.png') }}" alt="Ethereum">
    </div>

    <div class="main-crypto">
        <div class="block">
            <img src="{{ asset('images/btc.png') }}" alt="Bitcoin">
            <div class="container-block">
                <h1>{{ $cryptos['bitcoin']['name'] }}</h1>
                @php
                    $priceChangePercentage = $cryptos['bitcoin']['price_change_percentage_24h'];
                    $sign = $priceChangePercentage >= 0 ? '+' : '';
                @endphp
                <span>{{ $sign . number_format($priceChangePercentage, 2) }}%</span>
            </div>
            <h2>$ {{ number_format($cryptos['bitcoin']['current_price'], 2) }}</h2>
        </div>

        <div class="block">
            <img src="{{ asset('images/eth.png') }}" alt="Etherium">
            <div class="container-block">
                <h1>{{ $cryptos["ethereum"]["name"] }}</h1>
                @php
                    $priceChangePercentage = $cryptos['ethereum']['price_change_percentage_24h'];
                    $sign = $priceChangePercentage >= 0 ? '+' : '';
                @endphp
                <span>{{ $sign . number_format($priceChangePercentage, 2) }}%</span>
            </div>
            <h2>$ {{ number_format($cryptos['ethereum']['current_price'], 2) }}</h2>
        </div>

        <div class="block">
            <img src="{{ asset('images/tether.png') }}" alt="Tether">
            <div class="container-block">
                <h1>{{ $cryptos["tether"]["name"] }}</h1>
                @php
                    $priceChangePercentage = $cryptos['tether']['price_change_percentage_24h'];
                    $sign = $priceChangePercentage >= 0 ? '+' : '';
                @endphp
                <span>{{ $sign . number_format($priceChangePercentage, 2) }}%</span>
            </div>
            <h2>$ {{ number_format($cryptos['tether']['current_price'], 2) }}</h2>
        </div>

        <div class="block">
            <img src="{{ asset('images/bnb.png') }}" alt="BNB">
            <div class="container-block">
                <h1>{{ $cryptos["binancecoin"]["name"] }}</h1>
                @php
                    $priceChangePercentage = $cryptos['binancecoin']['price_change_percentage_24h'];
                    $sign = $priceChangePercentage >= 0 ? '+' : '';
                @endphp
                <span>{{ $sign . number_format($priceChangePercentage, 2) }}%</span>
            </div>
            <h2>$ {{ number_format($cryptos['binancecoin']['current_price'], 2) }}</h2>
        </div>
    </div>
</div>

<pre><?php print_r($cryptos) ?></pre>

</div>
@endsection