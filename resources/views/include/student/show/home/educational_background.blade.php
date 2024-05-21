<tr>
    <td colspan="5" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Education Summary</h3></td>
    <td style="text-align:center; background:#e7e7e7;font-weight:bold;">
        @if($check->profile_lock=='0')
        <a href="{{url('edit_education_summary')}}/{{$profile_data->student_id}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </td>
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
@if(($profile_data->education_level=="Grade 1") || ($profile_data->education_level=="Grade 2") || ($profile_data->education_level=="Grade 3") || ($profile_data->education_level=="Grade 4") || ($profile_data->education_level=="Grade 5") || ($profile_data->education_level=="Grade 6") || ($profile_data->education_level=="Grade 7") || ($profile_data->education_level=="Grade 8") || ($profile_data->education_level=="Grade 9") || ($profile_data->education_level=="Grade 10") )
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>SSC/DHAKIL/A LEVEL (Last Grade)</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->primary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->primary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->primary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->primary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->primary_institution_zip}}</td>
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
                        @if($row->type=='Primary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>SSC/DHAKIL/A LEVEL (Previous Last Grade)</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->primary_two_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->primary_two_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->primary_two_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->primary_two_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->primary_two_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->primary_two_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->primary_two_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->primary_two_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->primary_two_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->primary_two_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->primary_two_institution_zip}}</td>
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
                        @if($row->type=='Primary_two')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
@endif

@if(($profile_data->education_level=="Grade 11") || ($profile_data->education_level=="Grade 12") )
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>SSC/DHAKIL/A LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->primary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->primary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->primary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->primary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->primary_institution_zip}}</td>
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
                        @if($row->type=='Primary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>HSC/ALIM/O LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->secondary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->secondary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->secondary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->secondary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->secondary_institution_zip}}</td>
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
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
@endif

@if(($profile_data->education_level=="1-Year Post-Secondary Certificate") || ($profile_data->education_level=="2-Year Undergraduate Diploma") || ($profile_data->education_level=="3-Year Undergraduate Advanced Diploma") || ($profile_data->education_level=="3-Year Bachalors Degree") || ($profile_data->education_level=="4-Year Bachalors Degree"))
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>SSC/DHAKIL/A LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->primary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->primary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->primary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->primary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->primary_institution_zip}}</td>
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
                        @if($row->type=='Primary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
            <td colspan="7"></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>HSC/ALIM/O LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->secondary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->secondary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->secondary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->secondary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->secondary_institution_zip}}</td>
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
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>Diploma/BSC</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->undergraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->undergraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->undergraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->undergraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->undergraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->undergraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->undergraduate_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->undergraduate_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->undergraduate_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->undergraduate_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->undergraduate_institution_zip}}</td>
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
                        @if($row->type=='Undergraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/undergarduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
@endif

@if(($profile_data->education_level=="Postgraduate Certificate/Diploma") || ($profile_data->education_level=="Master Degree") || ($profile_data->education_level=="Doctoral Degree (Phd, M.D . .)"))
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>SSC/DHAKIL/A LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->primary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->primary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->primary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->primary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->primary_institution_zip}}</td>
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
                        @if($row->type=='Primary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
            <td colspan="7"></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>HSC/ALIM/O LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->secondary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->secondary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->secondary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->secondary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->secondary_institution_zip}}</td>
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
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>Diploma/BSC</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->undergraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->undergraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->undergraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->undergraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->undergraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->undergraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->undergraduate_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->undergraduate_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->undergraduate_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->undergraduate_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->undergraduate_institution_zip}}</td>
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
                        @if($row->type=='Undergraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/undergraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach

    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>MASTERS</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->postgraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->postgraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->postgraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->postgraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->postgraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->postgraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->postgraduate_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->postgraduate_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->postgraduate_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->postgraduate_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->postgraduate_institution_zip}}</td>
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
                        @if($row->type=='Postgraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/postgraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
@endif

@if(($profile_data->education_level=="Double Master Degree"))
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>SSC/DHAKIL/A LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->primary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->primary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->primary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->primary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->primary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->primary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->primary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->primary_institution_zip}}</td>
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
                        @if($row->type=='Primary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
            <td colspan="7"></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>HSC/ALIM/O LEVEL</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->secondary_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->secondary_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->secondary_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->secondary_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->secondary_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->secondary_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->secondary_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->secondary_institution_zip}}</td>
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
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>Diploma/BSC</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->undergraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->undergraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->undergraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->undergraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->undergraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->undergraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->undergraduate_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->undergraduate_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->undergraduate_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->undergraduate_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->undergraduate_institution_zip}}</td>
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
                        @if($row->type=='Undergraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/undergraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach

    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>MASTERS</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->postgraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->postgraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->postgraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->postgraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->postgraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->postgraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->postgraduate_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->postgraduate_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->postgraduate_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->postgraduate_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->postgraduate_institution_zip}}</td>
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
                        @if($row->type=='Postgraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/postgraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach

    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3>DOUBLE MASTERS</h3></td>
    </tr>
    @foreach($education_data as $row)
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
            <td>{{$row->double_postgraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
            <td>{{$row->double_postgraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
            <td>{{$row->double_postgraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
            <td>{{$row->double_postgraduate_institution_country}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
            <td>{{$row->double_postgraduate_institution_name}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
            <td>{{$row->double_postgraduate_education_level}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
            <td>{{$row->double_postgraduate_institution_degree}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
            <td>{{$row->double_postgraduate_institution_address}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
            <td>{{$row->double_postgraduate_institution_city}}</td>
        </tr>
        <tr>
            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
            <td>{{$row->double_postgraduate_institution_province}}</td>
            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
            <td>{{$row->double_postgraduate_institution_zip}}</td>
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
                        @if($row->type=='Double Master Degree')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ url('upload/double_postgraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    @endforeach
@endif

<tr>
    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
    <td colspan="6">
        <table class="table table-bordered">
            <tr style="background:#f4f4f4;font-weight:bold;">
                <td width="50%">Admission Comment</td>
                <td width="50%">Visa Comment</td>
            </tr>
            <tr>
                <td>
                    @if($profile_data->education_summary_admission_comment==true)
                        <p>{{$profile_data->personal_info_admission_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
                <td>
                    @if($profile_data->education_summary_visa_comment==true)
                        <p>{{$profile_data->personal_info_visa_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
            </tr>

        </table>
    </td>
</tr>
