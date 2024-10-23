@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Admin Dashboard
@endsection

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Welcome back, {{ Auth::user()->name }},</p>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">All Users</div>
                </div>
                <div class="card-body">
                    @livewire('users-table')
                </div>
            </div>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@endsection
