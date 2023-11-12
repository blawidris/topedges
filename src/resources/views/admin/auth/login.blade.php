@extends('layouts.admin.auth')

@section('pageTitle', 'Login')

@section('contents')
    <!--begin::Body-->
    <div class="py-20">

        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
            data-kt-redirect-url="{{ route('admin.dashboard') }}" action="{{ route('admin.login.post') }}">

            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Heading-->
                <div class="text-start mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">
                        Sign In
                    </h1>
                    <!--end::Title-->

                </div>
                <!--begin::Heading-->

                <!--begin::Input group--->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="text" placeholder="Email" name="email" autocomplete="off"
                        data-kt-translate="sign-in-input-email" class="form-control form-control-solid" />
                    <!--end::Email-->
                </div>

                <!--end::Input group--->
                <div class="fv-row mb-7">
                    <!--begin::Password-->
                    <input type="password" placeholder="Password" name="password" autocomplete="off"
                        data-kt-translate="sign-in-input-password" class="form-control form-control-solid" />
                    <!--end::Password-->
                </div>
                <!--end::Input group--->

                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                    <div></div>

                    <!--begin::Link-->
                    <a href="{{ route('admin.reset-password') }}" class="link-primary"
                        data-kt-translate="sign-in-forgot-password">
                        Forgot Password ?
                    </a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Actions-->
                <div class="d-flex flex-stack">
                    <!--begin::Submit-->
                    <button id="kt_sign_in_submit" class="btn btn-primary me-2 flex-shrink-0">
                        <!--begin::Indicator label-->
                        <span class="indicator-label" data-kt-translate="sign-in-submit">
                            Sign In
                        </span>
                        <!--end::Indicator label-->

                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">
                            <span data-kt-translate="general-progress">Please wait...</span>
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!--end::Indicator progress-->
                    </button>
                    <!--end::Submit-->
                </div>
                <!--end::Social-->
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Body-->
@endsection

@section('custom-js')
    <script src="{{ asset('admin/js/custom/authentication/sign-in/general.js') }}"></script>
    <script src="{{ asset('admin/js/custom/authentication/sign-in/i18n.js') }}"></script>
@endsection
