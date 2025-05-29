@extends('master')

@section('title')
ویرایش کاربر
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form method="post" action="{{ route('profileSubmit') }}">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">اطلاعات کاربر</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">نام </label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $user->firstname }}" placeholder="نام خود را وارد نمایید.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">نام خانوادگی </label>
                                        <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $user->lastname }}" placeholder="نام خانوادگی خود را وارد نمایید.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">شماره موبایل</label>
                                        <input disabled type="text" id="mobile" class="form-control" value="{{ $user->mobile }}" placeholder="شماره موبایل خود را وارد نمایید.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="relation" class="form-label">نسبت شما با دانش آموز</label>
                                        <select class="form-select" id="relation" name="relation">
                                            <option value="" @if($user->relation== null) selected @endif>لطفا نسبت خود، با دانش آموز را انتخاب نمایید.</option>
                                            <option value="پدر" @if($user->relation=='پدر') selected @endif>پدر</option>
                                            <option value="مادر" @if($user->relation=='مادر') selected @endif>مادر</option>
                                            <option value="پدربزرگ" @if($user->relation=='پدربزرگ') selected @endif>پدربزرگ</option>
                                            <option value="مادربزرگ" @if($user->relation=='مادربزرگ') selected @endif>مادربزرگ</option>
                                            <option value="قیم" @if($user->relation=='قیم') selected @endif>قیم</option>

                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer border-top">
                            <button type="submit" class="btn btn-primary">ویرایش اطلاعات کاربری</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
