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
                <h1>{{ $mainCryptos['bitcoin']['name'] }}</h1>
                <!-- Определение значений и стилей в зависимоти от состояния -->
                <?php
                    $price = $mainCryptos['bitcoin']['price_change_percentage_24h'];
                    $precentClass = $price < 0 ? 'precent-down' : 'precent-up';
                    $precent = number_format(($price), 2);
                ?>

                <span class="{{ $precentClass}}">
                    @if ($price < 0)
                        {{ $precent }}%
                    @else
                        +{{ $precent }}%
                    @endif
                </span>
            </div>
            <h2>$ {{ number_format($mainCryptos['bitcoin']['current_price'], 2) }}</h2>
        </div>

        <div class="block">
            <img src="{{ asset('images/eth.png') }}" alt="Etherium">
            <div class="container-block">
                <h1>{{ $mainCryptos["ethereum"]["name"] }}</h1>
                <!-- Определение значений и стилей в зависимоти от состояния -->
                <?php
                    $price = $mainCryptos['ethereum']['price_change_percentage_24h'];
                    $precentClass = $price < 0 ? 'precent-down' : 'precent-up';
                    $precent = number_format(($price), 2);
                ?>

                <span class="{{ $precentClass}}">
                    @if ($price < 0)
                        {{ $precent }}%
                    @else
                        +{{ $precent }}%
                    @endif
                </span>
            </div>
            <h2>$ {{ number_format($mainCryptos['ethereum']['current_price'], 2) }}</h2>
        </div>

        <div class="block">
            <img src="{{ asset('images/tether.png') }}" alt="Tether">
            <div class="container-block">
                <h1>{{ $mainCryptos["tether"]["name"] }}</h1>
                <!-- Определение значений и стилей в зависимоти от состояния -->
                <?php
                    $price = $mainCryptos['tether']['price_change_percentage_24h'];
                    $precentClass = $price < 0 ? 'precent-down' : 'precent-up';
                    $precent = number_format(($price), 2);
                ?>

                <span class="{{ $precentClass}}">
                    @if ($price < 0)
                        {{ $precent }}%
                    @else
                        +{{ $precent }}%
                    @endif
                </span>
            </div>
            <h2>$ {{ number_format($mainCryptos['tether']['current_price'], 2) }}</h2>
        </div>

        <div class="block">
            <img src="{{ asset('images/bnb.png') }}" alt="BNB">
            <div class="container-block">
                <h1>{{ $mainCryptos["binancecoin"]["name"] }}</h1>
                <!-- Определение значений и стилей в зависимоти от состояния -->
                <?php
                    $price = $mainCryptos['binancecoin']['price_change_percentage_24h'];
                    $precentClass = $price < 0 ? 'precent-down' : 'precent-up';
                    $precent = number_format(($price), 2);
                ?>

                <span class="{{ $precentClass}}">
                    @if ($price < 0)
                        {{ $precent }}%
                    @else
                        +{{ $precent }}%
                    @endif
                </span>
            </div>
            <h2>$ {{ number_format($mainCryptos['binancecoin']['current_price'], 2) }}</h2>
        </div>
    </div>
</div>

