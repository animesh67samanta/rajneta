@extends('politician.layouts.main')
@section('title', 'Politician List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Staff</div>
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
                                        <th>Politician Name</th>
                                        <th>Staff Type</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Surname</th>
                                        <th>Gender</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffs as $key => $staff)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Auth::guard('admin')->user()->name }}</td>
                                            <td>{{ $staff->staff_type ?? 'N/A' }}</td>
                                            <td>{{ $staff->first_name ?? 'N/A' }}</td>
                                            <td>{{ $staff->middle_name ?? 'N/A' }}</td>
                                            <td>{{ $staff->surname ?? 'N/A' }}</td>
                                            <td>{{ $staff->gender ?? 'N/A' }}</td>
                                            <td><img src="{{ asset($staff->image) }}" alt="Staff Image" class="" height="50" width="50"></td>
                                            <td>{{ $staff->email ?? 'N/A' }}</td>
                                            <td>{{ $staff->phone ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('politician.staff.edit', $staff->id) }}"><i
                                                    class='bx bx-radio-circle'></i>Edit</a>
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
