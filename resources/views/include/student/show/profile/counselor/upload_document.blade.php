<tr>
    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Documents Images</td>
</tr>
<tr>
    <td style="background:#f4f4f4;font-weight:bold;">Passport File</td>
    <td colspan="5">
        @foreach($document_data as $row)
            @if($row->type=='Passport')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_passport<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                    {{$row->category}}File View
                </button>
            @endif
            <div id="modal_theme_passport<?php echo $row->id; ?>"
                 class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h6 class="modal-title">{{$row->category}} File</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                           <a href="{{ url('upload/passport/'.$row->file_name) }}" download>
                                 <embed src="{{ url('upload/passport/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    <td style="background:#f4f4f4;font-weight:bold;">Birth Certificate File:</td>
    <td colspan="5">
        @foreach($document_data as $row)
            @if($row->type=='Birth Certificate')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_bc<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                    {{$row->category}} File View
                </button>
            @endif
            <div id="modal_theme_bc<?php echo $row->id; ?>"
                 class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h6 class="modal-title">{{$row->category}} File</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <a href="{{ url('upload/birth_certificate/'.$row->file_name) }}" download>
                                <embed src="{{ url('upload/birth_certificate/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    <td style="background:#f4f4f4;font-weight:bold;">CV File:</td>
    <td colspan="5">
        @foreach($document_data as $row)
            @if($row->type=='CV')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_cv<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                    {{$row->category}} File View
                </button>
            @endif
            <div id="modal_theme_cv<?php echo $row->id; ?>"
                 class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h6 class="modal-title">{{$row->category}} File</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <a href="{{ url('upload/cv/'.$row->file_name) }}" download>
                                <embed src="{{ url('upload/cv/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
    <td style="background:#f4f4f4;font-weight:bold;">Passport Size Image File:</td>
    <td colspan="5">
        @foreach($document_data as $row)
            @if($row->type=='Profile')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_profile<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                    {{$row->category}} File View
                </button>
            @endif
            <div id="modal_theme_profile<?php echo $row->id; ?>"
                 class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h6 class="modal-title">{{$row->category}} Image</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <a href="{{ url('upload/'.$row->file_name) }}" download>
                                <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
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
