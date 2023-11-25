<!DOCTYPE html>

<html>

<head>
    <title>Coynarb - @yield('pageTitle')</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->


    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Logo-->
            <a href="{{ route('admin.login') }}" class="d-block d-lg-none mx-auto py-20">
                <img alt="Logo" src="{{ asset('admin/media/logos/logo.svg') }}"
                    class="theme-light-show h-25px" />
                <img alt="Logo" src="{{ asset('admin/media/logos/logo.svg') }}"
                    class="theme-dark-show h-25px" />
            </a>
            <!--end::Logo-->

            <!--begin::Aside-->
            <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">

                    @yield('contents')

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
        </div>
    </div>
    <!--end::Authentication - Sign-in-->
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{url('/admin')}}";
        var _token = "{{csrf_token()}}";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    @yield('custom-js')
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

</body>

</html>
