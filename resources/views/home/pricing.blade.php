@extends('layouts.home.index')

@section('content')
    <!-- Banner Area Starts -->
		<section class="banner-area">
			<div class="banner-overlay">
				<div class="banner-text text-center">
					<div class="container">
						<!-- Section Title Starts -->
						<div class="row text-center">
							<div class="col-xs-12">
								<!-- Title Starts -->
								<h2 class="title-head">Our <span>Prices</span></h2>
								<!-- Title Ends -->
								<hr>
								<!-- Breadcrumb Starts -->
								<ul class="breadcrumb">
									<li><a href="index.html"> home</a></li>
									<li>pricing</li>
								</ul>
								<!-- Breadcrumb Ends -->
							</div>
						</div>
						<!-- Section Title Ends -->
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Area Ends -->
        <!-- Pricing Starts -->
        <section class="pricing">
            <div class="container">
                <!-- Section Content Starts -->
                <!-- Section Title Starts -->
				<div class="row text-center">
                    <h2 class="title-head">affordable <span>packages</span></h2>
                    <div class="title-head-subtitle">
                        <p>Risk free trading, for all the packages</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <div class="row pricing-tables-content pricing-page">
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
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
			<div class="call-action-all-overlay">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- Call To Action Text Starts -->
							<div class="action-text">
								<h2>Get Started Today With Bitcoin</h2>
								<p class="lead">Open account for free and start trading Bitcoins!</p>
							</div>
							<!-- Call To Action Text Ends -->
							<!-- Call To Action Button Starts -->
							<p class="action-btn"><a class="btn btn-primary" href="register">Register Now</a></p>
							<!-- Call To Action Button Ends -->
						</div>
					</div>
				</div>
			</div>
        </section>
        <!-- Call To Action Section Ends -->
@endsection