<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Personal Information</h3></td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">First Name:</td>
            <td>{{$profile_data->f_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Middle Name:</td>
            <td>{{$profile_data->m_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Last Name:</td>
            <td>{{$profile_data->l_name}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">DoB:</td>
            <td>{{$profile_data->dob}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">First Language:</td>
            <td>{{$profile_data->first_language}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Citizenship:</td>
            <td>{{$profile_data->citizenship}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Passport No:</td>
            <td>{{$profile_data->passport_no}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Passport Exp Date:</td>
            <td>{{$profile_data->passport_exp}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Marital Status:</td>
            <td>{{$profile_data->marital_status}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Gender:</td>
            <td>{{$profile_data->gender}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
            <td colspan="5">
                @if($profile_data->personal_info_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->personal_info_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
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
            <td>
                @if(isset($profile_data->grade_avg_1)===true)
                    {{$profile_data->grade_avg_1}}
                @endif
                @if(isset($profile_data->grade_avg_2)===true)
                    {{$profile_data->grade_avg_2}}
                @endif
                @if(isset($profile_data->grade_avg_3)===true)
                    {{$profile_data->grade_avg_3}}
                @endif
                @if(isset($profile_data->grade_avg_4)===true)
                    {{$profile_data->grade_avg_4}}
                @endif
                @if(isset($profile_data->grade_avg_5)===true)
                    {{$profile_data->grade_avg_5}}
                @endif
                @if(isset($profile_data->grade_avg_6)===true)
                    {{$profile_data->grade_avg_6}}
                @endif
                @if(isset($profile_data->grade_avg_7)===true)
                    {{$profile_data->grade_avg_7}}
                @endif
            </td>
            <td style="background:#f4f4f4;font-weight:bold;">Grade Scale:</td>
            <td>{{$profile_data->grade_scale}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Grade Institution:</td>
            <td>{{$profile_data->grade_institute}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
            <td colspan="5">
                @if($profile_data->education_summary_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->education_summary_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>Schools Attended</h3></td>
        </tr>
        @foreach($education_data as $row)
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
                <td>{{$row->institution_country}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
                <td>{{$row->institution_name}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
                <td>{{$row->education_level}}</td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
                <td>{{$row->institution_country}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
                <td>{{$row->institution_name}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
                <td>{{$row->education_level}}</td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
                <td>{{$row->institution_degree}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
                <td>{{$row->institution_address}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
                <td>{{$row->institution_city}}</td>
            </tr>
            <tr>
                <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
                <td>{{$row->institution_province}}</td>
                <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
                <td>{{$row->institution_zip}}</td>
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
            <td colspan="6">
                @if($profile_data->school_attended_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->school_attended_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
            </td>
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
                    <br> <br>
                    @if($profile_data->university_comment==true)
                        <span style="font-weight:bold;color:red;">Note:</span>
                        <p>{{$profile_data->university_comment}}</p>
                    @endif
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
                    <br> <br>
                    @if($profile_data->university_comment==true)
                        <span style="font-weight:bold;color:red;">Note:</span>
                        <p>{{$profile_data->university_comment}}</p>
                    @endif
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
                    <br> <br>
                    @if($profile_data->university_comment==true)
                        <span style="font-weight:bold;color:red;">Note:</span>
                        <p>{{$profile_data->university_comment}}</p>
                    @endif
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
                    <br> <br>
                    @if($profile_data->university_comment==true)
                        <span style="font-weight:bold;color:red;">Note:</span>
                        <p>{{$profile_data->university_comment}}</p>
                    @endif
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
            <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
            <td colspan="6">
                @if($profile_data->test_score_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->test_score_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
            </td>
        </tr>
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
                    <br> <br>
                    @if($profile_data->university_comment==true)
                        <span style="font-weight:bold;color:red;">Note:</span>
                        <p>{{$profile_data->university_comment}}</p>
                    @endif
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
                    <br> <br>
                    @if($profile_data->university_comment==true)
                        <span style="font-weight:bold;color:red;">Note:</span>
                        <p>{{$profile_data->university_comment}}</p>
                    @endif
                </td>
            </tr>
        @endif
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
            <td colspan="6">
                @if($profile_data->additional_qualification_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->additional_qualification_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Background Information</h3></td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;word-break: break-all;">Have you been refused a visa from Canada, <br> the USA, the United Kingdom, New Zealand, <br> Australia or Ireland?</td>
            <td>{{$profile_data->visa_refused}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Do you have a valid Study Permit / Visa?:</td>
            <td>{{$profile_data->permit}}</td>
            <td style="background:#f4f4f4;font-weight:bold;"> Details:</td>
            <td>{{$profile_data->more_details}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
            <td colspan="6">
                @if($profile_data->background_information_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->background_information_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Uploaded Documents</h3></td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Passport File:</td>
            <td colspan="5">
                @foreach($document_data as $row)
                    @if($row->type=='Passport')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                            File View
                        </button>
                    @endif
                    <div id="modal_theme_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">Uploaded File</h6>
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
            </td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
            <td colspan="6">
                @if($profile_data->passport_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->passport_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
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
                <br> <br>
                {{--                                                    <textarea name="hsc_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->hsc_comment}}</textarea>--}}
                @if($profile_data->hsc_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->hsc_comment}}</p>
                @endif
            </td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
            <td colspan="6">
                @if($profile_data->nid_comment==true)
                    <span style="font-weight:bold;color:red;">Note:</span>
                    <p>{{$profile_data->nid_comment}}</p>
                @else
                    <p>N/A</p>
                @endif
            </td>
        </tr>
    </table>
</div>
<div class="row" style="margin-bottom:10px;">
    <div class="col-md-6">
        <h3 style="font-weight:bold; margin-top:35px;"> Important Document:</h3>
        <form action="{{url('important_file_store')}}" method="POST">
            @csrf
            <table class="table table-bordered" id="sample_table">
                <thead>
                <th style="width:20%;">#</th>
                <th style="width:40%;">Required File Name</th>
                <th style="width:40%;">Note</th>
                </thead>
                <tr>
                    <td>1</td>
                    <td>
                        <textarea name="addmore[0][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                        <input type="hidden" name="addmore[0][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red">
                    </td>
                    <td>
                        <textarea name="addmore[0][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                    </td>
                    <td>
                        <button type="button" name="add" id="add_more_sample" class="btn btn-success btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-plug"></i> Add More</button>
                        <br>
                        <button type="submit" class="btn btn-sm btn-info" style="border-radius:0px; margin-top:5px; width:100px;"><i class="fa fa-check"></i> Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-6">
        <h3 style="font-weight:bold; margin-top:35px;"> Important Documents View:</h3>
        <table class="table table-bordered" id="sample_table">
            <thead>
            <th>#</th>
            <th>Required File Name</th>
            <th>Note</th>
            <th>File View</th>
            <th>Action</th>
            </thead>
            @foreach($important_data as $key=>$row)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$row->req_file_name}}</td>
                    <td>{{$row->note}}</td>
                    <td>
                        @if($row->imp_file==true)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                File View
                            </button>
                            <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                            <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {{--                                                                                <embed src="upload/<?php echo $row->imp_file ?>" frameborder="0" width="100%" height="780">--}}
                                            <embed src="{{ url('upload/'.$row->imp_file) }}" frameborder="0" width="100%" height="780">
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
                            <button type="button" data-id="{{$row->id}}" id="delete_file" class="btn btn-danger btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-trash"></i> Delete</button>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
