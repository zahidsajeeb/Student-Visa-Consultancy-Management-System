<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        input {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            width: 200px !important;
            padding: 10px 0px !important;
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Accounts Student List</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                @if(Auth::user()->role==='Counselor')
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title" style="font-weight:bold;text-align:center;">Accounts List</h5>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="counselor_account_table" style="border:1px solid gray; text-align:center;">
                                                <thead style="background-color:#194d83; color:white;">
                                                <tr>
                                                    <th style="width:20px;">#</th>
                                                    <th class="text-center" style="width:70px;">Action</th>
                                                    <th class="text-center">Permission</th>
                                                    <th class="text-center">Student ID</th>
                                                    <th class="text-center">Student Name</th>
                                                    <th class="text-center">Student Entry (Y-M-D)</th>
                                                    <th class="text-center">Purpose</th>
                                                    <th class="text-center">Processing Start (Y-M-D)</th>
                                                    <th class="text-center">Counselor To Admission Section (Y-M-D)</th>
                                                    <th class="text-center">Offer Letter</th>
                                                    <th class="text-center">Offer Letter (Y-M-D)</th>
                                                    <th class="text-center">Final Offer Letter</th>
                                                    <th class="text-center">Final Offer Letter (Y-M-D)</th>
                                                    <th class="text-center">Counselor To Visa Section (Y-M-D)</th>
                                                    <th class="text-center">Visa Approved</th>
                                                    <th class="text-center">Visa Submit</th>
                                                    <th class="text-center">Visa Reject</th>
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
                @endif
                @if(Auth::user()->role==='Admin')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title" style="font-weight:bold;text-align:center;">Accounts Student List</h5>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="admin_account_table" style="border:1px solid gray;">
                                        <thead style="background-color:#194d83; color:white;">
                                        <tr>
                                            <th style="width:20px;">#</th>
                                            <th class="text-center" style="width:70px;">Action</th>
                                            <th class="text-center">Permission</th>
                                            <th class="text-center">Student ID</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Student Entry (Y-M-D)</th>
                                            <th class="text-center">Purpose</th>
                                            <th class="text-center">Processing Start (Y-M-D)</th>
                                            <th class="text-center">Counselor To Admission Section (Y-M-D)</th>
                                            <th class="text-center">Offer Letter</th>
                                            <th class="text-center">Offer Letter (Y-M-D)</th>
                                            <th class="text-center">Final Offer Letter</th>
                                            <th class="text-center">Final Offer Letter (Y-M-D)</th>
                                            <th class="text-center">Counselor To Visa Section (Y-M-D)</th>
                                            <th class="text-center">Visa Approved</th>
                                            <th class="text-center">Visa Submit</th>
                                            <th class="text-center">Visa Reject</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="modal_company_edit" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ url('counselor_accept_store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">Confirmation Form</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <h2 style="text-align:center;">Accept This Student ? </h2>
                                    <input type="text" name="id" id="id">
                                    <input type="text" name="token" id="token">
                                    <input type="text" name="email" id="student_email">
                                    <input type="text" name="name" id="student_name">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i>
                                        Accept
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="fa fa-close"></i> Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="modal_permission" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ url('permission_store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title">Profile Entry Permission ?</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="margin-top:10px;">
                                        <div class="col-md-12">
                                            <span style="font-weight:bold;">Permission</span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="stu_id">
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-lg btn-success" style="border-radius:0px;"><i class="fa fa-check"></i> Submit</button>
                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
                var SITEURL = '{{URL::to('')}}';
                $(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var admin_account_table = $('#admin_account_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('account_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                            {data: "counselor_proceed",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'frontdesk_date', name: 'frontdesk_date'},
                            {data: 'purpose', name: 'purpose'},
                            {data: 'counselor_date', name: 'counselor_date'},
                            {data: 'admission_date', name: 'admission_date'},
                            // {
                            //     data: "as_proceed",
                            //     render: function (data) {
                            //         if (data == 0)
                            //             return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                            //         if (data == 1)
                            //             return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                            //     }
                            // },
                            {
                                data: "as_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {data: 'offer_letter_date', name: 'offer_letter_date'},
                            {
                                data: "as_final_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {data: 'final_offer_letter_date', name: 'final_offer_letter_date'},
                            {data: 'visa_date', name: 'visa_date'},
                            {
                                data: "vs_status",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "vs_submit",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "vs_reject",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                        ]
                    });
                    var counselor_table = $('#counselor_account_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('account_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                            {data: "counselor_proceed",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {data: 'frontdesk_date', name: 'frontdesk_date'},
                            {data: 'purpose', name: 'purpose'},
                            {data: 'counselor_date', name: 'counselor_date'},
                            {data: 'admission_date', name: 'admission_date'},
                            // {
                            //     data: "as_proceed",
                            //     render: function (data) {
                            //         if (data == 0)
                            //             return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                            //         if (data == 1)
                            //             return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                            //     }
                            // },
                            {
                                data: "as_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {data: 'offer_letter_date', name: 'offer_letter_date'},
                            {
                                data: "as_final_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {data: 'final_offer_letter_date', name: 'final_offer_letter_date'},
                            {data: 'visa_date', name: 'visa_date'},
                            {
                                data: "vs_status",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "vs_submit",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "vs_reject",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:5px;font-size:12px !important;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                        ]
                    });
                    var assistant_student_table = $('#admission_student_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('admission_student_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {
                                data: "as_proceed",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "as_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "as_final_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "vs_status",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                        ]
                    });
                    var admin_student_table = $('#admin_student_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('admin_student_list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'action', name: 'action', orderable: false, searchable: true},
                            {data: 'student_id', name: 'student_id'},
                            {data: 'student_name', name: 'student_name'},
                            {
                                data: "as_proceed",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "as_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "as_final_offer_letter",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                            {
                                data: "vs_status",
                                render: function (data) {
                                    if (data == 0)
                                        return '<span style="background:red;color:white; padding:10px;"><i class="fa fa-close"></i> Pending</span>'
                                    if (data == 1)
                                        return '<span style="background:green;color:white; padding:10px;"><i class="fa fa-check"></i> Complete</span>'
                                }
                            },
                        ]
                    });
                });
                //(************* FrontDesk (Edit/Delete) Section ***************)
                $('body').on('click', '#permission', function () {
                    var student_id = $(this).data('id');
                    $.ajax({
                        type: "get",
                        url: "permission/" + student_id,
                        success: function (data) {
                            $('#modelHeading').html("Edit Product");
                            $('#saveBtn').val("edit-user");
                            $('#modal_permission').modal('show');
                            $('#stu_id').val(data.id);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
                $('body').on('click', '#edit_company', function () {
                    var student_id = $(this).data('id');
                    $.ajax({
                        type: "get",
                        url: "counselor_accept/" + student_id,
                        success: function (data) {
                            $('#modelHeading').html("Edit Product");
                            $('#saveBtn').val("edit-user");
                            $('#modal_company_edit').modal('show');
                            $('#id').val(data.id);
                            $('#token').val(data.token);
                            $('#student_email').val(data.student_email);
                            $('#student_name').val(data.student_name);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
                $('body').on('click', '#delete_company', function () {
                    var id = $(this).data("id");
                    if (confirm("Do you really want to delete this item?")) {
                        $.ajax({
                            type: "get",
                            url: "company_delete/" + id,
                            success: function (data) {
                                var oTable = $('#company-table').dataTable();
                                oTable.fnDraw(false);
                                toastr.error("Company Deleted Successfully!!!");
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
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
            </script>
        </div>
    </div>
</div>
</body>
</html>


