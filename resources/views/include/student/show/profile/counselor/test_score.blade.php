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
        <td style="background:#f4f4f4;font-weight:bold;">IELTS Uploaded File:</td>
        <td colspan="5">
            @foreach($document_data as $result)
                @if($result->type=='IELTS')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_ielts<?php echo $result->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i> {{$result->category}} File View</button>
                @endif
                <div id="modal_theme_ielts<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h6 class="modal-title">{{$result->category}} {{$result->category}} File</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ url('upload/ielts/'.$result->file_name) }}" download>
                                    <embed src="{{ url('upload/ielts/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                </a>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
            @foreach($document_data as $result)
                @if($result->type=='TOEFL')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_toefl<?php echo $result->id; ?>" style="border-radius:0px;"><i
                            class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                    </button>
                @endif
                <div id="modal_theme_toefl<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h6 class="modal-title">{{$result->category}} File</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ url('upload/toefl/'.$result->file_name) }}" download>
                                    <embed src="{{ url('upload/toefl/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                </a>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        <td style="background:#f4f4f4;font-weight:bold;">PTE Uploaded File:</td>
        <td colspan="5">
            @foreach($document_data as $result)
                @if($result->type=='PTE')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_pte<?php echo $result->id; ?>" style="border-radius:0px;"><i
                            class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                    </button>
                @endif
                <div id="modal_theme_pte<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h6 class="modal-title">{{$result->category}} File</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ url('upload/pte/'.$result->file_name) }}" download>
                                    <embed src="{{ url('upload/pte/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                </a>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
            @foreach($document_data as $result)
                @if($result->type=='Duolingo')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_duolingo<?php echo $result->id; ?>" style="border-radius:0px;"><i
                            class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                    </button>
                @endif
                <div id="modal_theme_duolingo<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h6 class="modal-title">{{$result->category}} File</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ url('upload/'.$result->file_name) }}" download>
                                    <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                </a>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        <td style="background:#f4f4f4;font-weight:bold;">GRE Uploaded File:</td>
        <td colspan="5">
            @foreach($document_data as $result)
                @if($result->type=='GRE')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_gre<?php echo $result->id; ?>" style="border-radius:0px;"><i
                            class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                    </button>
                @endif
                <div id="modal_theme_gre<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h6 class="modal-title">{{$result->category}} File</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ url('upload/gre/'.$result->file_name) }}" download>
                                    <embed src="{{ url('upload/gre/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                </a>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        <td style="background:#f4f4f4;font-weight:bold;">GMAT Uploaded File:</td>
        <td colspan="5">
            @foreach($document_data as $result)
                @if($result->type=='GMAT')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_gmat<?php echo $result->id; ?>" style="border-radius:0px;"><i
                            class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                    </button>
                @endif
                <div id="modal_theme_gmat<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h6 class="modal-title">{{$result->category}} File</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ url('upload/gmat/'.$result->file_name) }}" download>
                                     <embed src="{{ url('upload/gmat/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                </a>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </td>
    </tr>
@endif

