<?php
    error_reporting(0);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        input {
            border-radius: 0px !important;
        }

        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
@include('admin.include.navbar')
<div class="page-content">
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-content">
                <div class="page-content">
                    <div class="content-wrapper">
                        <div class="content-inner">
                            <div class="page-header page-header-light">
                                <div class="page-header-content header-elements-lg-inline">
                                    <div class="page-title d-flex">
                                        <h4><i class="icon-home"></i> Home - <span class="font-weight-semibold"></span> Add Country & Program</h4>
                                    </div>
                                    <div class="navbar-right">
                                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="row">
                                    @if($notification)
                                        <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> Data Stored Successfully !!!!  <br>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if($info == null)
                                            <form action="" id="store" method="POST" enctype="multipart/form-data">
                                                <fieldset>
                                                    <legend><h1><b>Above grade 12: (Bachelor, Master, PhD etc……):</b></h1></legend>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>Choose Country:</td>
                                                            <td colspan="2">
                                                                <select class="form-control" name="above_country" required>
                                                                    <option value="">-Select Country-</option>
                                                                    @include('.include.student.store.educational_background.country')
                                                                </select>
                                                                <input type="hidden" name="student_id" value="{{Auth::user()->user_name}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h4><b>Institute Name 1:</b></h4></td>
                                                            <td colspan="2"><input type="text" name="above_ins_one" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose1: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_one" name="above_level_one">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_one" value="Click Me">
                                                                <input type="text" class="form-control above_level_one_optional" name="above_level_one_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Click Here. . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose 2: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_two" name="above_level_two">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_two" value="Click Me">
                                                                <input type="text" class="form-control above_level_two_optional" name="above_level_two_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose 3: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_three" name="above_level_three">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_three" value="Click Me">
                                                                <input type="text" class="form-control above_level_three_optional" name="above_level_three_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h4><b>Institute Name 2:</b></h4></td>
                                                            <td colspan="2"><input type="text" name="above_ins_two" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose1: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_four" name="above_level_four">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_four" value="Click Me">
                                                                <input type="text" class="form-control above_level_four_optional" name="above_level_four_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose 2: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_five" name="above_level_five">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_five" value="Click Me">
                                                                <input type="text" class="form-control above_level_five_optional" name="above_level_five_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose 3: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_six" name="above_level_six">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_six" value="Click Me">
                                                                <input type="text" class="form-control above_level_six_optional" name="above_level_six_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h4><b>Institute Name 3:</b></h4></td>
                                                            <td colspan="3"><input type="text" name="above_ins_three" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose1: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_seven" name="above_level_seven">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_seven" value="Click Me">
                                                                <input type="text" class="form-control above_level_seven_optional" name="above_level_seven_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h4><b>Program Choose 2: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_eight" name="above_level_eight">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_eight" value="Click Me">
                                                                <input type="text" class="form-control above_level_eight_optional" name="above_level_eight_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><h4><b>Program Choose 3: </b></h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Level:</td>
                                                            <td>
                                                                <select class="form-control above_level_nine" name="above_level_nine">
                                                                    <option value="0">-Grade/Class Level-</option>
                                                                    <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                                    <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                                    <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                                    <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                                    <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                                    <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                                    <option value="Master Degree">Master Degree</option>
                                                                    <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                                    <option value="Double Master Degree">Double Master Degree</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_nine" value="Click Me">
                                                                <input type="text" class="form-control above_level_nine_optional" name="above_level_nine_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                                <fieldset>
                                                    <legend><h1><b>Below grade 12:</b></h1></legend>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>Choose Country:</td>
                                                            <td colspan="3">
                                                                <select class="form-control" name="below_country" required>
                                                                    <option value="">-Select Country-</option>
                                                                    @include('.include.student.store.educational_background.country')
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h4><b>Institute Name 1:</b></h4></td>
                                                            <td colspan="3"><input type="text" name="below_ins_one" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Grade/Class Level:</td>
                                                            <td>
                                                                <select class="form-control below_grade_one" name="below_grade_one">
                                                                    <option value="0">-Programme Lavel-</option>
                                                                    <option value="Grade 1">Grade 1</option>
                                                                    <option value="Grade 2">Grade 2</option>
                                                                    <option value="Grade 3">Grade 3</option>
                                                                    <option value="Grade 4">Grade 4</option>
                                                                    <option value="Grade 5">Grade 5</option>
                                                                    <option value="Grade 6">Grade 6</option>
                                                                    <option value="Grade 7">Grade 7</option>
                                                                    <option value="Grade 8">Grade 8</option>
                                                                    <option value="Grade 9">Grade 9</option>
                                                                    <option value="Grade 10">Grade 10</option>
                                                                    <option value="Grade 11">Grade 11</option>
                                                                    <option value="Grade 12">Grade 12/High School</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_ten" value="Click Me">
                                                                <input type="text" class="form-control below_grade_one_optional" name="below_grade_one_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h4><b>Institute Name 2:</b></h4></td>
                                                            <td colspan="3"><input type="text" name="below_ins_two" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Grade/Class Level:</td>
                                                            <td>
                                                                <select class="form-control below_grade_two" name="below_grade_two">
                                                                    <option value="0">-Programme Lavel-</option>
                                                                    <option value="Grade 1">Grade 1</option>
                                                                    <option value="Grade 2">Grade 2</option>
                                                                    <option value="Grade 3">Grade 3</option>
                                                                    <option value="Grade 4">Grade 4</option>
                                                                    <option value="Grade 5">Grade 5</option>
                                                                    <option value="Grade 6">Grade 6</option>
                                                                    <option value="Grade 7">Grade 7</option>
                                                                    <option value="Grade 8">Grade 8</option>
                                                                    <option value="Grade 9">Grade 9</option>
                                                                    <option value="Grade 10">Grade 10</option>
                                                                    <option value="Grade 11">Grade 11</option>
                                                                    <option value="Grade 12">Grade 12/High School</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_eleven" value="Click Me">
                                                                <input type="text" class="form-control below_grade_two_optional" name="below_grade_two_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h4><b>Institute Name 3:</b></h4></td>
                                                            <td colspan="3"><input type="text" name="below_ins_three" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Grade/Class Level:</td>
                                                            <td>
                                                                <select class="form-control below_grade_three" name="below_grade_three">
                                                                    <option value="0">-Programme Lavel-</option>
                                                                    <option value="Grade 1">Grade 1</option>
                                                                    <option value="Grade 2">Grade 2</option>
                                                                    <option value="Grade 3">Grade 3</option>
                                                                    <option value="Grade 4">Grade 4</option>
                                                                    <option value="Grade 5">Grade 5</option>
                                                                    <option value="Grade 6">Grade 6</option>
                                                                    <option value="Grade 7">Grade 7</option>
                                                                    <option value="Grade 8">Grade 8</option>
                                                                    <option value="Grade 9">Grade 9</option>
                                                                    <option value="Grade 10">Grade 10</option>
                                                                    <option value="Grade 11">Grade 11</option>
                                                                    <option value="Grade 12">Grade 12/High School</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="button" id="ins_pro_cho_twelve" value="Click Me">
                                                                <input type="text" class="form-control below_grade_three_optional" name="below_grade_three_optional" style="display:none; margin-top:2px;">
                                                                <span style="color:red;">(*** If Programme Not Found In Dropwown Use It . . . )</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                                <br>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                                            </form>
                                        @endif
                                        @if($info != null)
                                            <h1>Data Already Stored In Database</h1>
                                            <a href="{{url('edit_country_program')}}/{{$info->student_id}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit Information</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
                var SITEURL = '{{URL::to('')}}';
                $(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });
                $(document).ready(function () {
                    $('#ins_pro_cho_one').click(function () {
                        if ($('.above_level_one').is(':hidden')) {
                            $('.above_level_one').show();
                            $('.above_level_one_optional').hide();
                        } else {
                            $('.above_level_one').hide();
                            $('.above_level_one_optional').show();
                        }
                    });
                    $('#ins_pro_cho_two').click(function () {
                        if ($('.above_level_two').is(':hidden')) {
                            $('.above_level_two').show();
                            $('.above_level_two_optional').hide();
                        } else {
                            $('.above_level_two').hide();
                            $('.above_level_two_optional').show();
                        }
                    });
                    $('#ins_pro_cho_three').click(function () {
                        if ($('.above_level_three').is(':hidden')) {
                            $('.above_level_three').show();
                            $('.above_level_three_optional').hide();
                        } else {
                            $('.above_level_three').hide();
                            $('.above_level_three_optional').show();
                        }
                    });
                    $('#ins_pro_cho_four').click(function () {
                        if ($('.above_level_four').is(':hidden')) {
                            $('.above_level_four').show();
                            $('.above_level_four_optional').hide();
                        } else {
                            $('.above_level_four').hide();
                            $('.above_level_four_optional').show();
                        }
                    });
                    $('#ins_pro_cho_five').click(function () {
                        if ($('.above_level_five').is(':hidden')) {
                            $('.above_level_five').show();
                            $('.above_level_five_optional').hide();
                        } else {
                            $('.above_level_five').hide();
                            $('.above_level_five_optional').show();
                        }
                    });
                    $('#ins_pro_cho_six').click(function () {
                        if ($('.above_level_six').is(':hidden')) {
                            $('.above_level_six').show();
                            $('.above_level_six_optional').hide();
                        } else {
                            $('.above_level_six').hide();
                            $('.above_level_six_optional').show();
                        }
                    });
                    $('#ins_pro_cho_seven').click(function () {
                        if ($('.above_level_seven').is(':hidden')) {
                            $('.above_level_seven').show();
                            $('.above_level_seven_optional').hide();
                        } else {
                            $('.above_level_seven').hide();
                            $('.above_level_seven_optional').show();
                        }
                    });
                    $('#ins_pro_cho_eight').click(function () {
                        if ($('.above_level_eight').is(':hidden')) {
                            $('.above_level_eight').show();
                            $('.above_level_eight_optional').hide();
                        } else {
                            $('.above_level_eight').hide();
                            $('.above_level_eight_optional').show();
                        }
                    });
                    $('#ins_pro_cho_nine').click(function () {
                        if ($('.above_level_nine').is(':hidden')) {
                            $('.above_level_nine').show();
                            $('.above_level_nine_optional').hide();
                        } else {
                            $('.above_level_nine').hide();
                            $('.above_level_nine_optional').show();
                        }
                    });

                    $('#ins_pro_cho_ten').click(function () {
                        if ($('.below_grade_one').is(':hidden')) {
                            $('.below_grade_one').show();
                            $('.below_grade_one_optional').hide();
                        } else {
                            $('.below_grade_one').hide();
                            $('.below_grade_one_optional').show();
                        }
                    });
                    $('#ins_pro_cho_eleven').click(function () {
                        if ($('.below_grade_two').is(':hidden')) {
                            $('.below_grade_two').show();
                            $('.below_grade_two_optional').hide();
                        } else {
                            $('.below_grade_two').hide();
                            $('.below_grade_two_optional').show();
                        }
                    });
                    $('#ins_pro_cho_twelve').click(function () {
                        if ($('.below_grade_three').is(':hidden')) {
                            $('.below_grade_three').show();
                            $('.below_grade_three_optional').hide();
                        } else {
                            $('.below_grade_three').hide();
                            $('.below_grade_three_optional').show();
                        }
                    });
                });
                if ($("#store").length > 0) {
                    $("#store").validate({
                        rules: {
                            password: {
                                required: true,
                            },
                        },
                        messages: {
                            password: {
                                required: "(***New Password is required***)"
                            },
                        },
                        submitHandler: function (form) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $('#update_password').html('Sending..');
                            $.ajax({
                                url: 'store_country_program',
                                type: "POST",
                                data: $('#store').serialize(),
                                type: "POST",
                                dataType: 'json',
                                success: function (data) {
                                    $('#store').trigger("reset");
                                    swal({
                                        icon: 'success',
                                        title: 'Country & Program Information Stored Successfully !!!',
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
            </script>
        </div>
    </div>
</div>
</body>
</html>

