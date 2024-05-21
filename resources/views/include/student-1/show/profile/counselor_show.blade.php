<div class="table-responsive">
    <form action="{{url('comment_store')}}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Personal Information</h3></td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;width:15%;">First Name:</td>
                <td>
                    @if($profile_data->f_name==false)
                        -
                    @else
                        {{$profile_data->f_name}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;width:15%;">Middle Name:</td>
                <td>
                    @if($profile_data->m_name==false)
                        -
                    @else
                        {{$profile_data->m_name}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;width:15%;">Last Name:</td>
                <td>
                    @if($profile_data->l_name==false)
                        -
                    @else
                        {{$profile_data->l_name}}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">DoB:</td>
                <td>
                    @if($profile_data->dob==false)
                        -
                    @else
                        {{$profile_data->dob}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;">First Language:</td>
                <td>
                    @if($profile_data->first_language==false)
                        -
                    @else
                        {{$profile_data->first_language}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;">Citizenship:</td>
                <td>
                    @if($profile_data->citizenship==false)
                        -
                    @else
                        {{$profile_data->citizenship}}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Passport No:</td>
                <td>
                    @if($profile_data->passport_no==false)
                        -
                    @else
                        {{$profile_data->passport_no}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;">Passport Exp Date:</td>
                <td>
                    @if($profile_data->passport_exp==false)
                        -
                    @else
                        {{$profile_data->passport_exp}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;">Marital Status:</td>
                <td>
                    @if($profile_data->marital_status==false)
                        -
                    @else
                        {{$profile_data->marital_status}}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Gender:</td>
                <td>
                    @if($profile_data->gender==false)
                        -
                    @else
                        {{$profile_data->gender}}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold; font-size:18px; color:red;">Comment:</td>
                <td colspan="5">
                    <textarea name="personal_info_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->personal_info_comment}}</textarea>
                    <input type="hidden" name="student_id" value="{{$profile_data->student_id}}">
                </td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Education Summary</h3></td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Country of Education:</td>
                <td>{{$profile_data->education_country}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Highest Level of Education:</td>
                <td>{{$profile_data->education_level}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Grading Scheme:</td>
                <td>
                    @if($profile_data->grading_scheme=='Secondary_Education_Letter_Scale')
                        Secondary Education Letter Scale F - A+
                    @endif
                    @if($profile_data->grading_scheme=='Secondary_Education_Percentage_Scale')
                        Secondary Education Percentage Scale 0-100
                    @endif
                    @if($profile_data->grading_scheme=='Secondary_Education_Grade_Point')
                        Secondary Education Grade Point 5.0 Scale
                    @endif
                    @if($profile_data->grading_scheme=='Other')
                        Other
                    @endif
                </td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Grade Average:</td>
                <td>{{$profile_data->grade_avg}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Grade Scale:</td>
                <td>{{$profile_data->grade_scale}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Grade Institution:</td>
                <td>{{$profile_data->grade_institute}}</td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                <td colspan="5">
                    <textarea name="education_summary_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->education_summary_comment}}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>Schools Attended</h3></td>
            </tr>
            @foreach($education_data as $row)
                <tr>
                    <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
                    <td>
                        @if($row->institution_country==false)
                            -
                        @else
                            {{$row->institution_country}}
                        @endif
                    </td>
                    <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
                    <td>
                        @if($row->institution_name==false)
                            -
                        @else
                            {{$row->institution_name}}
                        @endif
                    </td>
                    <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
                    <td>
                        @if($row->education_level==false)
                            -
                        @else
                            {{$row->education_level}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
                    <td>
                        @if($row->institution_country==false)
                            -
                        @else
                            {{$row->institution_country}}
                        @endif
                    </td>
                    <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
                    <td>
                        @if($row->institution_name==false)
                            -
                        @else
                            {{$row->institution_name}}
                        @endif
                    </td>
                    <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
                    <td>
                        @if($row->institution_country==false)
                            -
                        @else
                            {{$row->education_level}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
                    <td>
                        @if($row->institution_degree==false)
                            -
                        @else
                            {{$row->institution_degree}}
                        @endif
                    </td>
                    <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
                    <td>
                        @if($row->institution_address==false)
                            -
                        @else
                            {{$row->institution_address}}
                        @endif
                    </td>
                    <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
                    <td>
                        @if($row->institution_city==false)
                            -
                        @else
                            {{$row->institution_city}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
                    <td>
                        @if($row->institution_province==false)
                            -
                        @else
                            {{$row->institution_province}}
                        @endif
                    </td>
                    <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
                    <td>
                        @if($row->institution_zip==false)
                            -
                        @else
                            {{$row->institution_zip}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
                    <td colspan="5">
                        @foreach($document_data as $result)
                            @if(($row->education_level)==($result->type))
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                        class="icon-file-pdf ml-2"></i> File View
                                </button>
                            @endif
                            <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">.
                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <br> <br>
                        @if($profile_data->university_comment==true)
                            <span style="font-weight:bold;color:red;">Note:</span>
                            <p>{{$profile_data->university_comment}}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="7"></td>
                </tr>
            @endforeach
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                <td colspan="5">
                    <textarea name="school_attended_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->school_attended_comment}}</textarea></td>
            </tr>
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
                        @foreach($document_data as $result)
                            @if($result->type=='IELTS')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                        class="icon-file-pdf ml-2"></i> File View
                                </button>
                            @endif
                            <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">.
                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                =="TOEFL")
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
                        @foreach($document_data as $result)
                            @if($result->type=='TOEFL')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                        class="icon-file-pdf ml-2"></i> File View
                                </button>
                            @endif
                            <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">.
                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                    <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
                    <td colspan="5">
                        @foreach($document_data as $result)
                            @if($result->type=='PTE')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                        class="icon-file-pdf ml-2"></i> File View
                                </button>
                            @endif
                            <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">.
                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                    <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
                    <td colspan="5">
                        @foreach($document_data as $result)
                            @if($result->type=='Duolingo')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                        class="icon-file-pdf ml-2"></i> File View
                                </button>
                            @endif
                            <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">.
                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                <td style="background:#f4f4f4;font-weight:bold; font-size:18px; color:red;">Comment:</td>
                <td colspan="6">
                    <textarea name="test_score_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->test_score_comment}}</textarea></td>
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
                        @foreach($document_data as $result)
                            @if($result->type=='GRE')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                        class="icon-file-pdf ml-2"></i> File View
                                </button>
                            @endif
                            <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">.
                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                    <td style="background:#f4f4f4;font-weight:bold;">Uploaded File:</td>
                    <td colspan="5">
                        @foreach($document_data as $result)
                            @if($result->type=='GMAT')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                        class="icon-file-pdf ml-2"></i> File View
                                </button>
                            @endif
                            <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">.
                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                <td colspan="6">
                    <textarea name="additional_qualification_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                              placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->additional_qualification_comment}}</textarea></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Background Information</h3></td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Have you been refused a visa from Canada,<br> the USA, the United Kingdom,<br> New Zealand, Australia or Ireland?</td>
                <td>
                    @if($profile_data->visa_refused==false)
                        -
                    @else
                        {{$profile_data->visa_refused}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;">Do you have a valid Study Permit / Visa?:</td>
                <td>
                    @if($profile_data->permit==false)
                        -
                    @else
                        {{$profile_data->permit}}
                    @endif
                </td>
                <td style="background:#f4f4f4;font-weight:bold;"> Details:</td>
                <td>
                    @if($profile_data->more_details==false)
                        -
                    @else
                        {{$profile_data->more_details}}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                <td colspan="6">
                    <textarea name="background_information_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                              placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->background_information_comment}}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Documents Images</td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Passport File</td>
                <td colspan="5">
                    @foreach($document_data as $row)
                        @if($row->type=='Passport')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                File View
                            </button>
                        @endif
                        <div id="modal_theme_primary<?php echo $row->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Primary header</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">.
                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <textarea name="passport_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;"
                              placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->passport_comment}}</textarea>
                </td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">NID File:</td>
                <td colspan="5">
                    @foreach($document_data as $row)
                        @if($row->type=='NID')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                File View
                            </button>
                        @endif
                        <div id="modal_theme_primary<?php echo $row->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Primary header</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">.
                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <textarea name="ssc_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;"
                              placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->ssc_comment}}</textarea>
                </td>
            </tr>
            @if(Auth::user()->role==='Counselor')
                <tr>
                    <td></td>
                    <td colspan="7">
                        @if($profile_data==true)
                            <button type="submit" class="btn btn-lg btn-info" style="border-radius:0px;"><i class="fa fa-check"></i> Comment Submit</button>
                        @else
                            <button type="submit" disabled class="btn btn-lg btn-info" style="border-radius:0px;"><i class="fa fa-check"></i> Comment Submit</button>
                        @endif
                    </td>
                </tr>
            @endif
        </table>
    </form>
</div>
