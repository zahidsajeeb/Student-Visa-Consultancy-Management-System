<tr>
    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Test Scores</h3></td>
</tr>
@if($profile_data->test_score_type=="IELTS")
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">IELTS Exam Date:</td>
        <td>{{$profile_data->ielts_exam_date}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Reading Score:</td>
        <td>{{$profile_data->ielts_reading_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Listening Score:</td>
        <td>{{$profile_data->ielts_listening_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Speaking Score:</td>
        <td>{{$profile_data->ielts_speaking_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Writing Score:</td>
        <td>{{$profile_data->ielts_writing_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr>
                    <td style="background:gray;color:white;width:25%!important;">File View</td>
                    <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                    <td style="background:gray;color:white;width:20%!important;">Status</td>
                    <td style="background:gray;color:white;width:20%!important;">Action</td>
                </tr>
                @foreach($document_data as $row)
                    @if($row->type=='IELTS')
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_ielts<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                    {{$row->category}} File View
                                </button>
                                <div id="modal_ielts<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ url('upload/ielts/'.$row->file_name) }}}" download>
                                                    <embed src="{{ url('upload/ielts/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successIeltsModal" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectIeltsModal" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                @endif
                            </td>
                            <div class="modal fade successIeltsModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
                            <div class="modal fade rejectIeltsModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
@endif
@if($profile_data->test_score_type=='TOEFL')
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">TOEFL Exam Date:</td>
        <td>{{$profile_data->toefl_exam_date}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Reading Score:</td>
        <td>{{$profile_data->toefl_reading_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Listening Score:</td>
        <td>{{$profile_data->toefl_listening_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Speaking Score:</td>
        <td>{{$profile_data->toefl_speaking_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Writing Score:</td>
        <td>{{$profile_data->toefl_writing_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr>
                    <td style="background:gray;color:white;width:25%!important;">File View</td>
                    <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                    <td style="background:gray;color:white;width:20%!important;">Status</td>
                    <td style="background:gray;color:white;width:20%!important;">Action</td>
                </tr>
                @foreach($document_data as $row)
                    @if($row->type=='TOEFL')
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_toefl<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                    {{$row->category}} File View
                                </button>
                                <div id="modal_toefl<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ url('upload/toefl/'.$row->file_name) }}" download>
                                                    <embed src="{{ url('upload/toefl/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successToeflModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectToeflModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                @endif
                            </td>
                            <div class="modal fade successToeflModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
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
                            <div class="modal fade rejectToeflModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
@endif
@if($profile_data->test_score_type=="PTE")
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">PTE Exam Date:</td>
        <td>{{$profile_data->pte_exam_date}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Reading Score:</td>
        <td>{{$profile_data->pte_reading_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Listening Score:</td>
        <td>{{$profile_data->pte_listening_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Speaking Score:</td>
        <td>{{$profile_data->pte_speaking_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Writing Score:</td>
        <td>{{$profile_data->pte_writing_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Score:</td>
        <td>{{$profile_data->pte_total_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr>
                    <td style="background:gray;color:white;width:25%!important;">File View</td>
                    <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                    <td style="background:gray;color:white;width:20%!important;">Status</td>
                    <td style="background:gray;color:white;width:20%!important;">Action</td>
                </tr>
                @foreach($document_data as $row)
                    @if($row->type=='PTE')
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_pte<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                    {{$row->category}} File View
                                </button>
                                <div id="modal_pte<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ url('upload/pte/'.$row->file_name) }}" download>
                                                    <embed src="{{ url('upload/pte/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successPteModal" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectIePteModal" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                @endif
                            </td>
                            <div class="modal fade successPteModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
                            <div class="modal fade rejectPteModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
@endif
@if($profile_data->test_score_type=="Duolingo")
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Duolingo Exam Date:</td>
        <td>{{$profile_data->duolingo_exam_date}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Score:</td>
        <td>{{$profile_data->duolingo_total_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr>
                    <td style="background:gray;color:white;width:25%!important;">File View</td>
                    <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                    <td style="background:gray;color:white;width:20%!important;">Status</td>
                    <td style="background:gray;color:white;width:20%!important;">Action</td>
                </tr>
                @foreach($document_data as $row)
                    @if($row->type=='Duolingo')
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_duolingo<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                    {{$row->category}} File View
                                </button>
                                <div id="modal_duolingo<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ url('upload/duolingo/'.$row->file_name) }}" download>
                                                    <embed src="{{ url('upload/duolingo/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                @if(($row->admission_status=='0') && ($row->visa_status=='0'))
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
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successDuolingoModal" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectDuolingoModal" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                @endif
                            </td>
                            <div class="modal fade successDuolingoModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
                            <div class="modal fade rejectDuolingoModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
@endif
@if($profile_data->test_score_type=="I don't have this")
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Test Score Type:</td>
        <td>{{$profile_data->test_score_type}}</td>
    </tr>
@endif
@if($profile_data->test_score_type=="Not yet, but I will in the future")
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Test Score Type:</td>
        <td>{{$profile_data->test_score_type}}</td>
    </tr>
@endif

<tr>
    <td style="background:#f4f4f4;font-weight:bold;color:red;">Comment:</td>
    <td colspan="6">
        <table class="table table-bordered">
            <tr>
                <td style="background:gray;color:white;width:25%!important;">Test Score Comment</td>
                <td style="background:gray;color:white;width:25%!important;">Admission Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
            </tr>
            <form action="{{url('test_score_admission_comment_store')}}" method="post">
                @csrf
                <tr>
                    <td>
                        <p>
                            @if($profile_data->test_score_admission_comment)
                                {{$profile_data->test_score_admission_comment}}
                            @else
                                <span> No comments here ...</span>
                            @endif
                        </p>
                    </td>
                    <td>
                        <textarea name="test_score_admission_comment" style="width:100%;height:100px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . ."></textarea>
                        <input type="hidden" name="id" value="{{$profile_data->id}}">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success" style="border-radius:0px;"><i class="fa fa-check"></i> Submit</button>
                    </td>
                </tr>
            </form>
        </table>
</tr>

<tr>
    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Additional Qualifications</td>
</tr>
@if(isset($profile_data->gre_exam_date)!=0)
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">GRE Exam Date:</td>
        <td>
            {{$profile_data->gre_exam_date}}
        </td>
        <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
        <td>
            {{$profile_data->gre_verval_score}}
        </td>
        <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
        <td>
            {{$profile_data->gre_quantitative_score}}
        </td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">AWA:</td>
        <td>
            {{$profile_data->gre_awa_score}}
        </td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr>
                    <td style="background:gray;color:white;width:25%!important;">File View</td>
                    <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                    <td style="background:gray;color:white;width:20%!important;">Status</td>
                    <td style="background:gray;color:white;width:20%!important;">Action</td>
                </tr>
                @foreach($document_data as $row)
                    @if($row->type=='GRE')
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_gre<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                    {{$row->category}} File View
                                </button>
                                <div id="modal_gre<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ url('upload/gre/'.$row->file_name) }}" download>
                                                    <embed src="{{ url('upload/gre/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successGreModal" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectGreModal" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                @endif
                            </td>
                            <div class="modal fade successGreModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
                            <div class="modal fade rejectGreModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
@endif
@if(isset($profile_data->gmat_exam_date)!=0)
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">GMAT Exam Date:</td>
        <td>
            @if($profile_data->gmat_exam_date==false)
                -
            @else
                {{$profile_data->gmat_exam_date}}
            @endif
        </td>
        <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
        <td>
            @if($profile_data->gmat_verval_score==false)
                -
            @else
                {{$profile_data->gmat_verval_score}}
            @endif
        </td>
        <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
        <td>
            @if($profile_data->gmat_quantitative_score==false)
                -
            @else
                {{$profile_data->gmat_quantitative_score}}
            @endif
        </td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">AWA:</td>
        <td>
            @if($profile_data->gmat_awa_score==false)
                -
            @else
                {{$profile_data->gmat_awa_score}}
            @endif
        </td>
        <td style="background:#f4f4f4;font-weight:bold;">Total Score:</td>
        <td>
            @if($profile_data->gmat_total_score==false)
                -
            @else
                {{$profile_data->gmat_total_score}}
            @endif
        </td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr>
                    <td style="background:gray;color:white;width:25%!important;">File View</td>
                    <td style="background:gray;color:white;width:35%!important;">Admission Comment</td>
                    <td style="background:gray;color:white;width:20%!important;">Status</td>
                    <td style="background:gray;color:white;width:20%!important;">Action</td>
                </tr>
                @foreach($document_data as $row)
                    @if($row->type=='GMAT')
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_gmat<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                    {{$row->category}} File View
                                </button>
                                <div id="modal_gmat<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ url('upload/gmat/'.$row->file_name) }}" download>
                                                    <embed src="{{ url('upload/gmat/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successGmatModal" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectGmatModal" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                @endif
                            </td>
                            <div class="modal fade successGmatModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
                            <div class="modal fade rejectGmatModal" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
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
@endif
<tr>
    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
    <td colspan="6">
        <table class="table table-bordered">
            <tr>
                <td style="background:gray;color:white;width:25%!important;">Additional Qualification Comment</td>
                <td style="background:gray;color:white;width:25%!important;">Admission Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
            </tr>
            <form action="{{url('additional_qualification_admission_comment_store')}}" method="post">
                @csrf
                <tr>
                    <td>
                        <p>
                            @if($profile_data->additional_qualification_admission_comment)
                                {{$profile_data->additional_qualification_admission_comment}}
                            @else
                                <span> No comments here ...</span>
                            @endif
                        </p>
                    </td>
                    <td>
                        <textarea name="additional_qualification_admission_comment" style="width:100%;height:100px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . ."></textarea>
                        <input type="hidden" name="id" value="{{$profile_data->id}}">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success" style="border-radius:0px;"><i class="fa fa-check"></i> Submit</button>
                    </td>
                </tr>
            </form>
        </table>
    </td>
</tr>
