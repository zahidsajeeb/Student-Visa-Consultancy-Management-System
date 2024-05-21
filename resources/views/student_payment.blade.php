<?php
error_reporting(0);
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
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="text-align:center;">Welcome To Visa Software (Student Panel)</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Payment History </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="account-student-table"
                                       style="border:1px solid #ddd !important;">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Payment Purpose</th>
                                        <th>Pay Amount</th>
                                        <th>Payment Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payment_history as $key=>$row)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$row->payment_purpose}}</td>
                                            <td>{{$row->pay_amount}}</td>
                                            <td>{{$row->payment_date}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        </div>
    </div>
</div>
</body>
</html>


