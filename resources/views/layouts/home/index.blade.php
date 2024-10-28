<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - Bitcoin Crypto Currency Trading & Investment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/4.png') }}">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/snackbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/orange.css') }}">

    <!-- Template JS Files -->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>

</head>

<body>
    <!-- SVG Preloader Starts -->
    <div id="preloader">
        <div id="preloader-content">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px"
                viewBox="100 100 400 400" xml:space="preserve">
                <filter id="dropshadow" height="130%">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="5" />
                    <feOffset dx="0" dy="0" result="offsetblur" />
                    <feFlood flood-color="red" />
                    <feComposite in2="offsetblur" operator="in" />
                    <feMerge>
                        <feMergeNode />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
                <path class="path" fill="#000000" d="M446.089,261.45c6.135-41.001-25.084-63.033-67.769-77.735l13.844-55.532l-33.801-8.424l-13.48,54.068
                    c-8.896-2.217-18.015-4.304-27.091-6.371l13.568-54.429l-33.776-8.424l-13.861,55.521c-7.354-1.676-14.575-3.328-21.587-5.073
                    l0.034-0.171l-46.617-11.64l-8.993,36.102c0,0,25.08,5.746,24.549,6.105c13.689,3.42,16.159,12.478,15.75,19.658L208.93,357.23
                    c-1.675,4.158-5.925,10.401-15.494,8.031c0.338,0.485-24.579-6.134-24.579-6.134l-9.631,40.468l36.843,9.188
                    c8.178,2.051,16.209,4.19,24.098,6.217l-13.978,56.17l33.764,8.424l13.852-55.571c9.235,2.499,18.186,4.813,26.948,6.995
                    l-13.802,55.309l33.801,8.424l13.994-56.061c57.648,10.902,100.998,6.502,119.237-45.627c14.705-41.979-0.731-66.193-31.06-81.984
                    C425.008,305.984,441.655,291.455,446.089,261.45z M368.859,369.754c-10.455,41.983-81.128,19.285-104.052,13.589l18.562-74.404
                    C306.28,314.65,379.774,325.975,368.859,369.754z M379.302,260.846c-9.527,38.187-68.358,18.781-87.442,14.023l16.828-67.489
                    C327.767,212.14,389.234,221.02,379.302,260.846z" />
            </svg>
        </div>
    </div>
    <!-- SVG Preloader Ends -->
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <!-- Header Starts -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <!-- Logo Starts -->
                    <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                        <a href="/">
                            <img id="logo" class="img-responsive" src="{{ asset('assets/images/2.png') }}"
                                alt="logo" style="max-width: 190px !important;">
                        </a>
                    </div>
                    <!-- Logo Ends -->
                    <!-- Statistics Starts -->
                    <div class="col-md-7 col-lg-7">
                        <ul class="text-center unstyled bitcoin-stats">
                            <li>
                                <h6>9,450 USD</h6><span>Last trade price</span>
                            </li>
                            <li>
                                <h6>+5.26%</h6><span>24 hour price</span>
                            </li>
                            <li>
                                <h6>12.820 BTC</h6><span>24 hour volume</span>
                            </li>
                            <li>
                                <h6>2,231,775</h6><span>active traders</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Statistics Ends -->
                    <!-- User Sign In/Sign Up Starts -->
                    <div class="col-md-3 col-lg-3">
                        <ul class="unstyled user">
                            <li class="sign-in"><a href="login" class="btn btn-primary"><i class="fa fa-user"></i>
                                    sign in</a></li>
                            <li class="sign-up"><a href="register" class="btn btn-primary"><i
                                        class="fa fa-user-plus"></i> register</a></li>
                        </ul>
                    </div>
                    <!-- User Sign In/Sign Up Ends -->
                </div>
            </div>
            <!-- Navigation Menu Starts -->
            <nav class="site-navigation navigation" id="site-navigation">
                <div class="container">
                    <div class="site-nav-inner">
                        <!-- Logo For ONLY Mobile display Starts -->
                        <a class="logo-mobile" href="/">
                            <img id="logo-mobile" class="img-responsive"
                                src="{{ asset('assets/images/2.png') }}" alt="">
                        </a>
                        <!-- Logo For ONLY Mobile display Ends -->
                        <!-- Toggle Icon for Mobile Starts -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Toggle Icon for Mobile Ends -->
                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <!-- Main Menu Starts -->
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="about">About Us</a></li>
                                <li><a href="services">Services</a></li>
                                <li><a href="pricing">Pricing</a></li>
                                <li><a href="faqs">FAQs</a></li>
                                <li><a href="contact">Contact</a></li>
                            </ul>
                            <!-- Main Menu Ends -->
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navigation Menu Ends -->
        </header>
        <!-- Header Ends -->
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container" style="width: 100%; height: 76px;">
            <iframe scrolling="no" allowtransparency="true" frameborder="0"
                src="https://www.tradingview-widget.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%2C%7B%22description%22%3A%22LTC%2FUSD%22%2C%22proName%22%3A%22KRAKEN%3ALTCUSD%22%7D%2C%7B%22description%22%3A%22BCH%2FUSD%22%2C%22proName%22%3A%22GEMINI%3ABCHUSD%22%7D%2C%7B%22description%22%3A%22XRP%2FUSD%22%2C%22proName%22%3A%22BITFINEX%3AXRPUSD%22%7D%2C%7B%22description%22%3A%22DASH%2FBTC%22%2C%22proName%22%3A%22BINANCE%3ADASHBTC%22%7D%5D%2C%22showSymbolLogo%22%3Afalse%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Atrue%2C%22displayMode%22%3A%22adaptive%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A76%2C%22utm_source%22%3A%22thepipsgain.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22ticker-tape%22%2C%22page-uri%22%3A%22thepipsgain.com%2Ffaq.php%22%7D"
                title="ticker tape TradingView widget" lang="en"
                style="user-select: none; box-sizing: border-box; display: block; height: 44px; width: 100%;"></iframe>
            <div class="tradingview-widget-copyright"><a
                    href="https://www.tradingview.com/?utm_source=thepipsgain.com&amp;utm_medium=widget_new&amp;utm_campaign=ticker-tape"
                    rel="noopener" target="_blank"></a></div>

            <style>
                .tradingview-widget-copyright {
                    font-size: 13px !important;
                    line-height: 32px !important;
                    text-align: center !important;
                    vertical-align: middle !important;
                    /* @mixin sf-pro-display-font; */
                    font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto, Ubuntu, sans-serif !important;
                    color: #B2B5BE !important;
                }

                .tradingview-widget-copyright .blue-text {
                    color: #2962FF !important;
                }

                .tradingview-widget-copyright a {
                    text-decoration: none !important;
                    color: #B2B5BE !important;
                }

                .tradingview-widget-copyright a:visited {
                    color: #B2B5BE !important;
                }

                .tradingview-widget-copyright a:hover .blue-text {
                    color: #1E53E5 !important;
                }

                .tradingview-widget-copyright a:active .blue-text {
                    color: #1848CC !important;
                }

                .tradingview-widget-copyright a:visited .blue-text {
                    color: #2962FF !important;
                }
            </style>
        </div>
        <!-- TradingView Widget END -->

        @yield('content')

        <!-- Footer Starts -->
        <footer class="footer">
            <!-- Footer Top Area Starts -->
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-2">
                            <h4>Our Company</h4>
                            <div class="menu">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="about">About</a></li>
                                    <li><a href="services">Services</a></li>
                                    <li><a href="pricing">Pricing</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Widget Ends -->
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-2">
                            <h4>Help & Support</h4>
                            <div class="menu">
                                <ul>
                                    <li><a href="faqs">FAQ</a></li>
                                    <li><a href="contact">Contact</a></li>
                                    <li><a href="terms">Terms of Services</a></li>
                                    <li><a href="policy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Widget Ends -->
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-3">
                            <h4>Contact Us </h4>
                            <div class="contacts">
                                <div>
                                    <span>support@bytegains.com</span>
                                </div>
                                {{-- <div>
                                    <span>00216 21 184 010</span>
                                </div> --}}
                                <div>
                                    <span>4860 COX ROAD, SUITE #200 GLEN ALLEN (RICHMOND), VA 23060</span>
                                </div>
                                <div>
                                    <span>mon-sat 08am &#x21FE; 05pm</span>
                                </div>
                            </div>
                        </div>
                        <!-- Footer Widget Ends -->
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-12 col-md-5">
                            <!-- Supported Payment Cards Logo Starts -->
                            <div class="payment-logos">
                                <h4 class="payment-title">supported payment methods</h4>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3_QEK_RGtIdqfUpq4PXkI7MtK9m0LLt9CWA&s"
                                    alt="american-express">
                                {{-- <img src="images/icons/payment/mastercard.png" alt="mastercard">
                                <img src="images/icons/payment/visa.png" alt="visa">
                                <img src="images/icons/payment/paypal.png" alt="paypal">
                                <img class="last" src="images/icons/payment/maestro.png" alt="maestro"> --}}
                            </div>
                            <!-- Supported Payment Cards Logo Ends -->
                        </div>
                        <!-- Footer Widget Ends -->
                    </div>
                </div>
            </div>
            <!-- Footer Top Area Ends -->
            <!-- Footer Bottom Area Starts -->
            <div class="bottom-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Copyright Text Starts -->
                            <p class="text-center">Copyright © {{ now()->year }} {{ config('app.name') }} All Rights Reserved</p>
                            <!-- Copyright Text Ends -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom Area Ends -->
        </footer>
        <!-- Footer Ends -->
        <!-- Back To Top Starts  -->
        <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
        <!-- Back To Top Ends  -->
        <!-- Snackbar Starts  -->
        <div class="" id="snackbar">
            <div id="toast-header">
                Withdrawal Alert
            </div>
            <div id="toast-body">
                <span id="nameT"></span> just made a successful withdrawal of <span id="amountT"></span>
            </div>
        </div>
        <!-- Snackbar Ends  -->

        <!-- Template JS Files -->
        <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/js/snackbar.js') }}"></script>

        <script>
            var nameT = ["Someone from Sweden", "Someone from Peru", "Someone from Indonesian", "Someone from Ghana",
                "Someone from South Africa", "Someone from UK", "Someone from India", "Someone from USA",
                "Someone from USA", "Someone from scotland󠁧󠁢󠁳󠁣󠁴󠁿 ", "Someone from Hungary", "Someone from Mexico",
                "Someone from italy", "Someone from portugal", "Someone from Hungary", "Someone from USA",
                "Someone from Wales", "Someone from USA", "Someone from Canada", "Someone from Australia",
                "Someone from USA", "Someone from  France", "Someone from spain", "Someone from USA"
            ];
            var amountT = ["$35,670", "$15,600", "$8,500", "$6,450", "$10,650", "$55,000", "$25,790", "$250,700", "$405,685",
                "$67,800", "$45,000", "$34,000", "$105,000", "$56,000", "$25,600", "2.5BTC", "10.5BTC", "5BTC",
                "0.0075683BTC", "$35,000", "3.023BTC", "$55,000", "10BTC", "1.0054BTC", "3BTC"
            ]
            handleToast = setInterval(function() {
                i = Math.floor(Math.random() * 24);
                myToast();
                document.getElementById('nameT').innerHTML = nameT[i];
                document.getElementById('amountT').innerHTML = amountT[i];
            }, 10000);
        </script>

        <!-- Smartsupp Live Chat script -->
        <script type="text/javascript">
            var _smartsupp = _smartsupp || {};
            _smartsupp.key = '89f8da30c65d30b73115b7469d78002a215c6256';
            window.smartsupp || (function(d) {
                var s, c, o = smartsupp = function() {
                    o._.push(arguments)
                };
                o._ = [];
                s = d.getElementsByTagName('script')[0];
                c = d.createElement('script');
                c.type = 'text/javascript';
                c.charset = 'utf-8';
                c.async = true;
                c.src = 'https://www.smartsuppchat.com/loader.js?';
                s.parentNode.insertBefore(c, s);
            })(document);
        </script>
        <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

    </div>
    <!-- Wrapper Ends -->
</body>

</html>
