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
                                {{--                    <div class="col-lg-2"></div>--}}
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" style="font-weight:bold;text-align:center;"><i class="fa fa-edit"></i> Edit Student General Information</h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('update_general_information')}}" method="POST" id="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">First Name</label>
                                                            <input type="text" name="f_name" value="{{$profile_data->f_name}}" class="form-control required" autocomplete="off">
                                                            <input type="hidden" name="id" value="{{$profile_data->id}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Middle Name</label>
                                                            <input type="text" name="m_name" value="{{$profile_data->m_name}}" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Last Name</label>
                                                            <input type="text" name="l_name" value="{{$profile_data->l_name}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Date of Birth</label>
                                                            <input type="date" name="dob" value="{{$profile_data->dob}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">First Language</label>
                                                            <input type="text" name="first_language" value="{{$profile_data->first_language}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Citizenship</label>
                                                            <input type="text" name="citizenship" value="{{$profile_data->citizenship}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Passport No</label>
                                                            <input type="text" name="passport_no" value="{{$profile_data->passport_no}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Passport Exp Date</label>
                                                            <input type="date" name="passport_exp" value="{{$profile_data->passport_exp}}" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Marital Status</label>
                                                            <select class="form-control required" name="marital_status" value="{{$profile_data->marital_status}}">
                                                                <option value="Married">Married</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Divorced">Divorced</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Gender</label>
                                                            <select class="form-control required" name="gender" value="{{$profile_data->gender}}">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4 class="mt-2" style="font-weight:bold;">Address Details:</h4>
                                                        <hr class="mt-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Address</label>
                                                            <textarea class="form-control required" name="address">{{$profile_data->address}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">City/Town</label>
                                                            <input type="text" name="city" value="{{$profile_data->city}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Country</label>
                                                            <input type="text" name="country" value="{{$profile_data->country}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Province/State</label>
                                                            <input type="text" name="state" value="{{$profile_data->state}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Postal/Zip Code</label>
                                                            <input type="text" name="zip_code" value="{{$profile_data->zip_code}}" class="form-control required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Email</label>
                                                            <input type="text" name="email" value="{{$profile_data->email}}" class="form-control" readonly style="background:red;color:white;">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Phone Number</label>
                                                            <input type="number" name="phone_no" value="{{$profile_data->phone_no}}" class="form-control" readonly style="background:red;color:white;">
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

