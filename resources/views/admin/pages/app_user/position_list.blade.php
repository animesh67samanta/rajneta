@extends('admin.layouts.main')
@section('title', 'Position List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Position</div>
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
                                        <th>Position Master Name</th>
                                        <th>Position Name English</th>
                                        <th>Position Name Marathi</th>
                                        <th>Position Name Hindi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $key => $position)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $position->user->first_name.$position->user->middle_name.$position->user->surname ?? 'N/A' }}</td>


                                            <td>
                                                {{ $position->position ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $position->position_mr ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $society->position_hi ?? 'N/A' }}
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
