@extends('layouts.app')

@section('title')
    User profile
@endsection

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="my-4 d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <p class="mb-0 fw-semibold fs-18">Bio Data</p>
                </div>
                <div class="mt-2 btn-list mt-md-0">
                    <a href="{{ route('admin.adminLoginAsUser', $user->id) }}" class="btn btn-primary btn-wave">
                        Login As user
                    </a>
                </div>
            </div>

            <!-- End::page-header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                {{ $user->name }}
                                <span class="badge bg-{{ $user->is_blocked != '1' ? 'success' : 'danger' }}">
                                    {{ $user->is_blocked != '1' ? 'Active' : 'Suspended' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-1 card-body">
                            <div class="d-flex justify-content-between">
                                <div class="float-right dropdown d-inline-block">
                                    <button type="button" class="btn header-item waves-effect noti-icon"
                                        id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                        <i class=" ion ion-md-more"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-131.892px, 72.0721px);"
                                        data-popper-placement="bottom-end">
                                        <!-- item-->
                                        <a class="dropdown-item"
                                            href="{{ Auth::user()->role_id = 2 ? route('admin.dashboard') : route('user.dashboard') }}">
                                            <i class="mdi mdi-view-dashboard me-2"></i>
                                            Dashboard</a>
                                        <a href="" class="dropdown-item"></a>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#myModal">
                                            <i class="mdi mdi-update me-2"></i> Update Account Balance
                                        </button>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#upgrade_package">
                                            <i class="mdi mdi-package-up me-2"></i> Upgrade Package
                                        </button>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#send_mail">
                                            <i class="mdi mdi-email-plus me-2"></i> Send email
                                        </button>
                                        <form action="{{ route('admin.block-user', $user->id) }}" method="post">
                                            @csrf @method('PATCH')
                                            @if ($user->is_blocked == '1')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="mdi mdi-block-helper me-2"></i> Unblock user
                                                </button>
                                            @else
                                                <button type="submit" class="dropdown-item">
                                                    <i class="mdi mdi-block-helper me-2"></i> Block user
                                                </button>
                                            @endif
                                        </form>
                                        <form action="{{ route('admin.delete-user', $user->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <i class="mdi mdi-trash-can me-2"></i> Delete user
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                {{-- Account balance Modal --}}
                                <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="mt-0 modal-title" id="myModalLabel">Update Account Balance</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" style="display: " class="hideInput">
                                                <div class="modal-body">
                                                    @csrf @method('PATCH')
                                                    <div id="updateAlert"></div>
                                                    <div class="mb-2">
                                                        <label for="choose">Choose balance to credit/debit</label>
                                                        <select name="from" id="from" class="form-select">
                                                            <option value="" selected disabled>Choose</option>
                                                            <option value="total_profit">Deposit</option>
                                                            <option value="bonus">Bonus</option>
                                                            <option value="totalProfitEarned ">Profit earned</option>
                                                            <option value="token">Token</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="choose">Choose Transaction type</label>
                                                        <select name="typeOfTransaction" id="typeOfTransaction"
                                                            class="form-select">
                                                            <option value="" selected disabled>Choose</option>
                                                            <option value="credit">Credit</option>
                                                            <option value="debit">Debit</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="value">Amount</label>
                                                        <input type="text" name="value" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    <button class="btn btn-primary" type="submit" id="update">Save
                                                        changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>

                                {{-- Upgrade package Modal --}}
                                <div id="upgrade_package" class="modal fade" tabindex="-1"
                                    aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="mt-0 modal-title" id="myModalLabel">Update Account Balance</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" style="display: " class="hideInput">
                                                <div class="modal-body">
                                                    @csrf @method('PATCH')
                                                    <div id="updateAlert"></div>
                                                    <div class="mb-2">
                                                        <label for="package">Choose package</label>
                                                        <select name="package" class="text-white form-select"
                                                            id="">
                                                            @foreach ($packages as $package)
                                                                <option value="{{ $package->id }}"
                                                                    {{ $package->name == $user->package ? 'selected' : '' }}>
                                                                    {{ $package->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    <button class="btn btn-primary" type="submit" id="packageBtn">Save
                                                        changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>

                                {{-- Send mail Modal --}}
                                <div id="send_mail" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="mt-0 modal-title" id="myModalLabel">Send mail</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" style="display: " class="hideInput">
                                                <div class="modal-body">
                                                    @csrf
                                                    <div id="sentAlert"></div>
                                                    <div id="mail_sent" class="text-center text-success d-none"
                                                        style="font-size: 8em">
                                                        <i class="mdi mdi-email-send"></i>
                                                    </div>
                                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                                    <div class="mb-2">
                                                        <input type="text" name="subject"
                                                            class="bg-white form-control" placeholder="Subject">
                                                    </div>
                                                    <div class="mb-2">
                                                        <textarea name="msg" id="editor" placeholder="Email body" style="color: #000 !important"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    <button class="btn btn-primary" type="submit" id="sendemail">Send
                                                        mail
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($user->kyc != '')
                                <div class="mb-3 d-flex img_preview" style="max-width: 350px">
                                    <img src="{{ asset('storage/' . $user->kyc) }}" alt="ID" class="img-fluid"
                                        style="width:100px;">
                                    <div class="p-1 align-self-end d-flex flex-column">
                                        <a href="{{ asset('storage/' . $user->kyc) }}"
                                            data-lightbox="{{ $user->username }}"
                                            class="mb-1 btn btn-sm btn-primary">View ID</a>
                                        <form action="{{ route('admin.verify') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="uid" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-sm btn-success">Verify
                                                Account</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            @livewire('admin.update-user-account-details', ['user' => $user, 'packages' => $packages])
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Account Transaction History</div>
                        </div>
                        <div class="p-1 card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#notify" role="tab">
                                        <span class="d-none d-md-block">Notification</span><span class="d-block d-md-none">
                                            <i class='side-menu__icon bx bxs-bell'></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#home1" role="tab">
                                        <span class="d-none d-md-block">Deposit</span><span class="d-block d-md-none">
                                            <i class='side-menu__icon bx bxs-bank'></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                        <span class="d-none d-md-block">Withdrawals</span><span class="d-block d-md-none">
                                            <i class='side-menu__icon bx bx-money-withdraw'></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
        
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="p-3 tab-pane active table-responsive" id="notify" role="tabpanel">
                                    <table class="table">
                                        <thead>
                                            <th class="text-nowrap">TYPE</th>
                                            <th class="text-nowrap">DESCRIPTION</th>
                                            <th class="text-nowrap">AMOUNT</th>
                                            <th class="text-nowrap">STATUS</th>
                                            <th class="text-nowrap">DATE</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $t)
                                                <tr class="text-nowrap">
                                                    <td class="text-uppercase">{{ $t->type }}</td>
                                                    <td>{{ $t->description }}</td>
                                                    <td>{{ $t->amount }}</td>
                                                    <td>
                                                        <div
                                                            class="badge bg-{{ $t->status == 'completed' ? 'success' : 'danger' }}">
                                                            {{ $t->status }}
                                                        </div>
                                                    </td>
                                                    <td>{{ $t->created_at->toDayDateTimeString() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $transactions->links('pagination::bootstrap-4') }}
                                </div>
                                <div class="p-3 tab-pane table-responsive" id="home1" role="tabpanel">
                                    <table class="table table-striped table-inverse table-responsive">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th class="text-nowrap">Date</th>
                                                <th class="text-nowrap">Package</th>
                                                <th class="text-nowrap">Amount</th>
                                                <th class="text-nowrap">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deposits as $d)
                                                <tr class="text-nowrap">
                                                    <td scope="row">{{ $d->created_at->format('d-M-Y') }}</td>
                                                    <td>{{ $d->amount }}</td>
                                                    <td>{{ $d->amount }}</td>
                                                    <td>{{ $d->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 tab-pane table-responsive" id="profile1" role="tabpanel">
                                    <table class="table table-striped table-inverse table-responsive">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th class="text-nowrap">Date</th>
                                                <th class="text-nowrap">Coin</th>
                                                <th class="text-nowrap">From</th>
                                                <th class="text-nowrap">Wallet ID</th>
                                                <th class="text-nowrap">Amount</th>
                                                <th class="text-nowrap">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($withdrawals as $w)
                                                <tr class="text-nowrap">
                                                    <td scope="row">{{ $w->created_at->format('d-M-Y') }}</td>
                                                    <td>{{ $w->coin->name ?? '' }}</td>
                                                    <td>{{ $w->withdraw_from }}</td>
                                                    <td>{{ $w->wallet_id }}</td>
                                                    <td>{{ $w->amount }}</td>
                                                    <td>{{ $w->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        
                        </div>
        
                    </div>
                </div>
            </div>

            
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@endsection

@push('scripts')
    <script>
        lightbox.option({
            'resizeDuration': 250,
            'wrapAround': true
        })
    </script>
@endpush
