<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To Visa Software (Admin Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-body border-top-primary">
                            <div class="text-center">
                                <h6 class="m-0 font-weight-semibold">Employee List</h6>
                                <p class="text-muted mb-3">Available in both directions</p>
                                <a href="{{url('employee')}}" class="btn btn-light"><i class="icon-make-group mr-2"></i> Link</a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-4">-->
                    <!--    <div class="card card-body border-top-primary">-->
                    <!--        <div class="text-center">-->
                    <!--            <h6 class="m-0 font-weight-semibold">Student List</h6>-->
                    <!--            <p class="text-muted mb-3">Available in both directions</p>-->
                    <!--            <a href="{{url('student')}}" class="btn btn-light"><i class="icon-make-group mr-2"></i> Link</a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-4">-->
                    <!--    <div class="card card-body border-top-primary">-->
                    <!--        <div class="text-center">-->
                    <!--            <h6 class="m-0 font-weight-semibold">Balance Check</h6>-->
                    <!--            <p class="text-muted mb-3">Available in both directions</p>-->
                    <!--            <a href="{{url('balance_check')}}" class="btn btn-light"><i class="icon-make-group mr-2"></i> Link</a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var admin_student_table = $('#admin-student-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('all_student_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'counselor_name', name: 'counselor_name'},
                            {
                                data: "cc_status",
                                render: function (data) {
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                                }
                            },
                            {
                                data: "hc_status",
                                render: function (data) {
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Job Done</span>'
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                                }
                            },
                            {
                                data: "payment_status",
                                render: function (data) {
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Processing</span>'
                                }
                            },
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                        ]
                    });
                });
            </script>
