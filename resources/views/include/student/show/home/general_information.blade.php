<tr>
    <td colspan="5" style="text-align:center; background:#e7e7e7;font-weight:bold; border:0;">
        <h3>Personal Information</h3>

    </td>
    <td style="text-align:center; background:#e7e7e7;font-weight:bold;">
        @if($check->profile_lock=='0')
        <a href="{{url('edit_general_information')}}/{{$profile_data->id}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
        @endif
    </td>
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
        <table class="table table-bordered">
            <tr style="background:#f4f4f4;font-weight:bold;">
                <td>Admission Comment</td>
                <td>Visa Comment</td>
            </tr>
            <tr>
                <td>
                    @if($profile_data->personal_info_admission_comment==true)
                        <p>{{$profile_data->personal_info_admission_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
                <td>
                    @if($profile_data->personal_info_visa_comment==true)
                        <p>{{$profile_data->personal_info_visa_comment}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </td>
            </tr>

        </table>
    </td>
</tr>
