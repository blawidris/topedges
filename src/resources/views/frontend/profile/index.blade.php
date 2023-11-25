@extends('layouts.frontend')

@section('pageTitle', "Profile")

@section('content')
    <div class="settings pt-5 py-60">
        <div class="container">

            <div class="row justify-content-center">
                {{-- <div class="col-md-12 col-lg-3">
                <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab">
                  <a class="nav-link active" href="{{url('/profile')}}"><i class="icon ion-md-person"></i> Profile</a>
                  <a class="nav-link" id="settings-wallet-tab" href="{{url('/wallet')}}"><i class="icon ion-md-wallet"></i> Wallet</a>
                  <a class="nav-link " id="settings-tab" href="{{url('/settings')}}"><i class="icon ion-md-settings"></i> Settings</a>
                </div>
              </div> --}}

                <div class="col-md-12 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="border-bottom text-left pb-4">
                                        <div class="d-flex align-items-start gap-2">
                                            <img src="{{ asset($user->image ? 'storage/users/' . $user->image : 'https://via.placeholder.com/50') }}"
                                                alt="profile" class="img-lg rounded-circle mb-3" width="30">
                                            <div class="ml-3 text-left">
                                                <h3 class="text-white mb-0">
                                                    {{ ucfirst($user->f_name) . ' ' . ucfirst($user->l_name) }}
                                                </h3>
                                                <div class="d-flex align-items-center">
                                                    <span class="mb-0 me-2 text-muted">{{ ucfirst($user->country) }}</span>
                                                </div>
                                                <a class="badge badge-primary mt-2"
                                                    onclick="location.href='{{ route('edit-profile') }}'">Edit
                                                    Profile</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="py-4 text-white mt-5">
                                        <p class="clearfix">
                                            <span class="float-left"> KYC Status </span>
                                            <span
                                                class="float-right badge badge-{{ !empty($user->userkyc->status) ? 'success' : 'warning' }} ">
                                                {{ !empty($user->userkyc->status) ? 'Verified' : 'Pending' }} </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left"> Phone </span>
                                            <span class="float-right text-muted"> {{ $user->phone ?? null }} </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left"> E-mail </span>
                                            <span class="float-right text-muted"> {{ $user->email ?? null }} </span>
                                        </p>
                                        <p class="clearfix d-flex justify-content-between">
                                        <div class="float-left"> Wallet Address </div>
                                        <div class="float-right text-muted flex-end">
                                            {{ $user->wallet->wallet_address ?? 'none' }}
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-7">
                                    <div class="py-2">

                                        <ul class="nav nav-pills profile-navbar" role="tablist"
                                            aria-orientation="horizontal">

                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#recentActivity"
                                                    role="tab" aria-selected="true">
                                                    <i class="mdi mdi-newspaper"></i> Recent Activities</a>
                                            </li>

                                        </ul>
                                    </div>
                                    {{-- <div class="profile-feed tab-pane fade" id="kycVerification" role="tabpanel">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <img src="../../../assets/images/faces/face13.jpg" alt="profile"
                                                class="img-sm rounded-circle">
                                            <div class="ms-4">
                                                <h6> Mason Beck <small class="ms-4 text-muted"><i
                                                            class="mdi mdi-clock me-1"></i>10 hours</small>
                                                </h6>
                                                <p> There is no better advertisement campaign that is low cost and also
                                                    successful at the same time. </p>
                                                <p class="small text-muted mt-2 mb-0">
                                                    <span>
                                                        <i class="mdi mdi-star me-1"></i>4 </span>
                                                    <span class="ms-2">
                                                        <i class="mdi mdi-comment me-1"></i>11 </span>
                                                    <span class="ms-2">
                                                        <i class="mdi mdi-reply"></i>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <img src="../../../assets/images/faces/face16.jpg" alt="profile"
                                                class="img-sm rounded-circle">
                                            <div class="ms-4">
                                                <h6> Willie Stanley <small class="ms-4 text-muted"><i
                                                            class="mdi mdi-clock me-1"></i>10 hours</small>
                                                </h6>
                                                <img src="../../../assets/images/samples/1280x768/12.jpg" alt="sample"
                                                    class="rounded mw-100">
                                                <p class="small text-muted mt-2 mb-0">
                                                    <span>
                                                        <i class="mdi mdi-star me-1"></i>4 </span>
                                                    <span class="ms-2">
                                                        <i class="mdi mdi-comment me-1"></i>11 </span>
                                                    <span class="ms-2">
                                                        <i class="mdi mdi-reply"></i>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start profile-feed-item">
                                            <img src="../../../assets/images/faces/face19.jpg" alt="profile"
                                                class="img-sm rounded-circle">
                                            <div class="ms-4">
                                                <h6> Dylan Silva <small class="ms-4 text-muted"><i
                                                            class="mdi mdi-clock me-1"></i>10 hours</small>
                                                </h6>
                                                <p> When I first got into the online advertising business, I was looking for
                                                    the magical combination that would put my website into the top search
                                                    engine rankings </p>
                                                <img src="../../../assets/images/samples/1280x768/5.jpg" alt="sample"
                                                    class="rounded mw-100">
                                                <p class="small text-muted mt-2 mb-0">
                                                    <span>
                                                        <i class="mdi mdi-star me-1"></i>4 </span>
                                                    <span class="ms-2">
                                                        <i class="mdi mdi-comment me-1"></i>11 </span>
                                                    <span class="ms-2">
                                                        <i class="mdi mdi-reply"></i>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="profile-feed tab-pane fade show active" id="recentActivity" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="preview-list">
                                                    <div class="preview-item p-3 border-bottom">
                                                        <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-primary">
                                                                <i class="mdi mdi-file-document"></i>
                                                            </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex d-flex  flex-grow-1">
                                                            <div class="flex-grow-1">
                                                                <h6 class="card-title mb-1">Admin dashboard design</h6>
                                                                <p class="text-muted mb-0">Broadcast web app mockup</p>
                                                            </div>
                                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                <p class="text-muted">15 minutes ago</p>
                                                                <p class="text-muted mb-0">30 tasks, 5 issues </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item p-3 border-bottom">
                                                        <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-success">
                                                                <i class="mdi mdi-cloud-download"></i>
                                                            </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow-1">
                                                            <div class="flex-grow-1">
                                                                <h6 class="card-title mb-1">Wordpress Development</h6>
                                                                <p class="text-muted mb-0">Upload new design</p>
                                                            </div>
                                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                <p class="text-muted">1 hour ago</p>
                                                                <p class="text-muted mb-0">23 tasks, 5 issues </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item p-3 border-bottom">
                                                        <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-info">
                                                                <i class="mdi mdi-clock"></i>
                                                            </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow-1">
                                                            <div class="flex-grow-1">
                                                                <h6 class="card-title mb-1">Project meeting</h6>
                                                                <p class="text-muted mb-0">New project discussion</p>
                                                            </div>
                                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                <p class="text-muted">35 minutes ago</p>
                                                                <p class="text-muted mb-0">15 tasks, 2 issues</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item p-3 border-bottom">
                                                        <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-danger">
                                                                <i class="mdi mdi-email-open"></i>
                                                            </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow-1">
                                                            <div class="flex-grow-1">
                                                                <h6 class="card-title mb-1">Broadcast Mail</h6>
                                                                <p class="text-muted mb-0">Sent release details to team</p>
                                                            </div>
                                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                <p class="text-muted">55 minutes ago</p>
                                                                <p class="text-muted mb-0">35 tasks, 7 issues </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item p-3">
                                                        <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-warning">
                                                                <i class="mdi mdi-chart-pie"></i>
                                                            </div>
                                                        </div>
                                                        <div class="preview-item-content d-sm-flex flex-grow-1">
                                                            <div class="flex-grow-1">
                                                                <h6 class="card-title mb-1">UI Design</h6>
                                                                <p class="text-muted mb-0">New application planning</p>
                                                            </div>
                                                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                                <p class="text-muted">50 minutes ago</p>
                                                                <p class="text-muted mb-0">27 tasks, 4 issues </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-flash-message :status="session('status')" :message="session('message')" />
@endsection
