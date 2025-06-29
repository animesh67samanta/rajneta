@extends('admin.layouts.main')
@section('title', 'Politician Create')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Politician</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.politician.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name"
                                        value="{{ old('name') }}" class="form-control"
                                        placeholder="Insert Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" name="age"
                                        value="{{ old('age') }}" class="form-control"
                                        placeholder="Insert Age">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email"
                                        value="{{ old('email') }}" class="form-control"
                                        placeholder="Insert Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone"
                                        value="{{ old('phone') }}" class="form-control"
                                        placeholder="Insert Phone">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address"
                                        value="{{ old('address') }}" class="form-control"
                                        placeholder="Insert Address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Candidate Image</label>
                                    <input type="file" name="image"
                                        value="{{ old('image') }}" class="form-control"
                                        placeholder="Insert Image">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Party Name</label>
                                    <input type="text" name="party_name"
                                        value="{{ old('party_name') }}" class="form-control"
                                        placeholder="Insert Party Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Party Logo</label>
                                    <input type="file" name="party_logo"
                                        value="{{ old('party_logo') }}" class="form-control"
                                        placeholder="Party Logo">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password"  class="form-control"  placeholder="Insert Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation"  class="form-control"  placeholder="Insert Confirm Password">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Add Politican</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('admin/assets/js/index.js') }}"></script>
@endpush
