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
                                        <label for="company" class="form-label">شرکت</label>
                                        <input type="text" id="company" name="company" class="form-control" placeholder="نام شرکت را وارد نمایید.">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">وضعیت کاربر</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="0">فعال</option>
                                            <option value="1">غیرفعال</option>
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
