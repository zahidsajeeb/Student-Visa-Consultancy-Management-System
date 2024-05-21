<?php
    error_reporting(0);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body>
@include('admin.include.navbar')
<div class="page-content">
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content-inner">
                        <div class="page-header page-header-light">
                            <div class="page-header-content header-elements-lg-inline">
                                <div class="page-title d-flex">
                                    <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To Visa Software (Student Panel) </h4>
                                </div>
                                <div class="navbar-right">
                                    <a href="{{url('home')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back to Previous Page</a>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="alert alert-secondary" role="alert" style="list-style:none; border-radius:0px; background:darkred !important; color:whitesmoke;"><i class="fa fa-close"></i> {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" style="font-weight:bold;text-align:center;"><i class="fa fa-edit"></i> Edit Education Summary</h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('update_education_summary')}}" method="POST" id="form" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{$education_data->student_id}}">
                                                @if($education_data->primary_institution_name!=null)
                                                    <div class="card-group-control card-group-control-right">
                                                        <div class="card mb-2">
                                                            <div class="card-header">
                                                                <h6 class="card-title">
                                                                    <a class="text-body" >
                                                                        <i class="icon-help mr-2 text-secondary"></i> Primary School Attend Information (FORM-1)
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div id="primary">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                                                                                <select class="form-control form-control-select2" name="primary_institution_country">
                                                                                    @include('.include.student.edit.educational_background.country')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_institution_name" value="{{$education_data->primary_institution_name}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                                                                                <select class="form-control" name="primary_education_level" style="display: block;!important;">
                                                                                    <option value="{{$education_data->primary_education_level}}">{{$education_data->primary_education_level}}</option>
                                                                                    <option value="Grade 1">Grade 1</option>
                                                                                    <option value="Grade 2">Grade 2</option>
                                                                                    <option value="Grade 3">Grade 3</option>
                                                                                    <option value="Grade 4">Grade 4</option>
                                                                                    <option value="Grade 5">Grade 5</option>
                                                                                    <option value="Grade 6">Grade 6</option>
                                                                                    <option value="Grade 7">Grade 7</option>
                                                                                    <option value="Grade 8">Grade 8</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_language_instruction" value="{{$education_data->primary_language_instruction}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                                                                                <input type="date" class="form-control" name="primary_institution_from" value="{{$education_data->primary_institution_from}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                                                                                <input type="date" class="form-control" name="primary_institution_to" value="{{$education_data->primary_institution_to}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                                                                <input type="text" class="form-control" name="primary_institution_degree" value="{{$education_data->primary_institution_degree}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_institution_address" value="{{$education_data->primary_institution_address}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_institution_city" value="{{$education_data->primary_institution_city}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Province</label>
                                                                                <input type="text" class="form-control" name="primary_institution_province" value="{{$education_data->primary_institution_province}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                                                                <input type="text" class="form-control" name="primary_institution_zip" value="{{$education_data->primary_institution_zip}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grading Scheme</label>
                                                                                <input type="text" class="form-control" name="primary_grading_scheme" value="{{$education_data->primary_grading_scheme}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_grade_avg" value="{{$education_data->primary_grade_avg}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_grade_scale" value="{{$education_data->primary_grade_scale}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="font-weight-bold"> File Upload </h5>
                                                                            <hr>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Certificate</label>
                                                                                    <input type="file" class="form-control multifile" name="primary_certificate_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Transcript</label>
                                                                                    <input type="file" class="form-control multifile" name="primary_transcript_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table table-bordered" id="primary_table" style="width:100%;">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th>File View</th>
                                                                                    <th>File Delete</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($document_data as $key=>$result)
                                                                                    @if($result->type=='Primary')
                                                                                        <tr>
                                                                                            <td>{{++$key}}</td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i
                                                                                                        class="icon-file-pdf ml-2"></i> File View
                                                                                                </button>
                                                                                            </td>
                                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm primary_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i
                                                                                                            class="icon-trash ml-2"></i> Delete File</a></span>
                                                                                            </td>
                                                                                            <div id="modal_theme_primary<?php echo $result->id; ?>"
                                                                                                 class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-primary text-white">
                                                                                                            <h6 class="modal-title">Uploaded File</h6>
                                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-group-control card-group-control-right">
                                                        <div class="card mb-2">
                                                            <div class="card-header">
                                                                <h6 class="card-title">
                                                                    <a class="text-body" >
                                                                        <i class="icon-help mr-2 text-secondary"></i> Primary School Attend Information (FORM-2)
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div id="primary">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                                                                                <select class="form-control form-control-select2" name="primary_two_institution_country">
                                                                                    @include('.include.student.edit.educational_background.country')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_two_institution_name" value="{{$education_data->primary_two_institution_name}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                                                                                <select class="form-control" name="primary_two_education_level" style="display: block;!important;">
                                                                                    <option value="{{$education_data->primary_two_education_level}}">{{$education_data->primary_two_education_level}}</option>
                                                                                    <option value="Grade 1">Grade 1</option>
                                                                                    <option value="Grade 2">Grade 2</option>
                                                                                    <option value="Grade 3">Grade 3</option>
                                                                                    <option value="Grade 4">Grade 4</option>
                                                                                    <option value="Grade 5">Grade 5</option>
                                                                                    <option value="Grade 6">Grade 6</option>
                                                                                    <option value="Grade 7">Grade 7</option>
                                                                                    <option value="Grade 8">Grade 8</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_two_language_instruction" value="{{$education_data->primary_two_language_instruction}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                                                                                <input type="date" class="form-control" name="primary_two_institution_from" value="{{$education_data->primary_two_institution_from}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                                                                                <input type="date" class="form-control" name="primary_two_institution_to" value="{{$education_data->primary_two_institution_to}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                                                                <input type="text" class="form-control" name="primary_two_institution_degree" value="{{$education_data->primary_two_institution_degree}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_two_institution_address" value="{{$education_data->primary_two_institution_address}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_two_institution_city" value="{{$education_data->primary_two_institution_city}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Province</label>
                                                                                <input type="text" class="form-control" name="primary_two_institution_province" value="{{$education_data->primary_two_institution_province}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                                                                <input type="text" class="form-control" name="primary_two_institution_zip" value="{{$education_data->primary_two_institution_zip}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grading Scheme</label>
                                                                                <input type="text" class="form-control" name="primary_two_grading_scheme" value="{{$education_data->primary_two_grading_scheme}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_two_grade_avg" value="{{$education_data->primary_two_grade_avg}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="primary_two_grade_scale" value="{{$education_data->primary_two_grade_scale}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="font-weight-bold"> File Upload </h5>
                                                                            <hr>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Certificate</label>
                                                                                    <input type="file" class="form-control multifile" name="primary_two_certificate_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Transcript</label>
                                                                                    <input type="file" class="form-control multifile" name="primary_two_transcript_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table table-bordered" id="primary_table" style="width:100%;">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th>File View</th>
                                                                                    <th>File Delete</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($document_data as $key=>$result)
                                                                                    @if($result->type=='Primary_two')
                                                                                        <tr>
                                                                                            <td>{{++$key}}</td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i
                                                                                                        class="icon-file-pdf ml-2"></i> File View
                                                                                                </button>
                                                                                            </td>
                                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm primary_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i
                                                                                                            class="icon-trash ml-2"></i> Delete File</a></span>
                                                                                            </td>
                                                                                            <div id="modal_theme_primary<?php echo $result->id; ?>"
                                                                                                 class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-primary text-white">
                                                                                                            <h6 class="modal-title">Uploaded File</h6>
                                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($education_data->secondary_institution_name!=null)
                                                    <div class="card-group-control card-group-control-right">
                                                        <div class="card mb-2">
                                                            <div class="card-header">
                                                                <h6 class="card-title">
                                                                    <a class="text-body">
                                                                        <i class="icon-help mr-2 text-secondary"></i> Secondary School Attend Information
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div id="secondary">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                                                                                <select class="form-control form-control-select2" name="secondary_institution_country">
                                                                                    @include('.include.student.store.educational_background.country')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                                                                                <input type="text" class="form-control" name="secondary_institution_name" value="{{$education_data->secondary_institution_name}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                                                                                <select class="form-control" name="secondary_education_level" style="display: block;!important;">
                                                                                    <option value="{{$education_data->secondary_education_level}}">{{$education_data->secondary_education_level}}</option>
                                                                                    <option value="Grade 9">Grade 9</option>
                                                                                    <option value="Grade 10">Grade 10</option>
                                                                                    <option value="Grade 11">Grade 11</option>
                                                                                    <option value="Grade 12">Grade 12/High School</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                                                                                <input type="text" name="secondary_language_instruction" class="form-control" value="{{$education_data->secondary_language_instruction}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                                                                                <input type="date" name="secondary_institution_from" class="form-control" value="{{$education_data->secondary_institution_from}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                                                                                <input type="date" name="secondary_institution_to" class="form-control" value="{{$education_data->secondary_institution_to}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                                                                <input type="text" name="secondary_institution_degree" class="form-control" value="{{$education_data->secondary_institution_degree}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                                                                                <input type="text" name="secondary_institution_address" class="form-control" value="{{$education_data->secondary_institution_address}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                                                                                <input type="text" name="secondary_institution_city" class="form-control" value="{{$education_data->secondary_institution_city}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Province</label>
                                                                                <input type="text" name="secondary_institution_province" class="form-control" value="{{$education_data->secondary_institution_province}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                                                                <input type="text" name="secondary_institution_zip" class="form-control" value="{{$education_data->secondary_institution_zip}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grading Scheme</label>
                                                                                <input type="text" class="form-control" name="secondary_grading_scheme" value="{{$education_data->secondary_grading_scheme}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="secondary_grade_avg" value="{{$education_data->secondary_grade_avg}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="secondary_grade_scale" value="{{$education_data->secondary_grade_scale}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="font-weight-bold"> File Upload </h5>
                                                                            <hr>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Certificate</label>
                                                                                    <input type="file" name="secondary_certificate_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Transcript</label>
                                                                                    <input type="file" name="secondary_transcript_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table table-bordered" id="secondary_table" style="width:100%;">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th>File View</th>
                                                                                    <th>File Delete</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($document_data as $key=>$result)
                                                                                    @if($result->type=='Secondary')
                                                                                        <tr>
                                                                                            <td>{{++$key}}</td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_secondary<?php echo $result->id; ?>">
                                                                                                    <i
                                                                                                        class="icon-file-pdf ml-2"></i> File View
                                                                                                </button>
                                                                                            </td>
                                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm secondary_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i
                                                                                                            class="icon-trash ml-2"></i> Delete File</a></span>
                                                                                            </td>
                                                                                            <div id="modal_theme_secondary<?php echo $result->id; ?>"
                                                                                                 class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-primary text-white">
                                                                                                            <h6 class="modal-title">Uploaded File</h6>
                                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <embed src="{{ url('upload/secondary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($education_data->undergraduate_institution_name!=null)
                                                    <div class="card-group-control card-group-control-right">
                                                        <div class="card mb-2">
                                                            <div class="card-header">
                                                                <h6 class="card-title">
                                                                    <a class="text-body">
                                                                        <i class="icon-help mr-2 text-secondary"></i> Undergraduate School Attend Information
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div id="undergraduate">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                                                                                <select class="form-control form-control-select2" name="undergraduate_institution_country">
                                                                                    <option value="{{$education_data->undergraduate_institution_country}}">{{$education_data->undergraduate_institution_country}}-</option>
                                                                                    @include('.include.student.edit.educational_background.country')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                                                                                <input type="text" name="undergraduate_institution_name" class="form-control" value="{{$education_data->undergraduate_institution_name}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                                                                                <select class="form-control" name="undergraduate_education_level" style="display: block;!important;">
                                                                                    <option value="{{$education_data->undergraduate_education_level}}">-Select-</option>
                                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                                                                                <input type="text" name="undergraduate_language_instruction" class="form-control" value="{{$education_data->undergraduate_language_instruction}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                                                                                <input type="date" name="undergraduate_institution_from" class="form-control" value="{{$education_data->undergraduate_institution_from}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                                                                                <input type="date" name="undergraduate_institution_to" class="form-control" value="{{$education_data->undergraduate_institution_to}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                                                                <input type="text" name="undergraduate_institution_degree" class="form-control" value="{{$education_data->undergraduate_institution_degree}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                                                                                <input type="text" name="undergraduate_institution_address" class="form-control" value="{{$education_data->undergraduate_institution_address}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                                                                                <input type="text" name="undergraduate_institution_city" class="form-control" value="{{$education_data->undergraduate_institution_city}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Province</label>
                                                                                <input type="text" name="undergraduate_institution_province" class="form-control" value="{{$education_data->undergraduate_institution_province}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                                                                <input type="text" name="undergraduate_institution_zip" class="form-control" value="{{$education_data->undergraduate_institution_zip}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grading Scheme</label>
                                                                                <input type="text" class="form-control" name="undergraduate_grading_scheme" value="{{$education_data->undergraduate_grading_scheme}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="undergraduate_grade_avg" value="{{$education_data->undergraduate_grade_avg}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="undergraduate_grade_scale" value="{{$education_data->undergraduate_grade_scale}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="font-weight-bold"> File Upload </h5>
                                                                            <hr>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Certificate</label>
                                                                                    <input type="file" name="undergraduate_certificate_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Transcript</label>
                                                                                    <input type="file" name="undergraduate_transcript_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table table-bordered" id="undergraduate_table" style="width:100%;">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th>File View</th>
                                                                                    <th>File Delete</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($document_data as $key=>$result)
                                                                                    @if($result->type=='Undergraduate')
                                                                                        <tr>
                                                                                            <td>{{++$key}}</td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal"
                                                                                                        data-target="#modal_theme_undergraduate<?php echo $result->id; ?>">
                                                                                                    <i class="icon-file-pdf ml-2"></i> File View
                                                                                                </button>
                                                                                            </td>
                                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm undergraduate_delete_file" style="border-radius:0px;"
                                                                                                         data-id="{{$result->file_name}}?>"><i
                                                                                                            class="icon-trash ml-2"></i> Delete File</a></span>
                                                                                            </td>
                                                                                            <div id="modal_theme_undergraduate<?php echo $result->id; ?>"
                                                                                                 class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-primary text-white">
                                                                                                            <h6 class="modal-title">Uploaded File</h6>
                                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <embed src="{{ url('upload/undergrauate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($education_data->postgraduate_institution_name!=null)
                                                    <div class="card-group-control card-group-control-right">
                                                        <div class="card mb-2">
                                                            <div class="card-header">
                                                                <h6 class="card-title">
                                                                    <a class="text-body">
                                                                        <i class="icon-help mr-2 text-secondary"></i> Postgraduate School Attend Information
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div id="postgraduate">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                                                                                <select class="form-control form-control-select2" name="postgraduate_institution_country">
                                                                                    <option value="{{$education_data->undergraduate_institution_zip}}"></option>
                                                                                    @include('.include.student.store.educational_background.country')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                                                                                <input type="text" name="postgraduate_institution_name" class="form-control" value="{{$education_data->postgraduate_institution_name}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                                                                                <select class="form-control" name="postgraduate_education_level" style="display: block;!important;">
                                                                                    <option value="{{$education_data->postgraduate_education_level}}">{{$education_data->postgraduate_education_level}}</option>
                                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                                    <option value="Master Degree">Master Degree</option>
                                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                                                                                <input type="text" name="postgraduate_language_instruction" class="form-control" value="{{$education_data->postgraduate_language_instruction}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                                                                                <input type="date" name="postgraduate_institution_from" class="form-control" value="{{$education_data->postgraduate_institution_from}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                                                                                <input type="date" name="postgraduate_institution_to" class="form-control" value="{{$education_data->postgraduate_institution_to}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                                                                <input type="text" name="postgraduate_institution_degree" class="form-control" value="{{$education_data->postgraduate_institution_degree}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                                                                                <input type="text" name="postgraduate_institution_address" class="form-control" value="{{$education_data->postgraduate_institution_address}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                                                                                <input type="text" name="postgraduate_institution_city" class="form-control" value="{{$education_data->postgraduate_institution_city}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Province</label>
                                                                                <input type="text" name="postgraduate_institution_province" class="form-control" value="{{$education_data->postgraduate_institution_province}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                                                                <input type="text" name="postgraduate_institution_zip" class="form-control" value="{{$education_data->postgraduate_institution_zip}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grading Scheme</label>
                                                                                <input type="text" class="form-control" name="postgraduate_grading_scheme" value="{{$education_data->postgraduate_grading_scheme}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="postgraduate_grade_avg" value="{{$education_data->postgraduate_grade_avg}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="postgraduate_grade_scale" value="{{$education_data->postgraduate_grade_scale}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="font-weight-bold"> File Upload </h5>
                                                                            <hr>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Certificate</label>
                                                                                    <input type="file" name="postgraduate_certificate_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Transcript</label>
                                                                                    <input type="file" name="postgraduate_transcript_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table table-bordered" id="postgraduate_table" style="width:100%;">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th>File View</th>
                                                                                    <th>File Delete</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($document_data as $key=>$result)
                                                                                    @if($result->type=='Postgraduate')
                                                                                        <tr>
                                                                                            <td>{{++$key}}</td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal"
                                                                                                        data-target="#modal_theme_postgraduate<?php echo $result->id; ?>"><i
                                                                                                        class="icon-file-pdf ml-2"></i> File View
                                                                                                </button>
                                                                                            </td>
                                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm postgraduate_delete_file" style="border-radius:0px;"
                                                                                                         data-id="{{$result->file_name}}?>"><i
                                                                                                            class="icon-trash ml-2"></i> Delete File</a></span>
                                                                                            </td>
                                                                                            <div id="modal_theme_postgraduate<?php echo $result->id; ?>"
                                                                                                 class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-primary text-white">
                                                                                                            <h6 class="modal-title">Uploaded File</h6>
                                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <embed src="{{ url('upload/postgraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($education_data->double_postgraduate_institution_name!=null)
                                                    <div class="card-group-control card-group-control-right">
                                                        <div class="card mb-2">
                                                            <div class="card-header">
                                                                <h6 class="card-title">
                                                                    <a class="text-body">
                                                                        <i class="icon-help mr-2 text-secondary"></i> Postgraduate School Attend Information
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div id="double_postgraduate">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                                                                                <select class="form-control form-control-select2" name="double_postgraduate_institution_country">
                                                                                    <option value="{{$education_data->double_postgraduate_institution_country}}">{{$education_data->double_postgraduate_institution_country}}</option>
                                                                                    @include('.include.student.store.educational_background.country')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                                                                                <input type="text" name="double_postgraduate_institution_name" class="form-control" value="{{$education_data->double_postgraduate_institution_to}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4" style="top:10px;">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                                                                                <select class="form-control required" name="double_postgraduate_education_level" style="display: block;!important;">
                                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                                                                                <input type="text" name="double_postgraduate_language_instruction" class="form-control" value="{{$education_data->double_postgraduate_language_instruction}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                                                                                <input type="date" name="double_postgraduate_institution_from" class="form-control" value="{{$education_data->double_postgraduate_institution_from}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                                                                                <input type="date" name="double_postgraduate_institution_to" class="form-control" value="{{$education_data->double_postgraduate_institution_to}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                                                                <span style="color:blue;">(*EX:SSC/HSC/BSC/BBA/MBA . . etc)</span>
                                                                                <input type="text" name="double_postgraduate_institution_degree" class="form-control" value="{{$education_data->double_postgraduate_institution_degree}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                                                                                <input type="text" name="double_postgraduate_institution_address" class="form-control" value="{{$education_data->double_postgraduate_institution_address}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                                                                                <input type="text" name="double_postgraduate_institution_city" class="form-control" value="{{$education_data->double_postgraduate_institution_city}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Province</label>
                                                                                <input type="text" name="double_postgraduate_institution_province" class="form-control" value="{{$education_data->double_postgraduate_institution_province}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Zip Code: <span style="color:red;">*</span></label>
                                                                                <input type="text" name="double_postgraduate_institution_zip" class="form-control" value="{{$education_data->double_postgraduate_institution_zip}}"
                                                                                       autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grading Scheme</label>
                                                                                <input type="text" class="form-control" name="double_postgraduate_grading_scheme" value="{{$education_data->double_postgraduate_grading_scheme}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="double_postgraduate_grade_avg" value="{{$education_data->double_postgraduate_grade_avg}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                                                                                <input type="text" class="form-control" name="double_postgraduate_grade_scale" value="{{$education_data->double_postgraduate_grade_scale}}" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="font-weight-bold"> File Upload </h5>
                                                                            <hr>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Certificate</label>
                                                                                    <input type="file" name="double_postgraduate_certificate_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label style="color:black;font-weight:500;">Transcript</label>
                                                                                    <input type="file" name="double_postgraduate_transcript_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple>
                                                                                    <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table table-bordered" id="postgraduate_table" style="width:100%;">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Sl No</th>
                                                                                    <th>File View</th>
                                                                                    <th>File Delete</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($document_data as $key=>$result)
                                                                                    @if($result->type=='Double Postgraduate')
                                                                                        <tr>
                                                                                            <td>{{++$key}}</td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal"
                                                                                                        data-target="#modal_theme_postgraduate<?php echo $result->id; ?>"><i
                                                                                                        class="icon-file-pdf ml-2"></i> File View
                                                                                                </button>
                                                                                            </td>
                                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm secondary_delete_file" style="border-radius:0px;"
                                                                                                         data-id="{{$result->file_name}}?>"><i
                                                                                                            class="icon-trash ml-2"></i> Delete File</a></span>
                                                                                            </td>
                                                                                            <div id="modal_theme_postgraduate<?php echo $result->id; ?>"
                                                                                                 class="modal fade" tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header bg-primary text-white">
                                                                                                            <h6 class="modal-title">Uploaded File</h6>
                                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <embed src="{{ url('upload/double_postgraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary" style="border-radius:0px;"><i class="icon icon-checkbox-checked"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/jquery.MultiFile.js')}}"></script>
<script>
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

    $('#primary_table').DataTable();
    $('#secondary_table').DataTable()
    $('#undergraduate_table').DataTable()
    $('#postgraduate_table').DataTable()
    $('#double_postgraduate_table').DataTable()


    $('body').on('click', '.primary_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "primary_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#primary_table").load(window.location.href + " #primary_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.secondary_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "secondary_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#secondary_table").load(window.location.href + " #secondary_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.undergraduate_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "undergraduate_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#undergraduate_table").load(window.location.href + " #undergraduate_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.postgraduate_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "postgraduate_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#postgraduate_table").load(window.location.href + " #postgraduate_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.double_postgraduate_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "double_postgraduate_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#double_postgraduate_table").load(window.location.href + " #double_postgraduate_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
</script>
</body>



