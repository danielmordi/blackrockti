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
                            <h2 class="title-head">our <span>services</span></h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="index.html"> home</a></li>
                                <li>services</li>
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
    <!-- Section Services Starts -->
    <section class="services">
        <div class="container">
            <div class="row">
                <!-- Service Box Starts -->
                <div class="col-md-6 service-box">
                    <div>
                        <img id="add-bitcoins" src="{{ asset('assets/images/icons/orange/add-bitcoins.png') }}" alt="add bitcoins">
                        <div class="service-box-content">
                            <h3>Bitcoin Trading</h3>
                            <p>
                                We have put together a team of experts, advisors and expireienced traders to ensure that we have a vast team of expert traders.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Service Box Ends -->
                <!-- Service Box Starts -->
                <div class="col-md-6 service-box">
                    <div>
                        <img id="payment-options" src="{{ asset('assets/images/icons/orange/payment-options.png') }}" alt="payment options" />
                        <div class="service-box-content">
                            <h3>Bitcoin Investment</h3>
                            <p>
                                We have created different investment plans to suite every class and risk appetite in the investing world to ensure tha no one is left out.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Service Box Ends -->

            </div>
        </div>
    </section>
    <!-- Section Services Ends -->
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
