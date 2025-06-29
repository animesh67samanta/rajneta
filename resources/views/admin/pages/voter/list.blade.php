@extends('admin.layouts.main')
@section('title', 'Voter List')
@section('content')

<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Voter</div>
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
                      <!-- CSV Upload Form -->
                      <div class="mb-4">
                        <h5>Upload Voters Details (CSV)</h5>
                        <form action="{{ route('admin.votersdata.bulkUpload') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" accept=".xlsx, .xls, .csv, .ods" required>
                                <button type="submit" class="btn btn-primary ms-2">Upload</button>
                            </div>
                        </form>
                        @if ($errors->has('file'))
                            <div class="text-danger mt-2">{{ $errors->first('file') }}</div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Surname</th>
                                    <th>Image</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Email</th>
                                    <th>DOB</th>

                                    <th>VoterID</th>
                                    <th>Society</th>
                                    <th>House No</th>
                                    <th>Flat No</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($voters as $key => $voter)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $voter->first_name ?? 'N/A' }}</td>
                                        <td>{{ $voter->middle_name ?? 'N/A'}}</td>
                                        <td>{{ $voter->surname ?? 'N/A' }}</td>
                                        <td><img src="{{ asset($voter->image) }}" alt="Voter Image" class="" height="50" width="50"></td>
                                        <td>{{ $voter->gender ?? 'N/A'}}</td>
                                        <td>{{ $voter->age ?? 'N/A'}}</td>
                                        <td>{{ $voter->email ?? 'N/A'}}</td>
                                        <td>{{ $voter->dob ?? 'N/A'}}</td>
                                        <td>{{ $voter->voter_id ?? 'N/A'}}</td>
                                        <td>{{ $voter->voterAddress->society ?? 'N/A' }}</td>
                                        <td>{{ $voter->voterAddress->house_no ?? 'N/A'}}</td>
                                        <td>{{ $voter->voterAddress->flat_no ?? 'N/A'}}</td>
                                        <td>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="{{ route('admin.voter.edit', $voter->id) }}"><i class='bx bx-edit' ></i></a>
                                            {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">

                                              </button> --}}

                                            <form action="{{ route('admin.voter.delete', $voter->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" type="submit" style="border:none; background:none; cursor:pointer;">
                                                    <i class='bx bx-trash' style="color: white"></i>
                                                </button>
                                            </form>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Details" href="{{ route('admin.voter.details', $voter->id) }}"><i class="fa-regular fa-eye"></i></a>

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
