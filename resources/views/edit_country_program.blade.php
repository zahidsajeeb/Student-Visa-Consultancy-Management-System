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
                                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Edit Country & Program </h4>
                                    </div>
                                    <div class="navbar-right">
                                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="" id="update" method="POST" enctype="multipart/form-data">
                                            <fieldset>
                                                <legend><h1><b>Above grade 12: (Bachelor, Master, PhD etc……):</b></h1></legend>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>Choose Country:</td>
                                                        <td colspan="2">
                                                            <select class="form-control" name="above_country">
                                                                <option>{{$data->above_country}}</option>
                                                                @include('.include.student.store.educational_background.country')
                                                            </select>
                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><h4 style="text-align:center;"><b>Institute Name 1: </b></h4></td>
                                                        <td><input type="text" class="form-control" name="above_ins_one" value=" {{$data->above_ins_one}}" style="margin-top:2px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><h4><b>Program Choose1: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_one" name="above_level_one">
                                                                @if($data->above_level_one != '0')
                                                                    <option>{{$data->above_level_one}}</option>
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
                                                                @endif
                                                                @if($data->above_level_one == '0')
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_one_optional" value=" {{$data->above_level_one_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><h4><b>Program Choose 2: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_two" name="above_level_two">
                                                                @if($data->above_level_two != '0')
                                                                    <option>{{$data->above_level_two}}</option>
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
                                                                @endif
                                                                @if($data->above_level_two == '0')
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_two_optional" value=" {{$data->above_level_two_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><h4><b>Program Choose 3: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_three" name="above_level_three">
                                                                @if($data->above_level_three != 0)
                                                                    <option>{{$data->above_level_three}}</option>
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
                                                                @endif
                                                                @if($data->above_level_three == 0)
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_three_optional" value=" {{$data->above_level_three_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><h4 style="text-align:center;"><b>Institute Name 2: </b></h4></td>
                                                        <td><input type="text" class="form-control" name="above_ins_two" value=" {{$data->above_ins_two}}" style="margin-top:2px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><h4><b>Program Choose1: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_four" name="above_level_four">
                                                                @if($data->above_level_four != 0)
                                                                    <option>{{$data->above_level_four}}</option>
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
                                                                @endif
                                                                @if($data->above_level_four == 0)
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_four_optional" value=" {{$data->above_level_four_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><h4><b>Program Choose 2: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_five" name="above_level_five">
                                                                @if($data->above_level_five != 0)
                                                                    <option>{{$data->above_level_five}}</option>
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
                                                                @endif
                                                                @if($data->above_level_five == 0)
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_five_optional" value=" {{$data->above_level_five_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><h4><b>Program Choose 3: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_six" name="above_level_six">
                                                                @if($data->above_level_five != 0)
                                                                    <option>{{$data->above_level_five}}</option>
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
                                                                @endif
                                                                @if($data->above_level_five == 0)
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_six_optional" value=" {{$data->above_level_six_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4 style="text-align:center;"><b>Institute Name 3: </b></h4></td>
                                                        <td><input type="text" class="form-control" name="above_ins_three" value=" {{$data->above_ins_three}}" style="margin-top:2px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><h4><b>Program Choose1: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_seven" name="above_level_seven">
                                                                @if($data->above_level_seven != 0)
                                                                    <option>{{$data->above_level_seven}}</option>
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
                                                                @endif
                                                                @if($data->above_level_seven == 0)
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_seven_optional" value=" {{$data->above_level_seven_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><h4><b>Program Choose 2: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_eight" name="above_level_eight">
                                                                @if($data->above_level_eight != 0)
                                                                    <option>{{$data->above_level_eight}}</option>
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
                                                                @endif
                                                                @if($data->above_level_eight == 0)
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_eight_optional" value=" {{$data->above_level_eight_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><h4><b>Program Choose 3: </b></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Level:</td>
                                                        <td>
                                                            <select class="form-control above_level_nine" name="above_level_nine">
                                                                @if($data->above_level_nine != 0)
                                                                    <option>{{$data->above_level_nine}}</option>
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
                                                                @endif
                                                                @if($data->above_level_nine == 0)
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="above_level_nine_optional" value=" {{$data->above_level_nine_optional}}" style="margin-top:2px;">
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
                                                            <select class="form-control" name="below_country">
                                                                <option>{{$data->below_country}}</option>
                                                                @include('.include.student.store.educational_background.country')
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><h4 style="text-align:center;"><b>Institute Name 1: </b></h4></td>
                                                        <td><input type="text" class="form-control" name="below_ins_one" value=" {{$data->below_ins_one}}" style="margin-top:2px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grade/Class Level:</td>
                                                        <td>
                                                            <select class="form-control below_grade_one" name="below_grade_one">
                                                                @if($data->below_grade_one != '0')
                                                                    <option>{{$data->below_grade_one}}</option>
                                                                    <option value="0">-Program Level-</option>
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
                                                                @endif
                                                                @if($data->below_grade_one == '0')
                                                                    <option value="0">-Programme Level-</option>
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="below_grade_one_optional" value=" {{$data->below_grade_one_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><h4 style="text-align:center;"><b>Institute Name 2: </b></h4></td>
                                                        <td><input type="text" class="form-control" name="below_ins_two" value=" {{$data->below_ins_two}}" style="margin-top:2px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grade/Class Level:</td>
                                                        <td>
                                                            <select class="form-control below_grade_two" name="below_grade_two">
                                                                @if($data->below_grade_two != '0')
                                                                    <option>{{$data->below_grade_two}}</option>
                                                                    <option value="0">-Programme Level-</option>
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
                                                                @endif
                                                                @if($data->below_grade_two == 0)
                                                                    <option value="0">-Programme Level-</option>
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="below_grade_two_optional" value=" {{$data->below_grade_two_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><h4 style="text-align:center;"><b>Institute Name 3: </b></h4></td>
                                                        <td><input type="text" class="form-control" name="below_ins_three" value=" {{$data->below_ins_three}}" style="margin-top:2px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Grade/Class Level:</td>
                                                        <td>
                                                            <select class="form-control below_grade_three" name="below_grade_three">
                                                                @if($data->below_grade_three != '0')
                                                                    <option>{{$data->below_grade_three}}</option>
                                                                    <option value="0">-Programme Level-</option>
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
                                                                @endif
                                                                @if($data->below_grade_three == '0')
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span><b>Optional:</b></span>
                                                            <input type="text" class="form-control" name="below_grade_three_optional" value=" {{$data->below_grade_three_optional}}" style="margin-top:2px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                            <br>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                                        </form>
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
                {{--var SITEURL = '{{URL::to('')}}';--}}
                {{--$(function () {--}}
                {{--    $.ajaxSetup({--}}
                {{--        headers: {--}}
                {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--        }--}}
                {{--    });--}}
                {{--});--}}
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
                            $('.above_level_seveno').hide();
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
                if ($("#update").length > 0) {
                    $("#update").validate({
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
                                url: 'update_country_program',
                                type: "POST",
                                data: $('#update').serialize(),
                                type: "POST",
                                dataType: 'json',
                                success: function (data) {
                                    $('#update').trigger("reset");
                                    swal({
                                        icon: 'success',
                                        title: 'Country & Program Information Update Successfully !!!',
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


