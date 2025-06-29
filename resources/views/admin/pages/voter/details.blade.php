@extends('admin.layouts.main')
@section('title', 'Voter List')
@section('content')

    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Voter</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Voter Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <!-- CSV Upload Form -->
                        <div class="mb-4">
                            <h5>Personal Details</h5>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td> First Name in English</td>
                                        <td>{{ $voter->first_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td> First Name in Marathi</td>
                                        <td>{{ $voter->first_name_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td> First Name in Hindi</td>
                                        <td>{{ $voter->first_name_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Middle Name in English</td>
                                        <td>{{ $voter->middle_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Middle Name in Marathi</td>
                                        <td>{{ $voter->middle_name_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Middle Name in Hindi</td>
                                        <td>{{ $voter->middle_name_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Surname in English</td>
                                        <td>{{ $voter->surname ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Surname in Marathi</td>
                                        <td>{{ $voter->surname_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Surname in Hindi</td>
                                        <td>{{ $voter->surname_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $voter->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number</td>
                                        <td>{{ $voter->mobile_1 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alternate Mobile Number</td>
                                        <td>{{ $voter->mobile_2 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            @if ($voter->image)
                                                <img src="{{ asset($voter->image) }}" alt="Voter Image" height="50" width="50">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender in English</td>
                                        <td>{{ $voter->gender ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender in Marathi</td>
                                        <td>{{ $voter->gender_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender in Hindi</td>
                                        <td>{{ $voter->gender_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>{{ $voter->age ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>DOB</td>
                                        <td>{{ $voter->dob ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Caste in English</td>
                                        <td>{{ $voter->cast ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Caste in Marathi</td>
                                        <td>{{ $voter->cast_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Caste in Hindi</td>
                                        <td>{{ $voter->cast_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Position in English</td>
                                        <td>{{ $voter->position ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Position in Marathi</td>
                                        <td>{{ $voter->position_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Personnel in Hindi</td>
                                        <td>{{ $voter->personnel ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Voter ID</td>
                                        <td>{{ $voter->voter_id ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dead</td>
                                        <td>{{ $voter->dead == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Voted</td>
                                        <td>{{ $voter->voted == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Star Voter</td>
                                        <td>{{ $voter->star_voter == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Repeated Voter</td>
                                        <td>{{ $voter->repeated_voter == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    @php
                                        $colors = [
                                            '#FF0000' => 'Red',
                                            '#3cb371' => 'Green',
                                            '#0000FF' => 'Blue',
                                            '#FFFF00' => 'Yellow',
                                            '#000000' => 'Black',
                                            '#FFFFFF' => 'White',

                                        ];
                                    @endphp

                                    <tr>
                                        <td>Colour Name</td>
                                        <td>{{ $colors[$voter->colour_code] ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Demands in English</td>
                                        <td>{{ $voter->demands ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Demands in Marathi</td>
                                        <td>{{ $voter->demands_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Demands in Hindi</td>
                                        <td>{{ $voter->demands_hi ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="card-body">
                        <!-- CSV Upload Form -->
                        <div class="mb-4">
                            <h5>Address Details</h5>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Society in English</td>
                                        <td>{{ $voter->voterAddress->society ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Society in Marathi</td>
                                        <td>{{ $voter->voterAddress->society_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Society in Hindi</td>
                                        <td>{{ $voter->voterAddress->society_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>House in English</td>
                                        <td>{{ $voter->voterAddress->house_no ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>House in Marathi</td>
                                        <td>{{ $voter->voterAddress->house_no_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>House in Hindi</td>
                                        <td>{{ $voter->voterAddress->house_no_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Flat Number in English</td>
                                        <td>{{ $voter->voterAddress->flat_no ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Flat Number in Marathi</td>
                                        <td>{{ $voter->voterAddress->flat_no_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Flat Number in Hindi</td>
                                        <td>{{ $voter->voterAddress->flat_no_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address in English</td>
                                        <td>{{ $voter->voterAddress->address ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address in Marathi</td>
                                        <td>{{ $voter->voterAddress->address_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address in Hindi</td>
                                        <td>{{ $voter->voterAddress->address_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Booth name in English</td>
                                        <td>{{ $voter->voterAddress->booth ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Booth name in Marathi</td>
                                        <td>{{ $voter->voterAddress->booth_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Booth name in Hindi</td>
                                        <td>{{ $voter->voterAddress->booth_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Village name in English</td>
                                        <td>{{ $voter->voterAddress->village ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Village name in Marathi</td>
                                        <td>{{ $voter->voterAddress->village_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Village name in Hindi</td>
                                        <td>{{ $voter->voterAddress->village_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Part no in English</td>
                                        <td>{{ $voter->voterAddress->part_no ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Part no in Marathi</td>
                                        <td>{{ $voter->voterAddress->part_no_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Part no in Hindi</td>
                                        <td>{{ $voter->voterAddress->part_no_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Voting centre in English</td>
                                        <td>{{ $voter->voterAddress->voting_centre ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Voting centre in Marathi</td>
                                        <td>{{ $voter->voterAddress->voting_centre_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Voting centre in Hindi</td>
                                        <td>{{ $voter->voterAddress->voting_centre_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Taluka in English</td>
                                        <td>{{ $voter->voterAddress->taluka ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Taluka in Marathi</td>
                                        <td>{{ $voter->voterAddress->taluka_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Taluka in Hindi</td>
                                        <td>{{ $voter->voterAddress->taluka_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Assembly in English</td>
                                        <td>{{ $voter->voterAddress->assembly ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Assembly in Marathi</td>
                                        <td>{{ $voter->voterAddress->assembly_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Assembly in Hindi</td>
                                        <td>{{ $voter->voterAddress->assembly_hi ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- CSV Upload Form -->
                        <div class="mb-4">
                            <h5>Extra Information Details</h5>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Extra information one in English</td>
                                        <td>{{ $voter->voterInformation->extra_info_1 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information one in Marathi</td>
                                        <td>{{ $voter->voterInformation->extra_info_1_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information one in Hindi</td>
                                        <td>{{ $voter->voterInformation->extra_info_1_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information two in English</td>
                                        <td>{{ $voter->voterInformation->extra_info_2 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information two in Marathi</td>
                                        <td>{{ $voter->voterInformation->extra_info_2_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information two in Hindi</td>
                                        <td>{{ $voter->voterInformation->extra_info_2_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information three in English</td>
                                        <td>{{ $voter->voterInformation->extra_info_3 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information three in Marathi</td>
                                        <td>{{ $voter->voterInformation->extra_info_3_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information three in Hindi</td>
                                        <td>{{ $voter->voterInformation->extra_info_3_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information four in English</td>
                                        <td>{{ $voter->voterInformation->extra_info_4 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information four in Marathi</td>
                                        <td>{{ $voter->voterInformation->extra_info_4_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information four in Hindi</td>
                                        <td>{{ $voter->voterInformation->extra_info_4_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information five in English</td>
                                        <td>{{ $voter->voterInformation->extra_info_5 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information five in Marathi</td>
                                        <td>{{ $voter->voterInformation->extra_info_5_mr ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra information five in Hindi</td>
                                        <td>{{ $voter->voterInformation->extra_info_5_hi ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra Check One</td>
                                        <td>{{ $voter->voterInformation->extra_check_1 == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Extra Check Two</td>
                                        <td>{{ $voter->voterInformation->extra_check_2 == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
