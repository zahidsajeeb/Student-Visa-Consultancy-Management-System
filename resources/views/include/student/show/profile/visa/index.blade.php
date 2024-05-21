<div class="table-responsive">
    <div class="card-group-control card-group-control-right">
        <div class="card mb-2">
            <div class="card-header">
                <h6 class="card-title">
                    <a class="text-body collapsed" data-toggle="collapse" href="#primary">
                        <i class="icon-help mr-2 text-secondary"></i> Important Document
                    </a>
                </h6>
            </div>
            <div id="primary" class="collapse1">
                <div class="card-body">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-md-12">
                            <h4 style="font-weight:bold; margin-top:35px;"> Important Document List:</h4>
                            <form action="{{url('visa_important_file_store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="email" value="{{$check->student_email}}">
                                <table class="table table-bordered" id="visa_imp_table">
                                    <thead style="background:#80808017;">
                                    <th style="width:10%;">#</th>
                                    <th style="width:30%;">Required File Name</th>
                                    <th style="width:20%;">File Upload</th>
                                    <th style="width:30%;">Note</th>
                                    <th style="width:10%;">Action</th>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <textarea name="addmore[0][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                                            <input type="hidden" name="addmore[0][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red">
                                        </td>
                                        <td>
                                            <input type="file" name="addmore[0][visa_req_file]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120">
                                           <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 5MB***)</span>
                                        </td>
                                        <td>
                                            <textarea name="addmore[0][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                                        </td>
                                        <td>
                                            <button type="button" name="add" id="visa_add_more" class="btn btn-success btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-plus"></i> Add More</button>
                                            <br>
                                            <button type="submit" class="btn btn-sm btn-info" style="border-radius:0px; margin-top:5px; width:100px;"><i class="fa fa-check"></i> Submit</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <h4 style="font-weight:bold; margin-top:35px;"> Important Documents View:</h4>
                            <table class="table table-bordered" id="sample_table">
                                <thead style="background:#80808017;">
                                <th>#</th>
                                <th>Required File Name</th>
                                <th>Note</th>
                                <th>Visa Required File View</th>
                                <th>Student Send File View</th>
                                <th>Action</th>
                                </thead>
                                @foreach($visa_important_data as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->req_file_name}}</td>
                                        <td>{{$row->note}}</td>
                                        <td>
                                            @if($row->visa_req_file==true)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_visa_req<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                                    File View
                                                </button>
                                                <div id="modal_visa_req<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <embed src="{{ url('upload/imp_file/visa/'.$row->visa_req_file) }}" frameborder="0" width="100%" height="780">
                                                                <hr>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->imp_file==true)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_imp_req<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                                    File View
                                                </button>
                                                <div id="modal_imp_req<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <embed src="{{ url('upload/imp_file/admission/'.$row->imp_file) }}" frameborder="0" width="100%" height="780">
                                                                <hr>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->imp_file!=true)
                                                <button type="button" data-id="{{$row->id}}" id="visa_delete_file" class="btn btn-danger btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-trash"></i> Delete</button>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        @include('.include.student.show.profile.visa.general_information')
        @include('.include.student.show.profile.visa.educational_background')
        @include('.include.student.show.profile.visa.test_score')
        @include('.include.student.show.profile.visa.background_information')
        @include('.include.student.show.profile.visa.upload_document')
    </table>
</div>

