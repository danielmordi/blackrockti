@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Dashboard
@endsection

<style>
    .tradingview-widget-container {
        height: 50vh !important;
    }
</style>

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Welcome back, {{ Auth::user()->name }},</p>
                    <span class="fs-semibold text-muted">Track your Investment, activity, charts here.</span>
                </div>
                <div class="mt-2 btn-list mt-md-0">
                    <a href="{{ route('user.deposit') }}" class="btn btn-primary btn-wave">
                        <i class="align-middle ri-filter-3-fill me-2 d-inline-block"></i>Deposit
                    </a>
                    <a href="{{ route('user.withdraw') }}" class="btn btn-outline-secondary btn-wave">
                        <i class="align-middle ri-upload-cloud-line me-2 d-inline-block"></i>Transfer
                    </a>
                </div>
            </div>

            <!-- End::page-header -->

            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="flex-wrap d-md-flex d-block align-items-center justify-content-between">
                                <div class="flex-fill">
                                    <ul class="nav nav-pills nav-style-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#stocks-portfolio"
                                                aria-selected="true">Portfolio</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex-wrap gap-4 mt-3 d-flex align-items-center mt-md-0 justify-content-evenly">
                                    <div class="text-md-end">
                                        <span class="d-block fw-semibold">Total Value</span>
                                        <span
                                            class="text-primary">{{ currency_converter(Auth::user()->total_value) ?? 0 }}</span>
                                    </div>
                                    <div class="text-md-end">
                                        <span class="d-block fw-semibold">Market Value</span>
                                        <span
                                            class="text-warning">{{ currency_converter(Auth::user()->market_value) ?? 0 }}</span>
                                    </div>
                                    <div class="text-md-end">
                                        <span class="d-block fw-semibold">Yield</span>
                                        <span class="text-danger">{{ currency_converter(Auth::user()->yield) ?? 0 }}</span>
                                    </div>
                                    <div class="text-md-end">
                                        <span class="d-block fw-semibold">Dividend</span>
                                        <span class="text-info">{{ currency_converter(Auth::user()->dividend) ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End::row-1 -->

            <!-- Start::row-2 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content">
                        <div class="p-0 border-0 tab-pane show active" id="stocks-portfolio" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="flex-wrap gap-3 d-flex align-items-top justify-content-between">
                                                <div class="mb-4 flex-fill d-flex align-items-top mb-sm-0">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-rounded bg-primary">
                                                            <i class="ti ti-wallet fs-16"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block text-muted">Amount Invested</span>
                                                        <span
                                                            class="fs-16 fw-semibold">{{ Auth::user()->deposit == null ? currency_converter(0) : currency_converter(Auth::user()->total_profit) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="flex-wrap gap-3 d-flex align-items-top justify-content-between">
                                                <div class="mb-4 flex-fill d-flex align-items-top mb-sm-0">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-rounded bg-secondary">
                                                            <i class="ti ti-arrow-big-up-line fs-16"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block text-muted">Profits</span>
                                                        <span
                                                            class="fs-16 fw-semibold">{{ Auth::user()->withdrawal == null ? currency_converter(0) : currency_converter(Auth::user()->withdrawal->amount) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="flex-wrap gap-3 d-flex align-items-top justify-content-between">
                                                <div class="mb-4 flex-fill d-flex align-items-top mb-sm-0">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-rounded bg-warning">
                                                            <i class="ti ti-wallet fs-16"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block text-muted">Referral balance</span>
                                                        <span
                                                            class="fs-16 fw-semibold">{{ currency_converter(Auth::user()->bonus) ?? '0.00' }}<i
                                                                class="ti ti-arrow-narrow-up ms-1 text-success"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="flex-wrap gap-3 d-flex align-items-top justify-content-between">
                                                <div class="mb-4 flex-fill d-flex align-items-top mb-sm-0">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-rounded bg-success">
                                                            <i class="ti ti-wallet fs-16"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="d-block text-muted">Return Rate</span>
                                                        <span
                                                            class="fs-16 fw-semibold">+{{ $package == null ? 0 : $package->percentage }}%
                                                            @if ($package != null)
                                                                <i class="ti ti-arrow-narrow-up ms-1 text-success"></i>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="mb-2 card-title mb-sm-0">
                                                Total Investments
                                            </div>
                                        </div>
                                        <div class="p-0 card-body">
                                            <!-- TradingView Widget BEGIN -->
                                            <div class="tradingview-widget-container">
                                                <div class="tradingview-widget-container__widget"></div>
                                                <div class="tradingview-widget-copyright"><a
                                                        href="https://www.tradingview.com/" rel="noopener nofollow"
                                                        target="_blank"><span class="blue-text">Track all markets on
                                                            TradingView</span></a></div>
                                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js"
                                                    async>
                                                    {
                                                        "symbols": [
                                                            [
                                                                "BITSTAMP:BTCUSD|1M"
                                                            ],
                                                            [
                                                                "BINANCE:SOLUSDT|1M"
                                                            ],
                                                            [
                                                                "COINBASE:ETHUSD|1M"
                                                            ],
                                                            [
                                                                "BINANCE:XRPUSDT|1M"
                                                            ]
                                                        ],
                                                        "chartOnly": false,
                                                        "width": "100%",
                                                        "height": "100%",
                                                        "locale": "en",
                                                        "colorTheme": "dark",
                                                        "autosize": true,
                                                        "showVolume": false,
                                                        "showMA": false,
                                                        "hideDateRanges": false,
                                                        "hideMarketStatus": false,
                                                        "hideSymbolLogo": false,
                                                        "scalePosition": "right",
                                                        "scaleMode": "Normal",
                                                        "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                                                        "fontSize": "10",
                                                        "noTimeScale": false,
                                                        "valuesTracking": "1",
                                                        "changeMode": "price-and-percent",
                                                        "chartType": "candlesticks",
                                                        "maLineColor": "#2962FF",
                                                        "maLineWidth": 1,
                                                        "maLength": 9,
                                                        "lineType": 0,
                                                        "dateRanges": [
                                                            "1d|1",
                                                            "1m|30",
                                                            "3m|60",
                                                            "12m|1D",
                                                            "60m|1W",
                                                            "all|1M"
                                                        ],
                                                        "upColor": "#22ab94",
                                                        "downColor": "#f7525f",
                                                        "borderUpColor": "#22ab94",
                                                        "borderDownColor": "#f7525f",
                                                        "wickUpColor": "#22ab94",
                                                        "wickDownColor": "#f7525f"
                                                    }
                                                </script>
                                            </div>
                                            <!-- TradingView Widget END -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                My Portfolio
                                            </div>
                                        </div>
                                        <div class="p-0 card-body">
                                            <!-- TradingView Widget BEGIN -->
                                            <div class="tradingview-widget-container">
                                                <div class="tradingview-widget-container__widget"></div>
                                                <div class="tradingview-widget-copyright"><a
                                                        href="https://www.tradingview.com/" rel="noopener nofollow"
                                                        target="_blank"><span class="blue-text">Track all markets on
                                                            TradingView</span></a></div>
                                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                                                    async>
                                                    {
                                                        "colorTheme": "light",
                                                        "dateRange": "12M",
                                                        "showChart": false,
                                                        "locale": "en",
                                                        "width": "100%",
                                                        "height": "100%",
                                                        "largeChartUrl": "",
                                                        "isTransparent": true,
                                                        "showSymbolLogo": true,
                                                        "showFloatingTooltip": false,
                                                        "tabs": [{
                                                            "title": "Crypto",
                                                            "symbols": [{
                                                                    "s": "BITSTAMP:BTCUSD",
                                                                    "d": "btc"
                                                                },
                                                                {
                                                                    "s": "BITSTAMP:ETHUSD",
                                                                    "d": "eth"
                                                                },
                                                                {
                                                                    "s": "COINBASE:SOLUSD",
                                                                    "d": "sol"
                                                                },
                                                                {
                                                                    "s": "COINBASE:LTCUSD",
                                                                    "d": "ltc"
                                                                },
                                                                {
                                                                    "s": "COINBASE:MATICUSD",
                                                                    "d": "matic"
                                                                },
                                                                {
                                                                    "s": "BINANCE:BNBUSD",
                                                                    "d": "bnb"
                                                                }
                                                            ]
                                                        }]
                                                    }
                                                </script>
                                            </div>
                                            <!-- TradingView Widget END -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End::row-2 -->

        </div>

    </div>
@endsection
