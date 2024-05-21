<?php
    error_reporting(0);
    $student_id = $profile_data->student_id;
    $education_data = DB::table('tbl_student_education')
        ->select('*')
        ->where('student_id', $student_id)
        ->get();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .error {
            color: red;
            font-weight: bold;
        }

        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        textarea {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
            padding: 15px;
        }
    </style>
</head>
<body>

@include('admin.include.navbar')
<div class="page-content">
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i><span class="font-weight-semibold"> Home</span> - Sponsor Documents</h4>
                    </div>
                    <div class="header-elements d-none">
                        <div class="d-flex justify-content-center">
                            <a href="{{url('home')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Sponsor Documents</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                @if(Auth::user()->role==='Admission Section')
                                    <div id="primary" class="collapse1">
                                        <div class="card-body">
                                            <div class="row" style="margin-bottom:10px;">
                                                <div class="col-md-12">
                                                    <h4 style="font-weight:bold; margin-top:35px;"> Important Document List:</h4>
                                                    <form action="{{url('important_file_store')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <table class="table table-bordered" id="visa_imp_table">
                                                            <thead style="background:#80808017;">
                                                            <th style="width:10%;">#</th>
                                                            <th style="width:30%;">Required File Name</th>
                                                            <th style="width:20%;">File Upload</th>
                                                            <th style="width:30%;">Note</th>
                                                            <th style="width:10%;">Action</th>
                                                            </thead>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    <textarea name="addmore[0][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off"
                                                                              style="font-size:14px !important;"></textarea>
                                                                    <input type="hidden" name="addmore[0][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red">
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="addmore[0][visa_req_file]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120">
                                                                    <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                </td>
                                                                <td>
                                                                    <textarea name="addmore[0][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                                                                </td>
                                                                <td>
                                                                    <button type="button" name="add" id="visa_add_more" class="btn btn-success btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-plus"></i> Add More</button>
                                                                    <br>
                                                                    <button type="submit" class="btn btn-sm btn-info" style="border-radius:0px; margin-top:5px; width:100px;"><i class="fa fa-check"></i> Submit</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                                <div class="col-md-12">
                                                    <h4 style="font-weight:bold; margin-top:35px;"> Important Documents View:</h4>
                                                    <table class="table table-bordered" id="sample_table">
                                                        <thead style="background:#80808017;">
                                                        <th>#</th>
                                                        <th>Required File Name</th>
                                                        <th>Note</th>
                                                        <th>Admission Required File View</th>
                                                        <th>Student Send File View</th>
                                                        <th>Action</th>
                                                        </thead>
                                                        @foreach($important_data as $key=>$row)
                                                            <tr>
                                                                <td>{{++$key}}</td>
                                                                <td>{{$row->req_file_name}}</td>
                                                                <td>{{$row->note}}</td>
                                                                <td>
                                                                    @if($row->visa_req_file==true)
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_visa_req<?php echo $row->id; ?>" style="border-radius:0px;"><i
                                                                                class="icon-file-pdf ml-2"></i>
                                                                            File View
                                                                        </button>
                                                                        <div id="modal_visa_req<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                        <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/imp_file/admission/'.$row->visa_req_file) }}" frameborder="0" width="100%" height="780">
                                                                                        <hr>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($row->imp_file==true)
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_imp_req<?php echo $row->id; ?>" style="border-radius:0px;"><i
                                                                                class="icon-file-pdf ml-2"></i>
                                                                            File View
                                                                        </button>
                                                                        <div id="modal_imp_req<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                        <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/imp_file/admission/'.$row->imp_file) }}" frameborder="0" width="100%" height="780">
                                                                                        <hr>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($row->imp_file!=true)
                                                                        <button type="button" data-id="{{$row->id}}" id="delete_file" class="btn btn-danger btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-trash"></i> Delete</button>
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(Auth::user()->role==='Visa Section' || Auth::user()->role==='Admin')
                                    <div id="primary" class="collapse2">
                                        <div class="card-body">
                                            <div class="row" style="margin-bottom:10px;">
                                                <div class="col-md-12">
                                                    <h4 style="font-weight:bold; margin-top:35px;"> Important Document List:</h4>
                                                    <form action="{{url('visa_important_file_store')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <table class="table table-bordered" id="visa_imp_table">
                                                            <thead style="background:#80808017;">
                                                            <th style="width:10%;">#</th>
                                                            <th style="width:30%;">Required File Name</th>
                                                            <th style="width:20%;">File Upload</th>
                                                            <th style="width:30%;">Note</th>
                                                            <th style="width:10%;">Action</th>
                                                            </thead>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    <textarea name="addmore[0][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off"
                                                                              style="font-size:14px !important;"></textarea>
                                                                    <input type="hidden" name="addmore[0][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red">
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="addmore[0][visa_req_file]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120">
                                                                    <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                </td>
                                                                <td>
                                                                    <textarea name="addmore[0][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                                                                </td>
                                                                <td>
                                                                    <button type="button" name="add" id="visa_add_more" class="btn btn-success btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-plus"></i> Add More</button>
                                                                    <br>
                                                                    <button type="submit" class="btn btn-sm btn-info" style="border-radius:0px; margin-top:5px; width:100px;"><i class="fa fa-check"></i> Submit</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                                <div class="col-md-12">
                                                    <h4 style="font-weight:bold; margin-top:35px;"> Important Documents View:</h4>
                                                    <table class="table table-bordered" id="sample_table">
                                                        <thead style="background:#80808017;">
                                                        <th>#</th>
                                                        <th>Required File Name</th>
                                                        <th>Note</th>
                                                        <th>Visa Required File View</th>
                                                        <th>Student Send File View</th>
                                                        <th>Action</th>
                                                        </thead>
                                                        @foreach($visa_important_data as $key=>$row)
                                                            <tr>
                                                                <td>{{++$key}}</td>
                                                                <td>{{$row->req_file_name}}</td>
                                                                <td>{{$row->note}}</td>
                                                                <td>
                                                                    @if($row->visa_req_file==true)
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_visa_req<?php echo $row->id; ?>" style="border-radius:0px;"><i
                                                                                class="icon-file-pdf ml-2"></i>
                                                                            File View
                                                                        </button>
                                                                        <div id="modal_visa_req<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                        <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/imp_file/visa/'.$row->visa_req_file) }}" frameborder="0" width="100%" height="780">
                                                                                        <hr>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($row->imp_file==true)
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_imp_req<?php echo $row->id; ?>" style="border-radius:0px;"><i
                                                                                class="icon-file-pdf ml-2"></i>
                                                                            File View
                                                                        </button>
                                                                        <div id="modal_imp_req<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                        <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/imp_file/admission/'.$row->imp_file) }}" frameborder="0" width="100%" height="780">
                                                                                        <hr>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($row->imp_file!=true)
                                                                        <button type="button" data-id="{{$row->id}}" id="visa_delete_file" class="btn btn-danger btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-trash"></i> Delete
                                                                        </button>
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =========================(Modal Start Counselor Section)============================================ --}}
            <div id="modal_check_student_profile" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('counselor_check_profile')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">All Information of this student is Correct ? </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal_admission_section_proceed" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('admission_section_proceed')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">Are You Sure to proceed Student to Admission Section !!!!!!!!!! </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal_visa_section_proceed" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('visa_section_proceed')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">Are You Sure to proceed Student to Visa Section !!!!!!!!!! </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- =========================(Modal Start Admission Section)============================================--}}
            <div id="modal_check_student_profile_by_admission_section" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('admission_check_profile')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">All Information of this student is Correct ? </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal_check_student_profile_by_visa_section" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('visa_check_profile')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">All Information of this student is Correct ? </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal_offer_letter" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('admission_offer_letter_store')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;"> Offer Letter ???????? </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal_final_offer_letter" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('admission_final_offer_letter_store')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">Final Offer Letter ? </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="{{asset('backend/jquery.MultiFile.js')}}"></script>
            <script>
                var SITEURL = '{{URL::to('')}}';
                if ($("#checkForm").length > 0) {
                    $("#checkForm").validate({
                        rules: {
                            name: {
                                required: true,
                            },
                            user_name: {
                                required: true,
                            },
                            role: {
                                required: true,
                            },
                            counter_no: {
                                required: true,
                            },
                            password: {
                                required: true,
                            },
                        },
                        messages: {
                            name: {
                                required: "(***Name is required***)"
                            },
                            user_name: {
                                required: "(***User Name is required***)"
                            },
                            role: {
                                required: "(***Role is required***)"
                            },
                            counter_no: {
                                required: "(***Counter No is required***)"
                            },
                            password: {
                                required: "(***Password is required***)"
                            },
                        },
                        submitHandler: function (form) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $('#check_profile').html('Sending..');
                            $.ajax({
                                url: 'counselor_check_profile',
                                type: "POST",
                                data: $('#checkForm').serialize(),
                                dataType: 'json',
                                success: function (data) {
                                    $('#checkForm').trigger("reset");
                                    $('#modal_check_student_profile').modal('hide');
                                    swal({
                                        icon: 'success',
                                        title: 'Student Profile Check Successfully !!!',
                                        showConfirmButton: true,
                                        timer: 2500
                                    });
                                    setInterval('location.reload()', 2000);
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });
                        }
                    })
                }
                $(document).on("click", "#cust_btn", function () {
                    $(".successModal").modal("toggle");
                })
                $(document).on("click", "#check_student_profile", function () {
                    $("#modal_check_student_profile").modal("toggle");
                });
                $(document).on("click", "#check_student_profile_by_admission_section", function () {
                    $("#modal_check_student_profile_by_admission_section").modal("toggle");
                });
                $(document).on("click", "#check_student_profile_by_visa_section", function () {
                    $("#modal_check_student_profile_by_visa_section").modal("toggle");
                });
                $(document).on("click", "#offer_letter", function () {
                    $("#modal_offer_letter").modal("toggle");
                });
                $(document).on("click", "#final_offer_letter", function () {
                    $("#modal_final_offer_letter").modal("toggle");
                });

                $(document).on("click", "#admission_section_proceed", function () {
                    $("#modal_admission_section_proceed").modal("toggle");
                });
                $(document).on("click", "#visa_section_proceed", function () {
                    $("#modal_visa_section_proceed").modal("toggle");
                });


                //(+++++++++ Toaster Message ++++++++++++++)
                @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
                @endif
                $(document).ready(function () {
                    var i = 1;
                    $("#add_more_sample").click(function () {
                        i++;
                        $("#sample_table").append('<tr><td>' + i + '</td>' +
                            '<td><textarea name="addmore[' + i + '][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off" style="font-size:14px !important;"></textarea> <input type="hidden" name="addmore[' + i + '][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red"></td>' +
                            '<td><textarea name="addmore[' + i + '][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea></td>' +
                            '<td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fa fa-close"></i> Delete</button></td>' +
                            '</tr>'
                        )
                        ;
                        $('.collection-date').datepicker({
                            dateFormat: "yy/mm/dd",
                        });
                        $('.js-select').select2({
                                dropdownParent: $('#milkCollectionModal .modal-content')
                            }
                        );
                    });
                    $("#visa_add_more").click(function () {
                        i++;
                        $("#visa_imp_table").append('<tr><td>' + i + '</td>' +
                            '<td><textarea name="addmore[' + i + '][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off" style="font-size:14px !important;"></textarea> <input type="hidden" name="addmore[' + i + '][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red"></td>' +
                            '<td><input type="file" name="addmore[' + i + '][visa_req_file]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120"><span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span></td>' +
                            '<td><textarea name="addmore[' + i + '][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea></td>' +
                            '<td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fa fa-close"></i> Delete</button></td>' +
                            '</tr>'
                        );
                        $('.multifile').MultiFile({
                            error: function (s) {
                                if (typeof console != 'undefined') console.log(s);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: s
                                })
                            }
                        });
                    });
                    $(document).on('click', '.remove-tr', function () {
                        $(this).parents('tr').remove();
                    });
                });
                $('body').on('click', '#delete_file', function () {
                    var id = $(this).data("id");
                    if (confirm("Do you really want to delete this item?")) {
                        $.ajax({
                            type: "get",
                            url: "important_file_description_delete/" + id,
                            success: function (data) {
                                swal.fire({
                                    icon: 'error',
                                    title: 'Important File  Delete Successfully !!!',
                                    showConfirmButton: true,
                                    timer: 2500
                                });
                                setInterval('location.reload()', 2000);
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
                $('body').on('click', '#visa_delete_file', function () {
                    var id = $(this).data("id");
                    if (confirm("Do you really want to delete this item?")) {
                        $.ajax({
                            type: "get",
                            url: "visa_file_delete/" + id,
                            success: function (data) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Visa Important File  Delete Successfully !!!',
                                    showConfirmButton: true,
                                    timer: 2500
                                });
                                setInterval('location.reload()', 2000);
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
                $('.multifile').MultiFile({
                    error: function (s) {
                        if (typeof console != 'undefined') console.log(s);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: s
                        })
                    }
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>



