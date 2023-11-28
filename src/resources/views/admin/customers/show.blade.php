@extends('layouts.admin.main')

@section('pageTitle', $user->name)

@section('contents')
  <div id="kt_app_content_container" class="app-container  container-xxl ">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                                        <!--begin::Card-->
                                        <div class="card mb-5 mb-xl-8">
                                            <!--begin::Card body-->
                                            <div class="card-body pt-15">
                                                <!--begin::Summary-->
                                                <div class="d-flex flex-center flex-column mb-5">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                                        <img src="{{asset($user->image ?? 'https://e7.pngegg.com/pngimages/340/946/png-clipart-avatar-user-computer-icons-software-developer-avatar-child-face-thumbnail.png')}}" alt="image" />
                                                    </div>
                                                    <!--end::Avatar-->

                                                    <!--begin::Name-->
                                                    <a href="#"
                                                        class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                                        {{$user->name ?? ''}}
                                                     </a>
                                                    <!--end::Name-->

                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-wrap flex-center">
                                                        <!--begin::Stats-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                                            <div class="fs-4 fw-bold text-gray-700">
                                                                <span class="w-75px">{{$user->wallet->current_balance ?? 0}}</span>
                                                                {{-- <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                                                    <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i> --}}
                                                            </div>
                                                            <div class="fw-semibold text-muted">Balance</div>
                                                        </div>
                                                        <!--end::Stats-->
                                                        <!--begin::Stats-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 mx-4">
                                                            <div class="fs-4 fw-bold text-gray-700">
                                                                <span class="w-75px">{{$user->wallet->daily_earning ?? 0}}</span>
                                                                {{-- <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                                                    <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i> --}}
                                                            </div>
                                                            <div class="fw-semibold text-muted">Earnings</div>
                                                        </div>
                                                        <!--end::Stats-->

                                                        <!--begin::Stats-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                                            <div class="fs-4 fw-bold text-gray-700">
                                                                <span class="w-50px">{{$withdraw ?? 0}}</span>
                                                                {{-- <i class="ki-duotone ki-arrow-down fs-3 text-danger"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i> --}}
                                                            </div>
                                                            <div class="fw-semibold text-muted">Withdraw</div>
                                                        </div>
                                                        <!--end::Stats-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Summary-->

                                                <!--begin::Details toggle-->
                                                <div class="d-flex flex-stack fs-4 py-3">
                                                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                                        href="#kt_customer_view_details" role="button"
                                                        aria-expanded="false" aria-controls="kt_customer_view_details">
                                                        Details
                                                        <span class="ms-2 rotate-180">
                                                            <i class="ki-duotone ki-down fs-3"></i> </span>
                                                    </div>

                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        title="Edit customer details">
                                                        <a href="#" class="btn btn-sm btn-light-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_update_customer">
                                                            Edit
                                                        </a>
                                                    </span>
                                                </div>
                                                <!--end::Details toggle-->

                                                <div class="separator separator-dashed my-3"></div>

                                                <!--begin::Details content-->
                                                <div id="kt_customer_view_details" class="collapse show">
                                                    <div class="py-5 fs-6">

                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Email</div>
                                                        <div class="text-gray-600"><a href="#"
                                                                class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                                                        </div>
                                                        <!--begin::Details item-->

                                                        <!--begin::Details item-->
                                                        <div class="fw-bold mt-5">Address</div>
                                                        <div class="text-gray-600">{{$user->address}}, {{$user->city}} {{$user->state}}, {{$user->country}}</div>
                                                        <!--begin::Details item-->

                                                    </div>
                                                </div>
                                                <!--end::Details content-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->

                                    </div>
                                    <!--end::Sidebar-->

                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid ms-lg-15">
                                        <!--begin:::Tabs-->
                                        <ul
                                            class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                                    href="#kt_customer_view_overview_tab">Overview</a>
                                            </li>
                                            <!--end:::Tab item-->

                                            <!--begin:::Tab item-->
                                            <li class="nav-item ms-auto">
                                                <!--begin::Action menu-->
                                                <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                    Actions
                                                    <i class="ki-duotone ki-down fs-2 me-0"></i> </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->


                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-5">
                                                        <div
                                                            class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">
                                                            Account
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-5">
                                                        <a href="#" class="menu-link px-5">
                                                            Reports
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-5 my-1">
                                                        <a href="#" class="menu-link px-5">
                                                            Account Settings
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-5">
                                                        <a href="#" class="menu-link text-danger px-5">
                                                            Delete customer
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::Menu-->
                                            </li>
                                            <!--end:::Tab item-->
                                        </ul>
                                        <!--end:::Tabs-->

                                        <!--begin:::Tab content-->
                                        <div class="tab-content" id="myTabContent">
                                            <!--begin:::Tab pane-->
                                            <div class="tab-pane fade show active" id="kt_customer_view_overview_tab"
                                                role="tabpanel">

                                                  <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2 class="fw-bold">Credit Balance</h2>
                                                        </div>
                                                        <!--end::Card title-->

                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            <a href="#" class="btn btn-sm btn-flex btn-light-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_adjust_balance">
                                                                <i class="ki-duotone ki-pencil fs-3"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i> Adjust Balance
                                                            </a>
                                                        </div>
                                                        <!--end::Card toolbar-->
                                                    </div>
                                                    <!--end::Card header-->

                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0">
                                                        <div class="fw-bold fs-2">
                                                            ${{$user->wallet->current_balance ?? 0}} <span
                                                                class="text-muted fs-4 fw-semibold">USD</span>
                                                            <div class="fs-7 fw-normal text-muted">Balance will increase
                                                                the amount due on the customer's next invoice.</div>
                                                        </div>
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->

                                                <!--begin::Card-->
                                                <div class="card pt-4 mb-6 mb-xl-9">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>Payment Records</h2>
                                                        </div>
                                                        <!--end::Card title-->
                                                    </div>
                                                    <!--end::Card header-->

                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0 pb-5">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed gy-5"
                                                            id="kt_table_customers_payment">
                                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                                <tr class="text-start text-muted text-uppercase gs-0">
                                                                    <th class="min-w-100px">Invoice No.</th>
                                                                    <th>Status</th>
                                                                    <th>Amount</th>
                                                                    <th>Type</th>
                                                                    <th class="min-w-100px">Date</th>
                                                                    <th class="text-end min-w-100px pe-4">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-6 fw-semibold text-gray-600">

                                                                @foreach ($user->transactions as $transaction )
                                                                <x-admin.transaction-table-row :trans=$transaction/>
                                                                @endforeach

                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->

                                            </div>
                                            <!--end:::Tab pane-->
                                        </div>
                                        <!--end:::Tab content-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Layout-->

                               <!--begin::Modal - Adjust Balance-->
                                <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Adjust Balance</h2>
                                                <!--end::Modal title-->

                                                <!--begin::Close-->
                                                <div id="kt_modal_adjust_balance_close"
                                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                            class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->

                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Balance preview-->
                                                <div class="d-flex text-center mb-9">
                                                    <div
                                                        class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                                        <div class="fs-6 fw-semibold mb-2 text-muted">Current Balance
                                                        </div>
                                                        <div class="fs-2 fw-bold"
                                                            kt-modal-adjust-balance="current_balance">US$ {{$user->wallet->current_balance ?? 0}}
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                                        <div class="fs-6 fw-semibold mb-2 text-muted">
                                                            New Balance

                                                            <span class="ms-2" data-bs-toggle="tooltip"
                                                                title="Enter an amount to preview the new balance.">
                                                                <i class="ki-duotone ki-information fs-7"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span><span
                                                                        class="path3"></span></i> </span>
                                                        </div>
                                                        <div class="fs-2 fw-bold" kt-modal-adjust-balance="new_balance">
                                                            --</div>
                                                    </div>
                                                </div>
                                                <!--end::Balance preview-->

                                                <!--begin::Form-->
                                                <form id="kt_modal_adjust_balance_form" class="form" action="#">
                                                  <input type="hidden" name="user_id" value="{{$user->id}}">
                                                  <input type="hidden" name="wallet_id" value="{{$user->wallet->id ?? ''}}">
                                                  @method('PUT')
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label
                                                            class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input id="kt_modal_inputmask" type="text"
                                                            class="form-control form-control-solid" name="amount"
                                                            value="" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="reset" id="kt_modal_adjust_balance_cancel"
                                                            class="btn btn-light me-3">
                                                            Discard
                                                        </button>

                                                        <button type="submit" id="kt_modal_adjust_balance_submit"
                                                            class="btn btn-primary">
                                                            <span class="indicator-label">
                                                                Submit
                                                            </span>
                                                            <span class="indicator-progress">
                                                                Please wait... <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - New Card-->

                                <!--begin::Modal - New Address-->
                                <div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Form-->
                                            <form class="form" action="#" id="kt_modal_update_customer_form">
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="user_id">
                                                @method('PUT')
                                                <!--begin::Modal header-->
                                                <div class="modal-header" id="kt_modal_update_customer_header">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bold">Update Customer</h2>
                                                    <!--end::Modal title-->

                                                    <!--begin::Close-->
                                                    <div id="kt_modal_update_customer_close"
                                                        class="btn btn-icon btn-sm btn-active-icon-primary">
                                                        <i class="ki-duotone ki-cross fs-1"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--end::Modal header-->

                                                <!--begin::Modal body-->
                                                <div class="modal-body py-10 px-lg-17">
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                        id="kt_modal_update_customer_scroll" data-kt-scroll="true"
                                                        data-kt-scroll-activate="{default: false, lg: true}"
                                                        data-kt-scroll-max-height="auto"
                                                        data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                                                        data-kt-scroll-wrappers="#kt_modal_update_customer_scroll"
                                                        data-kt-scroll-offset="300px">

                                                        <!--begin::User toggle-->
                                                        <div class="fw-bold fs-3 rotate collapsible mb-7"
                                                            data-bs-toggle="collapse"
                                                            href="#kt_modal_update_customer_user_info" role="button"
                                                            aria-expanded="false"
                                                            aria-controls="kt_modal_update_customer_user_info">
                                                            User Information
                                                            <span class="ms-2 rotate-180">
                                                                <i class="ki-duotone ki-down fs-3"></i> </span>
                                                        </div>
                                                        <!--end::User toggle-->

                                                        <!--begin::User form-->
                                                        <div id="kt_modal_update_customer_user_info"
                                                            class="collapse show">
                                                            <!--begin::Input group-->
                                                            <div class="mb-7">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span>Update Avatar</span>

                                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Allowed file types: png, jpg, jpeg.">
                                                                        <i class="ki-duotone ki-information fs-7"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span><span
                                                                                class="path3"></span></i> </span>
                                                                </label>
                                                                <!--end::Label-->

                                                                <!--begin::Image input wrapper-->
                                                                <div class="mt-1">
                                                                    <!--begin::Image input-->
                                                                    <div class="image-input image-input-outline"
                                                                        data-kt-image-input="true"
                                                                        style="background-image: url('{{asset('admin/media/svg/avatars/blank.svg')}}')">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-125px h-125px"
                                                                            style="background-image: url({{asset($user->image ? 'storage/user/'.$user->image : 'admin/media/svg/avatars/blank.svg')}})">
                                                                        </div>
                                                                        <!--end::Preview existing avatar-->

                                                                        <!--begin::Edit-->
                                                                        <label
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="change"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Change avatar">
                                                                            <i class="ki-duotone ki-pencil fs-7"><span
                                                                                    class="path1"></span><span
                                                                                    class="path2"></span></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" name="avatar"
                                                                                accept=".png, .jpg, .jpeg" />
                                                                            <input type="hidden" name="avatar_remove" />
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Edit-->

                                                                        <!--begin::Cancel-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="cancel"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Cancel avatar">
                                                                            <i class="ki-duotone ki-cross fs-2"><span
                                                                                    class="path1"></span><span
                                                                                    class="path2"></span></i> </span>
                                                                        <!--end::Cancel-->

                                                                        <!--begin::Remove-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="remove"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Remove avatar">
                                                                            <i class="ki-duotone ki-cross fs-2"><span
                                                                                    class="path1"></span><span
                                                                                    class="path2"></span></i> </span>
                                                                        <!--end::Remove-->
                                                                    </div>
                                                                    <!--end::Image input-->
                                                                </div>
                                                                <!--end::Image input wrapper-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Name</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    placeholder="" name="name" value="{{$user->name }}" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span>Email</span>

                                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Email address must be active">
                                                                        <i class="ki-duotone ki-information fs-7"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span><span
                                                                                class="path3"></span></i> </span>
                                                                </label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input type="email"
                                                                    class="form-control form-control-solid"
                                                                    placeholder="" name="email"
                                                                    value="{{$user->email}}" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                        </div>
                                                        <!--end::User form-->

                                                        <!--begin::Billing toggle-->
                                                        <div class="fw-bold fs-3 rotate collapsible collapsed mb-7"
                                                            data-bs-toggle="collapse"
                                                            href="#kt_modal_update_customer_billing_info" role="button"
                                                            aria-expanded="false"
                                                            aria-controls="kt_modal_update_customer_billing_info">
                                                            Address
                                                            <span class="ms-2 rotate-180">
                                                                <i class="ki-duotone ki-down fs-3"></i> </span>
                                                        </div>
                                                        <!--end::Billing toggle-->

                                                        <!--begin::Billing form-->
                                                        <div id="kt_modal_update_customer_billing_info"
                                                            class="collapse">
                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-7 fv-row">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Address Line
                                                                    1</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    placeholder="" name="address1"
                                                                    value="{{$user->address}}" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->



                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-7 fv-row">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Town</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    placeholder="" name="city" value="{{$user->city}}" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="row g-9 mb-7">
                                                                <!--begin::Col-->
                                                                <div class="col-md-6 fv-row">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-semibold mb-2">State /
                                                                        Province</label>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input-->
                                                                    <input class="form-control form-control-solid"
                                                                        placeholder="" name="state" value="{{$user->state}}" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Col-->

                                                                <!--begin::Col-->
                                                                <div class="col-md-6 fv-row">
                                                                    <!--begin::Label-->
                                                                    <label class="fs-6 fw-semibold mb-2">Post
                                                                        Code</label>
                                                                    <!--end::Label-->

                                                                    <!--begin::Input-->
                                                                    <input class="form-control form-control-solid"
                                                                        placeholder="" name="postcode" value="{{$user->postalcode ?? null}}" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-7 fv-row">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">
                                                                    <span>Country</span>

                                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Country of origination">
                                                                        <i class="ki-duotone ki-information fs-7"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span><span
                                                                                class="path3"></span></i> </span>
                                                                </label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <select name="country" aria-label="Select a Country"
                                                                    data-control="select2"
                                                                    data-placeholder="Select a Country..."
                                                                    data-dropdown-parent="#kt_modal_update_customer"
                                                                    class="form-select form-select-solid fw-bold">
                                                                    <option value="">Select a Country...</option>
                                                                    <option value="AF">Afghanistan</option>
                                                                    <option value="AX">Aland Islands</option>
                                                                    <option value="AL">Albania</option>
                                                                    <option value="DZ">Algeria</option>
                                                                    <option value="AS">American Samoa</option>
                                                                    <option value="AD">Andorra</option>
                                                                    <option value="AO">Angola</option>
                                                                    <option value="AI">Anguilla</option>
                                                                    <option value="AG">Antigua and Barbuda</option>
                                                                    <option value="AR">Argentina</option>
                                                                    <option value="AM">Armenia</option>
                                                                    <option value="AW">Aruba</option>
                                                                    <option value="AU">Australia</option>
                                                                    <option value="AT">Austria</option>
                                                                    <option value="AZ">Azerbaijan</option>
                                                                    <option value="BS">Bahamas</option>
                                                                    <option value="BH">Bahrain</option>
                                                                    <option value="BD">Bangladesh</option>
                                                                    <option value="BB">Barbados</option>
                                                                    <option value="BY">Belarus</option>
                                                                    <option value="BE">Belgium</option>
                                                                    <option value="BZ">Belize</option>
                                                                    <option value="BJ">Benin</option>
                                                                    <option value="BM">Bermuda</option>
                                                                    <option value="BT">Bhutan</option>
                                                                    <option value="BO">Bolivia, Plurinational State of
                                                                    </option>
                                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba
                                                                    </option>
                                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                                    <option value="BW">Botswana</option>
                                                                    <option value="BR">Brazil</option>
                                                                    <option value="IO">British Indian Ocean Territory
                                                                    </option>
                                                                    <option value="BN">Brunei Darussalam</option>
                                                                    <option value="BG">Bulgaria</option>
                                                                    <option value="BF">Burkina Faso</option>
                                                                    <option value="BI">Burundi</option>
                                                                    <option value="KH">Cambodia</option>
                                                                    <option value="CM">Cameroon</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="CV">Cape Verde</option>
                                                                    <option value="KY">Cayman Islands</option>
                                                                    <option value="CF">Central African Republic</option>
                                                                    <option value="TD">Chad</option>
                                                                    <option value="CL">Chile</option>
                                                                    <option value="CN">China</option>
                                                                    <option value="CX">Christmas Island</option>
                                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                                    <option value="CO">Colombia</option>
                                                                    <option value="KM">Comoros</option>
                                                                    <option value="CK">Cook Islands</option>
                                                                    <option value="CR">Costa Rica</option>
                                                                    <option value="CI">Côte d'Ivoire</option>
                                                                    <option value="HR">Croatia</option>
                                                                    <option value="CU">Cuba</option>
                                                                    <option value="CW">Curaçao</option>
                                                                    <option value="CZ">Czech Republic</option>
                                                                    <option value="DK">Denmark</option>
                                                                    <option value="DJ">Djibouti</option>
                                                                    <option value="DM">Dominica</option>
                                                                    <option value="DO">Dominican Republic</option>
                                                                    <option value="EC">Ecuador</option>
                                                                    <option value="EG">Egypt</option>
                                                                    <option value="SV">El Salvador</option>
                                                                    <option value="GQ">Equatorial Guinea</option>
                                                                    <option value="ER">Eritrea</option>
                                                                    <option value="EE">Estonia</option>
                                                                    <option value="ET">Ethiopia</option>
                                                                    <option value="FK">Falkland Islands (Malvinas)
                                                                    </option>
                                                                    <option value="FJ">Fiji</option>
                                                                    <option value="FI">Finland</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="PF">French Polynesia</option>
                                                                    <option value="GA">Gabon</option>
                                                                    <option value="GM">Gambia</option>
                                                                    <option value="GE">Georgia</option>
                                                                    <option value="DE">Germany</option>
                                                                    <option value="GH">Ghana</option>
                                                                    <option value="GI">Gibraltar</option>
                                                                    <option value="GR">Greece</option>
                                                                    <option value="GL">Greenland</option>
                                                                    <option value="GD">Grenada</option>
                                                                    <option value="GU">Guam</option>
                                                                    <option value="GT">Guatemala</option>
                                                                    <option value="GG">Guernsey</option>
                                                                    <option value="GN">Guinea</option>
                                                                    <option value="GW">Guinea-Bissau</option>
                                                                    <option value="HT">Haiti</option>
                                                                    <option value="VA">Holy See (Vatican City State)
                                                                    </option>
                                                                    <option value="HN">Honduras</option>
                                                                    <option value="HK">Hong Kong</option>
                                                                    <option value="HU">Hungary</option>
                                                                    <option value="IS">Iceland</option>
                                                                    <option value="IN">India</option>
                                                                    <option value="ID">Indonesia</option>
                                                                    <option value="IR">Iran, Islamic Republic of
                                                                    </option>
                                                                    <option value="IQ">Iraq</option>
                                                                    <option value="IE">Ireland</option>
                                                                    <option value="IM">Isle of Man</option>
                                                                    <option value="IL">Israel</option>
                                                                    <option value="IT">Italy</option>
                                                                    <option value="JM">Jamaica</option>
                                                                    <option value="JP">Japan</option>
                                                                    <option value="JE">Jersey</option>
                                                                    <option value="JO">Jordan</option>
                                                                    <option value="KZ">Kazakhstan</option>
                                                                    <option value="KE">Kenya</option>
                                                                    <option value="KI">Kiribati</option>
                                                                    <option value="KP">Korea, Democratic People's
                                                                        Republic of</option>
                                                                    <option value="KW">Kuwait</option>
                                                                    <option value="KG">Kyrgyzstan</option>
                                                                    <option value="LA">Lao People's Democratic Republic
                                                                    </option>
                                                                    <option value="LV">Latvia</option>
                                                                    <option value="LB">Lebanon</option>
                                                                    <option value="LS">Lesotho</option>
                                                                    <option value="LR">Liberia</option>
                                                                    <option value="LY">Libya</option>
                                                                    <option value="LI">Liechtenstein</option>
                                                                    <option value="LT">Lithuania</option>
                                                                    <option value="LU">Luxembourg</option>
                                                                    <option value="MO">Macao</option>
                                                                    <option value="MG">Madagascar</option>
                                                                    <option value="MW">Malawi</option>
                                                                    <option value="MY">Malaysia</option>
                                                                    <option value="MV">Maldives</option>
                                                                    <option value="ML">Mali</option>
                                                                    <option value="MT">Malta</option>
                                                                    <option value="MH">Marshall Islands</option>
                                                                    <option value="MQ">Martinique</option>
                                                                    <option value="MR">Mauritania</option>
                                                                    <option value="MU">Mauritius</option>
                                                                    <option value="MX">Mexico</option>
                                                                    <option value="FM">Micronesia, Federated States of
                                                                    </option>
                                                                    <option value="MD">Moldova, Republic of</option>
                                                                    <option value="MC">Monaco</option>
                                                                    <option value="MN">Mongolia</option>
                                                                    <option value="ME">Montenegro</option>
                                                                    <option value="MS">Montserrat</option>
                                                                    <option value="MA">Morocco</option>
                                                                    <option value="MZ">Mozambique</option>
                                                                    <option value="MM">Myanmar</option>
                                                                    <option value="NA">Namibia</option>
                                                                    <option value="NR">Nauru</option>
                                                                    <option value="NP">Nepal</option>
                                                                    <option value="NL">Netherlands</option>
                                                                    <option value="NZ">New Zealand</option>
                                                                    <option value="NI">Nicaragua</option>
                                                                    <option value="NE">Niger</option>
                                                                    <option value="NG">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island</option>
                                                                    <option value="MP">Northern Mariana Islands</option>
                                                                    <option value="NO">Norway</option>
                                                                    <option value="OM">Oman</option>
                                                                    <option value="PK">Pakistan</option>
                                                                    <option value="PW">Palau</option>
                                                                    <option value="PS">Palestinian Territory, Occupied
                                                                    </option>
                                                                    <option value="PA">Panama</option>
                                                                    <option value="PG">Papua New Guinea</option>
                                                                    <option value="PY">Paraguay</option>
                                                                    <option value="PE">Peru</option>
                                                                    <option value="PH">Philippines</option>
                                                                    <option value="PL">Poland</option>
                                                                    <option value="PT">Portugal</option>
                                                                    <option value="PR">Puerto Rico</option>
                                                                    <option value="QA">Qatar</option>
                                                                    <option value="RO">Romania</option>
                                                                    <option value="RU">Russian Federation</option>
                                                                    <option value="RW">Rwanda</option>
                                                                    <option value="BL">Saint Barthélemy</option>
                                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                                    <option value="LC">Saint Lucia</option>
                                                                    <option value="MF">Saint Martin (French part)
                                                                    </option>
                                                                    <option value="VC">Saint Vincent and the Grenadines
                                                                    </option>
                                                                    <option value="WS">Samoa</option>
                                                                    <option value="SM">San Marino</option>
                                                                    <option value="ST">Sao Tome and Principe</option>
                                                                    <option value="SA">Saudi Arabia</option>
                                                                    <option value="SN">Senegal</option>
                                                                    <option value="RS">Serbia</option>
                                                                    <option value="SC">Seychelles</option>
                                                                    <option value="SL">Sierra Leone</option>
                                                                    <option value="SG">Singapore</option>
                                                                    <option value="SX">Sint Maarten (Dutch part)
                                                                    </option>
                                                                    <option value="SK">Slovakia</option>
                                                                    <option value="SI">Slovenia</option>
                                                                    <option value="SB">Solomon Islands</option>
                                                                    <option value="SO">Somalia</option>
                                                                    <option value="ZA">South Africa</option>
                                                                    <option value="KR">South Korea</option>
                                                                    <option value="SS">South Sudan</option>
                                                                    <option value="ES">Spain</option>
                                                                    <option value="LK">Sri Lanka</option>
                                                                    <option value="SD">Sudan</option>
                                                                    <option value="SR">Suriname</option>
                                                                    <option value="SZ">Swaziland</option>
                                                                    <option value="SE">Sweden</option>
                                                                    <option value="CH">Switzerland</option>
                                                                    <option value="SY">Syrian Arab Republic</option>
                                                                    <option value="TW">Taiwan, Province of China
                                                                    </option>
                                                                    <option value="TJ">Tajikistan</option>
                                                                    <option value="TZ">Tanzania, United Republic of
                                                                    </option>
                                                                    <option value="TH">Thailand</option>
                                                                    <option value="TG">Togo</option>
                                                                    <option value="TK">Tokelau</option>
                                                                    <option value="TO">Tonga</option>
                                                                    <option value="TT">Trinidad and Tobago</option>
                                                                    <option value="TN">Tunisia</option>
                                                                    <option value="TR">Turkey</option>
                                                                    <option value="TM">Turkmenistan</option>
                                                                    <option value="TC">Turks and Caicos Islands</option>
                                                                    <option value="TV">Tuvalu</option>
                                                                    <option value="UG">Uganda</option>
                                                                    <option value="UA">Ukraine</option>
                                                                    <option value="AE">United Arab Emirates</option>
                                                                    <option value="GB">United Kingdom</option>
                                                                    <option value="US">United States</option>
                                                                    <option value="UY">Uruguay</option>
                                                                    <option value="UZ">Uzbekistan</option>
                                                                    <option value="VU">Vanuatu</option>
                                                                    <option value="VE">Venezuela, Bolivarian Republic of
                                                                    </option>
                                                                    <option value="VN">Vietnam</option>
                                                                    <option value="VI">Virgin Islands</option>
                                                                    <option value="YE">Yemen</option>
                                                                    <option value="ZM">Zambia</option>
                                                                    <option value="ZW">Zimbabwe</option>
                                                                </select>
                                                                <!--end::Input-->
                                                            </div>

                                                        </div>
                                                        <!--end::Billing form-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                </div>
                                                <!--end::Modal body-->

                                                <!--begin::Modal footer-->
                                                <div class="modal-footer flex-center">
                                                    <!--begin::Button-->
                                                    <button type="reset" id="kt_modal_update_customer_cancel"
                                                        class="btn btn-light me-3">
                                                        Discard
                                                    </button>
                                                    <!--end::Button-->

                                                    <!--begin::Button-->
                                                    <button type="submit" id="kt_modal_update_customer_submit"
                                                        class="btn btn-primary">
                                                        <span class="indicator-label">
                                                            Submit
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                                <!--end::Modal footer-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal - New Address-->

                            </div>
@endsection


@section('custom-js')
{{-- <script src="{{asset('admin/js/custom/apps/customers/view/add-payment.js')}}"></script> --}}
    <script src="{{asset('admin/js/custom/apps/customers/view/adjust-balance.js')}}"></script>
    {{-- <script src="{{asset('admin/js/custom/apps/customers/view/invoices.js')}}"></script> --}}
    {{-- <script src="{{asset('admin/js/custom/apps/customers/view/payment-method.js')}}"></script> --}}
    <script src="{{asset('admin/js/custom/apps/customers/view/payment-table.js')}}"></script>
    {{-- <script src="{{asset('admin/js/custom/apps/customers/view/statement.js')}}"></script> --}}
    <script src="{{asset('admin/js/custom/apps/customers/update.js')}}"></script>
@endsection
