@extends('master')

@section('title')
    مدیریت کاربران
@endsection

@section('content')

    <div class="page-content">
    <div class="container-fluid">
        <div class="row d-none">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2 d-flex align-items-center gap-2">همه کاربران</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">54</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2 d-flex align-items-center gap-2">مدیران</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">13</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:backpack-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2 d-flex align-items-center gap-2">کاربر فعال</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">19</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:rocket-2-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card overflow-hiddenCoupons">
            <div class="card-header d-flex justify-content-between align-items-center gap-1">
                <h4 class="card-title flex-grow-1">لیست همه کاربران</h4>

                <a href="{{route('addUserPage')}}" class="btn btn-sm btn-primary">
                    افزودن کاربر
                </a>

                <div class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
                        خروجی
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
{{--                        <a href="#!" class="dropdown-item">PDF</a>--}}
                        <a href="" class="dropdown-item">CSV</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                        <thead class="bg-light-subtle">
                        <tr>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره موبایل</th>
                            <th>شرکت</th>
                            <th>نقش</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->firstname.' '.$user->lastname }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->company ?? '-' }}</td>
                            <td>
                                @if($user->hasRole('administrator'))
                                    <span class="badge bg-light text-dark py-1 px-2 fs-11">مدیر</span>
                                @elseif($user->hasRole('member'))
                                    <span class="badge bg-primary-subtle text-primary py-1 px-2 fs-11">
                                        کاربر
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($user->status == 1)
                                    <span class="badge bg-danger-subtle text-danger py-1 px-2 fs-11">غیرفعال</span>
                                @elseif($user->status == 0)
                                    <span class="badge bg-success-subtle text-success py-1 px-2 fs-11">فعال</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('editUserPage',$user->id) }}" class="btn btn-soft-dark btn-sm">
                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>

{{--                                    <a href="{{ route('editUserPage',$user->id) }}" class="btn btn-soft-info btn-sm">--}}
{{--                                        <iconify-icon icon="solar:lock-password-broken" class="align-middle fs-18"></iconify-icon>--}}
{{--                                    </a>--}}
{{--                                    @if (Auth::check() && Auth::user()->id != $user->id) {--}}
                                    <a href="#" type="submit" data-id="{{ $user->id }}" class="sweet-delete btn btn-soft-danger btn-sm">
                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>
{{--                                    @endif--}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
            <div class="row g-0 align-items-center justify-content-between text-center text-sm-start p-3 border-top">
                <div class="col-sm">

                </div>
                <div class="col-sm-auto mt-3 mt-sm-0">
{{--                    <ul class="pagination  m-0">--}}
{{--                        <li class="page-item">--}}
{{--                            <a href="#" class="page-link"><i class='bx bx-right-arrow-alt'></i></a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active">--}}
{{--                            <a href="#" class="page-link">1</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a href="#" class="page-link">2</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a href="#" class="page-link">3</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a href="#" class="page-link"><i class='bx bx-left-arrow-alt'></i></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
            </div>
        </div> <!-- end card -->
    </div>


</div>
@endsection

@section('footer')
    <script>
        document.querySelectorAll('.sweet-delete').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                let userId = e.target.getAttribute('data-id');
                Swal.fire({
                    title: 'آیا مطمئنید که میخواهید حذف کنید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonText: 'لغو',
                    confirmButtonText: 'بله، حذف شود',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/users/'+ userId + '/delete'
                    }
                })
            })
        });
    </script>

@endsection


