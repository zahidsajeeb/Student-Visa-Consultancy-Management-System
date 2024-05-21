<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Visa Section Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Student List</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="width:100% !important;">
                                    <table class="table table-bordered" id="visa_student_table" style="border:1px solid gray; font-size:12px !important;">
                                        <thead style="background-color:#194d83; color:white;">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center" style="width:70px;">Action</th>
                                            <th class="text-center" style="width:70px;">Sponsor Document</th>
                                            <th class="text-center" style="width:70px;">Student ID</th>
                                            <th class="text-center" style="width:70px;">Student Name</th>
                                            <th class="text-center" style="width:70px;">Student Entry Date/Time</th>
                                            <th class="text-center" style="width:70px;">Purpose</th>
                                            <th class="text-center" style="width:70px;">Counselor Section Approved</th>
                                            <th class="text-center" style="width:70px;">Offer Letter</th>
                                            <th class="text-center" style="width:70px;">Offer Letter Date/Time</th>
                                            <th class="text-center" style="width:70px;">Final Offer Letter</th>
                                            <th class="text-center" style="width:70px;">Final Offer Letter Date/Time</th>
                                            <th class="text-center" style="width:70px;">Visa Approved</th>
                                            <th class="text-center" style="width:70px;">Visa Submit</th>
                                            <th class="text-center" style="width:70px;">Visa Reject</th>
                                        </tr>
                                        </thead>
                                        <tbody>
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
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var assistant_student_table = $('#visa_student_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admission_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'sponsor_document', name: 'sponsor_document', orderable: false, searchable: true},
                {data: 'student_id', name: 'student_id'},
                {data: 'student_name', name: 'student_name'},
                {data: 'frontdesk_date', name: 'frontdesk_date'},
                {data: 'purpose', name: 'purpose'},
                {
                    data: "as_proceed",
                    render: function (data) {
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                    }
                },
                {
                    data: "as_offer_letter",
                    render: function (data) {
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                    }
                },
                {data: 'offer_letter_date', name: 'offer_letter_date'},
                {
                    data: "as_final_offer_letter",
                    render: function (data) {
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                    }
                },
                {data: 'final_offer_letter_date', name: 'final_offer_letter_date'},
                {
                    data: "vs_status",
                    render: function (data) {
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                    }
                },
                {
                    data: "vs_submit",
                    render: function (data) {
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                    }
                },
                {
                    data: "vs_reject",
                    render: function (data) {
                        if (data == 0)
                            return '<span style="background:red;color:white; padding:5px;"><i class="fa fa-close"></i> Pending</span>'
                        if (data == 1)
                            return '<span style="background:green;color:white; padding:5px;"><i class="fa fa-check"></i> Complete</span>'
                    }
                },
            ]
        });
    });
</script>

