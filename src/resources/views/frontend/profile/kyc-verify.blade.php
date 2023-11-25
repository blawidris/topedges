@extends('layouts.frontend')

@section('pageTitle', "KYC Verification")

@section('content')
    <div class="settings pt-5">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Account Verification</h4>
                            <form action="{{ empty(Auth::user()->userkyc->id) ? route('store-kyc') : route('update-kyc') }}" method="POST" enctype="multipart/form-data"
                                class="settings-notification">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <div class="form-group">
                                    <label for="type">Valid Means of ID</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">Select ID</option>
                                        <option value="passport" >Passport</option>
                                        <option value="nin">National Identity Number</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="number" class="custom-label">Identity Number</label>
                                    <input type="text" class="form-control" id="number" name="number"
                                        placeholder="Enter identity number" value="{{Auth::user()->userkyc->identity_number ?? null}}">
                                </div>

                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" data-height="260" name="image" id="image"
                                        class="dropify">
                                </div>
                                <button class="btn btn-2 ml-0 my-3">Verify Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-flash-message :status="session('status')" :message="session('message')" />
@endsection
