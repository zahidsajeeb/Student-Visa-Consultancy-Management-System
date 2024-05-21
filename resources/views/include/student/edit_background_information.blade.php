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
                                            <h4 class="card-title" style="font-weight:bold;text-align:center;"><i class="fa fa-edit"></i> Edit Background Information</h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('update_background_information')}}" method="POST" id="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand, Australia or Ireland?</label>
                                                            <select class="form-control required" value="{{$profile_data->visa_refused}}" name="visa_refused">
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            <input type="hidden" name="id" value="{{$profile_data->id}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Do you have a valid Study Permit / Visa?</label>
                                                            <select name="permit" value="{{$profile_data->permit}}" class="custom-select required">
                                                                <option value="USA F1 Visa">USA F1 Visa</option>
                                                                <option value="Canadian Study Permit or Visitor Visa">Canadian Study Permit or Visitor Visa</option>
                                                                <option value="UK Student Visa (Tier 4) or Short Term Study Visa">UK Student Visa (Tier 4) or Short Term Study Visa</option>
                                                                <option value="Australian Student Visa">Australian Student Visa</option>
                                                                <option value="I don't have this">I don't have this</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group" style="width:100%;">
                                                            <label style="color:black;font-weight:500;">If you answered "Yes" to any of the questions above, please provide more details below:</label>
                                                            <textarea class="form-control" name="more_details" style="width:100%;">{{$profile_data->more_details}}</textarea>
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
                                {{--                    <div class="col-lg-2"></div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    //************(Form Validation)**************
    $(document).ready(function () {
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
</script>
</body>

