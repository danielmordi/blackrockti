@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Mining plans
@endsection

@section('content')
    <!-- Begin page -->
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Investment Plan</p>
                </div>
            </div>

            <!-- End::page-header -->

            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-md-4 col-sm-12">
                                <div class="card custom-card">
                                    <div class="card-header text-uppercase">
                                        <h2 class="card-title">{{ $package->name }}</h2>
                                    </div>
                                    <div class="p-0 card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="display-4" style="font-weight: 900">
                                                    {{ $package->hash_rate }} <br><small class="font-weight-bold">Daily ROI</small>
                                                </div>
                                            </li>
                                            {{-- <li class="list-group-item">
                                                Daily ROI <span style="float: right">{{ $package->hash_rate }}</span>
                                            </li> --}}
                                            <li class="list-group-item">
                                                Min <span style="float: right">${{ $package->min_val }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                Max <span style="float: right">${{ $package->max_val }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                Duration <span style="float: right">{{ $package->duration }} days</span>
                                            </li>
                                            <li class="list-group-item">FCA Approved</li>
                                            <li class="list-group-item">
                                                <a href="{{ route('user.deposit') }}"
                                                    class="btn btn-primary w-100 text-uppercase" style="letter-spacing: 1.4px">
                                                    Change Package
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@endsection
