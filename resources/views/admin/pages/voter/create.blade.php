@extends('admin.layouts.main')
@section('title', 'Voter Create')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Voter</div>
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
                            <form action="{{route('admin.voter.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="surname" class="form-label">Surname</label>
                                    <input type="text" name="surname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="mobile_1" class="form-label">Mobile No 1</label>
                                    <input type="number" name="mobile_1" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="mobile_2" class="form-label">Mobile No 2</label>
                                    <input type="number" name="mobile_2" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control">
                                </div>

                                <!-- Gender -->
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="cast" class="form-label">Cast</label>
                                    <input type="text" name="cast" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" name="position" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="voter_id" class="form-label">Voter Id</label>
                                    <input type="text" name="voter_id" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="demands" class="form-label">Demands</label>
                                    <input type="text" name="demands" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="colour_code" class="form-label">Colour Code</label>
                                    <select class="form-select" id="colour_code" name="colour_code" required>
                                        <option value="" disabled selected>Select Colour Code</option>
                                        <option value="#ff0000">Red</option>
                                        <option value="#0000ff">Blue</option>
                                        <option value="#3cb371">Green</option>
                                        <option value="#ee82ee">Pink</option>
                                        <option value="#ffa500">Yellow</option>
                                        <option value="#6a5acd">Violet</option>
                                        <option value="#FFFFFF">Others</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Is the person dead?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="dead" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="dead" value="0"> No
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Is the person voted?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="voted" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="voted" value="0"> No
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Is the person star voter?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="star_voter" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="star_voter" value="0"> No
                                        </label>
                                    </div>
                                </div>

                                {{-- Address details --}}
                                <div class="mb-3">
                                    <label for="srn" class="form-label">Srn No</label>
                                    <input type="text" name="srn" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="part_no" class="form-label">Part No</label>
                                    <input type="text" name="part_no" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="society" class="form-label">Society Name</label>
                                    <input type="text" name="society" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="house_no" class="form-label">House No</label>
                                    <input type="text" name="house_no" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="flat_no" class="form-label">Flat No</label>
                                    <input type="text" name="flat_no" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="booth" class="form-label">Booth</label>
                                    <input type="text" name="booth" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="village" class="form-label">Village</label>
                                    <input type="text" name="village" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="voting_centre" class="form-label">Voting Centre</label>
                                    <input type="text" name="voting_centre" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="voting_centre" class="form-label">Taluka</label>
                                    <input type="text" name="taluka" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="voting_centre" class="form-label">Assembly</label>
                                    <input type="text" name="assembly" class="form-control">
                                </div>


                                {{-- Extra Information Details --}}
                                <div class="mb-3">
                                    <label for="extra_info_1" class="form-label">Extra Information 1</label>
                                    <input type="text" name="extra_info_1" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_info_2" class="form-label">Extra Information 2</label>
                                    <input type="text" name="extra_info_2" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_info_3" class="form-label">Extra Information 3</label>
                                    <input type="text" name="extra_info_3" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_info_4" class="form-label">Extra Information 4</label>
                                    <input type="text" name="extra_info_4" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_info_5" class="form-label">Extra Information 5</label>
                                    <input type="text" name="extra_info_5" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Extra Check1?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="extra_check_1" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="extra_check_1" value="0"> No
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Extra Check2?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="extra_check_2" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="extra_check_2" value="0"> No
                                        </label>
                                    </div>
                                </div>

                                {{-- <div class="mb-3">
                                    <label class="form-label">Extra Check3?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="extra_check_3" value="1"> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="extra_check_3" value="0"> No
                                        </label>
                                    </div>
                                </div> --}}

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="#" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
