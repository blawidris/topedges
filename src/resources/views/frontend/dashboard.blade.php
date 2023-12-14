@extends('layouts.frontend')

@section('pageTitle', 'Dashboard')

@section('content')
    <div class="settings ptb70">
        <div class="container">

            <div class="row mb-3">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-3 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="col-4 col-sm-3 col-xl-2">
                                    <img src="assets/img/Group126@2x.png" class="gradient-corona-img img-fluid"
                                        alt="">
                                </div>
                                <div class="col-5 col-sm-7 col-xl-8">
                                    <h3 class="mb-1 mb-sm-0">

                                        @if (empty($user->status))
                                            Let's get to know you
                                        @else
                                            Welcome {{ $user->f_name }},
                                        @endif

                                    </h3>
                                    <p class="mb-0 font-weight-normal d-none d-sm-block">
                                        @if (empty($user->status))
                                            Complete your profile by filling required document
                                        @endif

                                        @if (empty($user->userkyc->status) && $user->status == 1)
                                            Submit your KYC information today
                                        @endif
                                    </p>
                                </div>
                                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                                    <span>
                                        @if (empty($user->status))
                                            <a href="{{ route('complete-profile') }}"
                                                class="btn btn-outline-light btn-rounded get-started-btn">
                                                Proceed now
                                            </a>
                                        @endif

                                        @if (empty($user->userkyc->status) && $user->status == 1)
                                            <a href="{{ route('verify-account') }}"
                                                class="btn btn-outline-light btn-rounded get-started-btn">
                                                Proceed now
                                            </a>
                                        @endif

                                         @if ($user->userkyc->status == 1 && $user->status == 1)
                                            <a href="{{ route('wallet') }}"
                                                class="btn btn-outline-light btn-rounded get-started-btn">
                                                Deposit Fund
                                            </a>
                                        @endif

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="text-white mb-0">${{ $user->wallet->current_balance ?? 0 }}</h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">0%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-wallet icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Current Ballance</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="text-white mb-0">${{ $total_income ?? 0 }}</h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">0%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-warning">
                                        <span class="mdi mdi-cash-multiple icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Pending Deposit</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="text-white mb-0">${{ $pending_withdraw ?? 0 }}</h3>
                                        {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">0%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-danger">
                                        <span class="mdi mdi-cash-minus icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Pending Withdrawal</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="text-white mb-0">${{ $referal_bonus ?? 0 }}</h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">0</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-info ">
                                        <span class="mdi mdi-account icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal pt-2">Referal Bonus <a href="#"
                                    class="text-white float-right" style="font-size: 13px; text-decoration:underline;"
                                    class="text-muted text-underline">Copy url</a></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Today's market</h5>
                            <div class="wallet-history" style="overflow-y:auto;">
                                <iframe
                                    src="https://widget.coinlib.io/widget?type=full_v2&theme=dark&cnt=5&pref_coin_id=1505&graph=yes"
                                    width="100%" height="355px" scrolling="auto" marginwidth="0" marginheight="0"
                                    frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <x-flash-message :status="session('status')" :message="session('message')" />
@endsection
