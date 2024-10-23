@extends('layouts.home.index')

@section('content')
    <!-- Slider Starts -->
    <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators Starts -->
        <ol class="carousel-indicators visible-lg visible-md">
            <li data-target="#main-slide" data-slide-to="0" class="active"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <!-- Indicators Ends -->
        <!-- Carousel Inner Starts -->
        <div class="carousel-inner">
            <!-- Carousel Item Starts -->
            <div class="item active bg-parallax item-1">
                <div class="slider-content">
                    <div class="container">
                        <div class="text-center slider-text">
                            <h3 class="slide-title"><span>Secure</span> and <span>Easy Way</span><br /> To Bitcoin</h3>
                            <p>
                                <a href="{{ route('register') }}" class="slider btn btn-primary">Open a free Account
                                    Today!</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Item Ends -->
            <!-- Carousel Item Starts -->
            <div class="item bg-parallax item-2">
                <div class="slider-content">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="text-center slider-text">
                                <h3 class="slide-title"><span>Bitcoin</span> Exchange <br />You can <span>Trust</span> </h3>
                                <p>
                                    <a href="{{ route('register') }}" class="slider btn btn-primary">Open a free Account
                                        Today!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Item Ends -->
        </div>
        <!-- Carousel Inner Ends -->
        <!-- Carousel Controlers Starts -->
        <a class="left carousel-control" href="index.html#main-slide" data-slide="prev">
            <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="index.html#main-slide" data-slide="next">
            <span><i class="fa fa-angle-right"></i></span>
        </a>
        <!-- Carousel Controlers Ends -->
    </div>
    <!-- Slider Ends -->
    <!-- Features Section Starts -->
    <section class="features">
        <div class="container">
            <div class="row features-row">
                <!-- Feature Box Starts -->
                <div class="feature-box col-md-4 col-sm-12">
                    <span class="feature-icon">
                        <img id="download-bitcoin" src="{{ asset('assets/images/icons/orange/download-bitcoin.png') }}"
                            alt="download bitcoin">
                    </span>
                    <div class="feature-box-content">
                        <h3>Download Bitcoin Wallet</h3>
                        <p>Get it on PC or Mobile to create, send and receive bitcoins.</p>
                    </div>
                </div>
                <!-- Feature Box Ends -->
                <!-- Feature Box Starts -->
                <div class="feature-box two col-md-4 col-sm-12">
                    <span class="feature-icon">
                        <img id="add-bitcoins" src="{{ asset('assets/images/icons/orange/add-bitcoins.png') }}"
                            alt="add bitcoins">
                    </span>
                    <div class="feature-box-content">
                        <h3>Add coins to your Wallet</h3>
                        <p>Add bitcoins you’ve created or exchanged via credit card.</p>
                    </div>
                </div>
                <!-- Feature Box Ends -->
                <!-- Feature Box Starts -->
                <div class="feature-box three col-md-4 col-sm-12">
                    <span class="feature-icon">
                        <img id="buy-sell-bitcoins" src="{{ asset('assets/images/icons/orange/buy-sell-bitcoins.png') }}"
                            alt="buy and sell bitcoins">
                    </span>
                    <div class="feature-box-content">
                        <h3>Invest for Daily Profits</h3>
                        <p>Invest with us and recieve daily payouts.</p>
                    </div>
                </div>
                <!-- Feature Box Ends -->
            </div>
        </div>
    </section>
    <!-- Features Section Ends -->
    <!-- About Section Starts -->
    <section class="about-us">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="text-center row">
                <h2 class="title-head">About <span>Us</span></h2>
                <div class="title-head-subtitle">
                    <p>a commercial website that lists wallets, exchanges and other bitcoin related info</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Section Content Starts -->
            <div class="row about-content">
                <!-- Image Starts -->
                <div class="text-center col-sm-12 col-md-5 col-lg-6">
                    <img id="about-us" class="img-responsive img-about-us" src="{{ asset('assets/images/about-us.png') }}"
                        alt="about us">
                </div>
                <!-- Image Ends -->
                <!-- Content Starts -->
                <div class="col-sm-12 col-md-7 col-lg-6">
                    <h3 class="title-about" style="text-transform: uppercase">WE ARE {{ config('app.name') }}</h3>
                    <p class="about-text">
                        The {{ config('app.name') }} Limited was established to make trading and investing in the cryptocurrency market easier. We are aware of the varous difficulties new traders face at the beginning of a trading career. The cryptocurrency market is a vast and yet critical part of world economy and understanding the core concepts of trading is essential before diving into it. Therefore, at The {{ config('app.name') }} Limited, we try our best to ensure that our students and clients get the best services and keep you forever in profits.
                    </p>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                        <li><a data-toggle="tab" href="#menu2">Our advantages</a></li>
                        <li><a data-toggle="tab" href="#menu3">Our guarantees</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="menu1" class="tab-pane fade in active">
                            <p>
                                We provide authoritative plans and advice about everything from personal cryptocurrency investing & planning.
                            </p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <p>Our advantage as an official partner of Bitcoin Foundation is to help you enter and better understand the world of cryptocurrencies and avoid any issues you with investing.</p>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <p>
                                We are here because we are passionate about open, transparent markets and aim to be a major driving force in widespread adoption, we are the first and the best in cryptocurrency.
                            </p>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{ route('whitepaper') }}">Read More</a>
                </div>
                <!-- Content Ends -->
            </div>
            <!-- Section Content Ends -->
        </div>
    </section>
    <!-- About Section Ends -->
    <!-- Features and Video Section Starts -->
    <section class="image-block">
        <div class="container-fluid">
            <div class="row">
                <!-- Features Starts -->
                <div class="col-md-8 ts-padding img-block-left">
                    <div class="gap-20"></div>
                    <div class="row">
                        <!-- Feature Starts -->
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="text-center feature">
                                <span class="feature-icon">
                                    <img id="strong-security"
                                        src="{{ asset('assets/images/icons/orange/strong-security.png') }}"
                                        alt="strong security" />
                                </span>
                                <h3 class="feature-title">Strong Security</h3>
                                <p>Protection against DDoS attacks, <br>full data encryption</p>
                            </div>
                        </div>
                        <!-- Feature Ends -->
                        <div class="gap-20-mobile"></div>
                        <!-- Feature Starts -->
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="text-center feature">
                                <span class="feature-icon">
                                    <img id="world-coverage"
                                        src="{{ asset('assets/images/icons/orange/world-coverage.png') }}"
                                        alt="world coverage" />
                                </span>
                                <h3 class="feature-title">World Coverage</h3>
                                <p>Providing services in 99% countries<br> around all the globe</p>
                            </div>
                        </div>
                        <!-- Feature Ends -->
                    </div>
                    <div class="gap-20"></div>
                    <div class="row">
                        <!-- Feature Starts -->
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="text-center feature">
                                <span class="feature-icon">
                                    <img id="payment-options"
                                        src="{{ asset('assets/images/icons/orange/payment-options.png') }}"
                                        alt="payment options" />
                                </span>
                                <h3 class="feature-title">Payment Options</h3>
                                <p>Popular methods: Visa, MasterCard, <br>bank transfer, cryptocurrency</p>
                            </div>
                        </div>
                        <!-- Feature Ends -->
                        <div class="gap-20-mobile"></div>
                        <!-- Feature Starts -->
                        {{-- <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="text-center feature">
                                <span class="feature-icon">
                                    <img id="mobile-app" src="{{ asset('assets/images/icons/orange/mobile-app.png') }}"
                                        alt="mobile app" />
                                </span>
                                <h3 class="feature-title">Mobile App</h3>
                                <p>Trading via our Mobile App, Available<br> in Play Store & App Store</p>
                            </div>
                        </div> --}}
                        <!-- Feature Ends -->
                    </div>
                    <div class="gap-20"></div>
                    <div class="row">
                        <!-- Feature Starts -->
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="text-center feature">
                                <span class="feature-icon">
                                    <img id="cost-efficiency"
                                        src="{{ asset('assets/images/icons/orange/cost-efficiency.png') }}"
                                        alt="cost efficiency" />
                                </span>
                                <h3 class="feature-title">Cost efficiency</h3>
                                <p>Reasonable trading fees for takers<br> and all market makers</p>
                            </div>
                        </div>
                        <!-- Feature Ends -->
                        <div class="gap-20-mobile"></div>
                        <!-- Feature Starts -->
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="text-center feature">
                                <span class="feature-icon">
                                    <img id="high-liquidity"
                                        src="{{ asset('assets/images/icons/orange/high-liquidity.png') }}"
                                        alt="high liquidity" />
                                </span>
                                <h3 class="feature-title">High Liquidity</h3>
                                <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                            </div>
                        </div>
                        <!-- Feature Ends -->
                    </div>
                </div>
                <!-- Features Ends -->
                <!-- Video Starts -->
                <div class="col-md-4 ts-padding bg-image-1">
                    <div>
                        <div class="text-center">
                            {{-- <a class="button-video mfp-youtube" href="https://www.youtube.com/watch?v=0gv7OC9L2s8"></a> --}}
                        </div>
                    </div>
                </div>
                <!-- Video Ends -->
            </div>
        </div>
    </section>
    <!-- Features and Video Section Ends -->
    <!-- Pricing Starts -->
    <section class="pricing">
        <div class="container">
            <!-- Section Title Starts -->
            <div class="text-center row">
                <h2 class="title-head">affordable <span>packages</span></h2>
                <div class="title-head-subtitle">
                    <p>RISK FREE TRADING, FOR ALL THE PACKAGES</p>
                </div>
            </div>
            <!-- Section Title Ends -->
            <!-- Section Content Starts -->
            <div class="row pricing-tables-content">
                <div class="pricing-container">
                    <!-- Pricing Tables Starts -->
                    <ul class="pricing-list bounce-invert">
                        @foreach ($packages as $package)
                            <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #1 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>{{ $package->name }}</h2>

                                            <div class="price">
                                                <span class="value">{{ $package->percentage }}% Daily</span>
                                            </div>
                                            <h2><span>MIN: {{ currency_converter( $package->min_val) }}<br>MAX: {{ currency_converter( $package->max_val) }}<br>Capital accessible after investment
                                                    elapses<br>Growth Results</span></h2>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="{{ route('register') }}" class="btn btn-primary">INVEST</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #1 Ends -->
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Ends -->
    <!-- Quote and Chart Section Starts -->
    <section class="image-block2">
        <div class="container-fluid">
            <div class="row">
                <!-- Quote Starts -->
                <div class="col-md-4 img-block-quote bg-image-2">
                    <blockquote>
                        <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever,
                            anyone can send or receive any amount of money with anyone else, anywhere on the planet,
                            conveniently and without restriction. It’s the dawn of a better, more free world.</p>
                        <footer><img src="{{ asset('assets/images/ceo.jpg') }}" alt="ceo" /> <span>Marc Smith</span>
                            - CEO</footer>
                    </blockquote>
                </div>
                <!-- Quote Ends -->
                <!-- Chart Starts -->
                <!-- TradingView Widget BEGIN -->
                <div class="col-md-8 tradingview-widget-container">
                    <div id="tradingview_ceb8b"><iframe title="symbol overview TradingView widget" lang="en"
                            id="tradingview_1d126" frameborder="0" allowtransparency="true" scrolling="no"
                            src="https://s.tradingview.com/embed-widget/symbol-overview/?locale=en#%7B%22symbols%22%3A%5B%5B%22Bitcoin%22%2C%22COINBASE%3ABTCUSD%7C1M%22%5D%5D%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22calc(600px%20-%2032px)%22%2C%22colorTheme%22%3A%22dark%22%2C%22gridLineColor%22%3A%22%232a2e39%22%2C%22fontColor%22%3A%22%23787b86%22%2C%22chartType%22%3A%22area%22%2C%22lineColor%22%3A%22%231976d2%22%2C%22topColor%22%3A%22rgba(55%2C%20166%2C%20239%2C%200.15)%22%2C%22page-uri%22%3A%22thepipsgain.com%2Findex.php%22%2C%22utm_source%22%3A%22thepipsgain.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22symbol-overview%22%7D"
                            style="margin: 0px !important; padding: 0px !important; width: 100%; height: calc(568px);"></iframe>
                    </div>
                    <div class="tradingview-widget-copyright" style="width: 100%;"><a
                            href="https://www.tradingview.com/symbols/BTCUSD/?exchange=COINBASE&amp;utm_source=thepipsgain.com&amp;utm_medium=widget_new&amp;utm_campaign=symbol-overview"
                            rel="noopener" target="_blank"></a></div><a
                        href="https://www.tradingview.com/symbols/BTCUSD/?exchange=COINBASE" rel="noopener"
                        target="_blank">
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.MediumWidget({
                                "symbols": [
                                    [
                                        "Bitcoin",
                                        "COINBASE:BTCUSD|1M"
                                    ]
                                ],
                                "chartOnly": false,
                                "width": "100%",
                                "height": 600,
                                "locale": "en",
                                "colorTheme": "dark",
                                "gridLineColor": "#2a2e39",
                                "trendLineColor": "#1976d2",
                                "fontColor": "#787b86",
                                "underLineColor": "rgba(55, 166, 239, 0.15)",
                                "isTransparent": false,
                                "autosize": false,
                                "container_id": "tradingview_ceb8b"
                            });
                        </script>
                    </a>
                </div>
                <!-- TradingView Widget END -->
                <!-- Chart Ends -->
            </div>
        </div>
    </section>
    <!-- Quote and Chart Section Ends -->
    <!-- Call To Action Section Starts -->
    <section class="call-action-all">
        <div class="call-action-all-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Call To Action Text Starts -->
                        <div class="action-text">
                            <h2>Get Started Today With Cryptocurrency Investing</h2>
                            <p class="lead">Your investment manager will take care of everything. You do not have to make
                                decisions on where to invest or worry about when to buy and sell. Your manager will use
                                their professional knowledge and experience to invest your money in an individual portfolio
                                of investments, all carefully chosen to match your objectives, and manage it day to day.
                                Open account for free and start earning Cryptocurrencies!</p>
                        </div>
                        <!-- Call To Action Text Ends -->
                        <!-- Call To Action Button Starts -->
                        <p class="action-btn"><a class="btn btn-primary" href="{{ route('register') }}">Register Now</a>
                        </p>
                        <!-- Call To Action Button Ends -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section Ends -->
@endsection
