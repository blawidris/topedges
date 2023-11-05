@extends('layouts.admin.main')

@section('pageTitle', 'Dashboard')

@section('contents')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-xl-10 flex-row">
            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

                <!--begin::Card widget 4-->
                <div class="card card-flush pb-10 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                <!--end::Currency-->

                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $totalDeposit }}</span>
                                <!--end::Amount-->

                                <!--begin::Badge-->
                                {{-- <span class="badge badge-light-success fs-base">
                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    2.2%
                                </span> --}}
                                <!--end::Badge-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Total
                                Earnings</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                </div>
                <!--end::Card widget 4-->

                <!--begin::Card widget 5-->
                <div class="card card-flush pb-10 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                <!--end::Currency-->
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $pendingDeposit }}</span>
                                <!--end::Amount-->


                            </div>
                            <!--end::Info-->

                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Pending Deposit</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                </div>
                <!--end::Card widget 5-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                <!--begin::Card widget 6-->
                <div class="card card-flush  pb-10 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                <!--end::Currency-->

                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $totalWithdraw }}</span>
                                <!--end::Amount-->

                                <!--begin::Badge-->
                                {{-- <span class="badge badge-light-success fs-base">
                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    2.6%
                                </span> --}}
                                <!--end::Badge-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">
                                Total Withdraw
                            </span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                </div>
                <!--end::Card widget 6-->


                <!--begin::Card widget 7-->
                <div class="card card-flush pb-10 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                <!--end::Currency-->

                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $pendingWithdraw }}</span>
                                <!--end::Amount-->

                                <!--begin::Badge-->
                                {{-- <span class="badge badge-light-success fs-base">
                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    2.6%
                                </span> --}}
                                <!--end::Badge-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">
                                Pending Withdraw
                            </span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                </div>
                <!--end::Card widget 7-->
            </div>
            <!--end::Col-->


            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                <!--begin::Card widget 7-->
                <div class="card card-flush pb-10 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $totalUsers }}</span>
                            <!--end::Amount-->

                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Users</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                </div>
                <!--end::Card widget 7-->

                <!--begin::Card widget 7-->
                <div class="card card-flush pb-10 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $pendingUsers }}</span>
                            <!--end::Amount-->

                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Awaiting Approval Users</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                </div>
                <!--end::Card widget 7-->
            </div>

        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">



        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
             <div class="col-xl-5">

                <!--begin::Table Widget 5-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Card header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">New Customers</span>
                        </h3>
                        <!--end::Title-->

                        <!--begin::Actions-->
                        <div class="card-toolbar">
                            <!--begin::Filters-->
                            <div class="d-flex flex-stack flex-wrap gap-4">

                                <!--begin::Status-->
                                <div class="d-flex align-items-center fw-bold">
                                    <!--begin::Label-->
                                    <div class="text-muted fs-7 me-2">Status</div>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select
                                        class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                        data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                                        data-placeholder="Select an option" data-kt-table-widget-5="filter_status">
                                        <option></option>
                                        <option value="Show All" selected>Show All</option>
                                        <option value="1">Verify</option>
                                        <option value="0">Pending</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Status-->

                                <!--begin::Search-->
                                <a href="{{ route('admin.customers') }}" class="btn btn-light btn-sm">
                                    View Customers
                                </a>
                                <!--end::Search-->
                            </div>
                            <!--begin::Filters-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-150px">Customer</th>
                                    <th class="text-start pe-3 min-w-100px">Email</th>
                                    <th class="text-start pe-3 min-w-150px">Date Added</th>
                                    <th class="text-start pe-3 min-w-100px">Status</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($users as $user)
                                    <x-admin.dashboard.customer-table-row :customer="$user" />
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Table Widget 5-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-7">

                <!--begin::Table Widget 5-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Card header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Latest Transaction</span>
                            {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Total 2,356 Items
                                in the Stock</span> --}}
                        </h3>
                        <!--end::Title-->

                        <!--begin::Actions-->
                        <div class="card-toolbar">
                            <!--begin::Filters-->
                            <div class="d-flex flex-stack flex-wrap gap-4">
                                <!--begin::Destination-->
                                <div class="d-flex align-items-center fw-bold">
                                    <!--begin::Label-->
                                    <div class="text-muted fs-7 me-2">Cateogry</div>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select
                                        class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                        data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                                        data-placeholder="Select an option">
                                        <option></option>
                                        <option value="Show All" selected>Show All</option>
                                        <option value="deposit">Deposit</option>
                                        <option value="withdraw">Withdraw</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Destination-->

                                <!--begin::Status-->
                                <div class="d-flex align-items-center fw-bold">
                                    <!--begin::Label-->
                                    <div class="text-muted fs-7 me-2">Status</div>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select
                                        class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                        data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                                        data-placeholder="Select an option" data-kt-table-widget-5="filter_status">
                                        <option></option>
                                        <option value="Show All" selected>Show All</option>
                                        <option value="1">Paid</option>
                                        <option value="0">Pending</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Status-->

                                <!--begin::Search-->
                                <a href="{{ route('admin.wallets') }}" class="btn btn-light btn-sm">
                                    View Transaction
                                </a>
                                <!--end::Search-->
                            </div>
                            <!--begin::Filters-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-150px">Customer</th>
                                    <th class="text-end pe-3 min-w-100px">Type</th>
                                    <th class="text-end pe-3 min-w-100px">Amount</th>
                                    <th class="text-end pe-3 min-w-100px">Status</th>
                                    <th class="text-end pe-3 min-w-150px">Date Added</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($transactions as $transaction)
                                    <x-admin.dashboard.transaction-table-row :trans="$transaction" />
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Table Widget 5-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Content container-->
@endsection
