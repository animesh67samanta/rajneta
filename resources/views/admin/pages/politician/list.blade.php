@extends('admin.layouts.main')
@section('title', 'Politican List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                {{-- <h6 class="mb-0 text-uppercase">Panchayat List</h6>
                <hr /> --}}
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Politician</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Image</th>


                                        <th>Party Name</th>
                                        <th>Party Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($politicians as $key=> $politician)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $politician->name ?? 'null' }}</td>
                                            <td>{{ $politician->email ?? 'null' }}</td>
                                            <td>{{ $politician->age ?? 'null' }}</td>
                                            <td>{{ $politician->gender ?? 'null' }}</td>
                                            <td>{{ $politician->phone ?? 'null' }}</td>
                                            <td>{{ $politician->address ?? 'null' }}</td>
                                            <td><img src="{{ asset($politician->image) }}" alt="Candidate Image" class="" height="50" width="50"></td>
                                            <td>{{ $politician->party_name ?? 'null' }}</td>
                                            <td><img src="{{ asset($politician->party_logo) }}" alt="logo Image" class="" height="50" width="50"></td>
                                            <td>
                                                {{-- <a href="route('admin.property.edit',$property->id)"><i
                                                        class='bx bx-edit'></i>Edit</a>

                                                        <a href="route('admin.property.destroy',$property->id)"><i
                                                            class='bx bx-trash'></i>Delete</a> --}}
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
    {{-- @push('js')
    @endpush --}}
