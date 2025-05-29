@extends('master')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .event-datetime {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">پیش ثبت نام</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="col-xl-12">
                                <form method="post" action="{{ route('addApplySubmit') }}">
                                    @csrf
                                    <div id="horizontalwizard">
                                        <ul class="nav nav-pills nav-justified icon-wizard form-wizard-header bg-light p-1" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a href="#basictab0" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2 active" aria-selected="true" role="tab">
                                                    <span class="bg-white rounded text-primary px-2 py-1">1</span>
                                                    رویکردهای مجتمع فرهیختگان سراج
                                                </a><!-- end nav-link -->
                                            </li><!-- end nav-item -->
                                            <li class="nav-item" role="presentation">
                                                <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2" aria-selected="false" role="tab" tabindex="-1">
                                                    <span class="bg-white rounded text-primary px-2 py-1">2</span>
                                                    اطلاعات والدین
                                                </a><!-- end nav-link -->
                                            </li><!-- end nav-item -->
                                            <li class="nav-item" role="presentation">
                                                <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2" aria-selected="false" role="tab" tabindex="-1">
                                                    <span class="bg-white rounded text-primary px-2 py-1">3</span>
                                                    اطلاعات دانش آموز
                                                </a><!-- end nav-link -->
                                            </li><!-- end nav-item -->
                                            <li class="nav-item" role="presentation">
                                                <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2" aria-selected="false" tabindex="-1" role="tab">
                                                    <span class="bg-white rounded text-primary px-2 py-1">4</span>
                                                    اتمام
                                                </a><!-- end nav-link -->
                                            </li><!-- end nav-item -->
                                        </ul>

                                        <div class="tab-content mb-0">
                                            <div class="tab-pane active show" id="basictab0" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @if($user->status === 1)
                                                            <div class="mb-3">
                                                                <h3 class="text-center">معرفی مجتمع فرهیختگان سراج</h3>
                                                                <h4 class="text-center my-3">بسم الله الرحمن الرحیم</h4>
                                                                <p>مجتمع آموزشی، با تکیه بر ارزش‌های والای تعلیم و تربیت اسلامی و بر اساس سند تحول بنیادین آموزش و پرورش، محیطی پویا، علمی و اخلاق‌محور را برای فرزندان عزیز شما فراهم کرده است. رسالت ما در این مجموعه، پرورش نسل‌هایی توانمند و دارای تفکر خلاق است که بتوانند در عرصه‌های علمی، فرهنگی و اجتماعی، نقش‌آفرینی مؤثر داشته باشند.</p>
                                                                <div class="mt-3">
                                                                    <h5>ویژگی‌های بارز مجتمع آموزشی</h5>
                                                                    <p>
                                                                        تعلیم و تربیت یکپارچه: آموزش و تربیت در این مجتمع، در مقوله جدایی‌ناپذیری از رشد علمی، ارتقای بینش اخلاقی، معنوی و اجتماعی دانش‌آموزان مورد توجه ویژه‌ای می‌شود.

                                                                        رویکرد آموزشی پیشرفته: بهره‌گیری از جدیدترین روش‌های آموزشی و برنامه‌های راهبردی، با هدف شکوفایی استعدادهای دانش‌آموزان، غیر از علاقه و توانایی‌هایشان.

                                                                        زیست بوم مدرسه: این مجموعه، محیطی سرشار از پویایی و تعامل، با تاکید بر اصول علمی و اخلاقی است.

                                                                        تربیت دینی و فرهنگی: تقویت انس با قرآن، ارتقای بصیرت دینی و سیاسی و گسترش فرهنگ مقاومت و ایثار، از محورهای اساسی تربیتی ماست.

                                                                        مهارت‌آموزی و توانمندسازی: آموزش سواد رسانه‌ای، فناوری‌های نوین، کنشگری اجتماعی و مهارت‌های دفاعی، امدادی و نجات.

                                                                        ورزش و سلامت: توجه به سلامت جسمی و روانی دانش‌آموزان از طریق برنامه‌های منظم ورزشی و تقویت روحیه تیمی و انضباط فردی.
                                                                    </p>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <h5>نقش خانواده در فرآیند تعلیم و تربیت</h5>
                                                                    <p>ما بر این باوریم که خانواده، نخستین و مهم‌ترین نهاد تربیتی فرزند است و همکاری اولیا با مدرسه، تأثیر شگرفی در رشد و تعالی دانش‌آموزان دارد. در همین راستا، مجتمع آموزشی، برنامه‌ریزی ویژه‌ای برای تعامل موثر والدین و مربیان طراحی کرده است، از جمله:

                                                                        نشست‌های تربیتی و کارگاه‌های آموزشی ویژه اولیا
                                                                        مشاوره‌های فردی و گروهی برای هدایت تحصیلی و تربیتی فرزندان
                                                                        تعامل سازنده با والدین در مسیر تعلیم و تربیت دانش آموزان
                                                                    </p>
                                                                </div>
                                                                <strong>با همراهی شما، آینده ای روشن برای فرزندمان می سازیم.</strong>

                                                            </div>
                                                        @else
                                                            <div class="mb-3">
                                                                <h3 class="text-center">رویکردهای تربیتی آموزشی مجتمع آموزشی فرهیختگان سراج؛ گامی به سوی تعالی در تعلیم و تربیت</h3>
                                                                <h4 class="text-center my-3">بسم الله الرحمن الرحیم</h4>
                                                                <p>
                                                                    با افتخار به اطلاع شما می رسانیم که مجتمع آموزشی فرهیختگان سراج در مسیر تحول و ارتقاء نظام تعلیم و تربیت، گام های مهمی برداشته است.
                                                                    براساس تجربه های ارزشمند گذشته و با تکیه براسناد بالادستی، از جمله
                                                                    سند تحول بنیادین آموزش و پرورش، رویکردهای آموزشی و تربیتی مدرسه ارتقا یافته است. این به روزرسانی با هدف رشد همه جانبه دانش آموزان، مشارکت موثر خانواده ها و ارتقا سطح علمی و تربیتی آنان صورت گرفته است.
                                                                </p>
                                                                <div class="mt-3">
                                                                    <h4>نقاط بهبود یافته در رویکرد مدرسه</h4>
                                                                    <div class="mt-2">
                                                                        <h5>تمرکز بیشتر بر نقش مربی، متربی و خانواده در فرآیند تربیت:</h5>
                                                                        <p>
                                                                            در رویکرد جدید، مربی نه تنها یک آموزش دهنده، بلکه الگوی رفتاری و تربیتی دانش آموزان است. خانواده نیز نقش محوری تری در فرایند تعلیم و تربیت دارد و مشارکت فعال والدین در رشد فرزندان مورد تاکید قرار گرفته است.
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <h5>تقویت زیست تربیتی مدرسه ای:</h5>
                                                                        <p>
                                                                            علاوه بر آموزش رسمی، مدرسه به عنوان محیطی برای پرورش شخصیت، مسئولیت پذیری و مهارت آموزی دانش آموزان شناخته می شود. ایجاد تعامل بیشتر بین نهاد های تربیتی، دانش آموزان و خانواده ها از اهداف اصلی این تغییر است.
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <h5>توجه ویژه به پرورش نخبگان علمی و هدایت استعداد ها:</h5>
                                                                        <p>
                                                                            در رویکرد جدید، تمرکز بیشتری بر برنامه های استعدادیابی و هدایت تحصیلی شده است تا دانش آموزان بتوانند مسیر علمی خود را متناسب با علایق و توانمندی هایشان انتخاب کنند.
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <h5>گسترش برنامه های مهارتی و تربیتی:</h5>
                                                                        <p>
                                                                            مهارت های اجتماعی، رسانه ای، فناوری های نوین و هنرهای دیجیتال، در برنامه های جدید جایگاه پررنگتری یافته اند تا دانش آموزان علاوه بر رشد علمی، برای حضور موثر در جامعه آماده شوند.
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <h5>افزایش نقش تربیت دینی، بصیرتی و هویتی:</h5>
                                                                        <p>
درکنار برنامه های آموزشی، تقویت اعتقادات دینی، انس با قرآن و بصیرت سیاسی، به عنوان بخشی از هویت سازی فرهنگی دانش آموزان مورد توجه قرار گرفته است.
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <h5>تقویت فعالیت های ورزشی و مهارت های دفاعی:</h5>
                                                                        <p>
                                                                            در راستای سلامت جسمانی و افزایش توانمندی های دانش آموزان، برنامه های ورزشی آموزش های آمادگی دفاعی و مهارت های امداد و نجات در برنامه جدید مدرسه گسترش یافته است.
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <h5>نقش خانواده در اجرای رویکردها:</h5>
                                                                        <p>
ما بر این باوریم که تحقق این اهداف بدون همراهی شما والدین عزیز، امکانپذیر نیست. از این رو، تعامل و همفکری با شما، برگزاری نشست های تربیتی و آموزشی ویژه اولیا و ارائه مشاوره های تخصصی در حوزه های آموزشی و تربیتی، بخشی از برنامه های جدید مدرسه است.
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <strong>با همراهی شما، آینده ای روشن برای فرزندمان می سازیم.</strong>

                                                            </div>
                                                        @endif

                                                    </div> <!-- end col -->
                                                </div><!-- end row -->
                                            </div><!-- end tab-pane -->

                                            <div class="tab-pane" id="basictab1" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="parent_firstname" class="form-label">نام ولی دانش آموز </label>
                                                            <input type="text" id="parent_firstname" name="parent_firstname" class="form-control"
                                                                   placeholder="نام ولی دانش آموز را وارد نمایید."
                                                                   @if(!is_null($user->firstname)) value="{{ $user->firstname }}" @endif>
                                                        </div>
                                                    </div> <!-- end col -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="parent_lastname" class="form-label">نام خانوادگی ولی دانش آموز </label>
                                                            <input type="text" id="parent_lastname" name="parent_lastname" class="form-control"
                                                                   placeholder="نام خانوادگی ولی دانش آموز را وارد نمایید."
                                                                   @if(!is_null($user->lastname)) value="{{ $user->lastname }}" @endif>

                                                        </div>
                                                    </div> <!-- end col -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="mobile" class="form-label">شماره موبایل</label>
                                                            <input type="text" id="mobile" name="mobile" class="form-control"
                                                                   placeholder="شماره موبایل خود را وارد نمایید."
                                                                   @if(!is_null($user->mobile)) value="{{ $user->mobile }}" @endif>
                                                        </div>
                                                    </div> <!-- end col -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="relation" class="form-label"> نسبت کاربر با دانش آموز</label>
                                                            <select class="form-select" id="relation" name="relation">
                                                                <option value="" @if($user->relation== null) selected @endif>لطفا نسبت کاربر با دانش آموز را انتخاب نمایید.</option>
                                                                <option value="پدر" @if($user->relation=='پدر') selected @endif>پدر</option>
                                                                <option value="مادر" @if($user->relation=='مادر') selected @endif>مادر</option>
                                                                <option value="پدربزرگ" @if($user->relation=='پدربزرگ') selected @endif>پدربزرگ</option>
                                                                <option value="مادربزرگ" @if($user->relation=='مادربزرگ') selected @endif>مادربزرگ</option>
                                                                <option value="قیم" @if($user->relation=='قیم') selected @endif>قیم</option>

                                                            </select>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </div><!-- end tab-pane -->

                                            <div class="tab-pane" id="basictab2" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="firstname" class="form-label">نام دانش آموز </label>
                                                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="نام دانش آموز را وارد نمایید.">
                                                                </div>
                                                            </div><!-- end col -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="lastname" class="form-label">نام خانوادگی دانش آموز </label>
                                                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="نام خانوادگی دانش آموز را وارد نمایید.">
                                                                </div>
                                                            </div><!-- end col -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="national_id" class="form-label">کدملی دانش آموز</label>
                                                                    <input type="text" id="national_id" name="national_id" class="form-control" placeholder="کدملی دانش آموز را وارد نمایید.">
                                                                </div>
                                                            </div><!-- end col -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="birth_date" class="form-label">تاریخ تولد دانش آموز</label>
                                                                    <input
                                                                        class="flatpickr flatpickr-input active event-birthdate-picker form-control"
                                                                        type="text" name="birth_date" placeholder="لطفا تاریخ را انتخاب نمایید."
                                                                        data-id="timePickerPreloading" readonly="readonly">
                                                                </div>
                                                            </div><!-- end col -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="education" class="form-label">مقطع تحصیلی</label>
                                                                    <select class="form-select" id="education" name="education">
                                                                        <option value="">لطفا مقطع دانش آموز را وارد نمایید.</option>
                                                                        @foreach($levels as $level)
                                                                            <option value="{{$level->level_name}}" data-requires-field="{{ $level->required_field ? 'true' : 'false' }}">
                                                                                {{$level->level_name}}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div><!-- end col -->

                                                            <div class="col-md-6" id="major_field" style="display: none">
                                                                <div class="mb-3">
                                                                    <label for="sub_education" class="form-label">رشته تحصیلی</label>
                                                                    <select class="form-select" id="sub_education" name="sub_education">
                                                                        <option value="">لطفا رشته تحصیلی دانش آموز را وارد نمایید.</option>
                                                                        <option value="عمومی">عمومی</option>
                                                                        <option value="ریاضی">ریاضی</option>
                                                                        <option value="انسانی">انسانی</option>
                                                                    </select>
                                                                </div>
                                                            </div><!-- end col -->

                                                        </div><!-- end row -->
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </div><!-- end tab-pane -->

                                            <div class="tab-pane" id="basictab3" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <div class="mt-4">
                                                                <div class="form-check d-inline-block">
                                                                    <input type="checkbox" class="form-check-input" id="terms_truth" name="terms_truth" required>
                                                                    <label class="form-check-label" for="terms_truth">تمامی اطلاعات درخواست شده در فرم را صحیح و با دقت پاسخ دادم و درصورت هرگونه اشتباه، مسئولیت آن را می پذیرم</label>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <div class="form-check d-inline-block">
                                                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                                                    <label class="form-check-label" for="terms"> تمامی رویکردهای مجتمع فرهیختگان سراج را مطالعه کردم و با آن موافق هستم.</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                    <div class="col-12 mt-3">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </div><!-- end tab-pane -->

                                            <div class="d-flex flex-wrap align-items-center wizard justify-content-between gap-3 mt-3">
                                                <div class="d-flex gap-2">
                                                    <div class="first d-none">
                                                        <a href="javascript:void(0);" class="btn btn-soft-primary">
                                                            اول
                                                        </a>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <div class="previous">
                                                            <a href="javascript:void(0);" class="btn btn-primary disabled">
                                                                <i class="bx bx-right-arrow-alt me-2"></i>بازگشت به قبلی
                                                            </a>
                                                        </div>
                                                        <div class="next">
                                                            <a href="javascript:void(0);" class="btn btn-primary">
                                                                مرحله بعد<i class="bx bx-left-arrow-alt ms-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="last invisible d-none">
                                                        <a href="javascript:void(0);" class="btn btn-soft-primary">
                                                            اتمام
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- tab-content -->
                                    </div> <!-- end #horizontal wizard-->
                                    <input type="hidden" id="mobile" name="mobile" class="form-control" value="{{ Auth::user()->mobile }}">
                                    <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{asset('js/jdate.js')}}"></script>
    <script src="{{asset('js/flatpickr-jdate.js')}}"></script>
    <script src="{{asset('js/fa-jdate.js')}}"></script>
    <script src="{{asset('js/components/wizard.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let educationSelect = document.getElementById("education");
            let majorField = document.getElementById("major_field");

            function toggleMajorField() {
                let selectedOption = educationSelect.options[educationSelect.selectedIndex];
                let requiresMajor = selectedOption.getAttribute("data-requires-field") === "true";

                if (requiresMajor) {
                    majorField.style.display = "block";
                } else {
                    majorField.style.display = "none";
                    document.getElementById("sub_education").value = ""; // مقدار فیلد رو خالی کن
                }
            }

            educationSelect.addEventListener("change", toggleMajorField);
            toggleMajorField(); // مقدار اولیه را بررسی کن
        });

        $(".event-birthdate-picker").flatpickr({
            altFormat: 'Y/m/d',
            altInput: true,
            locale: "fa",
            disableMobile: "true"
        });

        $(".event-date-picker").flatpickr({
            minDate: "today",
            altFormat: 'Y/m/d',
            altInput: true,
            locale: "fa",
            monthSelectorType: 'static',

        });

        $(".event-time-picker").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            minTime: "09:00",
            maxTime: "18:00",
            time_24hr: true
        });

        new Wizard('#horizontalwizard');

        $(document).ready(function () {
            function toggleEventDatetime() {
                if ($('#status').val() == 2 || $('#status').val() == 3 || $('#status').val() == 4) {
                    $('.event-datetime').fadeIn();
                } else {
                    $('.event-datetime').fadeOut();
                }
            }
            // بررسی مقدار اولیه هنگام لود صفحه
            toggleEventDatetime();
            // اجرا هنگام تغییر مقدار
            $('#status').change(toggleEventDatetime);
        });

        $(document).ready(function() {
            // تابعی برای بررسی اینکه آیا تب فعلی basictab0 است یا خیر
            function checkActiveTab() {
                if ($('#basictab0').hasClass('active')) {
                    // اگر تب فعلی basictab0 است، دکمه previous را مخفی کنید
                    $('.previous').hide();
                } else {
                    // در غیر این صورت، دکمه previous را نمایش دهید
                    $('.previous').show();
                }
            }

            function checkActiveTab2() {
                if ($('#basictab3').hasClass('active')) {
                    // اگر تب فعلی basictab0 است، دکمه previous را مخفی کنید
                    $('.next').hide();
                } else {
                    // در غیر این صورت، دکمه previous را نمایش دهید
                    $('.next').show();
                }
            }

            // بررسی اولیه هنگام بارگذاری صفحه
            checkActiveTab();
            checkActiveTab2();

            // بررسی تغییر تب‌ها
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                checkActiveTab();
                checkActiveTab2();
            });
        });

    </script>
@endsection
