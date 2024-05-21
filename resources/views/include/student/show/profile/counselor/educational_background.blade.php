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

@if(($profile_data->education_level=="Grade 1")===true || ($profile_data->education_level=="Grade 2")===true || ($profile_data->education_level=="Grade 3")===true || ($profile_data->education_level=="Grade 4")===true || ($profile_data->education_level=="Grade 5")===true || ($profile_data->education_level=="Grade 6")===true || ($profile_data->education_level=="Grade 7")===true || ($profile_data->education_level=="Grade 8")===true || ($profile_data->education_level=="Grade 9")===true || ($profile_data->education_level=="Grade 10")===true)
    <tr>
        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;"><h3> SSC/DHAKIL/A LEVEL (Last Grade) </h3></td>
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
                @foreach($document_data as $result)
                    @if($result->type=='Primary_one')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title"><i class="icon-file-pdf ml-2"></i> {{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/primary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
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
                @foreach($document_data as $result)
                    @if($result->type=='Primary_two')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title"><i class="icon-file-pdf ml-2"></i> {{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/primary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
        </tr>
    @endforeach
@endif

@if(($profile_data->education_level=="Grade 11")===true || ($profile_data->education_level=="Grade 12")===true )
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
                @foreach($document_data as $result)
                    @if($result->type=='Primary')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title"> {{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/primary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
            <td style="background:#f4f4f4;font-weight:bold;">Bachelor Uploaded File:</td>
            <td colspan="5">
                @foreach($document_data as $result)
                    @if($result->type=='Secondary')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_secondary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_secondary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/secondary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/secondary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
        </tr>
    @endforeach
@endif

@if(($profile_data->education_level=="1-Year Post-Secondary Certificate")===true || ($profile_data->education_level=="2-Year Undergraduate Diploma")===true || ($profile_data->education_level=="3-Year Undergraduate Advanced Diploma")===true || ($profile_data->education_level=="3-Year Bachalors Degree")===true || ($profile_data->education_level=="4-Year Bachalors Degree")===true)
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
            <td style="background:#f4f4f4;font-weight:bold;">Masters Uploaded File:</td>
            <td colspan="5">
                @foreach($document_data as $result)
                    @if($result->type=='Primary')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/primary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
            <td style="background:#f4f4f4;font-weight:bold;">Secondary Uploaded File:</td>
            <td colspan="5">
                @foreach($document_data as $result)
                    @if($result->type=='Secondary')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_secondary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_secondary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/secondary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/secondary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
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
            <td style="background:#f4f4f4;font-weight:bold;">Undergraduate Uploaded File:</td>
            <td colspan="5">
                @foreach($document_data as $result)
                    @if($result->type=='Undergraduate')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_undergraduate<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_undergraduate<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/undergraduate/'.$result->file_name) }}" download>
                                         <embed src="{{ url('upload/undergraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
        </tr>
    @endforeach
@endif

@if(($profile_data->education_level=="Postgraduate Certificate/Diploma")===true || ($profile_data->education_level=="Master Degree")===true || ($profile_data->education_level=="Doctoral Degree (Phd, M.D . .)")===true)
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
                @foreach($document_data as $result)
                    @if($result->type=='Primary')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/primary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                @foreach($document_data as $result)
                    @if($result->type=='Secondary')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_secondary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_secondary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/secondary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/secondary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
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
                @foreach($document_data as $result)
                    @if($result->type=='Undergraduate')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_undergraduate<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_undergraduate<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/undergraduate/'.$result->file_name) }}" download>
                                         <embed src="{{ url('upload/undergraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
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
                @foreach($document_data as $result)
                    @if($result->type=='Postgraduate')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_postgraduate<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_postgraduate<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/postgraduate/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/postgraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
        </tr>
    @endforeach
@endif

@if(($profile_data->education_level=="Double Master Degree")===true)
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
                @foreach($document_data as $result)
                    @if($result->type=='Double Masters')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_primary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/primary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/primary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
                @foreach($document_data as $result)
                    @if($result->type=='Secondary')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_secondary<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_secondary<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/secondary/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/secondary/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
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
                @foreach($document_data as $result)
                    @if($result->type=='Undergraduate')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_undergraduate<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_undergraduate<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/undergraduate/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/undergraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
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
                @foreach($document_data as $result)
                    @if($result->type=='Postgraduate')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_postgraduate<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_postgraduate<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/postgraduate/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/postgraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
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
                @foreach($document_data as $result)
                    @if($result->type=='Double Postgraduate')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_postgraduate<?php echo $result->id; ?>" style="border-radius:0px;"><i
                                class="icon-file-pdf ml-2"></i> {{$result->category}} File View
                        </button>
                    @endif
                    <div id="modal_theme_postgraduate<?php echo $result->id; ?>" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h6 class="modal-title">{{$result->category}} File</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <a href="{{ url('upload/double_postgraduate/'.$result->file_name) }}" download>
                                        <embed src="{{ url('upload/double_postgraduate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
        <tr>
            <td colspan="7"></td>
        </tr>
    @endforeach
@endif
