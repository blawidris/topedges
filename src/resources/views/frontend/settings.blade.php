@extends('layouts.frontend')
@section('content')
    <div class="settings mtb15">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active font-weight-normal text-capitalize" href="#profile"
                            id="settings-profile-tab" role="tab" aria-selected="true" data-toggle="pill"><i
                                class="icon ion-md-person"></i> Update
                            Profile</a>
                        <a class="nav-link font-weight-normal text-capitalize" role="tab" aria-selected="true"
                            data-toggle="pill" id="settings-account-tab" href="#account"><i
                                class="icon ion-md-settings"></i>
                            Account</a>
                        {{-- <a class="nav-link font-weight-normal text-capitalize " id="settings-kyc-tab" href="#kyc"
                            role="tab" aria-selected="true" data-toggle="pill"><i class="icon ion-md-alarm"></i>
                            Update KYC
                        </a> --}}
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade active show" id="profile" role="tabpanel"
                            aria-labelledby="settings-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Public Profile</h4>
                                    <form action="{{route('update-profile')}}" class="settings-notification" id="saveForm" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                        <div class="row g-4">
                                            <div class="col-md-4 mb-4">
                                                {{-- <label>Profile picture</label> --}}
                                                <input type="file" data-default-file="{{$user->image? asset('storage/users/'.$user->image): ''}}" data-height="150" data-width="150"
                                                    name="image" class="dropify rounded-circle">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="custom-label">Full Name</label>
                                                            <input type="text" class="form-control" id="name" name="name"
                                                                placeholder="Name" value="{{$user->f_name.' '.$user->l_name}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email" class="custom-label">Email Address</label>
                                                            <input type="text" class="form-control" id="email"
                                                                placeholder="Name" value="{{$user->email}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">Phone number</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">+234</span>
                                                                </div>
                                                                <input name="phone" type="phone" class="form-control" aria-label="phone"
                                                                    value="{{$user->phone}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="gender">Gender</label>
                                                            <select class="form-control" name="gender" id="gender">
                                                                <option value="male" {{$user->gender == 'male'? 'selected' : ''}}>Male</option>
                                                                <option value="female" {{$user->gender == 'female'? 'selected' : ''}}>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Date of Birth</label>
                                                            <input class="form-control" placeholder="dd/mm/yyyy" type="date"
                                                                name="dob" value="{{$user->dob}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address"
                                                                placeholder="Enter address" value="{{$user->address}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" id="city" name="city"
                                                                placeholder="Enter city" value="{{$user->city}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="state">State</label>
                                                            <input type="text" class="form-control" id="state" name="state"
                                                                placeholder="Enter state" value="{{$user->state}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="country">Country</label>
                                                            <select class="form-control" name="country" id="country">
                                                                <option value="nigeria" selected>Nigeria</option>
                                                                {{-- <option>Female</option> --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="ladda-button btn btn-2 ml-0 my-3" id="save_btn" onclick="request.save('saveForm', 'save_btn', {{route('update-profile')}}, 'PUT', '/profile')" data-style="expand-left">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="account" role="tabpanel">

                            {{-- update KYC --}}
                            <div class="card settings-kyc-update">
                                <div class="card-body">
                                    <h5 class="card-title">KYC Information</h5>
                                    <div class="settings-notification">
                                        <ul>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Means of Valid ID</p>
                                                    <span>{{strtoupper($user->userkyc->identity_type)}}</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <a href="{{route('verify-account')}}" class="btn btn-2" id="notification1">
                                                        Change
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Identity Number</p>
                                                    <span>{{ucwords($user->userkyc->identity_number)}}</span>
                                                </div>
                                                {{-- <div class="custom-control custom-switch">
                                                    <a href="#" class="btn btn-2" id="notification1">
                                                        Change
                                                    </a>
                                                </div> --}}
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- change password --}}
                            <div class="card settings-password">
                                <div class="card-body">
                                    <h5 class="card-title">Change Password</h5>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="currentPassword">Current Password</label>
                                            <input id="currentPassword" name="current_password" type="text"
                                                class="form-control" placeholder="Current Password">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="rewritePassword">New password</label>
                                            <input id="rewritePassword" type="password" class="form-control"
                                                placeholder="New password" name="new_password">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="rewritePassword">Confirm password</label>
                                            <input id="rewritePassword" type="password" class="form-control"
                                                placeholder="Confirm your password" name="confirm_password">
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-2 ml-0" type="submit">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- chnage wallet address --}}
                            <div class="card settings-wallet">
                                <div class="card-body">
                                    <h5 class="card-title">Withdrawal Wallet Address</h5>
                                    <div class="row wallet-address">
                                        <div class="col-md-8">
                                            <p class="text-white">Deposits to this address are unlimited. Note that you may
                                                not be able to withdraw all
                                                of your
                                                funds at once if you deposit more than your daily
                                                withdrawal limit.</p>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    value="{{$user->wallet->wallet_address ?? null}}">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#walletModal">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            {!! QrCode::size(200)->generate($user->wallet->wallet_address ?? 'add wallet') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Delete account --}}
                            <div class="card settings-delete-account">
                                <div class="card-body">
                                    <h5 class="card-title">Delete ccount</h5>
                                    <div class="settings-notification">
                                        <ul>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Delete your account</p>
                                                    <span>By clicking this link you agreed on deleting your account
                                                        permanently</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <form action="{{route('delete-account')}}" method="Post" class="d-none" id="deleteBtn">
                                                        @csrf
                                                    </form>
                                                    <button type="submit" class="btn btn-danger" id="notification1" onclick="document.getElementById('deleteBtn').submit()">
                                                        Delete Account
                                                    </button>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- <div class="tab-pane" id="kyc" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Update KYC</h5>
                                    <div class="settings-notification">
                                        <ul>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Means of Valid ID</p>
                                                    <span>NIN</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <a href="#" class="btn btn-2" id="notification1">
                                                        Change
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Identity Number</p>
                                                    <span>123456789</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <a href="#" class="btn btn-2" id="notification1">
                                                        Change
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Uploaded Identity Image</p>
                                                    <span>Get the latest news in your mail</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <a href="#" class="btn btn-2" id="notification1">
                                                        Change
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Email Service</p>
                                                    <span>Get security code in your mail</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="notification4" checked="">
                                                    <label class="custom-control-label" for="notification4"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Phone Notify</p>
                                                    <span>Get transition notification in your phone </span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="notification5" checked="">
                                                    <label class="custom-control-label" for="notification5"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card settings-profile">
                                <div class="card-body">
                                    <h5 class="card-title">Create API Key</h5>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="generateKey">Generate key name</label>
                                            <input id="generateKey" type="text" class="form-control"
                                                placeholder="Enter your key name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="rewritePassword">Confirm password</label>
                                            <input id="rewritePassword" type="password" class="form-control"
                                                placeholder="Confirm your password">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" value="Create API key">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Your API Keys</h5>
                                    <div class="wallet-history">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Key</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>zRmWVcrAZ1C0RZkFMu7K5v0KWC9jUJLt</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus1" checked="">
                                                            <label class="custom-control-label" for="apiStatus1"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Rv5dgnKdmVPyHwxeExBYz8uFwYQz3Jvg</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus2">
                                                            <label class="custom-control-label" for="apiStatus2"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>VxEYIs1HwgmtKTUMA4aknjSEjjePZIWu</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus3">
                                                            <label class="custom-control-label" for="apiStatus3"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>M01DueJ4x3awI1SSLGT3CP1EeLSnqt8o</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus4">
                                                            <label class="custom-control-label" for="apiStatus4"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                placeholder="Enter wallet address" value="{{$user->wallet->wallet_address ?? null}}">
                        </div>

                        <button class="my-3 btn btn-success">{{!empty($user->wallet->id) ? 'Update': 'Add' }}</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <x-flash-message :status="session('status')" :message="session('message')" />
@endsection
