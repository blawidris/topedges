@extends('layouts.frontend')

@section('pageTitle', "Account Login")

@section('content')
    <div class="vh-100 d-flex justify-content-center">
        <div class="form-access my-auto" style="width: 500px;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <span>Sign In</span>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control " placeholder="Email Address"
                        autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group password">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <i class="show-password icon ion-md-eye"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between align-items-center my-4 pb-2">
                    <div class="custom-control custom-checkbox ml-0 pl-0">
                        <input name="remember" type="checkbox" class="custom-control-input ml-0 pl-0" id="form-checkbox"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="form-checkbox"  style="font-size: 14px; font-weight:normal">Remember me</label>
                    </div>

                    <div class="text-right">
                        <a href="{{route('password.request')}}" class="text-white" style="font-size: 14px; font-weight:normal">Forgot Password?</a>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
            <h2>Don't have an account? <a href="{{ url('/register') }}" class="text-white ">Sign up here</a></h2>
        </div>
    </div>
    <x-flash-message :status="session('status')" :message="session('message')" />
    <style>
        .notify {
            position: absolute;
            padding: 1rem 1.5rem;
            top: 0.5rem;
            right: 1rem;
        }



        .form-access span {
            font-size: 14px;
            margin: 5px 0;
            text-align: left;
            font-weight: normal;
        }

        .password {
            position: relative;
        }

        .password .show-password {
            position: absolute;
            right: 10px;
            top: .9rem;
            cursor: pointer;
        }
    </style>

    <script>
        let show_password = document.querySelectorAll('.password .show-password');
        let inputVal = document.querySelectorAll('.password input');

        show_password.forEach((element, index) => {
            element.addEventListener('click', function(e) {

                if (this.classList.contains('ion-md-eye')) {
                    this.classList.toggle('ion-md-eye')
                    this.classList.toggle('ion-md-eye-off')

                    let current_val = this.previousElementSibling.value
                    this.previousElementSibling.setAttribute('type', 'text')
                } else {
                    this.classList.toggle('ion-md-eye-off')
                    this.classList.toggle('ion-md-eye')

                    this.previousElementSibling.setAttribute('type', 'password')
                }

            })
        });
    </script>
@endsection
