<style>
    .select2-container {
        margin-top:0px !important;
        border-radius:0px !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <h4 class="mt-2" style="font-weight:bold;">Personal Information:
            <span>Step 1 - 5</span></h4>
        <hr class="mt-5">
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">First Name <span>*</span></label>
            <input type="text" name="f_name" class="form-control required" value="{{old('f_name')}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Middle Name</label>
            <input type="text" name="m_name" class="form-control" value="{{old('m_name')}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Last Name <span>*</span></label>
            <input type="text" name="l_name" class="form-control required" value="{{old('l_name')}}"  autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Date of Birth <span>*</span></label>
            <input type="date" name="dob" class="form-control required" value="{{$check->dob}}" readonly style="background: darkred; color: white;">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">First Language <span>*</span></label>
            <input type="text" name="first_language" class="form-control required" value="{{old('first_language')}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Citizenship <span>*</span></label>
            <input type="text" name="citizenship" class="form-control required"  value="{{old('citizenship')}}" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport No <span>*</span></label>
            <input type="text" name="passport_no" class="form-control required" value="{{old('passport_no')}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport Exp Date</label>
            <input type="date" name="passport_exp" class="form-control" value="{{old('passport_exp')}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Marital Status <span>*</span></label>
            <select class="form-control required" name="marital_status" value="{{old('marital_status')}}" style="border-radius:0px;">
                <option value="">-Select-</option>
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Gender <span>*</span></label>
            <select class="form-control required" name="gender" value="{{old('gender')}}" style="border-radius:0px;">
                <option value="">-Select-</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="mt-2" style="font-weight:bold;">Address Details:</h4>
        <hr class="mt-5">
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Address <span>*</span></label>
            <textarea class="form-control required" name="address" value="{{old('address')}}" style="border-radius:0px; border-color: #604c4c69 !important;"></textarea>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">City/Town <span>*</span></label>
            <input type="text" name="city" class="form-control required" value="{{old('city')}}" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Country <span>*</span></label>
            <select class="form-control form-control-select2 required" name="country">
                @include('.include.student.store.educational_background.country')
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Province/State <span>*</span> </label>
            <input type="text" name="state" class="form-control required" value="{{old('state')}}" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Postal/Zip Code <span>*</span></label>
            <input type="text" name="zip_code" class="form-control required" value="{{old('zip_code')}}" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Email <span>*</span></label>
            <input type="text" name="email" class="form-control" value="{{$check->student_email}}" readonly style="background: darkred; color: white;">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Phone Number <span>*</span></label>
            <input type="number" name="phone_no" class="form-control" value="{{$check->phone_no}}" readonly style="background:darkred; color: white;">
        </div>
    </div>
</div>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-next" style="border-radius:0px; border-color: #604c4c69 !important;"><i class="icon icon-forward"></i> Next</button>
</div>



