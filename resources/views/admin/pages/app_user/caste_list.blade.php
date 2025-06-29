@extends('admin.layouts.main')
@section('title', 'Caste List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Caste</div>
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
                                        <th>Caste Master Name</th>
                                        <th>Caste Name English</th>
                                        <th>Caste Name Marathi</th>
                                        <th>Caste Name Hindi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($castes as $key => $caste)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $caste->user->first_name.$caste->user->middle_name.$caste->user->surname ?? 'N/A' }}</td>


                                            <td>
                                                {{ $caste->caste ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $caste->caste_mr ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $caste->caste_hi ?? 'N/A' }}
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
