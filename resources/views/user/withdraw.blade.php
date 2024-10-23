@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Withdraw
@endsection

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Withdraw</p>
                </div>
            </div>

            <!-- End::page-header -->

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div style="min-height: 300px">
                        <div class="card">
                            <div class="card-body">
                                <div class="mini-stat">
                                    <span class="mini-stat-icon me-0 float-end"><i class='bx bxs-wallet side-menu__icon'
                                            style="font-size: 35px"></i></span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-purple">{{ currency_converter(Auth::user()->totalProfitEarned) ?? 0 }}</span>
                                        Main Wallet Balance
                                    </div>
                                    <p class="mt-4 mb-0 text-muted">Daily ROI <span class="float-end">
                                            <i
                                                class='bx bx-caret-up side-menu__icon'></i>{{ $packages->percentage ?? '' }}%</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="mini-stat">
                                    <span class="mini-stat-icon bg-brown me-0 float-end">
                                        <i class='bx bxs-user side-menu__icon' style="font-size: 35px"></i>
                                    </span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-brown">{{ currency_converter(Auth::user()->bonus) ?? '0.00' }}</span>
                                        Bonus
                                    </div>
                                    <p class="mt-4 mb-0 text-muted">Total referral:
                                        {{ count(Auth::user()->referrals) ?? '0' }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card" style="min-height: 300px">
                        <div class="card-body">
                            <form action="{{ route('user.withdraw.store') }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label">Choose Coin</label>
                                    <select class="form-control select2" name="coin" required>
                                        <option disabled selected>Select</option>
                                        @foreach ($coins as $coin)
                                            <option value="{{ $coin->id }}">{{ $coin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Withdraw from(source)</label>
                                    <select class="form-control select2" name="withdraw_from" required>
                                        <option disabled selected>Select</option>
                                        {{-- <option value="totalProfitEarned">Daily profit balance</option> --}}
                                        <option value="bonus">Bonus</option>
                                        <option value="yield">Yield</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="wallet_id" class="form-label">Wallet id</label>
                                    <input type="text" name="wallet_id" value="{{ old('wallet_id') }}"
                                        class="form-control">
                                    <small>Please confirm that wallet address is correct. Funds sent to a wrong
                                        address cannot be
                                        <strong>Recovered</strong></small>
                                </div>
                                <div class="mb-2">
                                    <label for="amount" class="form-label">Withdrawal Amount</label>
                                    <input type="text" name="amount" value="{{ old('amount') }}" pattern="[0-9]+"
                                        placeholder="0.00" class="form-control">
                                </div>
                                <button type="submit" class="btn:s btn btn-primary text-uppercase">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <span class="card-title">Withdrawal History</span>
                </div>
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Details</th>
                                    <th scope="col">Requested On</th>
                                    <th scope="col">Wallet ID</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawals as $withdrawal)
                                <tr>
                                    <td scope="row">
                                        <span>Requested for {{ $withdrawal->amount }} worth of <strong>{{ $withdrawal->coin->name }}</strong></span>
                                    </td>
                                    <td>{{ $withdrawal->created_at->format('m/d/Y') }}</td>
                                    <td>{{ $withdrawal->wallet_id }}</td>
                                    <td><span class="badge bg-outline-info">{{ $withdrawal->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">{{ $withdrawals->links('pagination::bootstrap-4') }}</div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
@endsection
