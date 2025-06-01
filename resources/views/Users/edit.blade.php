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
                    <form method="post" action="{{ route('editUserSubmit',$user->id) }}">
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
                                        <input disabled type="text" id="mobile" name="mobile" class="form-control" value="{{ $user->mobile }}" placeholder="شماره موبایل خود را وارد نمایید.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="company" class="form-label">شرکت</label>
                                        <input type="text" id="company" name="company" class="form-control" value="{{ $user->company }}" placeholder="نام شرکت را وارد نمایید.">
                                    </div>
                                </div>
                                @role('administrator')
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">وضعیت کاربر</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="0" @if($user->status == 0) selected @endif>فعال</option>
                                            <option value="1" @if($user->status == 1) selected @endif>غیرفعال</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">نقش کاربر</label>
                                        <select class="form-select" id="role" name="role">
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}" @if($userRoles[0] == $role->name) selected @endif>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endrole

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
