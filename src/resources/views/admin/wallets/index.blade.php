@extends('layouts.admin.main')

@section('pageTitle', 'Transactions')

@section('contents')

    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span
                                class="path2"></span></i> <input type="text" data-kt-customer-table-filter="search"
                            class="form-control form-control-solid w-250px ps-12" placeholder="Search transaction">
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span
                                    class="path2"></span></i> Filter
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                            id="kt-toolbar-filter">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-4 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->

                            <!--begin::Content-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-semibold mb-3">Month:</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid fw-bold select2-hidden-accessible"
                                        data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true"
                                        data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter"
                                        data-select2-id="select2-data-10-nokr" tabindex="-1" aria-hidden="true"
                                        data-kt-initialized="1">
                                        <option data-select2-id="select2-data-12-xe51"></option>
                                        <option value="aug">August</option>
                                        <option value="sep">September</option>
                                        <option value="oct">October</option>
                                        <option value="nov">November</option>
                                        <option value="dec">December</option>
                                    </select><span class="select2 select2-container select2-container--bootstrap5"
                                        dir="ltr" data-select2-id="select2-data-11-6ja0" style="width: 100%;"><span
                                            class="selection"><span
                                                class="select2-selection select2-selection--single form-select form-select-solid fw-bold"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-disabled="false" aria-labelledby="select2-y7dx-container"
                                                aria-controls="select2-y7dx-container"><span
                                                    class="select2-selection__rendered" id="select2-y7dx-container"
                                                    role="textbox" aria-readonly="true" title="Select option"><span
                                                        class="select2-selection__placeholder">Select
                                                        option</span></span><span class="select2-selection__arrow"
                                                    role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-semibold mb-3">Transaction Type:</label>
                                    <!--end::Label-->

                                    <!--begin::Options-->
                                    <div class="d-flex flex-column flex-wrap fw-semibold"
                                        data-kt-customer-table-filter="payment_type">
                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                            <input class="form-check-input" type="radio" name="payment_type"
                                                value="all" checked="checked">
                                            <span class="form-check-label text-gray-600">
                                                All
                                            </span>
                                        </label>
                                        <!--end::Option-->

                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                            <input class="form-check-input" type="radio" name="payment_type"
                                                value="deposit">
                                            <span class="form-check-label text-gray-600">
                                                Deposit
                                            </span>
                                        </label>
                                        <!--end::Option-->

                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="radio" name="payment_type"
                                                value="mastercard">
                                            <span class="form-check-label text-gray-600">
                                                Withdraw
                                            </span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>

                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                        data-kt-customer-table-filter="filter">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Menu 1--> <!--end::Filter-->

                        <!--begin::Export-->
                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#kt_customers_export_modal">
                            <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span
                                    class="path2"></span></i> Export
                        </button>
                        <!--end::Export-->
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none"
                        data-kt-customer-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span> Selected
                        </div>

                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">
                            Delete Selected
                        </button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">

                <!--begin::Table-->
                <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_customers_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="



            " style="width: 29.9px;">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_customers_table .form-check-input"
                                                value="1">
                                        </div>
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Customer Name: activate to sort column ascending"
                                        style="width: 166.6px;">Reference no.</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Customer Name: activate to sort column ascending"
                                        style="width: 166.6px;">Customer Name</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Transaction Type: activate to sort column ascending"
                                        style="width: 194.863px;">
                                        Type
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Amount: activate to sort column ascending" style="width: 166.6px;">
                                        Amount</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Created Date: activate to sort column ascending"
                                        style="width: 205.825px;">Created Date</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Status: activate to sort column ascending" style="width: 205.825px;">
                                        Status</th>
                                    <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 130.938px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($transactions as $transaction)
                                    <x-admin.transaction.row :trans="$transaction" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->

    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('admin/js/custom/apps/customers/list/export.js') }}"></script>
    <script src="{{ asset('admin/js/custom/apps/customers/list/list.js') }}"></script>
@endsection
