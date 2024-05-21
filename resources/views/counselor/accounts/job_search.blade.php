<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        #example1_filter {
            display: none;
        }

        .sorting .sorting_asc {
            display: none;
        }

        .dataTable tbody + tfoot + thead > tr:first-child > td, .dataTable tbody + tfoot + thead > tr:first-child > th, .dataTable tbody + thead > tr:first-child > td, .dataTable tbody + thead > tr:first-child > th {
            border-top: 0;
            border-left: 0;
            border-right: 0;
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
                                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To Visa Software (Accounts Panel) </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Job Search Balance Check</h5>
                                                <hr>
                                            </div>
                                            <div class="card-body">

                                                <table id="example" class="table table-bordered" style="border:1px solid;">
                                                    <thead style="background-color:#194d83; color:white;">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th class="text-center">Action</th>
                                                        <th>Image</th>
                                                        <th>Student ID</th>
                                                        <th>Student Name</th>
                                                        <th style="text-align:center;">Payment Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($accounts_data as $key=>$result)
                                                    @php
                                                    $p_mode = DB::table('tbl_student_payment')->select('*')->where('student_id',$result->student_id)->orderBy('id','desc')->first();
                                                    @endphp
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td style="text-align:center;">
                                                            <a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>
                                                        </td>
                                                        <td><img src="{{asset('upload')}}/{{$result->student_img}}" border="0" width="100" height="100" class="img-rounded" align="center" /></td>
                                                        <td>{{$result->student_id}}</td>
                                                        <td>{{$result->student_name}}</td>
                                                        <td>{{$p_mode->payment_mode}}</td>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                $(document).ready( function () {
                    $('#example').DataTable();
                } );
            </script>
        </div>
    </div>
</div>
</body>
</html>







