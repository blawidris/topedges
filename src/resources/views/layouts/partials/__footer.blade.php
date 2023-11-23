<footer class="landing-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2 align-items-start d-flex flex-column">
                <a href="{{ url('/') }}" class="mb-4">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="{{config('app.name')}}" width="120">
                </a>
                <address>
                    Utoquai 29 8007 Zürich, Switzerland 
                </address>
            </div>
            <div class="col-md-10 d-flex justify-content-md-end align-items-md-center">
                <div class="d-flex w-full">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about-us') }}">About</a></li>
                        <li><a href="{{ url('/news') }}">News</a></li>
                        <li><a href="{{ url('/faqs') }}">FAQs</a></li>
                    </ul>

                    <ul>
                        <li><a href="{{ url('/exchange') }}">Exchange</a></li>
                        <li><a href="{{ url('/markets') }}">Market</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                        <li><a href="{{ url('/terms-condition') }}">Terms & Condition</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
