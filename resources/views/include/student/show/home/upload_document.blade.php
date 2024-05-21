<tr>
    <td colspan="5" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Uploaded Documents</h3></td>
    <td style="text-align:center; background:#e7e7e7;font-weight:bold;">
        @if($check->profile_lock=='0')
        <a href="{{url('edit_update_document')}}/{{$profile_data->student_id}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </td>
</tr>
<tr>
    <td style="background:#f4f4f4;font-weight:bold;">Passport File:</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr style="background: #f4f4f4;font-weight: bold;">
                <td>File View</td>
                <td>Admission Comment</td>
                <td>Visa Comment</td>
                <td>Status</td>
            </tr>
            @foreach($document_data as $row)
                @if($row->type=='Passport')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_passport<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                {{$row->category}} File View
                            </button>
                            <div id="modal_passport<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/passport/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>
                                @if($row->admission_comment)
                                    {{$row->admission_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            <p>
                                @if($row->visa_comment)
                                    {{$row->visa_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            @if(($row->admission_status=='1') || ($row->visa_status=='1'))
                                <span class="badge-success" style="padding:10px;"><i class="fa fa-check"></i> File Success</span>
                            @endif
                            @if(($row->admission_status=='0') && ($row->visa_status=='0') )
                                <span class="badge-warning" style="padding:10px;"> File Checking Pending</span>
                            @endif
                            @if(($row->admission_status=='2') ||($row->visa_status=='2'))
                                <span class="badge-danger" style="padding:10px;"><i class="fa fa-close"></i> File Reject</span>
                            @endif

                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </td>
</tr>
<tr>
    <td style="background:#f4f4f4;font-weight:bold;">Birth Certificate File:</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr style="background: #f4f4f4;font-weight: bold;">
                <td>File View</td>
                <td>Admission Comment</td>
                <td>Visa Comment</td>
                <td>Status</td>
            </tr>
            @foreach($document_data as $row)
                @if($row->type=='Birth Certificate')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_birth<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                {{$row->category}} File View
                            </button>
                            <div id="modal_birth<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/birth_certificate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>
                                @if($row->admission_comment)
                                    {{$row->admission_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            <p>
                                @if($row->visa_comment)
                                    {{$row->visa_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            @if(($row->admission_status=='1') || ($row->visa_status=='1'))
                                <span class="badge-success" style="padding:10px;"><i class="fa fa-check"></i> File Success</span>
                            @endif
                            @if(($row->admission_status=='0') && ($row->visa_status=='0') )
                                <span class="badge-warning" style="padding:10px;"> File Checking Pending</span>
                            @endif
                            @if(($row->admission_status=='2') ||($row->visa_status=='2'))
                                <span class="badge-danger" style="padding:10px;"><i class="fa fa-close"></i> File Reject</span>
                            @endif

                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </td>
</tr>
<tr>
    <td style="background:#f4f4f4;font-weight:bold;">CV File:</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr style="background: #f4f4f4;font-weight: bold;">
                <td>File View</td>
                <td>Admission Comment</td>
                <td>Visa Comment</td>
                <td>Status</td>
            </tr>
            @foreach($document_data as $row)
                @if($row->type=='CV')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_cv<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                {{$row->category}} File View
                            </button>
                            <div id="modal_cv<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/cv/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>
                                @if($row->admission_comment)
                                    {{$row->admission_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            <p>
                                @if($row->visa_comment)
                                    {{$row->visa_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            @if(($row->admission_status=='1') || ($row->visa_status=='1'))
                                <span class="badge-success" style="padding:10px;"><i class="fa fa-check"></i> File Success</span>
                            @endif
                            @if(($row->admission_status=='0') && ($row->visa_status=='0') )
                                <span class="badge-warning" style="padding:10px;"> File Checking Pending</span>
                            @endif
                            @if(($row->admission_status=='2') ||($row->visa_status=='2'))
                                <span class="badge-danger" style="padding:10px;"><i class="fa fa-close"></i> File Reject</span>
                            @endif

                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </td>
</tr>

<tr>
    <td style="background:#f4f4f4;font-weight:bold;">Passport Size Image File:</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr style="background: #f4f4f4;font-weight: bold;">
                <td>File View</td>
                <td>Admission Comment</td>
                <td>Visa Comment</td>
                <td>Status</td>
            </tr>
            @foreach($document_data as $row)
                @if($row->type=='Profile')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_profile<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                {{$row->category}} File View
                            </button>
                            <div id="modal_profile<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} Image File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>
                                @if($row->admission_comment)
                                    {{$row->admission_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            <p>
                                @if($row->visa_comment)
                                    {{$row->visa_comment}}
                                @else
                                    <span> No comments here ...</span>
                                @endif
                            </p>
                        </td>
                        <td>
                            @if(($row->admission_status=='1') || ($row->visa_status=='1'))
                                <span class="badge-success" style="padding:10px;"><i class="fa fa-check"></i> File Success</span>
                            @endif
                            @if(($row->admission_status=='0') && ($row->visa_status=='0') )
                                <span class="badge-warning" style="padding:10px;"> File Checking Pending</span>
                            @endif
                            @if(($row->admission_status=='2') ||($row->visa_status=='2'))
                                <span class="badge-danger" style="padding:10px;"><i class="fa fa-close"></i> File Reject</span>
                            @endif

                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </td>
</tr>
