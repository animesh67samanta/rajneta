@extends('admin.layouts.main')
@section('title', 'Voter Edit')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Voter</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.voter.update', $voter->id) }}" id="voterForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div id="keyboardContainer" class="simple-keyboard keyboard-position"></div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $voter->first_name) }}" required>
                                </div>

                                <div class="mb-3">

                                    <label for="first_name_mr" class="form-label">First Name in Marathi</label>
                                    <input type="text" name="first_name_mr" class="form-control marathi-input" value="{{ old('first_name_mr', $voter->first_name_mr) }}" required>
                                </div>

                                <div class="mb-3">

                                    <label for="first_name_hi" class="form-label">First Name in Hindi</label>
                                    <input type="text" name="first_name_hi" class="form-control marathi-input" value="{{ old('first_name_hi', $voter->first_name_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name', $voter->middle_name) }}">
                                </div>

                                <div class="mb-3">

                                    <label for="middle_name_mr" class="form-label">Middle Name in Marathi</label>
                                    <input type="text" name="middle_name_mr" class="form-control marathi-input" value="{{ old('middle_name_mr', $voter->middle_name_mr) }}">
                                </div>

                                <div class="mb-3">

                                    <label for="middle_name_hi" class="form-label">Middle Name in Hindi</label>
                                    <input type="text" name="middle_name_hi" class="form-control marathi-input" value="{{ old('middle_name_hi', $voter->middle_name_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="surname" class="form-label">Surname</label>
                                    <input type="text" name="surname" class="form-control" value="{{ old('surname', $voter->surname) }}">
                                </div>

                                <div class="mb-3">

                                    <label for="surname_mr" class="form-label">Surname in Marathi</label>
                                    <input type="text" name="surname_mr" class="form-control marathi-input" value="{{ old('surname_mr', $voter->surname_mr) }}">
                                </div>

                                <div class="mb-3">

                                    <label for="surname_hi" class="form-label">Surname in Hindi</label>
                                    <input type="text" name="surname_hi" class="form-control marathi-input" value="{{ old('surname_hi', $voter->surname_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($voter->image)
                                        <img src="{{ asset('storage/' . $voter->image) }}" alt="Voter Image" width="100">
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $voter->email) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="mobile_1" class="form-label">Mobile No 1</label>
                                    <input type="number" name="mobile_1" class="form-control" value="{{ old('mobile_1', $voter->mobile_1) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="mobile_2" class="form-label">Mobile No 2</label>
                                    <input type="number" name="mobile_2" class="form-control" value="{{ old('mobile_2', $voter->mobile_2) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control" value="{{ old('age', $voter->age) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" value="{{ old('dob', $voter->dob) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="" disabled>Select Gender</option>
                                        <option value="male" {{ old('gender', $voter->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $voter->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender', $voter->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="gender_mr" class="form-label">Gender in marathi</label>
                                    <input type="text" name="gender_mr" class="form-control marathi-input" value="{{ old('gender_mr', $voter->gender_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="gender_hi" class="form-label">Gender in Hindi</label>
                                    <input type="text" name="gender_hi" class="form-control marathi-input" value="{{ old('gender_hi', $voter->gender_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="cast" class="form-label">Cast</label>
                                    <input type="text" name="cast" class="form-control" value="{{ old('cast', $voter->cast) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="cast_mr" class="form-label">Cast (Marathi)</label>
                                    <input type="text" name="cast_mr" class="form-control marathi-input" value="{{ old('cast_mr', $voter->cast_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="cast_hi" class="form-label">Cast (Hindi)</label>
                                    <input type="text" name="cast_hi" class="form-control marathi-input" value="{{ old('cast_hi', $voter->cast_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" name="position" class="form-control" value="{{ old('position', $voter->position) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="position_mr" class="form-label">Position (Marathi)</label>
                                    <input type="text" name="position_mr" class="form-control marathi-input" value="{{ old('position_mr', $voter->position_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="position_hi" class="form-label">Position (Hindi)</label>
                                    <input type="text" name="position_hi" class="form-control marathi-input" value="{{ old('position_hi', $voter->position_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="voter_id" class="form-label">Voter Id</label>
                                    <input type="text" name="voter_id" class="form-control" value="{{ old('voter_id', $voter->voter_id) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="colour_code" class="form-label">Colour Code</label>
                                    <select class="form-select" id="colour_code" name="colour_code" required>
                                        <option value="" disabled>Select Colour Code</option>
                                        <option value="#ff0000" {{ old('colour_code', $voter->colour_code) == '#ff0000' ? 'selected' : '' }}>Red</option>
                                        <option value="#0000ff" {{ old('colour_code', $voter->colour_code) == '#0000ff' ? 'selected' : '' }}>Blue</option>
                                        <option value="#3cb371" {{ old('colour_code', $voter->colour_code) == '#3cb371' ? 'selected' : '' }}>Green</option>
                                        <option value="#ee82ee" {{ old('colour_code', $voter->colour_code) == '#ee82ee' ? 'selected' : '' }}>Pink</option>
                                        <option value="#ffa500" {{ old('colour_code', $voter->colour_code) == '#ffa500' ? 'selected' : '' }}>Yellow</option>
                                        <option value="#6a5acd" {{ old('colour_code', $voter->colour_code) == '#6a5acd' ? 'selected' : '' }}>Violet</option>
                                        <option value="#FFFFFF" {{ old('colour_code', $voter->colour_code) == '#FFFFFF' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Is the person dead?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="dead" value="1" {{ old('dead', $voter->dead) == 1 ? 'checked' : '' }}> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="dead" value="0" {{ old('dead', $voter->dead) == 0 ? 'checked' : '' }}> No
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Is the person voted?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="voted" value="1" {{ old('voted', $voter->voted) == 1 ? 'checked' : '' }}> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="voted" value="0" {{ old('voted', $voter->voted) == 0 ? 'checked' : '' }}> No
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Is the person star voter?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="star_voter" value="1" {{ old('star_voter', $voter->star_voter) == 1 ? 'checked' : '' }}> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="star_voter" value="0" {{ old('star_voter', $voter->star_voter) == 0 ? 'checked' : '' }}> No
                                        </label>
                                    </div>
                                </div>

                                {{-- Address details --}}
                                <div class="mb-3">
                                    <label for="srn" class="form-label">Srn No</label>
                                    <input type="text" name="srn" class="form-control" value="{{ old('srn', $voter->voterAddress->srn) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="srn_mr" class="form-label">Srn No (Marathi)</label>
                                    <input type="text" name="srn_mr" class="form-control marathi-input" value="{{ old('srn_mr', $voter->voterAddress->srn_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="srn_hi" class="form-label">Srn No (Hindi)</label>
                                    <input type="text" name="srn_hi" class="form-control marathi-input" value="{{ old('srn_hi', $voter->voterAddress->srn_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="part_no" class="form-label">Part No</label>
                                    <input type="text" name="part_no" class="form-control" value="{{ old('part_no', $voter->voterAddress->part_no) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="part_no_mr" class="form-label">Part No (Marathi)</label>
                                    <input type="text" name="part_no_mr" class="form-control marathi-input" value="{{ old('part_no_mr', $voter->voterAddress->part_no_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="part_no_hi" class="form-label">Part No (Hindi)</label>
                                    <input type="text" name="part_no_hi" class="form-control marathi-input" value="{{ old('part_no_hi', $voter->voterAddress->part_no_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="society" class="form-label">Society Name</label>
                                    <input type="text" name="society" class="form-control" value="{{ old('society', $voter->voterAddress->society) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="society_mr" class="form-label">Society Name (Marathi)</label>
                                    <input type="text" name="society_mr" class="form-control marathi-input" value="{{ old('society_mr', $voter->voterAddress->society_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="society_hi" class="form-label">Society Name (Hindi)</label>
                                    <input type="text" name="society_hi" class="form-control marathi-input" value="{{ old('society_hi', $voter->voterAddress->society_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="house_no" class="form-label">House No</label>
                                    <input type="text" name="house_no" class="form-control" value="{{ old('house_no', $voter->voterAddress->house_no) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="house_no_mr" class="form-label">House No (Marathi)</label>
                                    <input type="text" name="house_no_mr" class="form-control marathi-input" value="{{ old('house_no_mr', $voter->voterAddress->house_no_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="house_no_hi" class="form-label">House No (Hindi)</label>
                                    <input type="text" name="house_no_hi" class="form-control marathi-input" value="{{ old('house_no_hi', $voter->voterAddress->house_no_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="flat_no" class="form-label">Flat No</label>
                                    <input type="text" name="flat_no" class="form-control" value="{{ old('flat_no', $voter->voterAddress->flat_no) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="flat_no_mr" class="form-label">Flat No (Marathi)</label>
                                    <input type="text" name="flat_no_mr" class="form-control marathi-input" value="{{ old('flat_no_mr', $voter->voterAddress->flat_no_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="flat_no_hi" class="form-label">Flat No (Hindi)</label>
                                    <input type="text" name="flat_no_hi" class="form-control marathi-input" value="{{ old('flat_no_hi', $voter->voterAddress->flat_no_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address', $voter->voterAddress->address) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="address_mr" class="form-label">Address (Marathi)</label>
                                    <input type="text" name="address_mr" class="form-control marathi-input" value="{{ old('address_mr', $voter->voterAddress->address_mr) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="address_hi" class="form-label">Address (Hindi)</label>
                                    <input type="text" name="address_hi" class="form-control marathi-input" value="{{ old('address_hi', $voter->voterAddress->address_hi) }}">
                                </div>

                                 {{-- Extra Information Details --}}
                                <div class="mb-3">
                                    <label for="extra_info_1" class="form-label">Extra Information one</label>
                                    <input type="text" name="extra_info_1" class="form-control" value="{{ old('extra_info_1', $voter->voterInformation->extra_info_1) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_info_1_mr" class="form-label">Extra Information One in Marathi </label>
                                    <input type="text" name="extra_info_1_mr" class="form-control marathi-input" value="{{ old('extra_info_1_mr', $voter->voterInformation->extra_info_1_mr) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="extra_info_2_hi" class="form-label">Extra Information One in Hindi </label>
                                    <input type="text" name="extra_info_1_hi" class="form-control marathi-input" value="{{ old('extra_info_1_hi', $voter->voterInformation->extra_info_1_hi) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_info_2" class="form-label">Extra Information Two</label>
                                    <input type="text" name="extra_info_2" class="form-control" value="{{ old('extra_info_2', $voter->voterInformation->extra_info_2) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="extra_info_2_mr" class="form-label">Extra Information Two in Marathi </label>
                                    <input type="text" name="extra_info_2_mr" class="form-control marathi-input" value="{{ old('extra_info_2_mr', $voter->voterInformation->extra_info_2_mr) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="extra_info_2_hi" class="form-label">Extra Information Two in Hindi</label>
                                    <input type="text" name="extra_info_1_hi" class="form-control marathi-input" value="{{ old('extra_info_1_hi', $voter->voterInformation->extra_info_1_hi) }}">
                                </div>

                                {{-- Extra Information Details --}}
                            <div class="mb-3">
                                <label for="extra_info_3" class="form-label">Extra Information Three</label>
                                <input type="text" name="extra_info_3" class="form-control" value="{{ old('extra_info_3', $voter->voterInformation->extra_info_3) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_3_mr" class="form-label">Extra Information Three in Marathi</label>
                                <input type="text" name="extra_info_3_mr" class="form-control marathi-input" value="{{ old('extra_info_3_mr', $voter->voterInformation->extra_info_3_mr) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_3_hi" class="form-label">Extra Information Three in Hindi</label>
                                <input type="text" name="extra_info_3_hi" class="form-control marathi-input" value="{{ old('extra_info_3_hi', $voter->voterInformation->extra_info_3_hi) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_4" class="form-label">Extra Information Four</label>
                                <input type="text" name="extra_info_4" class="form-control" value="{{ old('extra_info_4', $voter->voterInformation->extra_info_4) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_4_mr" class="form-label">Extra Information Four in Marathi</label>
                                <input type="text" name="extra_info_4_mr" class="form-control marathi-input" value="{{ old('extra_info_4_mr', $voter->voterInformation->extra_info_4_mr) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_4_hi" class="form-label">Extra Information Four in Hindi</label>
                                <input type="text" name="extra_info_4_hi" class="form-control marathi-input" value="{{ old('extra_info_4_hi', $voter->voterInformation->extra_info_4_hi) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_5" class="form-label">Extra Information Five</label>
                                <input type="text" name="extra_info_5" class="form-control" value="{{ old('extra_info_5', $voter->voterInformation->extra_info_5) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_5_mr" class="form-label">Extra Information Five in Marathi</label>
                                <input type="text" name="extra_info_5_mr" class="form-control marathi-input" value="{{ old('extra_info_5_mr', $voter->voterInformation->extra_info_5_mr) }}">
                            </div>

                            <div class="mb-3">
                                <label for="extra_info_5_hi" class="form-label">Extra Information Five in Hindi</label>
                                <input type="text" name="extra_info_5_hi" class="form-control marathi-input" value="{{ old('extra_info_5_hi', $voter->voterInformation->extra_info_5_hi) }}">
                            </div>



                                <div class="mb-3">
                                    <label class="form-label">Extra Check1?</label>
                                    <div>

                                        <label>
                                            <input type="radio" name="extra_check_1" value="1" {{ $voter->voterInformation->extra_check_1 ? 'checked' : '' }}> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="extra_check_1" value="0" {{ !$voter->voterInformation->extra_check_1 ? 'checked' : '' }}> No
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Extra Check2?</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="extra_check_2" value="1" {{ $voter->voterInformation->extra_check_2 ? 'checked' : '' }}> Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="extra_check_2" value="0" {{ !$voter->voterInformation->extra_check_2 ? 'checked' : '' }}> No
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.voter.list') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
