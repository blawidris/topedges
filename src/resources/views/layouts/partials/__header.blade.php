<header class="dark-bb">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.svg') }}"
                    alt="{{ config('app.name') }}" width="120"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
                aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="headerMenu">
                <ul class="navbar-nav ml-auto">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about-us') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                           About
                        </a>

                    </li>

                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('/markets') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            Market
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/faqs') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                           Faqs
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/news') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            News
                        </a>

                    </li>
                    @endguest

                </ul>
                @guest
                    <div class="navbar-nav ml-auto pr-5">
                        <a href="{{ url('/login') }}" class="border-bottom text-gray pb-1 fs-3">Login</a>
                    </div>
                    <div id="google_translate_element"></div>
                    @else
                    <ul class="navbar-nav profile mr-5">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle"
                                        src="{{Auth::user()->image ? asset('storage/'.Auth::user()->image) : 'https://via.placeholder.com/50'}}"
                                        alt="" width="50">
                                    <p class="mb-0 d-sm-block navbar-profile-name">${{Auth::user()->wallet->current_balance ?? 0}}</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="text-white p-2 mb-0">{{ Auth::user()->f_name.' '.Auth::user()->l_name}}</h6>
                                {{-- <div class="btn btn-success w-100 rounded-0 btn-sm">Ayoola Joy</div> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="{{ route('dashboard') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-grid text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Dashboard</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item" href="{{ route('profile') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-account text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">My Profile</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item" href="{{ route('wallet') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-wallet text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">My Wallet</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item" href="{{ route('settings') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-cog text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                @endguest
            </div>
        </nav>
    </div>
</header>
