@extends('layouts.app')

@section('title')
    Withdrawal logs
@endsection

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Withdrawal Request Logs</p>
                </div>
            </div>

            <!-- End::page-header -->

            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-counter">
                            <thead class="text-uppercase">
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Coin</th>
                                <th>Wallet Address</th>
                                <th>Withdraw from</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($withdrawalogs as $log)
                                    <tr>
                                        <td>{{ $log->user->name }}</td>
                                        <td>{{ $log->amount }}</td>
                                        <td>{{ $log->coin->name ?? '' }}</td>
                                        <td>{{ $log->wallet_id }}</td>
                                        <td>{{ $log->withdraw_from == 'hashing_fee' ? 'Profits' : $log->withdraw_from }}
                                        </td>
                                        <td>
                                            <div style="letter-spacing: 1.3px"
                                                class="text-uppercase font-weight-bolder badge bg-orange">
                                                {{ $log->status }}</span>
                                        </td>
                                        <td>{{ $log->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.confirmWithdrawal', $log->id) }}"
                                                class="btn btn-primary btn-sm">Confirm</a>
                                            <a href="{{ route('admin.cancelWithdrawal', $log->id) }}"
                                                class="btn btn-danger btn-sm">Cancel</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
