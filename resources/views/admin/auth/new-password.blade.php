@extends('layouts.admin.auth')

@section('pageTitle', 'Set New password')

@section('contents')
    <div class="py-20">

        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form"
            data-kt-redirect-url="{{route('admin.reset-password')}}" action="#">
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="password-reset-title">
                    Forgot Password ?
                </h1>
                <!--end::Title-->

                <!--begin::Text-->
                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="password-reset-desc">
                    Enter your email to reset your password.
                </div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->

            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <input class="form-control form-control-solid" type="email" placeholder="Email" name="email"
                    autocomplete="off" data-kt-translate="password-reset-input-email" />
            </div>
            <!--end::Input group-->

            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Link-->
                <div class="m-0">
                    <button id="kt_password_reset_submit" class="btn btn-primary me-2"
                        data-kt-translate="password-reset-submit">

                        <!--begin::Indicator label-->
                        <span class="indicator-label">
                            Submit</span>
                        <!--end::Indicator label-->

                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!--end::Indicator progress--> </button>

                    <a href="sign-in.html" class="btn btn-lg btn-light-primary fw-bold"
                        data-kt-translate="password-reset-cancel">Cancel</a>
                </div>
                <!--end::Link-->
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
@endsection

@section('custom-js')

@endsection
