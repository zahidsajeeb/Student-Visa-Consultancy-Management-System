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
    <td style="background:#f4f4f4;font-weight:bold; font-size:18px; color:red;">Comment:</td>
    <td colspan="5">
        <table class="table table-bordered">
            <tr>
                <td style="background:gray;color:white;width:25%!important;">Personal Information Comment</td>
                <td style="background:gray;color:white;width:25%!important;">Admission Comment</td>
                <td style="background:gray;color:white;width:20%!important;">Action</td>
            </tr>
            <form action="{{url('personal_information_admission_comment_store')}}" method="post">
                @csrf
                <tr>
                    <td>
                        <p>
                            @if($profile_data->personal_info_admission_comment)
                                {{$profile_data->personal_info_admission_comment}}
                            @else
                                <span> No comments here ...</span>
                            @endif
                        </p>
                    </td>
                    <td>
                        <textarea name="personal_info_admission_comment" style="width:100%;height:100px;border:1px solid #726e6e3b;" placeholder="Type okay or suggest where need to corrections . . ."></textarea>
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
