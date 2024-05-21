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
                        <h4><i class="icon-home"></i><span class="font-weight-semibold"> Home</span> - Student Profile Show</h4>
                    </div>
                    <div class="header-elements d-none">
                        <div class="d-flex justify-content-center">
                            @if(Auth::user()->role==='Counselor' || Auth::user()->role==='Admin')
                                @if($profile_data==true)
                                    @if($check->as_proceed==0 && $check->vs_proceed==0)
                                        <button class="btn btn-lg btn-teal" id="admission_section_proceed" style="border-radius:0px;"><i class="fa fa-check"></i> Go to Admission Section</button>&nbsp
                                        <button class="btn btn-lg btn-teal" id="visa_section_proceed" style="border-radius:0px;"><i class="fa fa-check"></i> Go to Visa Section</button>&nbsp;
                                    @endif
                                    @if($check->as_proceed==1 && $check->vs_proceed==0)
                                        <button class="btn btn-lg btn-teal" id="visa_section_proceed" style="border-radius:0px;"><i class="fa fa-check"></i> Go to Visa Section</button>&nbsp;
                                    @endif
                                    @if($check->as_proceed==0 && $check->vs_proceed==1)
                                        <button class="btn btn-lg btn-teal" id="admission_section_proceed" style="border-radius:0px;"><i class="fa fa-check"></i> Go to Admission Section</button>&nbsp
                                    @endif
                                @endif
                                @if(Auth::user()->role==='Admin')
                                    <button class="btn btn-lg btn-danger" id="profile_lock" style="border-radius:0px;"><i class="fa fa-lock"></i> Student Profile Lock</button> &nbsp;
                                @endif
                                <a href="{{url('chat')}}/{{$profile_data->student_id}}" class="btn btn-lg btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Chat</a> &nbsp;
                                <a href="{{url('home')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back</a>
                            @endif
                            @if(Auth::user()->role==='Visa Section')
                                <button class="btn btn-lg btn-danger" id="profile_lock" style="border-radius:0px;"><i class="fa fa-lock"></i> Student Profile Lock</button> &nbsp;
                                @if($check->vs_submit==0)
                                    <button class="btn btn-lg btn-teal" id="visa_submit" style="border-radius:0px;"><i class="fa fa-check"></i> Visa Submit</button> &nbsp;
                                @endif
                                @if($check->vs_status==0)
                                    <button class="btn btn-lg btn-teal" id="check_student_profile_by_visa_section" style="border-radius:0px;"><i class="fa fa-check"></i> Visa Approved</button> &nbsp;
                                @endif
                                @if($check->vs_reject==0)
                                    <button class="btn btn-lg btn-teal" id="visa_reject" style="border-radius:0px;"><i class="fa fa-check"></i> Visa Reject</button> &nbsp;
                                @endif
                                <a href="{{url('chat')}}/{{$profile_data->student_id}}" class="btn btn-lg btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Chat</a> &nbsp;
                                <a href="{{url('home')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back</a>
                            @endif
                            @if(Auth::user()->role==='Admission Section')
                                <button class="btn btn-lg btn-danger" id="profile_lock" style="border-radius:0px;"><i class="fa fa-lock"></i> Student Profile Lock</button> &nbsp;
                                @if($check->as_status==0)
                                    @if($check->as_offer_letter==0 && $check->as_final_offer_letter==0)
                                        <button class="btn btn-lg btn-teal" id="offer_letter" style="border-radius:0px;"><i class="fa fa-check"></i> Offer Letter</button> &nbsp;
                                        <button class="btn btn-lg btn-teal" id="final_offer_letter" style="border-radius:0px;"><i class="fa fa-check"></i> Final Offer Letter</button> &nbsp;
                                    @endif
                                    @if($check->as_offer_letter==1 && $check->as_final_offer_letter==0)
                                        <button class="btn btn-lg btn-teal" id="final_offer_letter" style="border-radius:0px;"><i class="fa fa-check"></i> Final Offer Letter</button> &nbsp;
                                    @endif
                                    @if($check->as_offer_letter==0 && $check->as_final_offer_letter==1)
                                        <button class="btn btn-lg btn-teal" id="offer_letter" style="border-radius:0px;"><i class="fa fa-check"></i> Offer Letter</button>
                                    @endif
                                @endif
                                <a href="{{url('chat')}}/{{$profile_data->student_id}}" class="btn btn-lg btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Chat</a> &nbsp;
                                <a href="{{url('home')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Student Profile Show</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                @if(Auth::user()->role==='Counselor')
                                    @include('.include.student.show.profile.counselor.index')
                                @endif
                                @if(Auth::user()->role==='Admin')
                                    @include('.include.student.show.profile.counselor.index')
                                @endif
                                @if(Auth::user()->role==='Admission Section')
                                    @include('.include.student.show.profile.admission.index')
                                @endif
                                @if(Auth::user()->role==='Visa Section')
                                    @include('.include.student.show.profile.visa.index')
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

            {{-- =========================(Modal Start Admission/Visa Section)============================================--}}
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
            <div id="modal_visa_submit" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('visa_submit')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">Visa Submit ????</h2>
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
            <div id="modal_visa_reject" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('visa_reject')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">Visa Reject ??? </h2>
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

            <div id="modal_profile_lock" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('profile_lock')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Profile Lock</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;"> Stuent Profile Lock </h2>
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
                $(document).on("click", "#visa_submit", function () {
                    $("#modal_visa_submit").modal("toggle");
                });
                $(document).on("click", "#visa_reject", function () {
                    $("#modal_visa_reject").modal("toggle");
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
                $(document).on("click", "#profile_lock", function () {
                    $("#modal_profile_lock").modal("toggle");
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



