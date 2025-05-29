@extends('master')

@section('title')
افزودن کاربر
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                @endif
                <div class="card">
                    <form method="post" action="{{ route('addUserSubmit') }}">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">اطلاعات کاربر</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">نام </label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="نام کاربر را وارد نمایید.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">نام خانوادگی </label>
                                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="نام خانوادگی کاربر را وارد نمایید.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">شماره موبایل</label>
                                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="شماره موبایل کاربر را وارد نمایید.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="relation" class="form-label">نسبت با دانش آموز</label>
                                        <select class="form-select" id="relation" name="relation">
                                            <option value="">لطفا یک نسبت را تعیین کنید</option>
                                            <option value="پدر">پدر</option>
                                            <option value="مادر">مادر</option>
                                            <option value="پدربزرگ">پدربزرگ</option>
                                            <option value="مادربزرگ">مادربزرگ</option>
                                            <option value="قیم">قیم</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">نقش کاربر</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="">لطفا نقش کاربر را تعیین کنید</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}">{{$role->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer border-top">
                            <button type="submit" class="btn btn-primary">ایجاد کاربر</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
