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

        .proficiency_test_box {
            color: #000000;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .standardized_test_box {
            color: #000000;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .IELTS {
            background: #04040412;
        }

        .TOEFL {
            background: #04040412;
        }

        .PTE {
            background: #04040412;
        }

        .GMAT {
            background: #04040412;
        }

        .GRE {
            background: #04040412;
        }

        .form-box {
            padding-top: 40px;
            padding-bottom: 40px;
            /*background: rgb(234,88,4); !* Old browsers *!*/
            /*background: -moz-linear-gradient(top,  rgba(234,88,4,1) 0%, rgba(234,40,3,1) 51%, rgba(234,88,4,1) 100%); !* FF3.6-15 *!*/
            /*background: -webkit-linear-gradient(top,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); !* Chrome10-25,Safari5.1-6 *!*/
            /*background: linear-gradient(to bottom,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); !* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ *!*/
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ea5804', endColorstr='#ea5804', GradientType=0); /* IE6-9 */
        }

        .form-wizard {
            padding: 25px;
            background: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            box-shadow: 0px 0px 6px 3px #777;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #888;
            line-height: 30px;
            text-align: center;
        }

        .form-wizard strong {
            font-weight: 500;
        }

        .form-wizard a, .form-wizard a:hover, .form-wizard a:focus {
            color: #ea2803;
            text-decoration: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s;
        }

        .form-wizard h1, .form-wizard h2 {
            margin-top: 10px;
            font-size: 38px;
            font-weight: 100;
            color: #555;
            line-height: 50px;
        }

        .form-wizard h3 {
            font-size: 25px;
            font-weight: 300;
            color: #ea2803;
            line-height: 30px;
            margin-top: 0;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .form-wizard h4 {
            float: left;
            font-size: 20px;
            font-weight: 300;
            color: #ea2803;
            line-height: 26px;
            width: 100%;
        }

        .form-wizard h4 span {
            float: right;
            font-size: 18px;
            font-weight: 300;
            color: #555;
            line-height: 26px;
        }

        .form-wizard table tr th {
            font-weight: normal;
        }

        .form-wizard img {
            max-width: 100%;
        }

        .form-wizard ::-moz-selection {
            background: #ea2803;
            color: #fff;
            text-shadow: none;
        }

        .form-wizard ::selection {
            background: #ea2803;
            color: #fff;
            text-shadow: none;
        }


        .form-control {
            height: 44px;
            width: 100%;
            margin: 0;
            padding: 0 20px;
            vertical-align: middle;
            background: #fff;
            border: 1px solid #ddd;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            line-height: 44px;
            color: #888;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s;
        }

        .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
            position: absolute;
            margin-top: 9px;
            margin-left: -20px;
        }

        .form-control option:hover, .form-control option:checked {
            box-shadow: 0 0 10px 100px #ea2803 inset;
        }

        .form-control:focus {
            outline: 0;
            background: #fff;
            border: 1px solid #ccc;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .form-control:-moz-placeholder {
            color: #888;
        }

        .form-control:-ms-input-placeholder {
            color: #888;
        }

        .form-control::-webkit-input-placeholder {
            color: #888;
        }

        .form-wizard label {
            font-weight: 300;
        }

        .form-wizard label span {
            color: #ea2803;
        }


        .form-wizard .btn {
            min-width: 105px;
            height: 40px;
            margin: 0;
            padding: 0 20px;
            vertical-align: middle;
            border: 0;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            line-height: 40px;
            color: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            text-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s;
        }

        .form-wizard .btn:hover {
            background: #f34727;
            color: #fff;
        }

        .form-wizard .btn:active {
            outline: 0;
            background: #f34727;
            color: #fff;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .form-wizard .btn:focus,
        .form-wizard .btn:active:focus,
        .form-wizard .btn.active:focus {
            outline: 0;
            background: #f34727;
            color: #fff;
        }

        .form-wizard .btn.btn-next,
        .form-wizard .btn.btn-next:focus,
        .form-wizard .btn.btn-next:active:focus,
        .form-wizard .btn.btn-next.active:focus {
            background: #ea2803;
        }

        .form-wizard .btn.btn-submit,
        .form-wizard .btn.btn-submit:focus,
        .form-wizard .btn.btn-submit:active:focus,
        .form-wizard .btn.btn-submit.active:focus {
            background: #ea2803;
        }

        .form-wizard .btn.btn-previous,
        .form-wizard .btn.btn-previous:focus,
        .form-wizard .btn.btn-previous:active:focus,
        .form-wizard .btn.btn-previous.active:focus {
            background: #bbb;
        }

        .form-wizard .success h3 {
            color: #4F8A10;
            text-align: center;
            margin: 20px auto !important;
        }

        .form-wizard .success .success-icon {
            color: #4F8A10;
            font-size: 100px;
            border: 5px solid #4F8A10;
            border-radius: 100px;
            text-align: center !important;
            width: 110px;
            margin: 25px auto;
        }

        .form-wizard .progress-bar {
            background-color: #ea2803;
        }

        .form-wizard-steps {
            margin: auto;
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .form-wizard-step {
            padding-top: 10px !important;
            border: 2px solid #fff;
            background: #ccc;
            -ms-transform: skewX(-30deg); /* IE 9 */
            -webkit-transform: skewX(-30deg); /* Safari */
            transform: skewX(-30deg); /* Standard syntax */
        }

        .form-wizard-step.active {
            background: #ea2803;
        }

        .form-wizard-step.activated {
            background: #ea2803;
        }

        .form-wizard-progress {
            position: absolute;
            top: 36px;
            left: 0;
            width: 100%;
            height: 0px;
            background: #ea2803;
        }

        .form-wizard-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 0px;
            background: #ea2803;
        }

        .form-wizard-tolal-steps-3 .form-wizard-step {
            position: relative;
            float: left;
            width: 33.33%;
            padding: 0 5px;
        }

        .form-wizard-tolal-steps-4 .form-wizard-step {
            position: relative;
            float: left;
            width: 25%;
            padding: 0 5px;
        }

        .form-wizard-tolal-steps-5 .form-wizard-step {
            position: relative;
            float: left;
            width: 20%;
            padding: 0 5px;
        }

        .form-wizard-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #777;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -ms-transform: skewX(30deg); /* IE 9 */
            -webkit-transform: skewX(30deg); /* Safari */
            transform: skewX(30deg); /* Standard syntax */
        }

        .form-wizard-step.activated .form-wizard-step-icon {
            background: #ea2803;
            border: 1px solid #fff;
            color: #fff;
            line-height: 38px;
        }

        .form-wizard-step.active .form-wizard-step-icon {
            background: #fff;
            border: 1px solid #fff;
            color: #ea2803;
            line-height: 38px;
        }

        .form-wizard-step p {
            color: #fff;
            -ms-transform: skewX(30deg); /* IE 9 */
            -webkit-transform: skewX(30deg); /* Safari */
            transform: skewX(30deg); /* Standard syntax */
        }

        .form-wizard-step.activated p {
            color: #fff;
        }

        .form-wizard-step.active p {
            color: #fff;
        }

        .form-wizard fieldset {
            display: none;
            text-align: left;
            border: 0px !important
        }

        .form-wizard-buttons {
            text-align: right;
        }

        .form-wizard .input-error {
            border-color: #ea2803;
        }

        /** image uploader **/
        .image-upload a[data-action] {
            cursor: pointer;
            color: #555;
            font-size: 18px;
            line-height: 24px;
            transition: color 0.2s;
        }

        .image-upload a[data-action] i {
            width: 1.25em;
            text-align: center;
        }

        .image-upload a[data-action]:hover {
            color: #ea2803;
        }

        .image-upload a[data-action].disabled {
            opacity: 0.35;
            cursor: default;
        }

        .image-upload a[data-action].disabled:hover {
            color: #555;
        }

        .settings_wrap {
            margin-top: 20px;
        }

        .image_picker .settings_wrap {
            overflow: hidden;
            position: relative;
        }

        .image_picker .settings_wrap .drop_target,
        .image_picker .settings_wrap .settings_actions {
            float: left;
        }

        .image_picker .settings_wrap .drop_target {
            margin-right: 18px;
        }

        .image_picker .settings_wrap .settings_actions {
            float: left;
            margin-top: 100px;
            margin-left: 20px;
        }

        .settings_actions.vertical a {
            display: block;
        }

        .drop_target {
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
            width: 250px;
            height: 250px;
            background: #f2f2f2;
            border-radius: 100%;
            margin: 0 auto 25px auto;
            overflow: hidden;
            border: 8px solid #E0E0E0;
        }

        .drop_target input[type="file"] {
            visibility: hidden;
        }

        .drop_target::before {
            content: 'Drop Hear';
            font-family: FontAwesome;
            position: absolute;
            display: block;
            width: 100%;
            line-height: 220px;
            text-align: center;
            font-size: 40px;
            color: rgba(0, 0, 0, 0.3);
            transition: color 0.2s;
        }

        .drop_target:hover,
        .drop_target.dropping {
            background: #f80;
            border-top-color: #cc6d00;
        }

        .drop_target:hover:before,
        .drop_target.dropping:before {
            color: rgba(0, 0, 0, 0.6);
        }

        .drop_target .image_preview {
            width: 100%;
            height: 100%;
            background: no-repeat center;
            background-size: contain;
            position: relative;
            z-index: 2;
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
                @if($counselor_accept->accept==0 || $counselor_proceed->counselor_proceed==0)
                    <div class="page-content">
                        <div class="content-wrapper">
                            <div class="content-inner">
                                <div class="page-header page-header-light">
                                    <div class="page-header-content header-elements-lg-inline">
                                        <div class="page-title d-flex">
                                            <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa World Wide Admission (Counselor Panel) </h4>
                                        </div>
                                        <div class="navbar-right">
                                            <a href="{{url('frontdesk_student_list')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 style="text-align:center;">Your System Is Currently Disable. Please Contact Counselor Section.</h3>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if($counselor_accept->accept==1 && $counselor_proceed->counselor_proceed==1)
                    @if($data->status==1)
                        <div class="page-content">
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <div class="page-header page-header-light">
                                        <div class="page-header-content header-elements-lg-inline">
                                            <div class="page-title d-flex">
                                                <h4><i class="icon-home"></i> Home - <span class="font-weight-semibold"></span> Admission Section </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if($as_personal_info_comment_notification!=null||$as_education_summery_comment_notification!=null||$as_additional_qualification_comment_notification!=null|| $as_school_attend_comment_notification!=null|| $as_test_score_comment_notification!=null|| $as_background_info_comment_notification!=null || $vs_personal_info_comment_notification!=null||$vs_education_summery_comment_notification!=null|| $vs_additional_qualification_comment_notification!=null|| $vs_school_attend_comment_notification!=null|| $vs_test_score_comment_notification!=null|| $vs_background_info_comment_notification!=null || $as_passport_comment_notification!=null || $as_birth_comment_notification!=null || $as_cv_comment_notification!=null || $as_profile_comment_notification!=null  || $vs_passport_comment_notification!=null || $vs_birth_comment_notification!=null || $vs_cv_comment_notification!=null || $vs_profile_comment_notification!=null)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="font-weight-semibold">Notification alert</p>
                                                    <div class="alert alert-info alert-styled-left alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                                        @if($as_personal_info_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Personal Information Section </span> <br>
                                                        @endif
                                                        @if($as_education_summery_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Educational Summery Section </span> <br>
                                                        @endif
                                                        @if($as_additional_qualification_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Additional Qualification Section </span> <br>
                                                        @endif
                                                        @if($as_school_attend_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">School Attend Section </span> <br>
                                                        @endif
                                                        @if($as_test_score_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Test Score Section </span> <br>
                                                        @endif
                                                        @if($as_background_info_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Background Information Section </span> <br>
                                                        @endif

                                                        @if($vs_personal_info_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Personal Information Section </span> <br>
                                                        @endif
                                                        @if($vs_education_summery_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Educational Summery Section </span> <br>
                                                        @endif
                                                        @if($vs_additional_qualification_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Additional Qualification Section </span> <br>
                                                        @endif
                                                        @if($vs_school_attend_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">School Attend Section </span> <br>
                                                        @endif
                                                        @if($vs_test_score_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Test Score Section </span> <br>
                                                        @endif
                                                        @if($vs_background_info_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Background Information Section </span> <br>
                                                        @endif

                                                        @if($as_passport_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Passport Section </span> <br>
                                                        @endif
                                                        @if($as_birth_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Birth Certificate Section </span> <br>
                                                        @endif
                                                        @if($as_cv_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">CV Section </span> <br>
                                                        @endif
                                                        @if($as_profile_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Passport Image Section </span> <br>
                                                        @endif

                                                        @if($vs_passport_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Passport Section </span> <br>
                                                        @endif
                                                        @if($vs_birth_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Birth Certificate Section </span> <br>
                                                        @endif
                                                        @if($vs_cv_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">CV Section </span> <br>
                                                        @endif
                                                        @if($vs_profile_comment_notification)
                                                            <span style="font-weight:bold;"><i class="fa fa-arrow-right"></i></span> New comment in <span style="font-weight:bold;">Passport Image Section </span> <br>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($admission_important_data_count !=0)
                                            <div class="card-group-control card-group-control-right">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <h6 class="card-title">
                                                            <a class="text-body collapsed" data-toggle="collapse" href="#admission">
                                                                <i class="icon-help mr-2 text-secondary"></i> Admission Section Important Documents
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="admission" class="collapse1">
                                                        <div class="card-body">
                                                            <div class="row" style="margin-bottom:10px;">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5 class="card-title" style="font-weight:bold;text-align:center;">Important Documents Required</h5>
                                                                            <hr>
                                                                            @if ($errors->any())
                                                                                <ul>
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li class="alert alert-secondary" role="alert" style="list-style:none; border-radius:0px; background:darkred !important; color:whitesmoke;" ,><i
                                                                                                class="fa fa-close"></i> {{ $error }}
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table class="table table-bordered">
                                                                                <thead>
                                                                                <th>#</th>
                                                                                <th>Admission Required File Name</th>
                                                                                {{--                                                        <th>Admission Required File View</th>--}}
                                                                                <th>Note</th>
                                                                                <th>Student File Upload</th>
                                                                                <th>Student File View</th>
                                                                                <th>Action</th>
                                                                                </thead>

                                                                                @foreach($admission_important_data as $key=>$row)
                                                                                    <tr>
                                                                                        <form action="{{ url('important_file_update')}}" method="POST" enctype="multipart/form-data">
                                                                                            @csrf
                                                                                            <td>{{++$key}}</td>
                                                                                            <td>{{$row->req_file_name}}</td>
                                                                                            {{--                                                                    <td>--}}
                                                                                            {{--                                                                        @if($row->visa_req_file==true)--}}
                                                                                            {{--                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_admission_file<?php echo $row->id; ?>" style="border-radius:0px;"><i--}}
                                                                                            {{--                                                                                    class="icon-file-pdf ml-2"></i>--}}
                                                                                            {{--                                                                                File View--}}
                                                                                            {{--                                                                            </button>--}}
                                                                                            {{--                                                                            <div id="modal_admission_file<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">--}}
                                                                                            {{--                                                                                <div class="modal-dialog  modal-lg">--}}
                                                                                            {{--                                                                                    <div class="modal-content">--}}
                                                                                            {{--                                                                                        <div class="modal-header bg-primary text-white" style="border-radius:0px;">--}}
                                                                                            {{--                                                                                            <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>--}}
                                                                                            {{--                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                                                                            {{--                                                                                        </div>--}}
                                                                                            {{--                                                                                        <div class="modal-body">--}}
                                                                                            {{--                                                                                            <embed src="upload/imp_file/admission/<?php echo $row->visa_req_file ?>" frameborder="0" width="100%" height="780">--}}
                                                                                            {{--                                                                                            <hr>--}}
                                                                                            {{--                                                                                            <div class="modal-footer">--}}
                                                                                            {{--                                                                                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>--}}
                                                                                            {{--                                                                                            </div>--}}
                                                                                            {{--                                                                                        </div>--}}
                                                                                            {{--                                                                                    </div>--}}
                                                                                            {{--                                                                                </div>--}}
                                                                                            {{--                                                                            </div>--}}
                                                                                            {{--                                                                        @endif--}}
                                                                                            {{--                                                                    </td>--}}
                                                                                            <td>{{$row->note}}</td>
                                                                                            <td>
                                                                                                <input type="file" name="imp_file" class="form-control" required autocomplete="off">
                                                                                                <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                                                                                <input type="hidden" name="id" class="form-control" autocomplete="off" value="{{$row->id}}">
                                                                                            </td>
                                                                                            <td>
                                                                                                @if($row->imp_file==true)
                                                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>"
                                                                                                            style="border-radius:0px;"><i
                                                                                                            class="icon-file-pdf ml-2"></i>
                                                                                                        File View
                                                                                                    </button>
                                                                                                    <div id="modal_theme_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                                                        <div class="modal-dialog  modal-lg">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                                                    <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">.
                                                                                                                    <embed src="upload/imp_file/admission/<?php echo $row->imp_file ?>" frameborder="0" width="100%" height="780">
                                                                                                                    <hr>
                                                                                                                    <div class="modal-footer">
                                                                                                                        <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i>
                                                                                                                            Close
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                @if($row->imp_file!=true)
                                                                                                    <button type="submit" class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-check"></i> File Submit</button>
                                                                                                @else
                                                                                                    @if($check->as_status==0)
                                                                                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs imp_delete_file" data-id="<?php echo $row->id;?>" style="border-radius:0px;"><i
                                                                                                                class="icon-trash ml-2"></i>
                                                                                                            File Delete</a>
                                                                                                    @else
                                                                                                        -
                                                                                                    @endif
                                                                                                @endif
                                                                                            </td>
                                                                                        </form>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <h3>Data Not Found !!!!!</h3>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
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
                $(function () {
                    $(".date").datepicker({
                        dateFormat: 'yy-mm-dd',
                    });
                });

                function approval() {
                    var txt;
                    if (confirm("Press a button!")) {
                        txt = "You pressed OK!";
                    } else {
                        txt = "You pressed Cancel!";
                    }
                }
            </script>
        </div>
    </div>
</div>
</body>
</html>

