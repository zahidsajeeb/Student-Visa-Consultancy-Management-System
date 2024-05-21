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
    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
    <td colspan="6">
        <table class="table table-bordered">
            <tr>
                <td style="background:gray;color:white;width:25%!important;">Background Comment</td>
                <td style="background:gray;color:white;width:25%!important;">Visa Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
            </tr>
            <form action="{{url('background_information_visa_comment_store')}}" method="post">
                @csrf
                <tr>
                    <td>
                        <p>
                            @if($profile_data->background_information_visa_comment)
                                {{$profile_data->background_information_visa_comment}}
                            @else
                                <span> No comments here ...</span>
                            @endif
                        </p>
                    </td>
                    <td>
                        <textarea name="background_information_visa_comment" style="width:100%;height:100px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . ."></textarea>
                        <input type="hidden" name="id" value="{{$profile_data->id}}">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success"  style="border-radius:0px;"><i class="fa fa-check"></i> Submit</button>
                    </td>
                </tr>
            </form>
        </table>
    </td>
</tr>
