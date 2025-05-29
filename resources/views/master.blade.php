<!DOCTYPE html>
<html lang="fa" dir="rtl" data-menu-size="sm-hover">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>سامانه پیش ثبت نام | مجتمع فرهیختگان سراج</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Ferdoc" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    @yield('header')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontiran.min.css')}}">
    <script src="{{asset('js/config.js')}}"></script>
    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body>
<div class="wrapper">
    <header class="topbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="d-flex align-items-center">
                    <!-- دکمه toggle منو -->
                    <div class="topbar-item">
                        <button type="button" class="button-toggle-menu me-2">
                            <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle"></iconify-icon>
                        </button>
                    </div>

                    <!-- عنوان صفحه -->
                    <div class="topbar-item">
                        <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">سامانه پیش ثبت نام مجتمع فرهیختگان سراج</h4>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-1">

                    <!-- تم رنگ (روشن/تاریک) -->
                    <div class="topbar-item">
                        <button type="button" class="topbar-button" id="light-dark-mode">
                            <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                        </button>
                    </div>


                    <!-- تنظیمات تم -->
                    <div class="topbar-item d-none d-md-flex">
                        <button type="button" class="topbar-button" id="theme-settings-btn" data-bs-toggle="offcanvas"
                                data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <iconify-icon icon="solar:settings-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </header>


    <div class="main-nav">
        <!-- Sidebar Logo -->
        <div class="logo-box">
            <a href="index.html" class="logo-dark">
{{--                <img src="/images/logo-sm.png" class="logo-sm" alt="logo sm">--}}
                <img src="/images/logo.png" height="40" alt="logo dark">
            </a>

            <a href="index.html" class="logo-light">
{{--                <img src="/images/logo-sm.png" class="logo-sm" alt="logo sm">--}}
                <img src="/images/logo-light.png" height="40" alt="logo light">
            </a>
        </div>

        <!-- Menu Toggle Button (sm-hover) -->
        <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
            <iconify-icon icon="solar:double-alt-arrow-left-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
        </button>

        <div class="scrollbar" data-simplebar>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title">عمومی</li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                            </span>
                        <span class="nav-text"> داشبورد </span>
                    </a>
                </li>
                @role('administrator')
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarUsers">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                            </span>
                        <span class="nav-text"> مدیریت کاربران </span>
                    </a>
                    <div class="collapse" id="sidebarUsers">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{route('userList')}}">لیست کاربران</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{route('addUserPage')}}">افزودن کاربر</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarRequests" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarRequests">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:layers-bold-duotone"></iconify-icon>
                            </span>
                        <span class="nav-text"> مدیریت پنل </span>
                    </a>
                    <div class="collapse" id="sidebarRequests">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{route('applyList')}}">مدیریت درخواست ها</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{route('filterApply')}}">جستجوی پیشرفته</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{route('levelList')}}">مدیریت مقاطع</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('addApplyPage')}}">--}}
{{--                            <span class="nav-icon">--}}
{{--                                <iconify-icon icon="solar:pen-new-square-bold-duotone"></iconify-icon>--}}
{{--                            </span>--}}
{{--                        <span class="nav-text"> درخواست پیش ثبت نام </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('applyList')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:pen-new-square-bold-duotone"></iconify-icon>
                            </span>
                        <span class="nav-text"> درخواست های من </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:user-block-rounded-bold-duotone"></iconify-icon>
                            </span>
                        <span class="nav-text">خروج</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

@yield('content')

</div>


<div>
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">تنظیمات تم</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="بستن"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3 settings-bar">

                    <div>
                        <h5 class="mb-3 font-16 fw-semibold">طرح رنگ</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light" value="light">
                            <label class="form-check-label" for="layout-color-light">روشن</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
                            <label class="form-check-label" for="layout-color-dark">تاریک</label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 font-16 fw-semibold">رنگ نوار بالایی</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                            <label class="form-check-label" for="topbar-color-light">روشن</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                            <label class="form-check-label" for="topbar-color-dark">تاریک</label>
                        </div>
                    </div>


                    <div>
                        <h5 class="my-3 font-16 fw-semibold">رنگ منو</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-light" value="light">
                            <label class="form-check-label" for="leftbar-color-light">
                                روشن
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-dark" value="dark">
                            <label class="form-check-label" for="leftbar-color-dark">
                                تاریک
                            </label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 font-16 fw-semibold">اندازه سایدبار</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-default" value="default">
                            <label class="form-check-label" for="leftbar-size-default">
                                پیش‌فرض
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small" value="condensed">
                            <label class="form-check-label" for="leftbar-size-small">
                                فشرده
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-hidden" value="hidden">
                            <label class="form-check-label" for="leftbar-hidden">
                                پنهان
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small-hover-active" value="sm-hover-active">
                            <label class="form-check-label" for="leftbar-size-small-hover-active">
                                کوچک و فعال بر روی هاور
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small-hover" value="sm-hover">
                            <label class="form-check-label" for="leftbar-size-small-hover">
                                کوچک و هاور
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-danger w-100" id="reset-layout">بازنشانی</button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- ========== Footer Start ========== -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <script>document.write(new Date().getFullYear())</script> &copy; ساخته شده توسط
                <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon>
                <a
                    href="https://atiehertebat.ir" class="fw-bold footer-text" target="_blank">آتیه ارتباط کیش</a>
            </div>
        </div>
    </div>
</footer>
<!-- ========== Footer End ========== -->
<script src="{{asset('libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src='{{asset('js/components/extended-sweetalert.js')}}'></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/layout.js')}}"></script>



<script>
    @foreach ($errors->all() as $error)
    Toastify({
        text: "{{ $error }}",
        duration: 3000,
        gravity: "top", // بالا نمایش داده بشه
        position: "right", // سمت راست صفحه
        backgroundColor: "#ef5f5f",
        style: {
            maxWidth: "300px", // عرض محدود بشه
            whiteSpace: "nowrap" // نذاره متن بشکنه
        }
    }).showToast();
    @endforeach
    // Check if there's a success message in the session
    @if(Session::has('success'))
    Toastify({
        text: "{{ Session::get('success') }}",
        duration: 3000,
        gravity: "top", // top or bottom
        position: "right", // left, center, or right
        backgroundColor: "#22c55e",
        style: {
            maxWidth: "300px", // عرض محدود بشه
            whiteSpace: "nowrap" // نذاره متن بشکنه
        }
    }).showToast();
    @endif
    // Check if there's an error message in the session
    @if(Session::has('error'))
    Toastify({
        text: "{{ Session::get('error') }}",
        duration: 3000,
        gravity: "top", // top or bottom
        position: "right", // left, center, or right
        backgroundColor: "#ef5f5f",
        style: {
            maxWidth: "300px", // عرض محدود بشه
            whiteSpace: "nowrap" // نذاره متن بشکنه
        }
    }).showToast();
    @endif
</script>
{{--<script type="text/javascript">--}}
{{--    !function(){var i="4p2eFy",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();--}}
{{--</script>--}}

@yield('footer')
</body>

</html>
