@extends('layouts.master')

@section('content')

    @include('partials.breadcrumb')

    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img alt="" src="{{$staff->profile_pic}}"></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{$staff->title}} {{$staff->firstname}} {{$staff->lastname}}</h3>
                                        <h6 class="text-muted">Unit: {{$department->name}} @if($is_leader)<span class="text-danger">:: SUPERVISOR</span>@endif</h6>
                                        <small class="text-muted">Designation: {{$staff->designation}}</small>
                                        <div class="text">Email :<a href="">{{$staff->email}}</a></div>

                                        <div class="staff-id">Portal ID : {{$staff->portal_id ?? 'NULL'}}</div>
{{--                                        <div class="small doj text-muted">Date of Join : 1st Jan 2013</div>--}}
                                        <div class="staff-msg"><a class="btn btn-custom" href="#">Send Message</a></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Phone Number:</div>
                                            <div class="text"><a href="">{{$staff->phone ?? 'NULL'}}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Alternate Email:</div>
                                            <div class="text"><a href="">{{$staff->alt_email}}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Birthday:</div>
                                            <div class="text">
                                                {{ $staff->dob ? \Carbon\Carbon::createFromFormat('d/m/Y', $staff->dob)->format('jS F Y') : 'NILL' }}


                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Address:</div>
                                            <div class="text">{{$staff->house_address ?? 'NULL'}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Gender:</div>
                                            <div class="text">{{$staff->gender ?? 'NULL'}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Reports to:</div>
                                            <div class="text">
                                                <div class="avatar-box">
                                                    <div class="avatar avatar-xs">
                                                        <img src="{{$superior->profile_pic ?? ''}}" alt="">
                                                    </div>
                                                </div>
                                                <a href="#">
                                                    @if($superior)
                                                    {{$superior->fullname() }}
                                                    @else
                                                        NILL
                                                    @endif
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card tab-box">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
{{--                    <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>--}}
{{--                    <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>--}}
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content">

        <!-- Profile Info Tab -->
        <div id="emp_profile" class="pro-overview tab-pane fade show active">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Ministry Information <a href="#" class="edit-icon" data-toggle="modal" data-target="#ministry_info_modal"><i class="fa fa-pencil"></i></a></h3>
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Church You Attend</div>
                                    <div class="text">{{$staff->ministry()->church ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Zone</div>
                                    <div class="text">{{$staff->ministry()->zone ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Church Pastor</div>
                                    <div class="text"><a href="">{{$staff->ministry()->pastor ?? 'NILL'}}</a></div>
                                </li>
                                <li>
                                    <div class="title">Cell Responsibility</div>
                                    <div class="text">{{$staff->ministry()->cell_responsibility ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Born Again</div>
                                    <div class="text">{{$staff->ministry()->born_again_where ?? 'NILL'}}, <span class="text-primary">YEAR: {{$staff->ministry()->born_again_year ?? 'NULL'}}</span></div>
                                </li>
                                <li>
                                    <div class="title">Baptism</div>
                                    <div class="text">{{$staff->ministry()->baptised_where ?? 'NILL'}}, <span class="text-primary"> YEAR: {{$staff->ministry()->baptised_year ?? 'NULL'}}</span> </div>
                                </li>
                                <li>
                                    <div class="title">Foundation School</div>
                                    <div class="text">{{$staff->ministry()->foundation_school_where ?? 'NILL'}}, <span class="text-primary">YEAR: {{$staff->ministry()->foundation_school_year ?? 'NULL'}}</span></div>
                                </li>
                                <li>
                                    <div class="title">Year you joined Ministry</div>
                                    <div class="text">{{$staff->ministry()->ministry_year ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Employment Year as Staff</div>
                                    <div class="text">{{$staff->ministry()->employment_year ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Employment Year in Healing School</div>
                                    <div class="text">{{$staff->ministry()->department_year ?? 'NILL'}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Marital Information <a href="#" class="edit-icon" data-toggle="modal" data-target="#marital_info_modal"><i class="fa fa-pencil"></i></a></h3>

                            <ul class="personal-info">
                                <li>
                                    <div class="title">Marital Status</div>
                                    <div class="text">{{$staff->marital()->marital_status ?? 'NILL'}}</div>
                                </li>

                                <li>
                                    <div class="title">Anniversary Date</div>
                                    <div class="text">
                                        @if($staff->marital() && $staff->marital()->martial_status == 'Married' )
                                            {{ $staff->marital()->anniversary ? \Carbon\Carbon::createFromFormat('d/m/Y', $staff->marital()->anniversary)->format('jS F Y') : 'NILL' }}

{{--                                            {{ \Carbon\Carbon::parse($staff->marital()->anniversary )->format('j F Y') }}--}}
                                            @else
                                           NILL
                                    @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="title">Spouse Name</div>
                                    <div class="text">{{$staff->marital()->spouse_name ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Spouse Email</div>
                                    <div class="text">{{$staff->marital()->spouse_email ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Spouse Phone</div>
                                    <div class="text">{{$staff->marital()->spouse_phone ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Spouse Occupation</div>
                                    <div class="text">{{$staff->marital()->spouse_occupation ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Spouse Office</div>
                                    <div class="text">{{$staff->marital()->spouse_office ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Number of Children</div>
                                    <div class="text">{{$staff->marital()->children_number ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Children School</div>
                                    <div class="text">{{$staff->marital()->children_school ?? 'NILL'}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Bank Information <a href="#" class="edit-icon" data-toggle="modal" data-target="#bank_info_modal"><i class="fa fa-pencil"></i></a></h3>

                            <ul class="personal-info">
                                <li>
                                    <div class="title">Ministry Bank Name</div>
                                    <div class="text">{{$staff->bank()->bank_name ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Ministry  Account Number</div>
                                    <div class="text">{{$staff->bank()->account_number ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Ministry Account Name</div>
                                    <div class="text">{{$staff->bank()->account_name ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Espees Username</div>
                                    <div class="text">{{$staff->bank()->espees_username ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Espees Wallet</div>
                                    <div class="text">{{$staff->bank()->espees_wallet ?? 'NILL'}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Medical Information <a href="#" class="edit-icon" data-toggle="modal" data-target="#medical_info_modal"><i class="fa fa-pencil"></i></a></h3>

                            <ul class="personal-info">
                                <li>
                                    <div class="title">Genotype</div>
                                    <div class="text">{{$staff->genotype ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Blood Group</div>
                                    <div class="text">{{$staff->blood_group ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Allergies</div>
                                    <div class="text">{{$staff->allergies ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Health Conditions</div>
                                    <div class="text">{{$staff->health_conditions ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Health Insurance</div>
                                    <div class="text">{{$staff->health_insurance ?? 'NILL'}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Next Of Kin <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                            <h5 class="section-title text-primary">Contact One</h5>
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Name</div>
                                    <div class="text">{{$staff->nok1_name ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Relationship</div>
                                    <div class="text">{{$staff->nok1_relationship ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Phone Number </div>
                                    <div class="text">{{$staff->nok1_phone ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Occupation </div>
                                    <div class="text">{{$staff->nok1_occupation ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Kingschat Handle </div>
                                    <div class="text">{{$staff->nok1_kc_handle ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title"> House Address</div>
                                    <div class="text">{{$staff->nok1_address ?? 'NILL'}}</div>
                                </li>
                            </ul>
                            <hr>
                            <h5 class="section-title text-primary">Contact Two</h5>
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Name</div>
                                    <div class="text">{{$staff->nok2_name ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Relationship</div>
                                    <div class="text">{{$staff->nok2_relationship ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Phone </div>
                                    <div class="text">{{$staff->nok2_phone ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Occupation </div>
                                    <div class="text">{{$staff->nok2_occupation ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title">Kingschat Handle </div>
                                    <div class="text">{{$staff->nok2_kc_handle ?? 'NILL'}}</div>
                                </li>
                                <li>
                                    <div class="title"> House Address</div>
                                    <div class="text">{{$staff->nok2_address ?? 'NILL'}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
{{--                <div class="col-md-6 d-flex">--}}
{{--                    <div class="card profile-box flex-fill">--}}
{{--                        <div class="card-body">--}}
{{--                            <h3 class="card-title">Parent Information <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>--}}

{{--                            <ul class="personal-info">--}}
{{--                                <li>--}}
{{--                                    <div class="title"> Parents Alive</div>--}}
{{--                                    <div class="text">{{$staff->parental()->parents_alive ?? 'NILL'}}</div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="title"> Parents Born Again</div>--}}
{{--                                    <div class="text">{{$staff->parental()->parents_born_again ?? 'NILL'}}</div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="title">Ministry Members</div>--}}
{{--                                    <div class="text">{{$staff->parental()->ministry_members ?? 'NILL'}}</div>--}}
{{--                                </li>--}}
{{--                                @if($staff->parental() && $staff->parental()->ministry_members =='No')--}}
{{--                                <li>--}}
{{--                                    <div class="title">Parents Denomination</div>--}}
{{--                                    <div class="text">{{$staff->parental()->parents_denomination ?? 'NILL'}}</div>--}}
{{--                                </li>--}}
{{--                                @else--}}
{{--                                    <li>--}}
{{--                                        <div class="title">Parents Church</div>--}}
{{--                                        <div class="text">{{$staff->parental()->parents_church ?? 'NILL'}}</div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="title">Parents Zone</div>--}}
{{--                                        <div class="text">{{$staff->parental()->parents_zone ?? 'NILL'}}</div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="title">Parents Pastor</div>--}}
{{--                                        <div class="text">{{$staff->parental()->parents_pastor ?? 'NILL'}}</div>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
{{--                                <li>--}}
{{--                                    <div class="title">Number of Siblings</div>--}}
{{--                                    <div class="text">{{$staff->parental()->siblings_number ?? 'NILL'}}</div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="title">Position in Family</div>--}}
{{--                                    <div class="text">{{$staff->parental()->family_position?? 'NILL'}}</div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    @foreach ($staff->academicProfiles as $academic)
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#" class="name">{{ ucwords($academic->institution) }}</a>
                                                <div>{{ucwords($academic->degree)  }} in {{ ucwords($academic->subject )}}</div>
                                                <span class="time">{{ \Carbon\Carbon::parse($academic->start_date)->format('Y') }} - {{ \Carbon\Carbon::parse($academic->complete_date)->format('Y') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Ministry Work Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                                <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                                <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Info Tab -->

        <!-- Projects Tab -->
        <div class="tab-pane fade" id="emp_projects">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown profile-action">
                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                            </small>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. When an unknown printer took a galley of type and
                                scrambled it...
                            </p>
                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Deadline:
                                </div>
                                <div class="text-muted">
                                    17 Apr 2019
                                </div>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Project Leader :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Team :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown profile-action">
                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                            </small>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. When an unknown printer took a galley of type and
                                scrambled it...
                            </p>
                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Deadline:
                                </div>
                                <div class="text-muted">
                                    17 Apr 2019
                                </div>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Project Leader :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Team :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown profile-action">
                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                            </small>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. When an unknown printer took a galley of type and
                                scrambled it...
                            </p>
                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Deadline:
                                </div>
                                <div class="text-muted">
                                    17 Apr 2019
                                </div>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Project Leader :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Team :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown profile-action">
                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                            </small>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. When an unknown printer took a galley of type and
                                scrambled it...
                            </p>
                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Deadline:
                                </div>
                                <div class="text-muted">
                                    17 Apr 2019
                                </div>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Project Leader :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-members m-b-15">
                                <div>Team :</div>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="all-users">+15</a>
                                    </li>
                                </ul>
                            </div>
                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Projects Tab -->

        <!-- Bank Statutory Tab -->
        <div class="tab-pane fade" id="bank_statutory">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"> Basic Salary Information</h3>
                    <form>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select salary basis type</option>
                                        <option>Hourly</option>
                                        <option>Daily</option>
                                        <option>Weekly</option>
                                        <option>Monthly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Payment type</label>
                                    <select class="select">
                                        <option>Select payment type</option>
                                        <option>Bank transfer</option>
                                        <option>Check</option>
                                        <option>Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="card-title"> PF Information</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">PF contribution</label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Employee PF rate</label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select additional rate</option>
                                        <option>0%</option>
                                        <option>1%</option>
                                        <option>2%</option>
                                        <option>3%</option>
                                        <option>4%</option>
                                        <option>5%</option>
                                        <option>6%</option>
                                        <option>7%</option>
                                        <option>8%</option>
                                        <option>9%</option>
                                        <option>10%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Total rate</label>
                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Employee PF rate</label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select additional rate</option>
                                        <option>0%</option>
                                        <option>1%</option>
                                        <option>2%</option>
                                        <option>3%</option>
                                        <option>4%</option>
                                        <option>5%</option>
                                        <option>6%</option>
                                        <option>7%</option>
                                        <option>8%</option>
                                        <option>9%</option>
                                        <option>10%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Total rate</label>
                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h3 class="card-title"> ESI Information</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">ESI contribution</label>
                                    <select class="select">
                                        <option>Select ESI contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select ESI contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Employee ESI rate</label>
                                    <select class="select">
                                        <option>Select ESI contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select additional rate</option>
                                        <option>0%</option>
                                        <option>1%</option>
                                        <option>2%</option>
                                        <option>3%</option>
                                        <option>4%</option>
                                        <option>5%</option>
                                        <option>6%</option>
                                        <option>7%</option>
                                        <option>8%</option>
                                        <option>9%</option>
                                        <option>10%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Total rate</label>
                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Bank Statutory Tab -->

    </div>

    <!-- Profile Modal -->
    <div id="profile_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updateBasicProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap edit-img">
                                    <img class="inline-block" src="{{$staff->profile_pic}}" alt="user">
                                    <div class="fileupload btn">
                                        <span class="btn-text">edit</span>
                                        <input class="upload" type="file" name="profile_pic">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <select class="form-control form-select "  readonly required name="title" >
                                                <option value="" {{ !$staff->title ? 'selected' : '' }}>--Select--</option>
                                                <option value="Brother" {{ $staff->title == 'Brother' ? 'selected' : '' }}>Brother</option>
                                                <option value="Sister" {{ $staff->title == 'Sister' ? 'selected' : '' }}>Sister</option>
                                                <option value="Pastor" {{ $staff->title == 'Pastor' ? 'selected' : '' }}>Pastor</option>
                                                <option value="Deacon" {{ $staff->title == 'Deacon' ? 'selected' : '' }}>Deacon</option>
                                                <option value="Deaconess" {{ $staff->title == 'Deaconess' ? 'selected' : '' }}>Deaconess</option>
                                                <option value="Evangelist" {{$staff->title == 'Evangelist' ? 'selected' : '' }}>Evangelist</option>
                                                <option value="Reverend" {{ $staff->title == 'Reverend' ? 'selected' : '' }}>Reverend</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="firstname" readonly value="{{$staff->firstname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Middle Name</label>
                                            <input type="text" class="form-control" required name="middlename" value="{{$staff->middlename}}" placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" readonly class="form-control" name="lastname" value="{{$staff->lastname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Official Email Address</label>
                                            <input type="text"  name="email" class="form-control" readonly placeholder="Enter Email" value="{{$staff->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alternate Email</label>
                                            <input type="text" name="alt_email"  placeholder="Enter other Email" class="form-control" value="{{$staff->alt_email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone" required  placeholder="Enter Phone Number" value="{{$staff->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>KingsChat Number</label>
                                            <input type="text" class="form-control" name="kc_phone"  placeholder="Enter KingsChat Number" value="{{$staff->kc_phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Portal ID</label>
                                            <input type="text" class="form-control" name="portal_id"  placeholder="Enter Portal ID" value="{{$staff->portal_id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth <span class="text-danger"> (dd/mm/yyyy)</span></label>
                                            <input type="text"  name="dob"  placeholder="{{ $staff->dob ? \Carbon\Carbon::createFromFormat('d/m/Y', $staff->dob)->format('jS F Y') : '' }}" class="date-mask form-control ">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select disabled name="gender" class="select  form-control">
                                                <option value=" {{$staff->gender}} selected">{{$staff->gender}}</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" required name="house_address" value="{{$staff->house_address}}" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nearest Bus Stop</label>
                                    <input type="text" class="form-control"  required placeholder="Enter Bus Stop" name="bus_stop" value="{{$staff->bus_stop}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" required name="city" placeholder="Enter City" value="{{$staff->city}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class=" select form-control" required name="country">
                                        @foreach($countries as $country)
                                        <option value="{{ $country->name }}" {{ $staff->country == $country->name ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Height</label>
                                    <input type="text" class="form-control" required  placeholder="In Meters" name="height" value="{{$staff->height}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input type="text" class="form-control"  required placeholder="in KG" name="weight" value="{{$staff->weight}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shirt Size</label>
                                    <input type="text" class="form-control"  required placeholder="American/British Size" name="shirt_size" value="{{$staff->shirt_size}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Suit/Dress Size</label>
                                    <input type="text" class="form-control"  required placeholder="Enter Suit/Dress Size" name="dress_size" value="{{$staff->dress_size}}">
                                </div>
                            </div>

                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="ministry_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ministry Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('updateMinistryProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Church You Attend</label>
                                    <input type="text" name="church" required value="{{$staff->ministry()->church ?? ''}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zone</label>
                                    <select class=" select form-control" required name="zone">
                                        @foreach($zones as $zone)
                                            <option value="{{ $zone->name }}" {{ $staff->ministry()->zone ?? '' == $zone->name ? 'selected' : '' }}>
                                                {{ $zone->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Church Pastor</label>
                                    <input class="form-control"  name="pastor" required value="{{$staff->ministry()->pastor ?? ''}}" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cell Leader </label>
                                    <input class="form-control" name="cell_leader" required value="{{$staff->ministry()->cell_leader ?? ''}}" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cell Responsibility</label>

                                        <input class="form-control" name="cell_responsibility"  value="{{$staff->ministry()->cell_responsibility ?? ''}}" type="text">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Where you got Born Again </label>
                                    <input class="form-control" name="born_again_where"  required value="{{$staff->ministry()->born_again_where ?? ''}}" type="text">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Year you got Born Again</label>
                                    <input class="form-control"  name="born_again_year" value="{{$staff->ministry()->born_again_year ?? ''}}" type="number">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Where you did Foundation school </label>
                                    <input class="form-control" name="foundation_school_where"  required value="{{$staff->ministry()->foundation_school_where ?? ''}}" type="text">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Year you did Foundation School</label>
                                    <input class="form-control"  name="foundation_school_year" value="{{$staff->ministry()->foundation_school_year ?? ''}}" type="number">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Where you got Baptised </label>
                                    <input class="form-control" name="baptised_where"  required value="{{$staff->ministry()->baptised_where ?? ''}}" type="text">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Year you got Baptised</label>
                                    <input class="form-control"  name="baptised_year" value="{{$staff->ministry()->baptised_year ?? ''}}" type="number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Year you joined Ministry</label>
                                    <input class="form-control"  name="ministry_year" value="{{$staff->ministry()->ministry_year ?? ''}}" type="number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ministry Employment Year</label>
                                    <input class="form-control"  name="employment_year" value="{{$staff->ministry()->employment_year ?? ''}}" type="number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Year you joined Healing School</label>
                                    <input class="form-control"  name="department_year" value="{{$staff->ministry()->department_year ?? ''}}" type="number">
                                </div>
                            </div>

                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="marital_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Marital Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('updateMaritalProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Marital Status</label>
                                    <select class=" select form-control" id="status" required name="marital_status">
                                        <option  value="Single" {{ $staff->marital()->marital_status ?? '' == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option  value="Married" {{ $staff->marital()->marital_status ?? '' == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option  value="Separated" {{ $staff->marital()->marital_status ?? '' == 'Separated' ? 'selected' : '' }}>Separated</option>
                                        <option  value="Divorced" {{ $staff->marital()->marital_status ?? '' == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                        <option  value="Widow" {{ $staff->marital()->marital_status ?? '' == 'Widow' ? 'selected' : '' }}>Widow(er)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div id="marriedInfo" style="display:none">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Anniversary Date</label>
                                            <div class="cal-icon">
                                                <input type="text"   name="anniversary"
{{--                                                       placeholder="{{ $staff->marital()->anniversary ? \Carbon\Carbon::createFromFormat('d/m/Y'  }}"--}}
                                                       class="date-mask form-control ">

                                            </div>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Spouse Full Name</label>
                                        <input class="form-control"  name="spouse_name"  value="{{$staff->marital()->spouse_name ?? ''}}" type="text">
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Spouse Phone Number</label>
                                            <input class="form-control"  name="spouse_phone"  value="{{$staff->marital()->spouse_phone ?? ''}}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Spouse Email</label>
                                            <input class="form-control"  name="spouse_email"  value="{{$staff->marital()->spouse_email ?? ''}}" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Spouse Occupation</label>
                                            <input class="form-control"  name="spouse_occupation"  value="{{$staff->marital()->spouse_occupation ?? ''}}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Spouse Office Address</label>
                                            <input class="form-control"  name="spouse_office" value="{{$staff->marital()->spouse_office ?? ''}}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number of Children</label>
                                            <input class="form-control"  name="children_number"  value="{{$staff->marital()->children_number ?? ''}}" type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Children School</label>
                                            <input class="form-control"  name="children_school"  value="{{$staff->marital()->children_school ?? ''}}" type="text">
                                        </div>
                                    </div>


                                </div>


                             </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Parental Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('updateParentalProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Are your Parents Alive?</label>
                                    <select class=" select form-control"  required name="parents_alive">
                                        <option>--Select--</option>
                                        <option  value="Yes" {{ $staff->parental()->parents_alive ?? '' == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option  value="No" {{ $staff->parental()->parents_alive ?? '' == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Are your Parents Born Again?</label>
                                    <select class=" select form-control"  id="parentsBornAgain" required name="parents_born_again">
                                        <option>--Select--</option>
                                        <option  value="Yes" {{ $staff->parental()->parents_born_again ?? '' == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option  value="No" {{ $staff->parental()->parents_born_againe ?? '' == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" id="ministryMembersDiv" style="display: none">
                                <div class="form-group">
                                    <label>Are they members of the Ministry?</label>
                                    <select class=" select form-control"  id="ministryMembers"  name="ministry_members">
                                        <option value="">--Select--</option>
                                        <option  value="Yes" {{ $staff->parental()->ministry_members ?? '' == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option  value="No" {{ $staff->parental()->ministry_members ?? '' == 'No' ? 'selected' : '' }}>No</option>
                                    </select>                                </div>
                            </div>
                            <div class="col-md-6"  id="parentalDenomination" style="display: none">
                                <div class="form-group">
                                    <label>What Denomination</label>
                                    <input class="form-control"  name="parents_denomination"  value="{{$staff->parental()->parents_denomination ?? ''}}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none" id="zoneDiv">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Church they attend</label>
                                    <input type="text" name="parents_church"  value="{{$staff->parental()->parents_church ?? ''}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zone</label>
                                    <select class=" select form-control"  name="parents_zone">
                                        <option value="">--Select--</option>
                                        @foreach($zones as $zone)

                                            <option value="{{ $zone->name }}" {{ $staff->parental()->parents_zone ?? '' == $zone->name ? 'selected' : '' }}>
                                                {{ $zone->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Their Church Pastor</label>
                                    <input class="form-control"  name="parents_pastor"  value="{{$staff->parental()->parents_pastor ?? ''}}" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Number of Siblings</label>
                                    <input class="form-control"  name="siblings_number"  required value="{{$staff->parental()->siblings_number ?? ''}}" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Your Position in the Family</label>
                                    <input class="form-control"  name="family_position"  value="{{$staff->parental()->family_position ?? ''}}" type="text">
                                </div>
                            </div>

                        </div>



                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="medical_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Medical Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('updateMedicalProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Genotype</label>
                                    <select class="select form-control" name="genotype" required>
                                        <option value="" {{ !$staff->genotype ? 'selected' : '' }}>--Select Genotype--</option>
                                        <option value="AA" {{ $staff->genotype ?? '' == 'AA' ? 'selected' : '' }}>AA</option>
                                        <option value="AS" {{ $staff->genotype ?? '' == 'AS' ? 'selected' : '' }}>AS</option>
                                        <option value="SS" {{ $staff->genotype ?? '' == 'SS' ? 'selected' : '' }}>SS</option>
                                        <option value="AC" {{ $staff->genotype ?? '' == 'AC' ? 'selected' : '' }}>AC</option>
                                        <option value="SC" {{ $staff->genotype ?? '' == 'SC' ? 'selected' : '' }}>SC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="select form-control" name="blood_group" required>
                                        <option value="" {{ !$staff->blood_group ? 'selected' : '' }}>--Select Blood Group--</option>
                                        <option value="A+" {{ $staff->blood_group ?? '' == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ $staff->blood_group ?? '' == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ $staff->blood_group ?? '' == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ $staff->blood_group ?? '' == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ $staff->blood_group ?? '' == 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ $staff->blood_group ?? '' == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ $staff->blood_group ?? '' == 'O+' ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ $staff->blood_group ?? '' == 'O-' ? 'selected' : '' }}>O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Any Allergies?</label>
                                    <textarea name="allergies"  rows="3" class="form-control" >{{ $staff->allergies ?? '' }}</textarea>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Any Health Condition</label>
                                    <textarea name="health_condition"  rows="3" class="form-control" >{{ $staff->health_condition ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Do you have health insurance</label>
                                    <input class="form-control"  name="health_insurance" value="{{$staff->health_insurance ?? ''}}" type="text">
                                </div>
                            </div>


                        </div>



                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="bank_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bank Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('updateBankProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ministry Bank Name</label>
                                        <input class="form-control"  name="bank_name"  value="{{$staff->bank()->bank_name ?? ''}}" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ministry Bank Account Number</label>
                                        <input class="form-control"  name="account_number"  value="{{$staff->bank()->account_number ?? ''}}" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ministry Bank Account Name</label>
                                        <input class="form-control"  name="account_name"  value="{{$staff->bank()->account_name ?? ''}}" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Espees Username</label>
                                        <input class="form-control"  name="espees_username"  value="{{$staff->bank()->espees_username ?? ''}}" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Espees Wallet Address</label>
                                        <input class="form-control"  name="espees_wallet" value="{{$staff->bank()->espees_wallet ?? ''}}" type="text">
                                    </div>
                                </div>


                            </div>



                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Family Info Modal -->

    <!-- Emergency Contact Modal -->
    <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Next of Kin Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updateNokProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Contact One</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok1_name" required  value="{{$staff->nok1_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok1_relationship" required  value="{{$staff->nok1_relationship}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok1_phone" required  value="{{$staff->nok1_phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Occupation <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok1_occupation" required  value="{{$staff->nok1_occupation}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>KingsChat Handle </label>
                                            <input type="text" class="form-control" name="nok1_kc_handle"   value="{{$staff->nok1_kc_handle}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>House Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok1_address"   value="{{$staff->nok1_address}}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Contact two</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok2_name" required  value="{{$staff->nok2_name}}">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok2_relationship" required  value="{{$staff->nok2_relationship}}">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok2_phone" required value="{{$staff->nok2_phone}}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Occupation <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok2_occupation" required  value="{{$staff->nok2_occupation}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>KingsChat Handle </label>
                                            <input type="text" class="form-control" name="nok2_kc_handle"   value="{{$staff->nok2_kc_handle}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>House Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nok2_address"   value="{{$staff->nok2_address}}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Emergency Contact Modal -->

    <!-- Education Modal -->
    <div id="education_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Education Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="modal-body">
                        <form id="educationForm" action="{{ route('updateEducationProfile') }}" method="POST">
                            @csrf

                            <div id="educationContainer">
                                @if (!empty($staff->academic))
                                    @foreach ($staff->academic as $academic)
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Education Information <a href="#" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" class="form-control floating" name="institution[]" value="{{ $academic->institution }}">
                                                            <label class="focus-label">Institution</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" class="form-control floating" name="subject[]" value="{{ $academic->subject }}">
                                                            <label class="focus-label">Course</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused ">
                                                            <div class="cal-icon">
                                                                <input type="text"  name="start_date[]"  placeholder="{{ $academic->start_date ?? 'Starting Date' }}
                                                                    " class="date-mask form-control">
{{----}}
                                                            </div>
                                                            <label class="focus-label">Starting Date<span class="text-danger"> (dd/mm/yyyy)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <div class="cal-icon">
                                                                <input type="text" class="date-mask form-control " name="complete_date[]" value="{{ $academic->complete_date }}">
                                                            </div>
                                                            <label class="focus-label">Complete Date<span class="text-danger"> (dd/mm/yyyy)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" class="form-control floating" name="degree[]" value="{{ $academic->degree }}">
                                                            <label class="focus-label">Degree</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" class="form-control floating" name="grade[]" value="{{ $academic->grade }}">
                                                            <label class="focus-label">Grade</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Information <a href="#" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" name="institution[]">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" name="subject[]">
                                                        <label class="focus-label">Course</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text"  name="start_date[]"   class="date-mask form-control">                                                        </div>
                                                        <label class="focus-label">Starting Date<span class="text-danger"> (dd/mm/yyyy)</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" class="date-mask form-control " name="complete_date[]">
                                                        </div>
                                                        <label class="focus-label">Complete Date<span class="text-danger"> (dd/mm/yyyy)</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" name="degree[]">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" name="grade[]">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="add-more">
                                    <a href="#" id="addMore"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>


                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>


            </div>
        </div>
    </div>
    <!-- /Education Modal -->

    <!-- Experience Modal -->
    <div id="experience_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Work Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('updateNokProfile')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Work Experience in Ministry</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Do you have any work experience in the Loveworld nation</label>
                                            <select class=" select form-control"  id="workExperience" required name="experience">
                                                <option>--Select--</option>
                                                <option  value="Yes" {{ $staff->work()->experience ?? '' == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option  value="No" {{ $staff->work()->experiencee ?? '' == 'No' ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="showWork">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From <span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating mydatetimepicker" name="start_date"   value="{{$staff->work()->ministry_start_date ??''}}" >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>To <span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating mydatetimepicker" name="end_date"   value="{{$staff->work()->ministry_end_date ?? ''}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Job Role <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="job_role" required value="{{$staff->work()->ministry_job_role ?? ''}}">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Work History in Healing School</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From <span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                            <input type="text" class="form-control floating mydatetimepicker" name="start_date"   value="{{$staff->work()->start_date ??''}}" >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Too <span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                            <input type="text" class="form-control floating mydatetimepicker" name="end_date"   value="{{$staff->work()->end_date ?? ''}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Job Role <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="job_role" required value="{{$staff->work()->job_role ?? ''}}">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Experience Modal -->
    @endsection

@section('script')
    <script>
        $(document).ready(function() {

            // Show or hide sections based on the selected options
            $('#status').change(function() {
                var mode = $(this).val();
                if (mode === 'Married') {
                    $('#marriedInfo').show();

                } else if (mode === 'Single') {
                    $('#marriedInfo').hide();

                }
            });
            $('#parentsBornAgain').change(function() {
                var set = $(this).val();
                if (set === 'Yes') {
                    $('#ministryMembersDiv').show();
                    $('#parentalDenomination').hide();
                    $('#zoneDiv').hide();

                } else if (set === 'No') {
                    $('#ministryMembersDiv').hide();
                    $('#parentalDenomination').hide();
                    $('#zoneDiv').hide();

                }
            });
            $('#ministryMembers').change(function() {
                var members = $(this).val();
                if (members === 'Yes') {
                    $('#parentalDenomination').hide();
                    $('#zoneDiv').show();

                } else if (members === 'No') {

                    $('#parentalDenomination').show();
                    $('#zoneDiv').hide();

                }
            });
        });
        </script>
    <script>
        $(document).ready(function() {
            // Function to initialize datepicker
            function initializeDatepicker() {
                'use strict';

                $.mask.definitions['~'] = '[+-]';
                $('.date-mask').mask('99/99/9999');
            }

            // Function to add a new education card
            $('#educationContainer').on('click', '#addMore', function(e) {
                e.preventDefault();
                var newCard = `
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Education Information <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input type="text" class="form-control floating" name="institution[]">
                                    <label class="focus-label">Institution</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input type="text" class="form-control floating" name="subject[]">
                                    <label class="focus-label">Course</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <div class="cal-icon">

                                        <input type="text" class="date-mask form-control " name="start_date[]">
                                    </div>
                                    <label class="focus-label">Starting Date<span class="text-danger"> (dd/mm/yyyy)</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <div class="cal-icon">
                                        <input type="text" class="date-mask form-control " name="complete_date[]">
                                    </div>
                                    <label class="focus-label">Complete Date<span class="text-danger"> (dd/mm/yyyy)</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input type="text" class="form-control floating" name="degree[]">
                                    <label class="focus-label">Degree</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus focused">
                                    <input type="text" class="form-control floating" name="grade[]">
                                    <label class="focus-label">Grade</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                $('#educationContainer').append(newCard);
                initializeDatepicker();
                // Remove previous "Add More" link to ensure only one exists
                $('#educationContainer .add-more').remove();
                // Append "Add More" link to the last card
                $('#educationContainer .card:last').find('.card-body').append('<div class="add-more"><a href="#" id="addMore"><i class="fa fa-plus-circle"></i> Add More</a></div>');
            });

            // Function to delete an education card
            $('#educationContainer').on('click', '.delete-icon', function(e) {
                e.preventDefault();
                $(this).closest('.card').remove();

                // Append "Add More" link to the last card if it doesn't have one
                if ($('#educationContainer .card').length === 1) {
                    $('#educationContainer .card:last').find('.card-body').append('<div class="add-more"><a href="#" id="addMore"><i class="fa fa-plus-circle"></i> Add More</a></div>');
                }
            });

            // Initialize datepicker on page load
            initializeDatepicker();
        });
    </script>





@endsection
