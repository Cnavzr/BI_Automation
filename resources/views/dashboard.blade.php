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
