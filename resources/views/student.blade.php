<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <style>
        .error{
            color:red;
            font-weight:bold;
        }
        .card{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        input{
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Student List</h4>
                    </div>
                    <div class="navbar-right">
                        <button type="button" class="btn btn-indigo" data-toggle="modal" data-target="#modal_employee_add" style="border-radius:0px;"><i class="icon-plus2"></i> Add Employee </button>
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Student Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="employee-table" style="border:1px solid;">
                            <thead style="background:#194d83;color:white;">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Action</th>
                                <th>Name</th>
                                <th>Role</th>
                                <!--<th>Counter No</th>-->
                                <th>Login User Name</th>
                                <th>Login Password</th>
                                <th>Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="modal_employee_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
                    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
                        <div class="modal-content">
                            <form action="" method="post" id="employeeAddForm">
                                <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                                    <h6 class="modal-title"><i class="fa fa-user-plus"></i> Employee Information Add</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="collapse show" id="demo1">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Employee Name:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="name" class="form-control h-auto required" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Role:</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="role" style="border-radius:0px !important;border-color: #604c4c69 !important;">
                                                        <option disabled selected value="">-Select role-</option>
                                                        <option value="Counselor">Counselor</option>
                                                        <option value="Admission Section">Admission Section</option>
                                                        <option value="Visa Section">Visa Section</option>
                                                        <option value="Operator">Operator</option>
                                                        <option value="Accountant">Accountant</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--<div class="form-group row">-->
                                            <!--    <label class="col-lg-4 col-form-label">Counter No:</label>-->
                                            <!--    <div class="col-lg-8">-->
                                            <!--        <input type="number" name="counter_no" class="form-control h-auto" autocomplete="off">-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Login User Name:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="user_name" class="form-control h-auto" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Login Password:</label>
                                                <div class="col-lg-8">
                                                    <input type="password" name="password" class="form-control h-auto" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="submit" id="save_employee" class="btn btn-lg btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="modal_employee_edit" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ url('employee_update') }}" method="POST" id="employeeEditForm">
                                @csrf
                                <div class="modal-header bg-indigo text-white">
                                    <h6 class="modal-title"><i class="fa fa-user-edit"></i> Employee Information Edit</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="collapse show" id="demo1">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Employee Name:</label>
                                                <div class="col-lg-8">
                                                    <input type="text"   class="form-control h-auto" id="name" name="name">
                                                    <input type="hidden" class="form-control h-auto" name="id" id="id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Role:</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="role" name="role" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                                        <option value="Counselor">Counselor</option>
                                                        <option value="Admission Section">Admission Section</option>
                                                        <option value="Visa Section">Visa Section</option>
                                                        <option value="Operator">Operator</option>
                                                        <option value="Accountant">Accountant</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--<div class="form-group row">-->
                                            <!--    <label class="col-lg-4 col-form-label">Counter No:</label>-->
                                            <!--    <div class="col-lg-8">-->
                                            <!--        <input type="number" class="form-control h-auto" id="counter_no" name="counter_no">-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Login User Name:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control h-auto" id="user_name" name="user_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Login Password:</label>
                                                <div class="col-lg-8">
                                                    <input type="password" class="form-control h-auto" id="confirm_password" name="password">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="submit" id="update_employee" class="btn btn-lg btn-success" style="border-radius: 0px !important;"><i class="fa fa-check-square"></i> Update</button>
                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal"  style="border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
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
        var counselor_table = $('#employee-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('student_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                // {data: 'counter_no', name: 'counter_no'},
                {data: 'user_name', name: 'user_name'},
                {data: 'confirm_password', name: 'confirm_password'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    });
    //(************* Company (Add/Edit/Delete) Section ***************)
    if ($("#employeeAddForm").length > 0) {
        $("#employeeAddForm").validate({
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
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#save_employee').html('Sending..');
                $.ajax({
                    url: 'employee_store' ,
                    type: "POST",
                    data: $('#employeeAddForm').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#counselorForm').trigger("reset");
                        $('#modal_employee_add').modal('hide');
                        swal({
                            icon: 'success',
                            title: 'Success',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        setInterval('location.reload()', 1000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    if ($("#employeeEditForm").length > 0) {
        $("#employeeEditForm").validate({
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
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update_employee').html('Sending..');
                $.ajax({
                    url: 'employee_update',
                    type: "POST",
                    data: $('#employeeEditForm').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#counselorForm').trigger("reset");
                        $('#modal_employee_edit').modal('hide');
                        swal({
                            icon: 'success',
                            title: 'Employee Information Update Successfully !!!',
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
    $('body').on('click', '#edit_employee', function () {
        var emp_id = $(this).data('id');
        console.log(emp_id);
        $.ajax({
            type: "get",
            url: "employee_edit/" + emp_id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_employee_edit').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#role').val(data.role);
                $('#counter_no').val(data.counter_no);
                $('#user_name').val(data.user_name);
                $('#confirm_password').val(data.confirm_password);
                if (data.image) {
                    $('#modal-preview').attr('src', SITEURL + '/upload/' + data.image);
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_employee', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "employee_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Employee Information Delete Successfully !!!',
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
</script>
</body>
</html>





