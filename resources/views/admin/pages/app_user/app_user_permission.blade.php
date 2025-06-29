@extends('admin.layouts.main')
@section('title', 'App User Permission')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">App User</div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Permission</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('admin.app.user.permission.store', $appUser->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')


                                <!-- Permissions Fields -->
                                <div class="mb-3">
                                    <label class="form-label">Bluetooth Access?</label>
                                    <div>
                                        <input type="radio" name="bluetooth_access" value="1" {{ optional($appUser->userPermission)->bluetooth_access == 1 ? 'checked' : '' }}> Yes
                                        <input type="radio" name="bluetooth_access" value="0" {{ optional($appUser->userPermission)->bluetooth_access == 0 ? 'checked' : '' }}> No
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Excel Sheet Download?</label>
                                    <div>
                                        <input type="radio" name="excelsheet_download" value="1" {{ optional($appUser->userPermission)->excelsheet_download == 1 ? 'checked' : '' }}> Yes
                                        <input type="radio" name="excelsheet_download" value="0" {{ optional($appUser->userPermission)->excelsheet_download == 0 ? 'checked' : '' }}> No
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Pdf Download?</label>
                                    <div>
                                        <input type="radio" name="pdf_download" value="1" {{ optional($appUser->userPermission)->pdf_download == 1 ? 'checked' : '' }}> Yes
                                        <input type="radio" name="pdf_download" value="0" {{ optional($appUser->userPermission)->pdf_download == 0 ? 'checked' : '' }}> No
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image Download?</label>
                                    <div>
                                        <input type="radio" name="image_download" value="1" {{ optional($appUser->userPermission)->image_download == 1 ? 'checked' : '' }}> Yes
                                        <input type="radio" name="image_download" value="0" {{ optional($appUser->userPermission)->image_download == 0 ? 'checked' : '' }}> No
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Call Access?</label>
                                    <div>
                                        <input type="radio" name="call_access" value="1" {{ optional($appUser->userPermission)->call_access == 1 ? 'checked' : '' }}> Yes
                                        <input type="radio" name="call_access" value="0" {{ optional($appUser->userPermission)->call_access == 0 ? 'checked' : '' }}> No
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Survey Import from Server?</label>
                                    <div>
                                        <input type="radio" name="survey_import_from_server" value="1" {{ optional($appUser->userPermission)->survey_import_from_server == 1 ? 'checked' : '' }}> Yes
                                        <input type="radio" name="survey_import_from_server" value="0" {{ optional($appUser->userPermission)->survey_import_from_server == 0 ? 'checked' : '' }}> No
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Voter Slip PDF Download?</label>
                                    <div>
                                        <input type="radio" name="voter_slip" value="1" {{ optional($appUser->userPermission)->voter_slip == 1 ? 'checked' : '' }}> Yes
                                        <input type="radio" name="voter_slip" value="0" {{ optional($appUser->userPermission)->voter_slip == 0 ? 'checked' : '' }}> No
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Update Staff</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
