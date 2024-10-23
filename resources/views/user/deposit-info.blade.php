@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Payment information
@endsection

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Deposit Receipt</p>
                </div>
            </div>

            <!-- End::page-header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">{{ config('app.name') }} deposit
                                information </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Steps to follow</h5>
                                    <ul style="list-style-type:  disc !important">
                                        <li style="list-style-type:  disc !important">
                                            Make payment by scanning the QR code on the screen with your bitcoin
                                            wallet or copy the
                                            wallet ID on
                                            the screen then make payment from your blockchain wallet.
                                        </li>
                                        <li class="my-1" style="list-style-type:  disc !important">
                                            Click the confirm button after the deposit has been completed.
                                        </li>
                                        <li style="list-style-type:  disc !important">
                                            Your deposit will be automatically confirmed, once your payment has been
                                            received.
                                        </li>
                                    </ul>
                                    <div class="py-2 table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td><span class="text-warning">Amount</span></td>
                                                <td>
                                                    <p style="font-size: 1.2em; letter-spacing:1.5px; font-weight: bolder"
                                                        class="mb-2 text-left text-uppercase">
                                                        {{ currency_converter($currentDeposit->amount) }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-warning">Package</span></td>
                                                <td>
                                                    <p style="font-size: 1.2em; letter-spacing:1.5px; font-weight: bolder"
                                                        class="mb-2 text-uppercase">
                                                        {{ $currentDeposit->package->name }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-warning">Status</span></td>
                                                <td>
                                                    <p style="font-size: 1.2em; letter-spacing:1.5px; font-weight: bolder"
                                                        class="mb-2 text-uppercase">{{ $currentDeposit->status }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-warning">Wallet Address</span></td>
                                                <td class="d-flex justify-content-between">
                                                    {{ $currentDeposit->coin->wallet_id }}
                                                    <button data-clipboard-text="{{ $currentDeposit->coin->wallet_id }}"
                                                        id="copyWalletAddress" class="ml-4 btn btn-primary btn-sm">
                                                        <i class="fas fa-copy"></i> Copy
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="p-4" id="walletAddressQrCode"></div>
                                        <a href="/account" class="btn w-50 btn-block btn-teal"
                                            onclick="alert('Completed, please wait while your request is been processed.')">Complete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- container-fluid -->
    </div>
@endsection

@push('scripts')
    <script>
        var el = kjua({
            text: "{{ $currentDeposit->coin->wallet_id }}"
        });
        document.querySelector('#walletAddressQrCode').appendChild(el);
    </script>

    <script>
        var btn = document.getElementById('copyWalletAddress');
        var clipboard = new ClipboardJS(btn);

        clipboard.on('success', function(e) {
            console.log(e);
        });

        clipboard.on('error', function(e) {
            console.log(e);
        });

        btn.addEventListener('click', function() {
            btn.innerHTML = 'Copied!'
        })
    </script>
@endpush
