@extends('layouts.frontend')

@section('pageTitle', 'Wallet')

@section('content')
    <div class="settings mtb15">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-4 order-1 order-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <iframe
                                src="https://widget.coinlib.io/widget?type=full_v2&theme=dark&cnt=10&pref_coin_id=1505&graph=no"
                                width="100%" height="650px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0"
                                border="0" style="border:0;margin:0;padding:0;"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 order-0 order-lg-1">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="settings-wallet" role="tabpanel"
                            aria-labelledby="settings-wallet-tab">
                            <div class="wallet">
                                <div class="row">

                                    <div class="col-md-12 col-lg-12">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="coinBTC" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Wallet Balance</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>${{ $user->wallet->current_balance ?? 0 }}</h3>
                                                                </div>
                                                            </li>
                                                            <li class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Today's Earning</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>${{ $user->wallet->daily_earning ?? 0 }}</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button class="btn green" data-toggle="modal"
                                                            data-target="#depositModal">Deposit</button>
                                                        <button class="btn red" data-toggle="modal"
                                                            data-target="#withdrawModal">Withdraw</button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Wallet Deposit Address</h5>
                                                        <div class="row wallet-address">
                                                            <div class="col-md-8">
                                                                <p>Deposits to this address are unlimited. Note that you may
                                                                    not be able to withdraw all
                                                                    of your
                                                                    funds at once if you deposit more than your daily
                                                                    withdrawal limit.</p>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ !empty($user->wallet->wallet_address) ? $user->wallet->wallet_address : '' }}">
                                                                    <div class="input-group-prepend">

                                                                        <button class="btn btn-primary"
                                                                            {{ empty($user->wallet->id) ? 'data-toggle=modal data-target=#walletModal' : '' }}>
                                                                            {{ !empty($user->wallet->id) ? ' COPY' : 'ADD' }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                {!! QrCode::size(200)->generate($user->wallet->wallet_address ?? 'add wallet') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Latest Transactions</h5>
                                                        <div class="wallet-history">
                                                            <table class="table" id="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Date</th>
                                                                        <th>Type</th>
                                                                        <th>Status</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($wallet as $key => $item)
                                                                        <tr>
                                                                            <td>{{ $key + 1 }}</td>
                                                                            <td>
                                                                                {{ date('Y-m-d', strtotime($item->created_at)) }}
                                                                            </td>
                                                                            <td>{{ ucfirst($item->type) }}</td>
                                                                            <td>
                                                                                <i
                                                                                    class="icon ion-md-checkmark-circle-outline {{ $item->status == 0 ? 'yellow' : '' }} {{ $item->status == 2 ? 'red' : '' }}  {{ $item->status == 1 ? 'green' : '' }}"></i>
                                                                            </td>
                                                                            <td>${{ $item->price_amount }}</td>
                                                                        </tr>
                                                                    @empty
                                                                        <td colspan="5">No transaction available</td>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- deposit modal --}}
    <div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Deposit Fund</h5>
                    <button type="button" class="text-white close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('wallet-deposit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="pay_amount" class="pay_amount">
                        <input type="hidden" name="pay_currency_type" class="pay_currency_type">
                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="mdi mdi-currency-usd"></i></div>
                                </div>
                                <input type="text" id="amount" name="amount" class="form-control"
                                    placeholder="Enter amount">

                                <select name="currency" id="" class="form-select form-control currency">
                                    <option value="">Select Currency</option>
                                    <option value="btc">BTC</option>
                                    <option value="usdt">USDT</option>
                                </select>
                            </div>
                        </div>
                        <div class="usdt-value d-none align-items-center justify-content-between p-2">
                            <span style="font-size:13px;" id="conversion"></span>
                            <h6 class="result font-weight-normal mb-0 pl-2"></h6>
                        </div>
                        <button data-user="{{ $user->id }}" class="my-3 btn btn-success">Deposit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    {{-- withdraw modal --}}
    <div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Withdraw Fund</h5>
                    <button type="button" class="text-white close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('wallet-withdraw') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="wallet_id" value="{{ $user->wallet->id ?? null }}">
                        <input type="hidden" name="pay_currency_type" class="pay_currency_type">
                        <input type="hidden" name="pay_amount">
                        <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="mdi mdi-currency-usd"></i></div>
                                </div>
                                <input type="text" id="amount" name="amount" class="form-control"
                                    placeholder="Enter amount">
                                <select name="currency" id="currency" class="form-select form-control currency">
                                    <option value="">Select Currency</option>
                                    <option value="btc">BTC</option>
                                    <option value="usdt">USDT</option>
                                </select>
                            </div>
                        </div>
                        <div class="usdt-value d-none align-items-center justify-content-between p-2">
                            <span style="font-size:13px;" id="conversion"></span>
                            <h6 class="result font-weight-normal mb-0 pl-2"></h6>
                        </div>
                        <button data-user="{{ $user->id }}" class="my-3 btn btn-success">Withdraw</button>
                    </form>

                </div>

            </div>
        </div>
    </div>


    {{-- wallet address modal --}}
    <div class="modal fade" id="walletModal" tabindex="-1" role="dialog" aria-labelledby="walletModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="walletModalLabel">Wallet Address</h5>
                    <button type="button" class="text-white close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('wallet-add') }}" method="POST">
                        @csrf
                        @if (!empty($user->wallet->id))
                            <input type="hidden" name="wallet_id" value="{{ $user->wallet->id ?? null }}">
                        @endif
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group">
                            <input type="text" id="wallet" name="wallet_address" class="form-control"
                                placeholder="Enter wallet address">
                        </div>

                        <button class="my-3 btn btn-success">Add</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <x-flash-message :status="session('status')" :message="session('message')" />

    <script>
        let inputAmount = document.querySelectorAll('#amount');
        let currencyType = document.querySelectorAll('.currency')
        let conversionRate = document.querySelectorAll('#conversion')
        let currencyInputType = document.querySelectorAll('.currencyType');


        let currency = null;


        currencyType.forEach(element => {
            // element.preventDefault()

            element.addEventListener('change', function(e) {
                conversionRate.forEach(rate => {
                    rate.innerHTML = e.target.value
                })

                currency = e.target.value


                currencyInputType.forEach(input =>{
                    input.value = e.target.value
                })
            })

        })

        // window.onload = (e) => {
        // const _token = document.querySelectorAll("input[name='_token']").value

        inputAmount.forEach(element => {
            element.addEventListener('keyup', function(e) {
                e.preventDefault()

                let value = e.target.value;

                const result = estimate_price(value, currency);

                result.then(data => {
                    document.querySelector('.usdt-value').classList.add('d-flex')
                    document.querySelector('.usdt-value .result').textContent = data
                        .estimated_amount
                    document.querySelector('.pay_amount').value = data.estimated_amount

                })
            })
        });

        // }


        async function estimate_price(value, type) {

            try {
                const response = await fetch(`{{ url('wallet/estimate/${value}/${type}') }}`);
                if (!response.ok) {
                    throw new Error(`HTTP error: ${response.statusText}`)
                }

                const data = await response.json();
                return data;

            } catch (error) {
                error => console.log(`Error: ${error}`)
            }
        }
    </script>
@endsection
