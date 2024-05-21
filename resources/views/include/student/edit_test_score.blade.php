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
                                    <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To Visa Software (Operator Panel) </h4>
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
                                                <li class="alert alert-secondary" role="alert" style="list-style:none; border-radius:0px; background:darkred !important; color:whitesmoke;" ,><i class="fa fa-close"></i> {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" style="font-weight:bold;text-align:center;"><i class="fa fa-edit"></i> Edit Test Score</h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('update_test_score')}}" method="POST" id="form" enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="student_id" value="{{$profile_data->student_id}}">
                                                <input type="text" name="id" value="{{$profile_data->id}}">
                                                @if($profile_data->test_score_type=="IELTS")
                                                    <div class="row" id="ielts_div">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">IELTS Exam Date: <span>*</span></label>
                                                                <input type="date" name="ielts_exam_date" class="form-control" value="{{$profile_data->ielts_exam_date}}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
                                                                <input type="text" name="ielts_reading_score" value="{{$profile_data->ielts_reading_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
                                                                <input type="text" name="ielts_listening_score" value="{{$profile_data->ielts_listening_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                                                                <input type="text" name="ielts_writing_score" value="{{$profile_data->ielts_writing_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
                                                                <input type="text" name="ielts_speaking_score" value="{{$profile_data->ielts_speaking_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Overall Band Score: <span>*</span></label>
                                                                <input type="text" name="ielts_total_score" value="{{$profile_data->ielts_total_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">IELTS Certificate</label>
                                                                <input type="file" name="ielts_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered" id="ielts_table" style="width:100%;">
                                                                <thead>
                                                                <tr>
                                                                    <th>Sl No</th>
                                                                    <th>File View</th>
                                                                    <th>File Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($document_data as $key=>$result)
                                                                    @if($result->type=='IELTS')
                                                                        <tr>
                                                                            <td>{{++$key}}</td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_ielts<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                                                </button>
                                                                            </td>
                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm ielts_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                                                            </td>
                                                                            <div id="modal_theme_ielts<?php echo $result->id; ?>"
                                                                                 class="modal fade" tabindex="-1">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-primary text-white">
                                                                                            <h6 class="modal-title">Uploaded File</h6>
                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <embed src="{{ url('upload/ielts/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                                                @endif
                                                @if($profile_data->test_score_type=="TOEFL")
                                                    <div class="row" id="toefl_div">
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">TOEFL Exam Date: <span>*</span></label>
                                                                <input type="date" name="toefl_exam_date" class="form-control" value="{{$profile_data->toefl_exam_date}}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
                                                                <input type="text" name="toefl_reading_score" value="{{$profile_data->toefl_reading_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
                                                                <input type="text" name="toefl_listening_score" value="{{$profile_data->toefl_listening_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                                                                <input type="text" name="toefl_writing_score" value="{{$profile_data->toefl_writing_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
                                                                <input type="text" name="toefl_speaking_score" value="{{$profile_data->toefl_speaking_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Overall Band Score: <span>*</span></label>
                                                                <input type="text" name="toefl_total_score" value="{{$profile_data->toefl_total_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">TOEFL Certificate</label>
                                                                <input type="file" name="toefl_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered" id="toefl_table" style="width:100%;">
                                                                <thead>
                                                                <tr>
                                                                    <th>Sl No</th>
                                                                    <th>File View</th>
                                                                    <th>File Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($document_data as $key=>$result)
                                                                    @if($result->type=='TOEFL')
                                                                        <tr>
                                                                            <td>{{++$key}}</td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                                                </button>
                                                                            </td>
                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm toefl_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
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
                                                                                            <embed src="{{ url('upload/toefl/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                                                @endif
                                                @if($profile_data->test_score_type=="PTE")
                                                    <div class="row" id="pte_div">
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">IELTS Exam Date: <span>*</span></label>
                                                                <input type="date" name="pte_exam_date" class="form-control" value="{{$profile_data->ielts_exam_date}}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
                                                                <input type="text" name="pte_reading_score" value="{{$profile_data->ielts_reading_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
                                                                <input type="text" name="pte_listening_score" value="{{$profile_data->ielts_listening_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                                                                <input type="text" name="pte_writing_score" value="{{$profile_data->ielts_writing_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
                                                                <input type="text" name="pte_speaking_score" value="{{$profile_data->ielts_speaking_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Overall Band Score: <span>*</span></label>
                                                                <input type="text" name="pte_total_score" value="{{$profile_data->pte_total_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">PTE Certificate</label>
                                                                <input type="file" name="pte_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered" id="pte_table" style="width:100%;">
                                                                <tr>
                                                                    <td style="font-weight:bold;">Sl No</td>
                                                                    <td style="font-weight:bold;">File View</td>
                                                                    <td style="font-weight:bold;">File Delete</td>
                                                                </tr>
                                                                @foreach($document_data as $key=>$result)
                                                                    @if($result->type=='PTE')
                                                                        <tr>
                                                                            <td>{{++$key}}</td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                                                </button>
                                                                            </td>
                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm pte_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
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
                                                                                            <embed src="{{ url('upload/pte/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($profile_data->test_score_type=="Duolingo")
                                                    <div class="row" id="duolingo_div">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Score: <span>*</span></label>
                                                                <input type="text" name="duolingo_total_score" class="form-control decimal" value="{{$profile_data->duolingo_total_score}}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Exam Date: <span>*</span></label>
                                                                <input type="date" name="duolingo_exam_date" value="{{$profile_data->duolingo_exam_date}}" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Duolingo Certificate</label>
                                                                <input type="file" name="duolingo_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered" id="duolingo_table" style="width:100%;">
                                                                <tr>
                                                                    <td style="font-weight:bold;">Sl No</td>
                                                                    <td style="font-weight:bold;">File View</td>
                                                                    <td style="font-weight:bold;">File Delete</td>
                                                                </tr>
                                                                @foreach($document_data as $key=>$result)
                                                                    @if($result->type=='Duolingo')
                                                                        <tr>
                                                                            <td>{{++$key}}</td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                                                </button>
                                                                            </td>
                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm duolingo_delete_file" style="border-radius:0px;" data-id="{{$result->id}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
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
                                                                                            <embed src="{{ url('upload/duolingo/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endif

                                                <br/>
                                                <h4 style="font-weight:bold;">Additional Qualifications:</h4>
                                                <hr class="mt-5">
                                                @if($profile_data->gre_exam_date==false && $profile_data->gmat_exam_date==false)
                                                <input type="checkbox" id="gre" class="required">
                                                <label> I have GRE exam scores</label><br>
                                                <input type="checkbox" id="gmat" class="required">
                                                <label> I have GMAT exam scores</label><br>
                                                @endif
                                                @if($profile_data->gre_exam_date==true)
                                                    <div class="row" id="gre_div">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">GRE Exam Date:</label>
                                                                <input type="date" name="gre_exam_date" value="{{$profile_data->gre_exam_date}}" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Verbal</label>
                                                                <input type="text" name="gre_verbal_score" value="{{$profile_data->gre_verbal_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Quantitative</label>
                                                                <input type="text" name="gre_quantitative_score" value="{{$profile_data->gre_quantitative_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">AWA</label>
                                                                <input type="text" name="gre_awa_score" value="{{$profile_data->gre_awa_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">GRE Certificate</label>
                                                                <input type="file" name="gre_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered" id="gre_table" style="width:100%;">
                                                                <thead>
                                                                <tr>
                                                                    <th>Sl No</th>
                                                                    <th>File View</th>
                                                                    <th>File Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($document_data as $key=>$result)
                                                                    @if($result->type=='GRE')
                                                                        <tr>
                                                                            <td>{{++$key}}</td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                                                </button>
                                                                            </td>
                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm gre_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
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
                                                                                            <embed src="{{ url('upload/gre/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="checkbox" id="gmat" class="required">
                                                            <label> I have GMAT exam scores</label><br>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($profile_data->gmat_exam_date==true)
                                                    <div class="row" id="gmat_div">
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">GMAT Exam Date:</label>
                                                                <input type="date" name="gmat_exam_date" value="{{$profile_data->gmat_exam_date}}" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Verbal</label>
                                                                <input type="text" name="gmat_verbal_score" value="{{$profile_data->gmat_verbal_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Quantitative</label>
                                                                <input type="text" name="gmat_quantitative_score" value="{{$profile_data->gmat_quantitative_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">AWA</label>
                                                                <input type="text" name="gmat_awa_score" value="{{$profile_data->gmat_awa_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Total</label>
                                                                <input type="text" name="gmat_total_score" value="{{$profile_data->gmat_total_score}}" class="form-control decimal" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">GMAT Certificate</label>
                                                                <input type="file" name="gmat_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered" id="gmat_table" style="width:100%;">
                                                                <thead>
                                                                <tr>
                                                                    <th>Sl No</th>
                                                                    <th>File View</th>
                                                                    <th>File Delete</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($document_data as $key=>$result)
                                                                    @if($result->type=='GMAT')
                                                                        <tr>
                                                                            <td>{{++$key}}</td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                                                                            </td>
                                                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm gmat_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
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
                                                                                            <embed src="{{ url('upload/gmat/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="checkbox" id="gre" class="required">
                                                            <label> I have GRE exam scores</label><br>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="row gre-hidden-menu" style="display: none;">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">GRE Exam Date:</label>
                                                            <input type="date" name="gre_exam_date" value="{{$profile_data->gre_exam_date}}" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Verbal</label>
                                                            <input type="text" name="gre_verbal_score" value="{{$profile_data->gre_verbal_score}}" class="form-control decimal" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Quantitative</label>
                                                            <input type="text" name="gre_quantitative_score" value="{{$profile_data->gre_quantitative_score}}" class="form-control decimal" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">AWA</label>
                                                            <input type="text" name="gre_awa_score" value="{{$profile_data->gre_awa_score}}" class="form-control decimal" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">GRE Certificate Upload</label>
                                                            <input type="file" name="gre_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gmat-hidden-menu" style="display: none;">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">GMAT Exam Date:</label>
                                                            <input type="date" name="gmat_exam_date" value="{{$profile_data->gmat_exam_date}}" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Verbal</label>
                                                            <input type="text" name="gmat_verbal_score" value="{{$profile_data->gmat_verbal_score}}" class="form-control decimal" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Quantitative</label>
                                                            <input type="text" name="gmat_quantitative_score" value="{{$profile_data->gmat_quantitative_score}}" class="form-control decimal" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">AWA</label>
                                                            <input type="text" name="gmat_awa_score" value="{{$profile_data->gmat_awa_score}}" class="form-control decimal" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Total</label>
                                                            <input type="text" name="gmat_total_score" value="{{$profile_data->gmat_total_score}}" class="form-control decimal" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">GMAT Certificate Upload</label>
                                                            <input type="file" name="gmat_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" autocomplete="off" multiple>
                                                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary" style="border-radius:0px;"><i class="icon icon-checkbox-checked"></i> Submit</button>
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
    $('#ielts_table').DataTable();
    $('#toefl_table').DataTable();
    $('#pte_table').DataTable();
    $('#duolingo_table').DataTable();
    $('#gre_table').DataTable();
    $('#gmat_table').DataTable();
    $('body').on('click', '.ielts_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#ielts_table").load(window.location.href + " #ielts_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.toefl_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "toefl_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#toefl_table").load(window.location.href + " #toefl_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.pte_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "pte_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#pte_table").load(window.location.href + " #pte_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.duolingo_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "duolingo_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#duolingo_table").load(window.location.href + " #duolingo_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.gre_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "gre_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#gre_table").load(window.location.href + " #gre_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
    $('body').on('click', '.gmat_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "gmat_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#gmat_table").load(window.location.href + " #gmat_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
    $(document).ready(function () {
        $(document).ready(function () {
            $('#gre').click(function () {
                $('.gre-hidden-menu').slideToggle("slow");
            });
            $('#gmat').click(function () {
                $('.gmat-hidden-menu').slideToggle("slow");
            });
        });
        $('#form').validate({
            rules: {
                student_name: {
                    required: true,
                },
                student_email: {
                    required: true,
                },
                counselor_name: {
                    required: true,
                },
            },
            messages: {
                student_name: {
                    required: "(***Student Name is required***)"
                },
                student_email: {
                    required: "(***Student Email is required***)"
                },
                counselor_name: {
                    required: "(***Counselor Name is required***)"
                },
            },
            highlight: function (element, errorClass) {
                $(element).closest(".form-group").addClass("has-error");
            },
            unhighlight: function (element, errorClass) {
                $(element).closest(".form-group").removeClass("has-error");
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().next());
            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "checkbox") {
                    element.closest(".form-group").children(0).prepend(error);
                } else
                    error.insertAfter(element);
            }
        });
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

    $(function () {
        $("input.decimal").bind("change keyup input", function () {
            var position = this.selectionStart - 1;
            var fixed = this.value.replace(/[^0-9\.]/g, "");
            if (fixed.charAt(0) === ".")
                //can't start with .
                fixed = fixed.slice(1);

            var pos = fixed.indexOf(".") + 1;
            if (pos >= 0)
                //avoid more than one .
                fixed = fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");

            if (this.value !== fixed) {
                this.value = fixed;
                this.selectionStart = position;
                this.selectionEnd = position;
            }
        });
    })
</script>
</body>

