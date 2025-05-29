<!DOCTYPE html>
<html dir="rtl" lang="fa" class="h-100">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>ورود | مجتمع فرهیختگان سراج</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontiran.min.css')}}">
    <script src="{{asset('js/config.js')}}"></script>

</head>

<body class="h-100">
<div class="d-flex flex-column h-100 p-3">
    <div class="d-flex flex-column flex-grow-1">
        <div class="row h-100">
            <div class="col-xxl-7">
                <div class="row justify-content-center h-100">
                    <div class="col-lg-6 py-lg-5">
                        <div class="d-flex flex-column h-100 justify-content-center">
                            <div class="auth-logo mb-4">
                                <a href="{{ route('dashboard') }}" class="logo-dark">
                                    <img src="{{asset('images/logo.png')}}" height="80" alt="مدرسه فرهیختگان سراج">
                                </a>

                                <a href="{{ route('dashboard') }}" class="logo-light">
                                    <img src="{{asset('images/logo.png')}}" height="80" alt="مدرسه فرهیختگان سراج">
                                </a>
                            </div>

                            <h2 class="fw-bold fs-24">تنظیم مجدد رمز عبور</h2>

                            <p class="text-muted mt-1 mb-4">
                                شماره موبایل خود را وارد نمایید. رمز عبور جدید برای شماره موبایل ثبت شده ارسال می شود.
                            </p>

                            <div>
                                <form method="POST" action="{{ route('submitResetPassword') }}" class="authentication-form">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="mobile">شماره موبایل</label>
                                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="شماره موبایل خود را وارد کنید"/>
                                    </div>
                                    <div class="mb-1 text-center d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            تنظیم مجدد رمز عبور
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <p class="mt-2 text-danger text-center">
                                بازگشت به <a href="{{ route('login') }}" class="text-dark fw-bold ms-1">ورود</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-5 d-none d-xxl-flex">
                <div class="card h-100 mb-0 overflow-hidden">
                    <div class="d-flex flex-column h-100">
                        <img src="{{asset('images/small/img-10.jpg')}}" alt="" class="w-100 h-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
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



<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/layout.js')}}"></script>
</body>

</html>
