@extends('layouts.frontend')

@section('pageTitle', "Complete your profile")

@section('content')
    <div class="settings pt-5">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3 text-white">Edit Profile</h4>

                            <form action="{{route('create-profile')}}" class="settings-notification" id="saveForm" method="POST" enctype="multipart/form-data">
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
                                                   <input type="text" class="form-control" id="state" name="country"
                                                        placeholder="Enter country" value="{{$user->country}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="ladda-button btn btn-2 ml-0 my-3" id="save_btn" onclick="request.save('saveForm', 'save_btn', {{route('create-profile')}}, 'PUT', '/profile')" data-style="contract">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-flash-message :status="session('status')" :message="session('message')"/>
@endsection
