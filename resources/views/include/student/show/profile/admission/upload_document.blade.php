<tr>
    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h4 style="font-weight:bold;">Documents Images</h4></td>
</tr>
<tr>
    <td style="background:#f4f4f4;font-weight:bold;">Passport File</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr>
                <td style="background:gray;color:white;width:25%!important;">File View</td>
                <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Status</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
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
                                            <a href="{{ url('upload/passport/'.$row->file_name) }}" download>
                                                <embed src="{{ url('upload/passport/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                            </a>
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
                        <td>
                            @if(($row->admission_status=='1') || ($row->admission_status=='2'))
                                -
                            @endif

                            @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                <button class="btn btn-success" data-toggle="modal" data-target=".successModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target=".rejectModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                            @endif
                        </td>
                        <div class="modal fade successModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="1">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade rejectModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="2">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Reject</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
            <tr>
                <td style="background:gray;color:white;width:25%!important;">File View</td>
                <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Status</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
            </tr>
            @foreach($document_data as $row)
                @if($row->type=='Birth Certificate')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_bc<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                {{$row->category}} File View
                            </button>
                            <div id="modal_bc<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <a href="{{ url('upload/birth_certificate/'.$row->file_name) }}" download>
                                                <embed src="{{ url('upload/birth_certificate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                            </a>
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
                        <td>
                            @if(($row->admission_status=='1') || ($row->admission_status=='2'))
                                -
                            @endif
                            @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                <button class="btn btn-success" data-toggle="modal" data-target=".successBCModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target=".rejectBCModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                            @endif
                        </td>
                        <div class="modal fade successBCModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="1">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade rejectBCModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="2">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Reject</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
            <tr>
                <td style="background:gray;color:white;width:25%!important;">File View</td>
                <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Status</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
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
                                            <a href="{{ url('upload/cv/'.$row->file_name) }}" download>
                                                <embed src="{{ url('upload/cv/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                            </a>
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
                        <td>
                            @if(($row->admission_status=='1') || ($row->admission_status=='2'))
                                -
                            @endif
                            @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                <button class="btn btn-success" data-toggle="modal" data-target=".successCVModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target=".rejectCVModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                            @endif
                        </td>
                        <div class="modal fade successCVModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="1">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade rejectCVModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="2">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Reject</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
            <tr>
                <td style="background:gray;color:white;width:25%!important;">File View</td>
                <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Status</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
            </tr>
            @foreach($document_data as $row)
                @if($row->type=='Profile')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_profile<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                {{$row->category}} Image View
                            </button>
                            <div id="modal_profile<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                             <a href="{{ url('upload/'.$row->file_name) }}" download>
                                                <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                            </a>
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
                        <td>
                            @if(($row->admission_status=='1') || ($row->admission_status=='2'))
                                -
                            @endif
                            @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                <button class="btn btn-success" data-toggle="modal" data-target=".successProfileModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target=".rejectProfileModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                            @endif
                        </td>
                        <div class="modal fade successProfileModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="1">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade rejectProfileModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                            <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{url('admission_section_comment_store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                            <label>Comment:</label>
                                            <textarea name="admission_comment" style="width:100%;"></textarea>
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="status" value="2">
                                        </div>
                                        <div class="modal-footer" style="border-top:1px solid grey;">
                                            <button type="submit" class="btn btn-lg btn-teal mt-2" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Reject</button>
                                            <button type="button" class="btn btn-lg btn-danger mt-2" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endif
            @endforeach
        </table>
    </td>
</tr>

