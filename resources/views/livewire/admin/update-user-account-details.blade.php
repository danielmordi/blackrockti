<div>
    <div class="row">
        @if (!$showEditForm)
            <div class="col-md-12">
                <div>
                    {{-- Display alert --}}
                    @if (session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table mb-3 table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Username</td>
                                <td style="word-break: break-all">{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Name</td>
                                <td style="word-break: break-all">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Email</td>
                                <td style="word-break: break-all">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Amount Invested</td>
                                <td style="word-break: break-all">{{ $user->deposit == null ? currency_converter(0) : currency_converter($user->deposit->amount) }}</td>
                            </tr>
                            {{-- <tr>
                                <td class="text-uppercase font-weight-bold">Amount Withdrawn</td>
                                <td style="word-break: break-all">{{ $user->withdrawal == null ? currency_converter(0) : currency_converter($user->withdrawal->amount) ?? 0 }}</td>
                            </tr> --}}
                            <tr>
                                <td class="text-uppercase font-weight-bold">Profit</td>
                                <td style="word-break: break-all">{{ currency_converter($user->totalProfitEarned) }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Referral Balance</td>
                                <td style="word-break: break-all">{{ currency_converter($user->bonus) ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Investment Package</td>
                                <td style="word-break: break-all">{{ $get_package == null ? '' : $get_package->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Total Value</td>
                                <td style="word-break: break-all">{{ currency_converter($user->total_value) }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Market Value</td>
                                <td style="word-break: break-all">{{ currency_converter($user->market_value) }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Yield</td>
                                <td style="word-break: break-all">{{ currency_converter($user->yield) }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase font-weight-bold">Dividend</td>
                                <td style="word-break: break-all">{{ currency_converter($user->dividend) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" wire:click='toggleEditForm' class="mx-2 my-2 btn btn-primary">Edit
                        Account</button>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Edit user's account balance</div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('error'))
                            <div class="alert alert-success">
                                {!! session('error') !!}
                            </div>
                        @endif
                        <form wire:submit.prevent='updateUserAccount'>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Amount Invested" wire:model='amt_invested'>
                                <label for="floatingInput">Amount Invested</label>
                                @error('amt_invested')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Amount Withdrawn" wire:model='amt_withdrawn'>
                                <label for="floatingInput">Referral Balance</label>
                                @error('amt_withdrawn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Portfolio Value" wire:model='portfolio_value'>
                                <label for="floatingInput">Profit</label>
                                @error('portfolio_value')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Token Balance" wire:model='token_balance'>
                                <label for="floatingInput">Token Balance</label>
                            </div> --}}
                            <div class="mb-3 form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" wire:model='package'>
                                    <option selected>Choose package</option>
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->id }}"
                                            {{ $package->name == $user->package ? 'selected' : '' }}>
                                            {{ $package->name }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Investment Package</label>
                                @error('package')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Withdrawn Limit" wire:model='withdrawal_limit'>
                                <label for="floatingInput">Withdrawn Limit</label>
                                @error('withdrawal_limit')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Total value" wire:model='total_value'>
                                <label for="floatingInput">Total value</label>
                                @error('total_value')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Market value" wire:model='market_value'>
                                <label for="floatingInput">Market value</label>
                                @error('market_value')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Yield" wire:model='yield'>
                                <label for="floatingInput">Yield</label>
                                @error('yield')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Dividend" wire:model='dividend'>
                                <label for="floatingInput">Dividend</label>
                                @error('dividend')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="mx-2 btn btn-primary">Update
                                Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
