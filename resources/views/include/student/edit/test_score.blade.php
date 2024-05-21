<h4>Test Scores: <span>Step 3 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <select class="form-control" name="test_score_type" id="test_score_type" style="margin-bottom:15px;">
            @if($profile_data->test_score_type=="IELTS")
                <option value="IELTS">IELTS</option>
                <option value="TOEFL">TOEFL</option>
                <option value="PTE">PTE</option>
                <option value="Duolingo">Duolingo</option>
                <option value="I don't have this">I don't have this</option>
                <option value="Not yet, but I will in the future">Not yet, but I will in the future</option>
            @endif
            @if($profile_data->test_score_type=="TOEFL")
                <option value="TOEFL">TOEFL</option>
                <option value="IELTS">IELTS</option>
                <option value="PTE">PTE</option>
                <option value="Duolingo">Duolingo</option>
                <option value="I don't have this">I don't have this</option>
                <option value="Not yet, but I will in the future">Not yet, but I will in the future</option>
            @endif
            @if($profile_data->test_score_type=="PTE")
                <option value="PTE">PTE</option>
                <option value="TOEFL">TOEFL</option>
                <option value="IELTS">IELTS</option>
                <option value="Duolingo">Duolingo</option>
                <option value="I don't have this">I don't have this</option>
                <option value="Not yet, but I will in the future">Not yet, but I will in the future</option>
            @endif
            @if($profile_data->test_score_type=="Duolingo")
                <option value="Duolingo">Duolingo</option>
                <option value="PTE">PTE</option>
                <option value="TOEFL">TOEFL</option>
                <option value="IELTS">IELTS</option>
                <option value="I don't have this">I don't have this</option>
                <option value="Not yet, but I will in the future">Not yet, but I will in the future</option>
            @endif
            @if($profile_data->test_score_type=="I don't have this")
                <option value="I don't have this">I don't have this</option>
                <option value="Duolingo">Duolingo</option>
                <option value="PTE">PTE</option>
                <option value="TOEFL">TOEFL</option>
                <option value="IELTS">IELTS</option>
                <option value="Not yet, but I will in the future">Not yet, but I will in the future</option>
            @endif
            @if($profile_data->test_score_type=="Not yet, but I will in the future")
                <option value="Not yet, but I will in the future">Not yet, but I will in the future</option>
                <option value="Duolingo">Duolingo</option>
                <option value="PTE">PTE</option>
                <option value="TOEFL">TOEFL</option>
                <option value="IELTS">IELTS</option>
                <option value="I don't have this">I don't have this</option>
            @endif
        </select>
    </div>
    <div class="col-md-3"></div>
