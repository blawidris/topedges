@extends('layouts.frontend')

@section('pageTitle', "Profile")

@section('content')
    <div class="settings pt-5 py-60">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="border-bottom text-left pb-4">
                                        <div class="d-flex align-items-start gap-2">
                                            <img src="{{ $user->image ? asset('storage/' . $user->image)  : 'https://via.placeholder.com/50' }}"
                                                alt="profile" class="img-lg rounded-circle mb-3" width="60">
                                            <div class="ml-3 text-left">
                                                <h3 class="text-white mb-0">
                                                    {{ ucfirst($user->f_name) . ' ' . ucfirst($user->l_name) }}
                                                </h3>
                                                <div class="d-flex align-items-center">
                                                    <span class="mb-0 me-2 text-muted">{{ ucfirst($user->country) }}</span>
                                                </div>
                                                <a class="badge badge-primary mt-2 cursor-pointer"
                                                    onclick="location.href='{{ route('edit-profile') }}'">Edit
                                                    Profile</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="py-4 text-white mt-5">
                                        <p class="clearfix">
                                            <span class="float-left"> KYC Status </span>
                                            <span
                                                class="float-right badge badge-{{ !empty($user->userkyc->status) ? 'success' : 'warning' }} ">
                                                {{ !empty($user->userkyc->status) ? 'Verified' : 'Pending' }} </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left"> Phone </span>
                                            <span class="float-right text-muted"> {{ $user->phone ?? null }} </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left"> E-mail </span>
                                            <span class="float-right text-muted"> {{ $user->email ?? null }} </span>
                                        </p>
                                        <p class="clearfix d-flex justify-content-between">
                                        <div class="float-left"> Wallet Address </div>
                                        <div class="float-right text-muted flex-end">
                                            {{ $user->wallet->wallet_address ?? 'none' }}
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
@endsection
