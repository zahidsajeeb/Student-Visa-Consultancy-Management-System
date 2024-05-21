<h4>Upload Documents: <span>Step 5 - 5</span></h4>
<hr class="mt-5">
<div class="row" style="margin-bottom:10px;">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport Upload (Automated):</label>
            <input type="file" name="passport_img[]" class="form-control" autocomplete="off" multiple style="margin-bottom:5px;">
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
        </div>
    </div>
    <div class="col-lg-8">
        <table class="table table-bordered" id="passport" style="width:100%;">
            <thead>
            <tr>
                <th>File View</th>
                <th>File Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($document_data as $key=>$result)
                @if($result->type=='Passport')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                            </button>
                        </td>
                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm passport_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}"><i class="icon-trash ml-2"></i> Delete File</a></span>
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
                                        <embed src="{{ url('upload/passport/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Birth Certificate Upload:</label>
            <input type="file" name="bc_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple style="margin-bottom:5px;">
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
        </div>
    </div>
    <div class="col-lg-8">
        <table class="table table-bordered" id="bc_table" style="width:100%;">
            <thead>
            <tr>
                <th>File View</th>
                <th>File Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($document_data as $result)
                @if($result->type=='Birth Certificate')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_birth<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                        </td>
                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm bc_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                        </td>
                        <div id="modal_theme_birth<?php echo $result->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Uploaded File</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('upload/birth_certificate/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">CV Upload:</label>
            <input type="file" name="cv_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple style="margin-bottom:5px;">
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
        </div>
    </div>
    <div class="col-lg-8">
        <table class="table table-bordered" id="cv_table" style="width:100%;">
            <thead>
            <tr>
                <th>File View</th>
                <th>File Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($document_data as $result)
                @if($result->type=='CV')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_cv<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                        </td>
                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm cv_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                        </td>
                        <div id="modal_theme_cv<?php echo $result->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Uploaded File</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('upload/cv/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport Size Image Upload:</label>
            <input type="file" name="profile_img[]" class="form-control multifile" accept="png|jpg|jpeg|pdf" data-maxfile="5120" multiple style="margin-bottom:5px;">
            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf & Max file size 5MB***)</span>
        </div>
    </div>
    <div class="col-lg-8">
        <table class="table table-bordered" id="profile_table" style="width:100%;">
            <thead>
            <tr>
                <th>File View</th>
                <th>File Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($document_data as $result)
                @if($result->type=='Profile')
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_profile<?php echo $result->id; ?>"><i class="icon-file-pdf ml-2"></i> File View</button>
                        </td>
                        <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm profile_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                        </td>
                        <div id="modal_theme_profile<?php echo $result->id; ?>"
                             class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h6 class="modal-title">Uploaded File</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
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

<br/>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="submit" id="updateBtn" class="btn btn-submit second" style="border-radius:0px;"><i class="icon icon-forward"></i> Update</button>
</div>