<!-- Секция с таблицей крпитвалют -->
<div class="crypto-market">
    <h1>Market Update</h1>

    <table>
    <thead>
        <tr>
            <th class="id">#</th>
            <th>Coin</th>
            <th>Price</th>
            <th>24h Change</th>
            <th>24h Volume</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cryptos as $crypto)
            <!-- Определение значений и стилей в зависимоти от состояния -->
            <?php
                $price = $crypto['price_change_percentage_24h'];
                $precentClass = $price < 0 ? 'precent-down' : 'precent-up';
                $precent = number_format(($price), 2);
            ?>

            <tr>
                <td class="id">{{ $crypto['market_cap_rank'] }}</td>
                <td class="name-crypto"><img src="{{ $crypto['image'] }}" alt="{{ $crypto['name'] }} Logo">{{ strtoupper($crypto['symbol']) }}</td>
                <td>${{ number_format($crypto['current_price'], 2) }}</td>
                <td class="{{ $precentClass }}">
                    @if ($price < 0)
                        {{ $precent }}%
                    @else
                        +{{ $precent }}%
                    @endif
                </td>
                <td>${{ number_format($crypto['total_volume'], 0) }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>

    <!-- Пагинация -->
    <div class="pagination">
        {{ $cryptos->links('vendor.pagination.custom') }}
    </div>
</div>

<!-- Блок с Преимуществами -->
<div class="advantages">
    <h1 class="main-text">WHY <span>CHOOSE US</span></h1>

    <div class="container-advantages">
        <div class="lateral">
            <div class="block">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-wallet"><path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path><path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path></svg></i>

                <div class="container-block">
                    <h1>CONNECT YOUR WALLET</h1>
                    <span>Use Trust Wallet, Metamask or to connect to the app.</span>
                </div>
            </div>

            <div class="block">
                <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-pencil-bolt"><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path><path d="M13.5 6.5l4 4"></path><path d="M19 16l-2 3h4l-2 3"></path></svg></i>

                <div class="container-block">
                    <h1>SELECT YOUR QUANTITY</h1>
                    <span>Upload your crypto and set a title, description and price.</span>
                </div>
            </div>

            <div class="block">
            <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-checklist"><path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path><path d="M14 19l2 2l4 -4"></path><path d="M9 8h4"></path><path d="M9 12h2"></path></svg></i>

                <div class="container-block">
                    <h1>CONFIRM TRANSACTION</h1>
                    <span>Earn by selling your crypto on our marketplace.</span>
                </div>
            </div>
        </div>

        <img src="{{ asset('images/hand-coin.png') }}" alt="213">

        <div class="lateral">
            <div class="block">
            <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-device-mobile-message"><path d="M11 3h10v8h-3l-4 2v-2h-3z"></path><path d="M15 16v4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h2"></path><path d="M10 18v.01"></path></svg></i>

                <div class="container-block">
                    <h1>RECEIVE YOUR OWN NFTS</h1>
                    <span>Invest all your crypto at one place on one platform.</span>
                </div>
            </div>

            <div class="block">
            <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-moneybag"><path d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5z"></path><path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path></svg></i>

                <div class="container-block">
                    <h1>TAKE A MARKET TO SELL</h1>
                    <span>Discover, collect the right crypto collections to buy or sell.</span>
                </div>
            </div>

            <div class="block">
            <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-stack"><path d="M12 6l-8 4l8 4l8 -4l-8 -4"></path><path d="M4 14l8 4l8 -4"></path></svg></i>

                <div class="container-block">
                    <h1>DRIVE YOUR COLLECTION</h1>
                    <span>We make it easy to Discover, Invest and manage.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Секция с Дискордом -->
<div class="discord">
    <div class="discord-text">
        <img src="{{ asset('images/bitcoin.png') }}" alt="Bitcoin">

        <div class="main-text">
            <h1>JOIN US VIA</h1>
            <span сlass="text-gradient">DISCORD</span>
        </div>

        <img src="{{ asset('images/ethereum.png') }}" alt="Ethereum">
    </div>

    <span class="span-text">Invest and manage all your crypto at one place.</span>

    <a href="https://discord.com">Join via Discord</a>
</div>

<!-- Футер сайта -->
<footer>
    <div class="footer-content">
        <div class="socials">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="footer-icon"><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="footer-icon"><path d="M8 12a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path><path d="M14 12a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path><path d="M15.5 17c0 1 1.5 3 2 3c1.5 0 2.833 -1.667 3.5 -3c.667 -1.667 .5 -5.833 -1.5 -11.5c-1.457 -1.015 -3 -1.34 -4.5 -1.5l-.972 1.923a11.913 11.913 0 0 0 -4.053 0l-.975 -1.923c-1.5 .16 -3.043 .485 -4.5 1.5c-2 5.667 -2.167 9.833 -1.5 11.5c.667 1.333 2 3 3.5 3c.5 0 2 -2 2 -3"></path><path d="M7 16.5c3.5 1 6.5 1 10 0"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="footer-icon"><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="footer-icon"><path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z"></path><path d="M10 9l5 3l-5 3z"></path></svg>
        </div>

        <div class="privacy">
            <span>Privacy</span>
            <span>Terms of Use</span>
        </div>
    </div>
</footer>

</div>
@endsection