@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Deposit
@endsection

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Deposit</p>
                </div>
                <div class="mt-2 btn-list mt-md-0">
                    <button type="button" class="btn btn-primary btn-wave" data-bs-toggle="modal" data-bs-target="#reinvest">
                        <i class="align-middle ri-filter-3-fill me-2 d-inline-block"></i>Reinvest
                    </button>
                </div>
            </div>

            <!-- End::page-header -->

            <!-- sample modal content -->
            <div id="reinvest" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {{-- <div class="modal-header">
                            <h5 class="mt-0 modal-title" id="myModalLabel">Reinvest from Account balance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> --}}
                        <div class="modal-body">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <h5 class="card-title" id="myModalLabel">Reinvest from Account balance</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="p-1 card-body">
                                    <h6>Current Account balance: {{ Auth::user()->wallet_balance }}</h6>
                                    <div id="reinvestAlert"></div>
                                    <form action="{{ route('user.reinvest') }}" method="post">
                                        @csrf
                                        <div class="mb-2">
                                            <label class="form-label">Choose Package</label>
                                            <select name="package"
                                                class="form-control select2
                                         @error('package') is-invalid @enderror"
                                                required>
                                                <option value="">Select</option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                @endforeach
                                            </select>
                                            <strong id="pckgAlert" class="text-danger"></strong>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Choose a coin</label>
                                            <select name="coin"
                                                class="form-control select2
                                         @error('coin') is-invalid @enderror"
                                                required>
                                                <option value="">Select</option>
                                                @foreach ($coins as $coin)
                                                    <option value="{{ $coin->id }}">{{ $coin->name }}</option>
                                                @endforeach
                                            </select>
                                            <strong id="coinAlert" class="text-danger"></strong>
                                        </div>
                                        <div class="mb-2">
                                            <label for="deposit_amount" class="form-label">Deposit Amount</label>
                                            <input type="text" name="deposit_amount"
                                                pattern="^(\d*\.?\d+|\d{1,3}(,\d{3})*(\.\d+)?)$" placeholder="0.00"
                                                class="form-control @error('deposit_amount') is-invalid @enderror" required
                                                value="{{ preg_replace('/[^0-9.]/', '', Auth::user()->wallet_balance) }}"
                                                readonly>
                                            <small>You can only reinvest {{ Auth::user()->wallet_balance }}</small>
                                            <strong id="depositgAlert" class="text-danger"></strong>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="reinvestBtn">Reinvest</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <span class="card-title">Deposit instructions</span>
                        </div>
                        <div class="p-0 card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b class="text-warning">Step 1 </b>
                                    <span>Choose your plan</span>
                                </li>
                                <li class="list-group-item">
                                    <b class="text-warning">Step 2 </b>
                                    <span>Add the amount you wish to deposit.</span>
                                </li>
                                <li class="list-group-item">
                                    <b class="text-warning">Step 3 </b>
                                    <span>Then click on submit.
                                        <br> <b>Please Note:</b> your deposit will take 5 - 15mins for confirmation
                                        before reflecting on
                                        your dashboard.
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <span class="card-title">Add Funds to your wallet</span>
                        </div>
                        <div class="card-body">
                            @if (session('failed'))
                                <div class="alert alert-danger">
                                    {{ session('failed') }}
                                </div>
                            @endif
                            <form action="{{ route('user.deposit.store') }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label">Choose Package</label>
                                    <select name="package"
                                        class="form-control select2
                                 @error('package') is-invalid @enderror">
                                        <option>Select</option>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('package')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Choose a coin</label>
                                    <select name="coin"
                                        class="form-control select2
                                 @error('coin') is-invalid @enderror">
                                        <option>Select</option>
                                        @foreach ($coins as $coin)
                                            @if (old('coin'))
                                                <option value="{{ $coin->id }}" selected>{{ $coin->name }}
                                                </option>
                                            @else
                                                <option value="{{ $coin->id }}" {{ old('coin') }}
                                                    {{ old('coin') == $coin->id ? 'selected' : '' }}>
                                                    {{ $coin->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('coin')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="deposit_amount" class="form-label">Deposit Amount</label>
                                    <input type="text" name="deposit_amount"
                                        pattern="^(\d*\.?\d+|\d{1,3}(,\d{3})*(\.\d+)?)$" placeholder="0.00"
                                        class="form-control
                                 @error('deposit_amount') is-invalid @enderror"
                                        value="{{ old('deposit_amount') }}">
                                    @error('deposit_amount')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="mt-2 btn:s btn btn-primary text-uppercase">submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Deposit History
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="my-1 list-unstyled">
                                @foreach ($logs as $log)
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 fw-semibold">
                                                        {{ $log->created_at->format('m-d-Y') ?? '' }}</p>
                                                    <p class="mb-0 text-muted fs-12">You deposited
                                                        {{ $log->amount ?? '' }} worth of {{ $log->coin->name ?? '' }}
                                                        using ****9808
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-0 fw-semibold text-success">
                                                    {{ $log->amount ?? '' }} <span class="text-default">-
                                                        {{ $log->coin->name ?? '' }}</span>
                                                </p>
                                                <p class="mb-0 op-7 text-muted fs-11">
                                                    {{ strtoupper($log->package->name ?? '') }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            {{ $logs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('includes.script')

    <script>
        $(document).ready(function() {
            $("#reinvestBtn").click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                if ($('input[name="deposit_amount"]').val() == '') {
                    $('#depositgAlert').html('<br>Deposit amount is required!');
                    return false;
                }

                if ($('select[name="coin"]').val() == '') {
                    $('#coinAlert').html('Coin field is required!');
                    return false;
                }

                if ($('select[name="package"]').val() == '') {
                    $('#pckgAlert').html('package field is required!');
                    return false;
                }

                let formData = {
                    amount: $('input[name="deposit_amount"]').val(),
                    coin_id: $('select[name="coin"]').val(),
                    package_id: $('select[name="package"]').val(),
                };

                let type = 'POST';
                let url = 'reinvest';

                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $("#reinvestAlert").removeClass('text-danger mb-2');
                        $("#reinvestAlert").addClass('text-success mb-2');
                        $("#reinvestAlert").html(response);
                        // setTimeout(function () {
                        //   $("#success").hide().html('');
                        //   location.reload();
                        // }, 1000);
                    },
                    error: function(response) {
                        console.log(response.responseJSON);
                        $("#reinvestAlert").addClass('text-danger');
                        $("#reinvestAlert").html(response.responseJSON);
                    }
                });
            });
        });
    </script>
@endsection
