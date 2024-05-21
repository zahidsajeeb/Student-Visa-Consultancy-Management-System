<div class="card-group-control card-group-control-right test_score" id="primary" style="display: none;">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body">
                    <i class="icon-help mr-2 text-secondary"></i> SSC/DHAKIL/A LEVEL (Last Grade)
                </a>
            </h6>
        </div>
        <div id="primary" class="collapse1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2 primary_required_country" name="primary_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" class="form-control primary_required_one" name="primary_institution_name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control primary_required_two" name="primary_education_level" style="display: block;!important;">
                                <option value="">-Select-</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                            <input type="text" class="form-control primary_required_three" name="primary_language_instruction" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" class="form-control primary_required_four" name="primary_institution_from" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" class="form-control primary_required_five" name="primary_institution_to" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name: <span>*</span></label>
                            <span style="color:blue;">(*EX:SSC/HSC/BSC/BBA/MBA . . etc)</span>
                            <input type="text" class="form-control primary_required_six" name="primary_institution_degree" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" class="form-control primary_required_seven" name="primary_institution_address" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" class="form-control primary_required_eight" name="primary_institution_city" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Province</label>
                            <input type="text" class="form-control" name="primary_institution_province" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Zip Code:  <span>*</span></label>
                            <input type="text" class="form-control primary_required_nine" name="primary_institution_zip" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grading Scheme</label>
                            <input type="text" class="form-control" name="primary_grading_scheme" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                            <input type="text" class="form-control" name="primary_grade_avg" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                            <input type="text" class="form-control" name="primary_grade_scale" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" class="form-control multifile primary_required_ten" name="primary_certificate_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" class="form-control multifile primary_required_eleven" name="primary_transcript_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right test_score" id="primary_two" style="display: none;">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body">
                    <i class="icon-help mr-2 text-secondary"></i> SSC/DHAKIL/A LEVEL (Previous Last Grade)
                </a>
            </h6>
        </div>

        <div id="primary_two" class="collapse1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2 primary_two_required_country" name="primary_two_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" class="form-control primary_two_required_one" name="primary_two_institution_name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control primary_two_required_two" name="primary_two_education_level" style="display: block;!important;">
                                <option value="">-Select-</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                            <input type="text" class="form-control primary_two_required_three" name="primary_two_language_instruction" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" class="form-control primary_two_required_four" name="primary_two_institution_from" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" class="form-control primary_two_required_five" name="primary_two_institution_to" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name: <span>*</span></label>
                            <span style="color:blue;">(*EX:SSC/HSC/BSC/BBA/MBA . . etc)</span>
                            <input type="text" class="form-control primary_two_required_six" name="primary_two_institution_degree" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" class="form-control primary_two_required_seven" name="primary_two_institution_address" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" class="form-control primary_two_required_eight" name="primary_two_institution_city" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Province</label>
                            <input type="text" class="form-control" name="primary_two_institution_province" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Zip Code:  <span>*</span></label>
                            <input type="text" class="form-control primary_two_required_nine" name="primary_two_institution_zip" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grading Scheme</label>
                            <input type="text" class="form-control" name="primary_two_grading_scheme" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                            <input type="text" class="form-control" name="primary_two_grade_avg" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                            <input type="text" class="form-control" name="primary_two_grade_scale" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" class="form-control multifile primary_two_required_ten" name="primary_two_certificate_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" class="form-control multifile primary_two_required_eleven" name="primary_two_transcript_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right test_score" id="secondary" style="display: none;">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body">
                    <i class="icon-help mr-2 text-secondary"></i> HSC/ALIM/O LEVEL
                </a>
            </h6>
        </div>
        <div id="secondary" class="collapse1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2 secondary_required_country" name="secondary_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" class="form-control secondary_required_one" name="secondary_institution_name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control secondary_required_two" name="secondary_education_level" style="display: block;!important;">
                                <option value="">-Select-</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12/High School</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                            <input type="text" name="secondary_language_instruction" class="form-control secondary_required_three" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" name="secondary_institution_from" class="form-control secondary_required_four" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" name="secondary_institution_to" class="form-control secondary_required_five" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <span style="color:blue;">(*EX:SSC/HSC/BSC/BBA/MBA . . etc)</span>
                            <input type="text" name="secondary_institution_degree" class="form-control secondary_required_six" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" name="secondary_institution_address" class="form-control secondary_required_seven" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town/District: <span>*</span></label>
                            <input type="text" name="secondary_institution_city" class="form-control secondary_required_eight" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Province</label>
                            <input type="text" name="secondary_institution_province" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Zip Code: <span>*</span></label>
                            <input type="text" name="secondary_institution_zip" class="form-control secondary_required_nine" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grading Scheme</label>
                            <input type="text" class="form-control" name="secondary_grading_scheme" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                            <input type="text" class="form-control" name="secondary_grade_avg" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                            <input type="text" class="form-control" name="secondary_grade_scale" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" name="secondary_certificate_img[]" class="form-control multifile secondary_required_ten" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" name="secondary_transcript_img[]" class="form-control multifile secondary_required_eleven" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right test_score" id="undergraduate" style="display: none;">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body">
                    <i class="icon-help mr-2 text-secondary"></i> Diploma/BSC
                </a>
            </h6>
        </div>
        <div id="undergraduate" class="collapse1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2 undergraduate_required_country" name="undergraduate_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" name="undergraduate_institution_name" class="form-control undergraduate_required_one" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control undergraduate_required_two" name="undergraduate_education_level" style="display: block;!important;">
                                <option value="">-Select-</option>
                                <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                            <input type="text" name="undergraduate_language_instruction" class="form-control undergraduate_required_three" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" name="undergraduate_institution_from" class="form-control undergraduate_required_four" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" name="undergraduate_institution_to" class="form-control undergraduate_required_five" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <span style="color:blue;">(*EX:SSC/HSC/BSC/BBA/MBA . . etc)</span>
                            <input type="text" name="undergraduate_institution_degree" class="form-control undergraduate_required_six" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" name="undergraduate_institution_address" class="form-control undergraduate_required_seven" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town/District: <span>*</span></label>
                            <input type="text" name="undergraduate_institution_city" class="form-control undergraduate_required_eight" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Province</label>
                            <input type="text" name="undergraduate_institution_province" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Zip Code: <span>*</span></label>
                            <input type="text" name="undergraduate_institution_zip" class="form-control undergraduate_required_nine" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grading Scheme</label>
                            <input type="text" class="form-control" name="undergraduate_grading_scheme" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                            <input type="text" class="form-control" name="undergraduate_grade_avg" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                            <input type="text" class="form-control" name="undergraduate_grade_scale" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" name="undergraduate_certificate_img[]" class="form-control multifile undergraduate_required_ten" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" name="undergraduate_transcript_img[]" class="form-control multifile undergraduate_required_eleven" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right test_score" id="postgraduate" style="display: none;" >
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body">
                    <i class="icon-help mr-2 text-secondary"></i> MASTERS
                </a>
            </h6>
        </div>
        <div id="postgraduate" class="collapse1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2 postgraduate_required_country" name="postgraduate_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" name="postgraduate_institution_name" class="form-control postgraduate_required_one" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control postgraduate_required_two" name="postgraduate_education_level" style="display: block;!important;">
                                <option value="">-Select-</option>
                                <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                <option value="Master Degree">Master Degree</option>
                                <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                            <input type="text" name="postgraduate_language_instruction" class="form-control postgraduate_required_three" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" name="postgraduate_institution_from" class="form-control postgraduate_required_four" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" name="postgraduate_institution_to" class="form-control postgraduate_required_five" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <span style="color:blue;">(*EX:SSC/HSC/BSC/BBA/MBA . . etc)</span>
                            <input type="text" name="postgraduate_institution_degree" class="form-control postgraduate_required_six" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" name="postgraduate_institution_address" class="form-control postgraduate_required_seven" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" name="postgraduate_institution_city" class="form-control postgraduate_required_eight" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Province</label>
                            <input type="text" name="postgraduate_institution_province" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Zip Code: <span>*</span></label>
                            <input type="text" name="postgraduate_institution_zip" class="form-control postgraduate_required_nine" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grading Scheme</label>
                            <input type="text" class="form-control" name="postgraduate_grading_scheme" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                            <input type="text" class="form-control" name="postgraduate_grade_avg" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                            <input type="text" class="form-control" name="postgraduate_grade_scale" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" name="postgraduate_certificate_img[]" class="form-control multifile postgraduate_required_ten" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" name="postgraduate_transcript_img[]" class="form-control multifile postgraduate_required_eleven" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right test_score" id="double_postgraduate" style="display: none;">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body">
                    <i class="icon-help mr-2 text-secondary"></i> DOUBLE MASTERS
                </a>
            </h6>
        </div>
        <div id="double_postgraduate" class="collapse1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2 double_postgraduate_required_country" name="double_postgraduate_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" name="double_postgraduate_institution_name" class="form-control double_postgraduate_required_one" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control double_postgraduate_required_two" name="double_postgraduate_education_level" style="display: block;!important;">
                                <option value="Double Master Degree">Double Master Degree</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                            <input type="text" name="postgraduate_language_instruction" class="form-control double_postgraduate_required_three" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" name="double_postgraduate_institution_from" class="form-control double_postgraduate_required_four" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" name="double_postgraduate_institution_to" class="form-control double_postgraduate_required_five" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <span style="color:blue;">(*EX:SSC/HSC/BSC/BBA/MBA . . etc)</span>
                            <input type="text" name="double_postgraduate_institution_degree" class="form-control double_postgraduate_required_six" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" name="double_postgraduate_institution_address" class="form-control double_postgraduate_required_seven" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" name="double_postgraduate_institution_city" class="form-control double_postgraduate_required_eight" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Province</label>
                            <input type="text" name="double_postgraduate_institution_province" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Zip Code: <span>*</span></label>
                            <input type="text" name="double_postgraduate_institution_zip" class="form-control double_postgraduate_required_nine" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grading Scheme</label>
                            <input type="text" class="form-control" name="double_postgraduate_grading_scheme" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Average:  <span>*</span></label>
                            <input type="text" class="form-control" name="double_postgraduate_grade_avg" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Grade Scale (Out of):  <span>*</span></label>
                            <input type="text" class="form-control" name="double_postgraduate_grade_scale" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" name="double_postgraduate_certificate_img[]" class="form-control multifile double_postgraduate_required_ten" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" name="double_postgraduate_transcript_img[]" class="form-control multifile double_postgraduate_required_eleven" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
                            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
                            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
