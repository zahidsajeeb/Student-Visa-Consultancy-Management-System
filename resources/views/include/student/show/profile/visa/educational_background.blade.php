<?php error_reporting(0);?>
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

@if(($profile_data->education_level=="Grade 1")===true || ($profile_data->education_level=="Grade 2")===true || ($profile_data->education_level=="Grade 3")===true || ($profile_data->education_level=="Grade 4")===true || ($profile_data->education_level=="Grade 5")===true || ($profile_data->education_level=="Grade 6")===true || ($profile_data->education_level=="Grade 7")===true || ($profile_data->education_level=="Grade 8")===true || ($profile_data->education_level=="Grade 9")===true || ($profile_data->education_level=="Grade 10")===true)
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Primary_one')
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
                                                    <a href="{{ url('upload/primary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                        <button class="btn btn-success" data-toggle="modal" data-target=".successPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                    @endif
                                </td>
                                <div class="modal fade successPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
            <td>{{$row->primary_education_level}}</td>
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
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
                                                    <a href="{{ url('upload/primary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                        <button class="btn btn-success" data-toggle="modal" data-target=".successPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                    @endif
                                </td>
                                <div class="modal fade successPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
    @endforeach
@endif

@if(($profile_data->education_level=="Grade 11")===true || ($profile_data->education_level=="Grade 12")===true)
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
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
                                                    <a href="{{ url('upload/primary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_secondary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_secondary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/secondary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
            <td style="background:#f4f4f4;font-weight:bold;">Primary Uploaded File:</td>
            <td colspan="5">
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
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
                                                    <a href="{{ url('upload/primary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_secondary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_secondary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/secondary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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

                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Undergraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_undergraduate<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_undergraduate<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/undergraduate/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/undergraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successUndergraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectUndergraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successUndergraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectUndergraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
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
                                                    <a href="{{ url('upload/primary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_secondary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_secondary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/secondary/'.$row->file_name) }}" download>
                                                         <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Undergraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_undergraduate<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_undergraduate<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/undergraduate/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/undergraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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

                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successUndergraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectUndergraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>

                                        @endif
                                </td>
                                <div class="modal fade successUndergraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectUndergraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Postgraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_postgraduate<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_postgraduate<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i>{{$row->category}} File </h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/postgraduate/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/postgraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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

                                <td>

                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                    <button class="btn btn-success" data-toggle="modal" data-target=".successPostgraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPostgraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                        @endif
                                </td>
                                <div class="modal fade successPostgraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPostgraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
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
                                                    <a href="{{ url('upload/primary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/primary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                        <button class="btn btn-success" data-toggle="modal" data-target=".successPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPrimaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                    @endif
                                </td>
                                <div class="modal fade successPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPrimaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                <table class="table table-bordered">
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Secondary')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_secondary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_secondary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/secondary/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/secondary/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                        <button class="btn btn-success" data-toggle="modal" data-target=".successSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".rejectSecondaryModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                    @endif
                                </td>
                                <div class="modal fade successSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectSecondaryModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Undergraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_undergraduate<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_undergraduate<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> {{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/undergraduate/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/undergraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                        <button class="btn btn-success" data-toggle="modal" data-target=".successUndergraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".rejectUndergraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                    @endif
                                </td>
                                <div class="modal fade successUndergraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectUndergraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Postgraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_postgraduate<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_postgraduate<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i>{{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/postgraduate/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/postgraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>

                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                        <button class="btn btn-success" data-toggle="modal" data-target=".successPostgraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPostgraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                    @endif
                                </td>
                                <div class="modal fade successPostgraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPostgraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                    <tr>
                        <td style="background:gray;color:white;width:25%!important;">File View</td>
                        <td style="background:gray;color:white;width:35%!important;">Visa Comment</td>
                        <td style="background:gray;color:white;width:20%!important;">Status</td>
                        <td style="background:gray;color:white;width:20%!important;">Action</td>
                    </tr>
                    @foreach($document_data as $row)
                        @if($row->type=='Double Postgraduate')
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_postgraduate<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                        {{$row->category}} File View
                                    </button>
                                    <div id="modal_postgraduate<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                    <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i>{{$row->category}} File</h6>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ url('upload/double_postgraduate/'.$row->file_name) }}" download>
                                                        <embed src="{{ url('upload/double_postgraduate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
                                <td>
                                    @if(($row->visa_status=='1') || ($row->visa_status=='2'))
                                        -
                                    @endif
                                    @if(($row->admission_status=='0') && ($row->visa_status=='0'))
                                        <button class="btn btn-success" data-toggle="modal" data-target=".successPostgraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-check"></i> Accept</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".rejectPostgraduateModal<?php echo $row->id; ?>" style="border-radius:0px;"><i class="fa fa-close"></i> Reject</button>
                                    @endif
                                </td>
                                <div class="modal fade successPostgraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to accept given file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
                                <div class="modal fade rejectPostgraduateModal<?php echo $row->id; ?>" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                    <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                        <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('visa_section_comment_store')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <h2 style="text-align:center;">Are you sure to reject file or image ??? </h2>
                                                    <label>Comment:</label>
                                                    <textarea name="visa_comment" style="width:100%;"></textarea>
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
    @endforeach
@endif

<tr>
    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr>
                <td style="background:gray;color:white;width:25%!important;">Educational Summery Comment</td>
                <td style="background:gray;color:white;width:25%!important;">Visa Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
            </tr>
            <form action="{{url('educational_summery_visa_comment_store')}}" method="post">
                @csrf
                <tr>
                    <td>
                        <p>
                            @if($profile_data->education_summary_visa_comment)
                                {{$profile_data->education_summary_visa_comment}}
                            @else
                                <span> No comments here ...</span>
                            @endif
                        </p>
                    </td>
                    <td>
                        <textarea name="education_summary_visa_comment" style="width:100%;height:100px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . ."></textarea>
                        <input type="hidden" name="id" value="{{$profile_data->id}}">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success" style="border-radius:0px;"><i class="fa fa-check"></i> Submit</button>
                    </td>
                </tr>
            </form>
        </table>
</tr>
