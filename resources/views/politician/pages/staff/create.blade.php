@extends('politician.layouts.main')
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
                            <form action="{{ route('politician.staff.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="Insert First Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Middle Name (Optional)</label>
                                    <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control" placeholder="Insert Middle Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Surname</label>
                                    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control" placeholder="Insert Surname">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="number" name="age" value="{{ old('age') }}" class="form-control" placeholder="Insert Age">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Insert Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Insert Phone Number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">DOB</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}" class="form-control" placeholder="Insert Date of Birth">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image (Optional)</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Type of Users</label>
                                    <select name="staff_type" class="form-control">
                                        <option value="" disabled {{ old('staff_type') == '' ? 'selected' : '' }}>Select Type</option>
                                        <option style="color: #000" value="Admin" {{ old('staff_type') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        <option style="color: #000" value="Society Master" {{ old('staff_type') == 'Society Master' ? 'selected' : '' }}>Society Master</option>
                                        <option style="color: #000" value="Address Master" {{ old('staff_type') == 'Address Master' ? 'selected' : '' }}>Address Master</option>
                                        <option style="color: #000" value="Karya Karta Master" {{ old('staff_type') == 'Karya Karta Master' ? 'selected' : '' }}>Karya Karta Master</option>
                                        <option style="color: #000" value="Caste Master" {{ old('staff_type') == 'Caste Master' ? 'selected' : '' }}>Caste Master</option>
                                        <option style="color: #000" value="Position Master" {{ old('staff_type') == 'Position Master' ? 'selected' : '' }}>Position Master</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Bluetooth Access?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="bluetooth_access" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="bluetooth_access" value="0"> No
                                        </label>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Excel Sheet Download?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="excelsheet_download" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="excelsheet_download" value="0"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pdf Download?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="pdf_download" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="pdf_download" value="0"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image Download?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="image_download" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="image_download" value="0"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Call Access?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="call_access" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="call_access" value="0"> No
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="">Submit</button>
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
