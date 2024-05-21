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
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Balance Check</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                @if(Auth::user()->role === 'Accountant')
                                    <table id="example" class="table table-bordered" style="border:1px solid;">
                                        <thead style="background-color:#194d83; color:white;">
                                        <tr>
                                            <th>Sl No</th>
                                            <th class="text-center">Action</th>
                                            <th>Student Name</th>
                                            <th>Student ID</th>
                                            <th>Counselor Name</th>
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
                                                    <a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-folder-open"></i> Pay Now</a>
                                                    <!--<a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>-->
                                                </td>
                                                <td>{{$result->student_name}}</td>
                                                <td>{{$result->student_id}}</td>
                                                <td>{{$result->counselor_name}}</td>
                                                <td>{{$p_mode->payment_mode}}</td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <table id="example" class="table table-bordered" style="border:1px solid;">
                                        <thead style="background-color:#194d83; color:white;">
                                        <tr>
                                            <th>Sl No</th>
                                            <th class="text-center">Action</th>
                                            <th>Student Name</th>
                                            <th>Student ID</th>
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
                                                    <a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-folder-open"></i> Pay Now</a>
                                                    <a href="{{url('balance_check_details', $result->student_id)}}" class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>
                                                </td>
                                                <td>{{$result->student_name}}</td>
                                                <td>{{$result->student_id}}</td>
                                                <td>{{$p_mode->payment_mode}}</td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(".date").datepicker({
            dateFormat: 'yy-mm-dd',
        });
    });

    function paymentStatus() {
        confirm("Are you sure this student payment is completely done !!!!!!!!!!!!!");
    }

    $(document).ready(function () {
        $('.balance_table').DataTable({
            createdRow: function (row) {
                $(row).find('td table')
                    .DataTable({
                        columns: columns,
                        dom: 'tf'
                    })
            }
        });
        const columns = [
            {title: ''},
        ]
        let table = $('#example').DataTable({
            createdRow: function (row) {
                $(row).find('td table')
                    .DataTable({
                        columns: columns,
                        dom: 'tf', ordering: false,

                    })
            }
        })
    });
</script>


