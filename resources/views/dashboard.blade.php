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
                            <h4 class="card-title">ورود اطلاعات مشتریان</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="col-xl-12">
                                <form action="{{ route('importCustomers') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="customers_file" class="form-label">فایل اطلاعات مشتریان</label>
                                                <input type="file" class="form-control" id="customers_file" name="customers_file" accept=".xlsx,.xls,.csv" required>
                                                <div class="form-text">فرمت‌های مجاز: Excel (.xlsx, .xls) و CSV</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="transactions_file" class="form-label">فایل تراکنش‌های مشتریان</label>
                                                <input type="file" class="form-control" id="transactions_file" name="transactions_file" accept=".xlsx,.xls,.csv" required>
                                                <div class="form-text">فرمت‌های مجاز: Excel (.xlsx, .xls) و CSV</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">بارگذاری و وارد کردن اطلاعات</button>
                                        </div>
                                    </div>
                                </form>

                                @if(session('success'))
                                    <div class="alert alert-success mt-3">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger mt-3">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger mt-3">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
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
@endsection
