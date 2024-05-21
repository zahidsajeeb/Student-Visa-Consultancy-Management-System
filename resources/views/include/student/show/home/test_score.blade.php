<tr>
    <td colspan="5" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Test Scores/Additional Qualifications</h3></td>
    <td style="text-align:center; background:#e7e7e7;font-weight:bold;">
        @if($check->profile_lock=='0')
        <a href="{{url('edit_test_score')}}/{{$profile_data->id}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </td>
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
        <td style="background:#f4f4f4;font-weight:bold;">IELTS Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr style="background: #f4f4f4;font-weight: bold;">
                    <td>File View</td>
                    <td>Admission Comment</td>
                    <td>Visa Comment</td>
                    <td>Sttaus</td>
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
                                                <embed src="{{ url('upload/ielts/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
        <td style="background:#f4f4f4;font-weight:bold;">TOEFL Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr style="background: #f4f4f4;font-weight: bold;">
                    <td>File View</td>
                    <td>Admission Comment</td>
                    <td>Visa Comment</td>
                    <td>Status</td>
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
                                                <embed src="{{ url('upload/toefl/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                <tr style="background: #f4f4f4;font-weight: bold;">
                    <td>File View</td>
                    <td>Admission Comment</td>
                    <td>Visa Comment</td>
                    <td>Status</td>
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
                                                <embed src="{{ url('upload/pte/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
@endif
@if($profile_data->test_score_type=="Duolingo")
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Duolingo Exam Date:</td>
        <td>{{$profile_data->duolingo_exam_date}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Score:</td>
        <td>{{$profile_data->duolingo_total_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">Duolingo Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr style="background: #f4f4f4;font-weight: bold;">
                    <td>File View</td>
                    <td>Admission Comment</td>
                    <td>Visa Comment</td>
                    <td>Status</td>
                </tr>
                @foreach($document_data as $row)
                    @if($row->type=='Duolingo')
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
                                                <embed src="{{ url('upload/duolingo/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Additional Qualifications</h3></td>
</tr>
@if(isset($profile_data->gre_exam_date)!=0)
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">GRE Exam Date:</td>
        <td>{{$profile_data->gre_exam_date}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
        <td>{{$profile_data->gre_verval_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
        <td>{{$profile_data->gre_quantitative_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">AWA:</td>
        <td>{{$profile_data->gre_awa_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">GRE Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr style="background: #f4f4f4;font-weight: bold;">
                    <td>File View</td>
                    <td>Admission Comment</td>
                    <td>Visa Comment</td>
                    <td>Status</td>
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
                                                <embed src="{{ url('upload/gre/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
@endif
@if(isset($profile_data->gmat_exam_date)!=0)
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">GMAT Exam Date:</td>
        <td>{{$profile_data->gmat_exam_date}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
        <td>{{$profile_data->gmat_verval_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
        <td>{{$profile_data->gmat_quantitative_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">AWA:</td>
        <td>{{$profile_data->gmat_awa_score}}</td>
        <td style="background:#f4f4f4;font-weight:bold;">Total Score:</td>
        <td>{{$profile_data->gmat_total_score}}</td>
    </tr>
    <tr>
        <td style="background:#f4f4f4;font-weight:bold;">GMAT Uploaded File:</td>
        <td colspan="5">
            <table class="table table-bordered">
                <tr style="background: #f4f4f4;font-weight: bold;">
                    <td>File View</td>
                    <td>Admission Comment</td>
                    <td>Visa Comment</td>
                    <td>Status</td>
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
                                                <embed src="{{ url('upload/gmat/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
@endif
<tr>
    <td style="background:#f4f4f4;font-weight:bold;font-size:18px;">Comment:</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr style="background:#f4f4f4;font-weight:bold;">
                <td>Admission Comment</td>
                <td>Visa Comment</td>
            </tr>
            <tr>
                <td>
                    @if($profile_data->test_score_admission_comment==true)
                        <p>{{$profile_data->test_score_admission_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
                <td>
                    @if($profile_data->test_score_visa_comment==true)
                        <p>{{$profile_data->test_score_visa_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
            </tr>

        </table>
    </td>
</tr>
