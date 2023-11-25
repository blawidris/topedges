@extends('layouts.frontend')

@section('pageTitle', '')

@section('content')
    <div class="settings mtb15">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-8 order-0 order-lg-1">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="settings-wallet" role="tabpanel"
                            aria-labelledby="settings-wallet-tab">
                            <div class="wallet">
                                <div class="row">

                                    <div class="col-md-12 col-lg-12">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="coinBTC" role="tabpanel">

                                                {{-- {{dd(session('payinfo'))}} --}}
                                                @php
                                                    $response = session('payinfo');

                                                    // var_dump($response);

                                                @endphp
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Wallet Deposit Address</h5>
                                                        <div class="row wallet-address">
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="mb-4 d-flex justify-content-between align-items-center ">
                                                                    <div class="d-flex flex-column">
                                                                        <h2>{{ $response->pay_amount ?? null }}</h2>
                                                                        <p>The rate will be updated in <i
                                                                                class="mdi mdi-clock"></i><span
                                                                                class="expire"
                                                                                data-id="{{ $response['payment_id'] ?? null }}"
                                                                                data-time="{{ $response->expiration_estimate_date ?? null }}"></span>
                                                                            <span class="btn badge badge-primary d-none"
                                                                                id="confirmBtn">Confirm payment</span>
                                                                        </p>
                                                                    </div>
                                                                    <h4>${{ $response->price_amount ?? null }}</h4>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-8">

                                                                <p>Send the funds to this address </p>
                                                                @csrf
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $response['pay_address'] ?? null }}">
                                                                    <div class="input-group-prepend">
                                                                        <button class="btn btn-primary">COPY</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                {!! QrCode::size(200)->generate($response['pay_address'] ?? 'loading') !!}
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
    </div>
    <x-flash-message :status="session('status')" :message="session('message')" />

    <script>
        console.log('page is fully loaded');

        let expire = document.querySelector('.expire');
        const expire_time = expire.getAttribute('data-time');
        const payment_id = expire.getAttribute('data-id');


        const data = {
            payment_id: payment_id
        };

        var countDownDate = new Date(expire_time).getTime();
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.querySelector(".expire").innerHTML =
                minutes + ":" + seconds;

            // If the count down is finished, write some text
            if (distance <= 0) {
                clearInterval(x);

                document.querySelector('#confirmBtn').classList.add('d-none')

                expire.textContent = 'Expired';
                const result = getStatus(data);

                result.then(data => {

                    if (data.payment_status !== 'finished') {

                        location.href = '/wallet';
                    }
                })
            } else {
                const result = getStatus(data);

                // console.log(result);

                result.then(data => {

                    if (data.payment_status === 'finished') {

                        clearInterval(x);
                        clearTimeout(x)

                        expire.textContent = 'Success';

                        document.querySelector('#confirmBtn').setAttribute('data-payment-id', data
                            .payment_id);
                        document.querySelector('#confirmBtn').setAttribute('data-payment-status', data
                            .payment_status)
                        document.querySelector('#confirmBtn').classList.remove('d-none')



                        // location.href = '/wallet';

                    }
                })

            }
        }, 1000);


        document.querySelector('#confirmBtn').addEventListener('click', (e) => {
            let payment_id = e.target.getAttribute('data-payment-id')
            let payment_status = e.target.getAttribute('data-payment-status');

            const wallet = {
                payment_id: payment_id,
                payment_status: payment_status
            }

            fetch("{{ url('/wallet/update') }}", {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    "X-CSRF-Token": _token
                },
                body: JSON.stringify(wallet),
            }).then(response => response.json()).then(result => {
                    console.log(result)

                    if (result.status === 'success')
                        location.assign('/wallet');

            });
        })

        async function getStatus(d) {
            try {
                const response = await fetch("{{ url('/wallet/pay') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        "X-CSRF-Token": _token
                    },
                    body: JSON.stringify(d),
                });

                if (!response.ok) {
                    throw new Error(`HTTP error: ${response.statusText}`);
                }

                const data = await response.json()

                return data;
            } catch (error) {
                console.log(`${error}`);
            }
        }
    </script>
@endsection
