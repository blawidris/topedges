@extends('layouts.frontend')

@section('pageTitle', "Registration")

@section('content')
    <div class="vh-100 d-flex justify-content-center">
        <div class="form-access my-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <span>Create Account</span>

                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group password">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <i class="show-password icon ion-md-eye"></i>

                </div>
                <div class="form-group password">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm Password">
                    <i class="show-password icon ion-md-eye"></i>

                </div>

                <div class="form-group">
                    <input id="referal_code" type="text" class="form-control" name="referal_code"
                        placeholder="Referal Code">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="form-checkbox" name="terms_conditions">
                    <label class="custom-control-label" for="form-checkbox">I agree to the <a href="terms-condition">Terms
                            &amp;
                            Conditions</a></label>
                </div>
                <button type="submit" class="btn btn-primary">Create Account</button>
            </form>
            <h2>Already have an account? <a href="{{ url('/login') }}">Sign in here</a></h2>
        </div>
        <x-flash-message :status="session('status')" :message="session('message')" />
    </div>

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
