@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')


    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                    <tr>
                        <th style="width: 30px;">#</th>
                        <th>Project</th>
                        <th>Goal</th>
                        <th>Appraisal Date</th>
                        <th>Status</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>

                        <td>Web Designer </td>
                        <td>Designing</td>
                        <td>
                            7 May 2019
                        </td>
                        <td>
                           <button class="btn btn-primary btn-sm"> Active</button>
                        </td>
                        <td >
                            <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#edit_appraisal"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Performance Appraisal Modal -->
    <div id="edit_appraisal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Performance Appraisal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Employee</label>
                                    <select class="select">
                                        <option>Select Employee</option>
                                        <option>John Doe</option>
                                        <option selected>Mike Litorus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" value="7/08/2019" type="text"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-box">
                                            <div class="row user-tabs">
                                                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                    <ul class="nav nav-tabs nav-tabs-solid">
                                                        <li class="nav-item"><a href="#appr_technical1" data-toggle="tab" class="nav-link active">Technical</a></li>
                                                        <li class="nav-item"><a href="#appr_organizational1" data-toggle="tab" class="nav-link">Organizational</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div id="appr_technical1" class="pro-overview tab-pane fade show active">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="bg-white">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Technical Competencies</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th colspan="2">Indicator</th>
                                                                    <th colspan="2">Expected Value</th>
                                                                    <th>Set Value</th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Customer Experience</td>
                                                                    <td colspan="2">Intermediate</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                            <option value="4"> Expert / Leader</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Marketing</td>
                                                                    <td colspan="2">Advanced</td>
                                                                    <td>
                                                                        <select name="marketing" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                            <option value="4"> Expert / Leader</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Management</td>
                                                                    <td colspan="2">Advanced</td>
                                                                    <td>
                                                                        <select name="management" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                            <option value="4"> Expert / Leader</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Administration</td>
                                                                    <td colspan="2">Advanced</td>
                                                                    <td>
                                                                        <select name="administration" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                            <option value="4"> Expert / Leader</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Presentation Skill</td>
                                                                    <td colspan="2">Expert / Leader</td>
                                                                    <td>
                                                                        <select name="presentation_skill" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                            <option value="4"> Expert / Leader</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Quality Of Work</td>
                                                                    <td colspan="2">Expert / Leader</td>
                                                                    <td>
                                                                        <select name="quality_of_work" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                            <option value="4"> Expert / Leader</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Efficiency</td>
                                                                    <td colspan="2">Expert / Leader</td>
                                                                    <td>
                                                                        <select name="efficiency" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                            <option value="4"> Expert / Leader</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="appr_organizational1">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="bg-white">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Organizational Competencies</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th colspan="2">Indicator</th>
                                                                    <th colspan="2">Expected Value</th>
                                                                    <th>Set Value</th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Integrity</td>
                                                                    <td colspan="2">Beginner</td>
                                                                    <td>
                                                                        <select name="integrity" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Professionalism</td>
                                                                    <td colspan="2">Beginner</td>
                                                                    <td>
                                                                        <select name="professionalism" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Team Work</td>
                                                                    <td colspan="2">Intermediate</td>
                                                                    <td>
                                                                        <select name="team_work" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Critical Thinking</td>
                                                                    <td colspan="2">Advanced</td>
                                                                    <td>
                                                                        <select name="critical_thinking" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Conflict Management</td>
                                                                    <td colspan="2">Intermediate</td>
                                                                    <td>
                                                                        <select name="conflict_management" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Attendance</td>
                                                                    <td colspan="2">Intermediate</td>
                                                                    <td>
                                                                        <select name="attendance" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Ability To Meet Deadline</td>
                                                                    <td colspan="2">Advanced</td>
                                                                    <td>
                                                                        <select name="ability_to_meet_deadline" class="form-control">
                                                                            <option value="">None</option>
                                                                            <option value="1"> Beginner</option>
                                                                            <option value="2"> Intermediate</option>
                                                                            <option value="3"> Advanced</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select class="select">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Performance Appraisal Modal -->

@endsection


@section('style')
    <link rel="stylesheet" href="{{url('assets/plugins/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/select2.min.css')}}">


@endsection

@section('script')
    <script src="{{url('assets/js/select2.min.js')}}"></script>
    <script src="{{url('assets/js/moment.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
@endsection
