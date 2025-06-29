@extends('admin.layouts.main')
@section('title', 'Karyakarta List')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Karyakarta</div>
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
                                        <th>Karyakarta Master Name</th>
                                        <th>Karyakarta Name English</th>
                                        <th>Karyakarta Name Marathi</th>
                                        <th>Karyakarta Name Hindi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyakartas as $key => $karyakarta)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $karyakarta->user->first_name.$karyakarta->user->middle_name.$karyakarta->user->surname ?? 'N/A' }}</td>


                                            <td>
                                                {{ $karyakarta->karyakarta ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $karyakarta->karyakarta_mr ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $karyakarta->karyakarta_hi ?? 'N/A' }}
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
