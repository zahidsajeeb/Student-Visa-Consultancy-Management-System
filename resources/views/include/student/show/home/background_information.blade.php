<tr>
    <td colspan="5" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Background Information</h3></td>
    <td style="text-align:center; background:#e7e7e7;font-weight:bold;">
        @if($check->profile_lock=='0')
        <a href="{{url('edit_background_information')}}/{{$profile_data->id}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </td>
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
    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Background Comment:</td>
    <td colspan="6">
        <table class="table table-bordered">
            <tr style="background:#f4f4f4;font-weight:bold;">
                <td>Admission Comment</td>
                <td>Visa Comment</td>
            </tr>
            <tr>
                <td>
                    @if($profile_data->background_information_admission_comment==true)
                        <p>{{$profile_data->background_information_admission_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
                <td>
                    @if($profile_data->background_information_visa_comment==true)
                        <p>{{$profile_data->background_information_visa_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
            </tr>

        </table>
    </td>
</tr>
