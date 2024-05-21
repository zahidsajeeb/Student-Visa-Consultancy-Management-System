<?php error_reporting(0); ?>
<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Student Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
{{--                        @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    </div>
                </div>
                <div class="row">
                    <section class="form-box" style="width:100%;">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-sm-offset-12 col-md-12 col-md-offset-12 col-lg-12 col-lg-offset-12 form-wizard">
{{--                                    <form role="form" action="{{ url('student_profile_store')}}" method="POST" id="profileForm1212121" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
                                    <form role="form" action="" method="post" id="profileForm" enctype="multipart/form-data">
                                        <h3>Student Profile</h3>
                                        <p>Fill all form field to go next step</p>
                                        <div class="form-wizard-steps form-wizard-tolal-steps-4">
                                            <div class="form-wizard-progress">
                                                <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                                            </div>
                                            <div class="form-wizard-step active">
                                                <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                <p>General Information</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                                                <p>Education History</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                                                <p>Test Scores</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-snowflake" aria-hidden="true"></i></div>
                                                <p>Background Information</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
                                                <p>Upload Documents</p>
                                            </div>
                                        </div>

                                        <fieldset>
                                            @include('include.student.store.general_information')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.store.educational_background')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.store.test_score')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.store.background_information')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.store.upload_documents')
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