</div>
@if($profile_data->test_score_type=="IELTS")
    <div class="row" id="ielts_div">
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">IELTS Exam Date: <span>*</span></label>
                <input type="date" name="ielts_exam_date" class="form-control" value="{{$profile_data->ielts_exam_date}}" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
                <input type="number" name="ielts_reading_score" value="{{$profile_data->ielts_reading_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
                <input type="number" name="ielts_listening_score" value="{{$profile_data->ielts_listening_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                <input type="number" name="ielts_writing_score" value="{{$profile_data->ielts_writing_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
                <input type="number" name="ielts_speaking_score" value="{{$profile_data->ielts_speaking_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label style="color:black;font-weight:500;">IELTS Certificate</label>
                <input type="file" name="ielts_img[]" class="form-control" autocomplete="off" multiple>
                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered" id="ielts_table" style="width:100%;">
                <thead>
                <tr>
                    <th>Sl No</th>
                    <th>File View</th>
                    <th>File Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($document_data as $key=>$result)
                    @if($result->type=='IELTS')
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_ielts<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                </button>
                            </td>
                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm ielts_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                            </td>
                            <div id="modal_theme_ielts<?php echo $result->id; ?>"
                                 class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/ielts/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@if($profile_data->test_score_type=="TOEFL")
    <div class="row" id="toefl_div">
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">TOEFL Exam Date: <span>*</span></label>
                <input type="date" name="toefl_exam_date" class="form-control" value="{{$profile_data->toefl_exam_date}}" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
                <input type="number" name="toefl_reading_score" value="{{$profile_data->toefl_reading_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
                <input type="number" name="toefl_listening_score" value="{{$profile_data->toefl_listening_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                <input type="number" name="toefl_writing_score" value="{{$profile_data->toefl_writing_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
                <input type="number" name="toefl_speaking_score" value="{{$profile_data->toefl_speaking_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
{{--        <div class="col-lg-2">--}}
{{--            <div class="form-group">--}}
{{--                <label style="color:black;font-weight:500;">Delete: <span>*</span></label>--}}
{{--                <button class="btn btn-danger btn-sm toefl_delete" data-id="{{$profile_data->student_id}}" style="border-radius:0px;"><i class="fa fa-close"></i> Delete</button>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label style="color:black;font-weight:500;">TOEFL Certificate</label>
                <input type="file" name="toefl_img[]" class="form-control" autocomplete="off" multiple>
                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered" id="toefl_table" style="width:100%;">
                <thead>
                <tr>
                    <th>Sl No</th>
                    <th>File View</th>
                    <th>File Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($document_data as $key=>$result)
                    @if($result->type=='TOEFL')
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                </button>
                            </td>
                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm toefl_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                            </td>
                            <div id="modal_theme_primary<?php echo $result->id; ?>"
                                 class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/toefl/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@if($profile_data->test_score_type=="PTE")
    <div class="row" id="pte_div">
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">IELTS Exam Date: <span>*</span></label>
                <input type="date" name="pte_exam_date" class="form-control" value="{{$profile_data->ielts_exam_date}}" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
                <input type="number" name="pte_reading_score" value="{{$profile_data->ielts_reading_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
                <input type="number" name="pte_listening_score" value="{{$profile_data->ielts_listening_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                <input type="number" name="pte_writing_score" value="{{$profile_data->ielts_writing_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
                <input type="number" name="pte_speaking_score" value="{{$profile_data->ielts_speaking_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label style="color:black;font-weight:500;">PTE Certificate</label>
                <input type="file" name="pte_img[]" class="form-control" autocomplete="off" multiple>
                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered" id="pte_table" style="width:100%;">
                <tr>
                    <td style="font-weight:bold;">Sl No</td>
                    <td style="font-weight:bold;">File View</td>
                    <td style="font-weight:bold;">File Delete</td>
                </tr>
                @foreach($document_data as $key=>$result)
                    @if($result->type=='PTE')
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                </button>
                            </td>
                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm pte_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                            </td>
                            <div id="modal_theme_primary<?php echo $result->id; ?>"
                                 class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/pte/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endif
@if($profile_data->test_score_type=="Duolingo")
    <div class="row" id="duolingo_div">
        <div class="col-lg-5">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Score: <span>*</span></label>
                <input type="number" name="duolingo_total_score" class="form-control" value="{{$profile_data->duolingo_total_score}}" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Exam Date: <span>*</span></label>
                <input type="date" name="duolingo_exam_date" value="{{$profile_data->duolingo_exam_date}}" class="form-control" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Duolingo Certificate</label>
                <input type="file" name="duolingo_img[]" class="form-control" autocomplete="off" multiple>
                <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered" id="duolingo_table" style="width:100%;">
                <tr>
                    <td style="font-weight:bold;">Sl No</td>
                    <td style="font-weight:bold;">File View</td>
                    <td style="font-weight:bold;">File Delete</td>
                </tr>
                @foreach($document_data as $key=>$result)
                    @if($result->type=='Duolingo')
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                </button>
                            </td>
                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm duolingo_delete_file" style="border-radius:0px;" data-id="{{$result->id}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                            </td>
                            <div id="modal_theme_primary<?php echo $result->id; ?>"
                                 class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/duolingo/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endif

<div class="row test_score" id="IELTS" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">IELTS Exam Date: <span>*</span></label>
            <input type="date" name="ielts_exam_date" class="form-control" value="{{$profile_data->ielts_exam_date}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
            <input type="number" name="ielts_reading_score" value="{{$profile_data->ielts_reading_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
            <input type="number" name="ielts_listening_score" value="{{$profile_data->ielts_listening_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
            <input type="number" name="ielts_writing_score" value="{{$profile_data->ielts_writing_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
            <input type="number" name="ielts_speaking_score" value="{{$profile_data->ielts_speaking_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">IELTS Certificate Upload</label>
            <input type="file" name="ielts_img[]" class="form-control" autocomplete="off" multiple>
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
        </div>
    </div>
</div>
<div class="row test_score" id="TOEFL" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">TOEFL Exam Date: <span>*</span></label>
            <input type="date" name="toefl_exam_date" class="form-control" value="{{$profile_data->toefl_exam_date}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
            <input type="number" name="toefl_reading_score" value="{{$profile_data->toefl_reading_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
            <input type="number" name="toefl_listening_score" value="{{$profile_data->toefl_listening_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
            <input type="number" name="toefl_writing_score" value="{{$profile_data->toefl_writing_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
            <input type="number" name="toefl_speaking_score" value="{{$profile_data->toefl_speaking_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">TOEFL Certificate Upload</label>
            <input type="file" name="toefl_img[]" class="form-control" autocomplete="off" multiple>
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
        </div>
    </div>
</div>
<div class="row test_score" id="PTE" style="display: none;">
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">PTE Exam Date: <span>*</span></label>
            <input type="date" name="pte_exam_date" class="form-control" value="{{$profile_data->toefl_speaking_score}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
            <input type="number" name="pte_reading_score" value="{{$profile_data->pte_reading_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
            <input type="number" name="pte_writing_score" value="{{$profile_data->pte_writing_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
            <input type="number" name="pte_listening_score" value="{{$profile_data->pte_listening_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
            <input type="number" name="pte_speaking_score" value="{{$profile_data->pte_speaking_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Total Score: <span>*</span></label>
            <input type="number" name="pte_total_score" value="{{$profile_data->pte_total_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">PTE Certificate Upload</label>
            <input type="file" name="pte_img[]" class="form-control" autocomplete="off" multiple>
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
        </div>
    </div>
</div>
<div class="row test_score" id="Duolingo" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Score: <span>*</span></label>
            <input type="number" name="duolingo_total_score" class="form-control" value="{{$profile_data->duolingo_total_score}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Exam Date: <span>*</span></label>
            <input type="date" name="duolingo_exam_date" value="{{$profile_data->duolingo_exam_date}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Duolingo Certificate Upload</label>
            <input type="file" name="duolingo_img[]" class="form-control" autocomplete="off" multiple>
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
        </div>
    </div>
</div>
<br/>

<br/>
<h4 style="font-weight:bold;">Additional Qualifications:</h4>
<hr class="mt-5">
@if($profile_data->gre_exam_date==true)
    <div class="row" id="gre_div">
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">GRE Exam Date:</label>
                <input type="date" name="gre_exam_date" value="{{$profile_data->gre_exam_date}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Verbal</label>
                <input type="number" name="gre_verbal_score" value="{{$profile_data->gre_verbal_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Quantitative</label>
                <input type="number" name="gre_quantitative_score" value="{{$profile_data->gre_quantitative_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">AWA</label>
                <input type="number" name="gre_awa_score" value="{{$profile_data->gre_awa_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
{{--        <div class="col-lg-2">--}}
{{--            <div class="form-group">--}}
{{--                <label style="color:black;font-weight:500;">Delete: <span>*</span></label>--}}
{{--                <button class="btn btn-danger btn-sm gre_delete" data-id="{{$profile_data->student_id}}" style="border-radius:0px;"><i class="fa fa-close"></i> Delete</button>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label style="color:black;font-weight:500;">GRE Certificate</label>
                <input type="file" name="gre_img[]" class="form-control" autocomplete="off" multiple>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered" id="gre_table" style="width:100%;">
                <thead>
                <tr>
                    <th>Sl No</th>
                    <th>File View</th>
                    <th>File Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($document_data as $key=>$result)
                    @if($result->type=='GRE')
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                </button>
                            </td>
                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm gre_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                            </td>
                            <div id="modal_theme_primary<?php echo $result->id; ?>"
                                 class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/gre/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="checkbox" id="gmat" class="required">
            <label> I have GMAT exam scores</label><br>
        </div>
    </div>
@endif
@if($profile_data->gmat_exam_date==true)
    <div class="row" id="gmat_div">
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">GMAT Exam Date:</label>
                <input type="date" name="gmat_exam_date" value="{{$profile_data->gmat_exam_date}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Verbal</label>
                <input type="number" name="gmat_verbal_score" value="{{$profile_data->gmat_verbal_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Quantitative</label>
                <input type="number" name="gmat_quantitative_score" value="{{$profile_data->gmat_quantitative_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">AWA</label>
                <input type="number" name="gmat_awa_score" value="{{$profile_data->gmat_awa_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Total</label>
                <input type="number" name="gmat_total_score" value="{{$profile_data->gmat_total_score}}" class="form-control" autocomplete="off">
            </div>
        </div>
{{--        <div class="col-lg-2">--}}
{{--            <div class="form-group">--}}
{{--                <label style="color:black;font-weight:500;">Delete: <span>*</span></label>--}}
{{--                <button class="btn btn-danger btn-sm gmat_delete" data-id="{{$profile_data->student_id}}" style="border-radius:0px;"><i class="fa fa-close"></i> Delete</button>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label style="color:black;font-weight:500;">GMAT Certificate</label>
                <input type="file" name="gmat_img[]" class="form-control" autocomplete="off" multiple>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered" id="gmat_table" style="width:100%;">
                <thead>
                <tr>
                    <th>Sl No</th>
                    <th>File View</th>
                    <th>File Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($document_data as $key=>$result)
                    @if($result->type=='GMAT')
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                            </td>
                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm gmat_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                            </td>
                            <div id="modal_theme_primary<?php echo $result->id; ?>"
                                 class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h6 class="modal-title">Uploaded File</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="{{ url('upload/gmat/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="checkbox" id="gre" class="required">
            <label> I have GRE exam scores</label><br>
        </div>
    </div>
@endif
{{--<input type="checkbox" id="gre" class="required">--}}
{{--<label> I have GRE exam scores</label><br>--}}
{{--<input type="checkbox" id="gmat" class="required">--}}
{{--<label> I have GMAT exam scores</label><br>--}}

<div class="row gre-hidden-menu" style="display:none;">
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GRE Exam Date:</label>
            <input type="date" name="gre_exam_date" value="{{$profile_data->gre_exam_date}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Verbal</label>
            <input type="number" name="gre_verbal_score" value="{{$profile_data->gre_verbal_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Quantitative</label>
            <input type="number" name="gre_quantitative_score" value="{{$profile_data->gre_quantitative_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">AWA</label>
            <input type="number" name="gre_awa_score" value="{{$profile_data->gre_awa_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GRE Certificate Upload</label>
            <input type="file" name="gre_img[]" class="form-control" autocomplete="off" multiple>
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
        </div>
    </div>
</div>
<div class="row gmat-hidden-menu" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GMAT Exam Date:</label>
            <input type="date" name="gmat_exam_date" value="{{$profile_data->gmat_exam_date}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Verbal</label>
            <input type="number" name="gmat_verbal_score" value="{{$profile_data->gmat_verbal_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Quantitative</label>
            <input type="number" name="gmat_quantitative_score" value="{{$profile_data->gmat_quantitative_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">AWA</label>
            <input type="number" name="gmat_awa_score" value="{{$profile_data->gmat_awa_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Total</label>
            <input type="number" name="gmat_total_score" value="{{$profile_data->gmat_total_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GMAT Certificate Upload</label>
            <input type="file" name="gmat_img[]" class="form-control" autocomplete="off" multiple>
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
        </div>
    </div>
</div>

<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
