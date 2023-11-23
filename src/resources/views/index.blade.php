<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top Edges</title>
    <link rel="icon" href="{{ asset('assets/img/logo-light.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body id="dark">
    @include('layouts.partials.__header')

    <div class="landing-hero pb-6 mb-6">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h2>Unlock Your Financial Potential: <span class="border-bottom border-2">Invest</span> with
                        Confidence</h2>
                    <p>Join Thousands of Traders Making Smart Investments</p>
                    <div class="input-group">
                        <a href="/register" class="btn btn-primary fs-6 py-2 px-6" type="button"
                            id="button-addon2">Start Earning</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <img src="{{ asset('assets/img/landing/dash-preview-dark.png') }}" class="" alt="">
                </div>
            </div>
        </div>
    </div>


    <script src="https://price-static.crypto.com/latest/public/static/widget/index.js" defer></script>

    <div id="crypto-widget-CoinMarquee" data-transparent="true" data-theme="dark" data-design="modern"
        data-coin-ids="1,166,136,382,20,1120,1986,29,418,440"></div>

    <div class="benefits py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/bar-chart-line-fill.svg') }}" alt="">
                        <h3>Grow Your Wealth</h3>
                        <p>
                            Take investment decisions that will help you grow your portfolio. As a leading and
                            experienced investment platform, Topedges is built on the principle that we succeed when
                            our investors succeed

                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/clipboard2-data-fill.svg') }}" alt="">
                        <h3>Break Your Own Investment Records</h3>
                        <p>
                            With Topedges, You can make a lot from investments. You can make even more as many times as
                            you like, setting a good record and breaking your own records.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/patch-check-fill.svg') }}" alt="">
                        <h3>World Class Professionals and Support</h3>
                        <p>
                            All your investment is managed by our world class investment professional. We have an
                            unbeatable and highly responsive support team that will guide you every step of the way.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="landing-feature landing-start border-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>You are one step closer to start earning</h2>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/user.svg') }}">
                        <span>1</span>
                        <h3>Create an account </h3>
                        <p>Begin your journey by setting up your account on our platform</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/bank.svg') }}" alt="">
                        <span>
                            2
                        </span>
                        <h3>Deposit</h3>
                        <p>Add funds securely to your account to start your investment journey.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item text-left">
                        <img src="{{ asset('assets/img/landing/trade.svg') }}" alt="">
                        <h3>Earn</h3>
                        <p>Choose your investment options and start growing your assets with confidence.</p>
                        <span>3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="landing-info-one landing-info-one-bg mtb100">
        <div class="container">
            <div class="row flex-row-reverse align-items-center">
                <div class="col-md-7">
                    <h6>About Us</h6>
                    <h2>Who we are</h2>
                    <p>
                        Welcome to our crypto investment platform, where we're committed to helping investors reach
                        their
                        financial aspirations through the power of blockchain tech and digital assets. We're firm
                        believers in the transformative potential of cryptocurrencies for the financial sector, aiming
                        to usher in a more decentralized and transparent future.
                    </p>
                    <p>
                        Our mission is to demystify crypto investing, making it accessible to all, whether you're a
                        novice or an experienced trader. We've developed a user-friendly platform enabling seamless
                        cryptocurrency buying, selling, and trading.
                    </p>
                    <div class="d-inline-flex align-items-center">
                        <a href="{{route('about')}}" class="btn btn-primary btn-rounded px-6 py-2">Learn more</a>
                        <a href="javascript:void(0)" class="btn btn-secondary btn-rounded px-6 py-2 ml-3"
                            id="showVideoBtn">Watch
                            <i class="bi bi-play-fill ml-3 text-primary fs-20"></i></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('assets/img/landing/man-trade.png') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="landing-feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Here are a few reasons why <br> you should choose Coynarb</h2>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/stroge.svg') }}" alt="">
                        <h3>Stable & Profitable</h3>
                        <p>Our platform offers stability and profitability by leveraging blockchain technology for
                            secure, reliable investments.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/backup.svg') }}" alt="">
                        <h3>Instant Withdrawal</h3>
                        <p>Enjoy hassle-free withdrawals with our instant withdrawal feature, ensuring quick access to
                            your funds when needed.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="landing-feature-item">
                        <img src="{{ asset('assets/img/landing/managment.svg') }}" alt="">
                        <h3>Referral Bonus</h3>
                        <p>Refer friends and earn bonuses, enhancing your investment journey and expanding your crypto
                            network.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="landing-info-one mtb100">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- TradingView Widget BEGIN -->
                    <img src="{{ asset('assets/img/img-1.PNG') }}">
                </div>
                <div class="offset-md-1 col-md-6 mt-5">
                    <h2 class="mt-5">Live Market Gainers and Losers tracking</h2>
                    <p>We engage in the exchange of the top most price and lowest price of crypto coins through our AI
                        crypto arbitrage trading Bot, so as to earn the difference between two exchangers.</p>
                    <ul>
                        <li><i class="icon ion-ios-checkmark-circle"></i> Live Topmost Price Tracking</li>
                        <li><i class="icon ion-ios-checkmark-circle"></i> Live Lowest Price Tracking</li>
                        <li><i class="icon ion-ios-checkmark-circle"></i> Live Market Data</li>
                        <li><i class="icon ion-ios-checkmark-circle"></i> Live Cryptocurrency Price</li>
                        <li><i class="icon ion-ios-checkmark-circle"></i> Past Coin Price check</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="landing-number py-15">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>$657B</h2>
                    <p>Quarterly volume traded</p>
                </div>
                <div class="col-md-4">
                    <h2>100+</h2>
                    <p>Countries supported
                    </p>
                </div>
                <div class="col-md-4">
                    <h2>56+M</h2>
                    <p>Verified users
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="landing-feature pt-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>We strive to offer an unparalleled <br> experience by providing you with:</h2>
                </div>

                <div class="col-md-4">
                    <div class="landing-feature-item  d-flex flex-column align-items-start justify-items-start">
                        <span class="icon mb-2 fs-40">
                            <i class="bi bi-laptop"></i>
                        </span>
                        <h3 class="fs-16 mb-0">Educational Resources</h3>
                        <p>Access a wealth of educational materials, including articles, tutorials, and webinars, to
                            expand your crypto knowledge</p>
                        <a href="#" class="d-flex align-items-center ml-auto">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="landing-feature-item d-flex flex-column align-items-start justify-items-start">
                        <span class="icon mb-2">
                            <i class="bi bi-passport fs-40"></i>
                        </span>
                        <h3 class="fs-16 mb-0">Portfolio Management</h3>
                        <p>Effectively manage your digital assets with our user-friendly tools, ensuring your
                            investments align with your goals</p>
                        <a href="#" class="d-flex align-items-center ml-auto">Get Started</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="landing-feature-item d-flex flex-column align-items-start justify-items-start">
                        <span class="icon mb-2">
                            <i class="bi bi-bar-chart fs-40"></i>

                        </span>
                        <h3 class="fs-16 mb-0">Market Analysis </h3>
                        <p>Stay ahead with our in-depth market analysis, providing insights and trends to make informed
                            crypto investment decisions.</p>
                        <a href="#" class="d-flex align-items-center ml-auto">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="landing-sub">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="landing-sub-content">
                        <h2>Becoming part of the global community of people who have found their part to earning through
                            our crypto trading system
                        </h2>
                        <a href="{{ url('register') }}">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="landing-testimonial pt-100 pb-60">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 mb-5">
                    <h2>Read what they say about us</h2>
                    <p class="text-medium">Client’s Words & Ratings</p>
                </div>

                <div class="col-md-7">
                    <div class="swiper mySwiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="testimonial-item bg-light px-3 py-4">
                                    <div class="testimonial-header">
                                        <div class="rating mb-3 d-inline align-items-center">
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                        </div>
                                        <p class="content">
                                            I've been using this investment platform for over a year now, and it has
                                            completely transformed the way I manage my investments. The user-friendly
                                            interface and insightful analytics have made my job as a financial analyst
                                            much more efficient. I highly recommend it
                                        </p>
                                    </div>
                                    <div class="author">
                                        <div class="image">
                                            <img src="{{ asset('assets/img/client/client-1.jpg') }}" alt="">
                                        </div>
                                        <div class="about">
                                            <h5 class="name">Jamie Johnson</h5>
                                            <span class="job">Crypto Trader</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial-item bg-light px-3 py-4">
                                    <div class="testimonial-header">
                                        <div class="rating mb-3 d-inline align-items-center">
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                        </div>
                                        <p class="content">
                                            I've been using this investment platform for over a year now, and it has
                                            completely transformed my crypto trading experience. The intuitive interface
                                            and diverse range of crypto assets to choose from have helped me make
                                            informed investment decisions. I've seen significant returns on my
                                            investments, and I couldn't be happier!
                                    </div>
                                    <div class="author">
                                        <div class="image">
                                            <img src="{{ asset('assets/img/client/client-2.jpg') }}" alt="">
                                        </div>
                                        <div class="about">
                                            <h5 class="name">David Williams</h5>
                                            <span class="job">Crypto Enthusiast</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial-item bg-light px-3 py-4">
                                    <div class="testimonial-header">
                                        <div class="rating mb-3 d-inline align-items-center">
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                        </div>
                                        <p class="content">
                                            As a small business owner, I've found this investment platform to be a
                                            game-changer. It's helped me grow and diversify my investments, which has
                                            had a positive impact on my business's financial health. I couldn't be
                                            happier with the results!
                                        </p>
                                    </div>
                                    <div class="author">
                                        <div class="image">
                                            <img src="{{ asset('assets/img/client/client-3.jpg') }}" alt=""
                                                style="width:45px; max-height:45px;border-radius:5px;background-size:cover;">
                                        </div>
                                        <div class="about">
                                            <h5 class="name">Sarah Johnson</h5>
                                            <span class="job">Small Business Owner</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial-item bg-light px-3 py-4">
                                    <div class="testimonial-header">
                                        <div class="rating mb-3 d-inline align-items-center">
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                        </div>
                                        <p class="content">
                                            I've been using this investment platform for my retirement savings, and it
                                            has provided me with a secure and stable investment experience. The support
                                            team is always responsive and helpful. I can enjoy my retirement knowing my
                                            investments are in good hands.
                                    </div>
                                    <div class="author">
                                        <div class="image">
                                            <img src="{{ asset('assets/img/client/client-4.jpg') }}" alt=""
                                                style="width:45px; max-height:45px;border-radius:5px;background-size:cover;">
                                        </div>
                                        <div class="about">
                                            <h5 class="name">David Miller</h5>
                                            <span class="job">Retired Engineer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial-item bg-light px-3 py-4">
                                    <div class="testimonial-header">
                                        <div class="rating mb-3 d-inline align-items-center">
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                            <i class="bi bi-star-fill text-warning fs-20"></i>
                                        </div>
                                        <p class="content">
                                            I was a novice in the world of investments, but this platform made it easy
                                            for me to get started. The educational resources and user-friendly tools
                                            helped me make informed decisions. Now, I'm on track to achieve my financial
                                            goals.
                                    </div>
                                    <div class="author">
                                        <div class="image">
                                            <img src="{{ asset('assets/img/client/client-5.jpg') }}"
                                                style="width:45px; max-height:45px;border-radius:5px;background-size:cover;">
                                        </div>
                                        <div class="about">
                                            <h5 class="name">Jennifer Lee</h5>
                                            <span class="job">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('assets/img/graph.png') }}" alt="">
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div id="videoContainer" class="video-player">
        <div class="video-player-overlay"></div>
        <video controls width="500" height="300">
            <source src="https://youtu.be/a6HialyAqS0" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    @include('layouts.partials.__footer')


    {{-- <script src="//code.tidio.co/g3nwaizvhjp2gdt0uxl3j7ar9ua1bmuy.js" async></script> --}}

    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/amcharts-core.min.js') }}"></script>
    <script src="{{ asset('assets/js/amcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

     <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/653ef745f2439e1631e9baa1/1hduvbqn1';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


    <script>
        const swiper = new Swiper(".mySwiper", {
            // Optional parameters
            direction: "horizontal",
            loop: true,
            slidesPerView: 2,
            speed: 1000,
            autoplay: {
                delay: 5000,
            },
            effect: "fadeEffect",
            fadeEffect: {
                crossFade: true
            },
            // grid: {
            //     rows: 2,
            // },
        });

        const showVideoBtn = document.getElementById("showVideoBtn");
        const videoContainer = document.getElementById("videoContainer");
        const videoContainerOverlay = document.querySelector(".video-player-overlay");

        showVideoBtn.addEventListener("click", function() {
            videoContainer.style.display = "flex";
        });

        videoContainerOverlay.addEventListener("click", function() {
            videoContainer.style.display = "none";
        });
    </script>
</body>

</html>
