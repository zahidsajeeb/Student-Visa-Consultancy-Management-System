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
                                    <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To Visa Software (Student Panel) </h4>
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
                                            <h4 class="card-title" style="font-weight:bold;text-align:center;"><i class="fa fa-edit"></i> Edit Upload Documents</h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('update_document')}}" method="POST" id="form" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{$student_id}}">
                                                <div class="row" style="margin-bottom:10px;">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Passport Upload (Automated):</label>
                                                            <input type="file" name="passport_img[]" class="form-control" autocomplete="off" multiple style="margin-bottom:5px;">
                                                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <table class="table table-bordered" id="passport_table" style="width:100%;">
                                                            <thead>
                                                            <tr>
                                                                <th>File View</th>
                                                                <th>File Delete</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($document_data as $key=>$result)
                                                                @if($result->type=='Passport')
                                                                    <tr>
                                                                        <td>
                                                                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                                            </button>
                                                                        </td>
                                                                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm passport_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                                                        </td>
                                                                        <div id="modal_theme_primary<?php echo $result->id; ?>"
                                                                             class="modal fade" tabindex="-1">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white">
                                                                                        <h6 class="modal-title">Uploaded File</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/passport/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Birth Certificate Upload:</label>
                                                            <input type="file" name="bc_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple style="margin-bottom:5px;">
                                                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <table class="table table-bordered" id="bc_table" style="width:100%;">
                                                            <thead>
                                                            <tr>
                                                                <th>File View</th>
                                                                <th>File Delete</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($document_data as $result)
                                                                @if($result->type=='Birth Certificate')
                                                                    <tr>
                                                                        <td>
                                                                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_birth<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                                                                        </td>
                                                                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm bc_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                                                        </td>
                                                                        <div id="modal_theme_birth<?php echo $result->id; ?>"
                                                                             class="modal fade" tabindex="-1">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white">
                                                                                        <h6 class="modal-title">Uploaded File</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/birth_certificate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">CV Upload:</label>
                                                            <input type="file" name="cv_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple style="margin-bottom:5px;">
                                                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <table class="table table-bordered" id="cv_table" style="width:100%;">
                                                            <thead>
                                                            <tr>
                                                                <th>File View</th>
                                                                <th>File Delete</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($document_data as $result)
                                                                @if($result->type=='CV')
                                                                    <tr>
                                                                        <td>
                                                                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_cv<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                                                                        </td>
                                                                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm cv_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                                                        </td>
                                                                        <div id="modal_theme_cv<?php echo $result->id; ?>"
                                                                             class="modal fade" tabindex="-1">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white">
                                                                                        <h6 class="modal-title">Uploaded File</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/cv/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Passport Size Image Upload:</label>
                                                            <input type="file" name="profile_img" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple style="margin-bottom:5px;">
                                                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <table class="table table-bordered" id="profile_table" style="width:100%;">
                                                            <thead>
                                                            <tr>
                                                                <th>File View</th>
                                                                <th>File Delete</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($document_data as $result)
                                                                @if($result->type=='Profile')
                                                                    <tr>
                                                                        <td>
                                                                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_profile<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                                                                        </td>
                                                                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm profile_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                                                        </td>
                                                                        <div id="modal_theme_profile<?php echo $result->id; ?>"
                                                                             class="modal fade" tabindex="-1">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white">
                                                                                        <h6 class="modal-title">Uploaded File</h6>
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary" style="border-radius:0px;"><i class="icon icon-checkbox-checked"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/jquery.MultiFile.js')}}"></script>
<script>
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

    $('#bc_table').DataTable();
    $('#passport_table').DataTable()
    $('#profile_table').DataTable()
    $('#cv_table').DataTable()

    $('body').on('click', '.passport_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "passport_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#passport_table").load(window.location.href + " #passport_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.bc_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "birth_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#bc_table").load(window.location.href + " #bc_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.cv_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "cv_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#cv_table").load(window.location.href + " #cv_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
    $('body').on('click', '.profile_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "profile_delete_file/" + id,
                success: function (data) {
                    toastr.error("File Deleted Successfully!!!");
                    $("#profile_table").load(window.location.href + " #profile_table");
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    });
</script>
</body>


