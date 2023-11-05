<footer class="landing-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2 align-items-start d-flex flex-column">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo-light.png') }}" alt="">
                </a>
                <address>
                    Utoquai 29 8007 Zürich, Switzerland 
                </address>
            </div>
            <div class="col-md-10 d-flex justify-content-end align-items-center">
                <div class="d-flex w-full flex-wrap">
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
