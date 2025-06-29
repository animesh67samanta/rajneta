@extends('admin.layouts.main')
@section('title', 'Address List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Address</div>
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
                                        <th>Address Master Name</th>
                                        <th>Address Name English</th>
                                        <th>Address Name Marathi</th>
                                        <th>Address Name Hindi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($addresses as $key => $address)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $address->user->first_name.$address->user->middle_name.$address->user->surname ?? 'N/A' }}</td>


                                            <td>
                                                {{ $address->address ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $address->address_mr ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $address->address_hi ?? 'N/A' }}
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
