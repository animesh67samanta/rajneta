@extends('admin.layouts.main')
@section('title', 'App User List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">App User</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">List</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        {{-- <th>Is Admin</th> --}}
                                        {{-- <th>Staff Type</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appUsers as $key => $appUser)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $appUser->first_name ?? 'N/A' }}</td>
                                            <td>{{ $appUser->middle_name ?? 'N/A' }}</td>
                                            <td>{{ $appUser->surname ?? 'N/A' }}</td>
                                            <td>{{ $appUser->email ?? 'N/A' }}</td>
                                            <td>{{ $appUser->phone ?? 'N/A' }}</td>
                                            {{-- <td>
                                                <input type="checkbox" class="toggle-admin" data-id="{{ $appUser->id }}" {{ $appUser->is_admin ? 'checked' : '' }}>
                                            </td> --}}
                                            {{-- <td>{{ $appUser->staff_type ?? 'N/A' }}</td> --}}
                                            <td>
                                                <a href="{{ route('admin.app.user.permission.add', $appUser->id) }}"><i
                                                    class='bx bx-radio-circle'></i>Permission</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
