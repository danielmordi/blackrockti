@extends('layouts.home.index')

@section('content')
    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="banner-overlay">
            <div class="text-center banner-text">
                <div class="container">
                    <!-- Section Title Starts -->
                    <div class="text-center row">
                        <div class="col-xs-12">
                            <!-- Title Starts -->
                            <h2 class="title-head">About <span>Us</span></h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="index.html"> home</a></li>
                                <li>About</li>
                            </ul>
                            <!-- Breadcrumb Ends -->
                        </div>
                    </div>
                    <!-- Section Title Ends -->
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area Starts -->
    <!-- About Section Starts -->
    <section class="about-page">
        <div class="container">
            <!-- Section Content Starts -->
            <div class="row about-content">
                <!-- Image Starts -->
                <div class="text-center col-sm-12 col-md-5 col-lg-6">
                    <img id="about-us" class="img-responsive img-about-us" src="{{ asset('assets/images/about-us.png') }}" alt="about us">
                </div>
                <!-- Image Ends -->
                <!-- Content Starts -->
                <div class="col-sm-12 col-md-7 col-lg-6">
                    <div class="feature-about">
                        <h3 class="title-about">WE ARE {{ config('app.name') }}</h3>
                        <p>
                            {{ config('app.name') }} is a global online broker that provides financial services for a range of financial instruments, such as shares, stocks, ETFs, options, and cryptocurrency currencies. {{ config('app.name') }} is the product of the combined wisdom of a number of seasoned financial advisors and expert traders with years of expertise and in-depth understanding of managed account and FX trading markets. The company provides profitable and transparent services. {{ config('app.name') }} was founded purely to make sure that everyone has knowledge of investments, and as a result, we make sure that everyone who comes into contact with us has a real experience with the investment market. Our goal is to assist others in realising their life goals; we take advantage of the chance to assist others and are deeply committed to doing so.
                        </p>
                        <p>
                            No matter where you live in the world, you can feel secure knowing that your money is 100% guaranteed when you become a member of {{ config('app.name') }}. With {{ config('app.name') }}, the American Securities and Investments Commission unconditionally guarantees 100% of all deposits. With its own funds and legitimate partners We conduct investing activities all over the world, adhering carefully to the principles of legality and sound business organisation.
                        </p>
                        <p>
                            Because they both recognise the value of utilising the most efficient investment mechanism created by our company, both inexperienced and seasoned foreign currency market players now employ the management company's services. We would like to work with each investment in a constructive and long-term manner. Simply register an account with us to start enjoying the benefits we have to offer, and we'll make sure to deliver excellent work and a high degree of return. As a top online financial services company today, we pride ourselves on providing the technologically savvy trader and investor with an exceptional experience supported by individualised professional advice. The Company also has the best-rated stock plan administration platform in the industry and a cutting-edge custody platform for advisors.

                        </p>
                    </div>
                    <a class="btn btn-primary btn-services" href="services">Our services</a>
                </div>
                <!-- Content Ends -->

            </div>
            <!-- Section Content Ends -->
        </div><!--/ Content row end -->
    </section>
    <!-- About Section Ends -->
    <!-- Facts Section Starts -->
    <section class="facts">
        <!-- Container Starts -->
        <div class="container">
            <!-- Fact Badges Starts -->
            <div class="text-center row facts-content">
                <div class="text-center heading-facts">
                    <h2>{{ config('app.name') }}<span> numbers</span></h2>
                    <p>leading cryptocurrency exchange since day one of Bitcoin distribution</p>
                </div>
                <!-- Fact Badge Item Starts -->
                <div class="col-xs-12 col-md-3 col-sm-6 fact">
                    <h3>$77.45B</h3>
                    <h4>market cap</h4>
                </div>
                <!-- Fact Badge Item Ends -->
                <!-- Fact Badge Item Starts -->
                <div class="col-xs-12 col-md-3 col-sm-6 fact fact-clear">
                    <h3>165k</h3>
                    <h4>daily transactions</h4>
                </div>
                <!-- Fact Badge Item Ends -->
                <!-- Fact Badge Item Starts -->
                <div class="col-xs-12 col-md-3 col-sm-6 fact">
                    <h3>1726</h3>
                    <h4>active accounts</h4>
                </div>
                <!-- Fact Badge Item Ends -->
                <!-- Fact Badge Item Starts -->
                <div class="col-xs-12 col-md-3 col-sm-6">
                    <h3>17</h3>
                    <h4>years on the market</h4>
                </div>
                <!-- Fact Badge Item Ends -->
                <div class="col-xs-12 buttons">
                    <a class="btn btn-primary btn-pricing" href="pricing">See pricing</a>
                    <span class="or"> or </span>
                    <a class="btn btn-primary btn-register" href="register">Register Now</a>
                </div>
            </div>
            <!-- Fact Badges Ends -->
        </div>
        <!-- Container Ends -->
    </section>
    <!-- facts Section Ends -->
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
