<!DOCTYPE html>
<html dir="rtl" lang="fa" class="h-100">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>احراز هویت</title>
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
{{--                                <a href="{{ route('dashboard') }}" class="logo-dark">--}}
{{--                                    <img src="{{asset('images/logo.png')}}" height="80">--}}
{{--                                </a>--}}

{{--                                <a href="{{ route('dashboard') }}" class="logo-light">--}}
{{--                                    <img src="{{asset('images/logo.png')}}" height="80">--}}
{{--                                </a>--}}
                            </div>

                            <h2 class="fw-bold fs-24">ورود</h2>

                            <p class="text-muted mt-1 mb-4">سامانه تحلیل داده مشتریان رسمی</p>

                            <div class="mb-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    </div>
                                @endif
                                    @if (session('mobile'))
                                        <p>کد تأیید به شماره {{ session('mobile') }} ارسال شد.</p>
                                    @endif
                                <form method="post" action="{{ route('verifyCode') }}" class="authentication-form" id="verify-form">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="otp">کد تأیید</label>
                                        <input type="text" id="otp" name="otp" class="form-control" autocomplete="off" placeholder="کد تأیید ارسال شده را وارد کنید" required>
                                    </div>
                                    <input type="hidden" name="mobile" value="{{ session('mobile') }}">
                                    <div class="mb-1 text-center d-grid">
                                        <button class="btn btn-success" type="submit">ورود</button>
                                    </div>
                                </form>
                            </div>
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
</script>
</body>

</html>
