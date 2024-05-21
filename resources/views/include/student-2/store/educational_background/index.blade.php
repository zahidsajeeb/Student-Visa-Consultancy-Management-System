<div class="card-group-control card-group-control-right">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body collapsed" data-toggle="collapse" href="#primary">
                    <i class="icon-help mr-2 text-secondary"></i> Primary School Attend Information
                </a>
            </h6>
        </div>

        <div id="primary" class="collapse">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2" name="primary_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" class="form-control" name="primary_institution_name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control" name="primary_education_level" style="display: block;!important;">
                                <option disabled selected>-Select-</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                            <input type="text" class="form-control" name="primary_language_instruction" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" class="form-control" name="primary_institution_from" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" class="form-control" name="primary_institution_to" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <input type="text" class="form-control" name="primary_institution_degree" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" class="form-control" name="primary_institution_address" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" class="form-control" name="primary_institution_city" autocomplete="off">
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
                            <label style="color:black;font-weight:500;">Zip Code:</label>
                            <input type="text" class="form-control" name="primary_institution_zip" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" class="form-control multifile" name="primary_certificate_img[]" accept="gif|jpg|pdf" data-maxfile="1024" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" class="form-control multifile" name="primary_transcript_img[]" accept="gif|jpg|pdf" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body collapsed" data-toggle="collapse" href="#secondary">
                    <i class="icon-help mr-2 text-secondary"></i> Secondary School Attend Information
                </a>
            </h6>
        </div>
        <div id="secondary" class="collapse">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2" name="secondary_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" class="form-control" name="secondary_institution_name" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control" name="secondary_education_level" style="display: block;!important;">
                                <option disabled selected>-Select-</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
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
                            <input type="text" name="secondary_primary_language_instruction" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" name="secondary_institution_from" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" name="secondary_institution_to" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <input type="text" name="secondary_institution_degree" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" name="secondary_institution_address" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" name="secondary_institution_city" class="form-control" autocomplete="off">
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
                            <label style="color:black;font-weight:500;">Zip Code:</label>
                            <input type="text" name="secondary_institution_zip" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" name="secondary_certificate_img[]" class="form-control multifile" accept="gif|jpg|pdf" data-maxfile="1024" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" name="secondary_transcript_img[]" class="form-control multifile" accept="gif|jpg|pdf" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body collapsed" data-toggle="collapse" href="#undergraduate">
                    <i class="icon-help mr-2 text-secondary"></i> Undergraduate School Attend Information
                </a>
            </h6>
        </div>
        <div id="undergraduate" class="collapse">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2" required name="undergraduate_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" name="undergraduate_institution_name" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control" name="undergraduate_education_level" style="display: block;!important;">
                                <option disabled selected>-Select-</option>
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
                            <input type="text" name="undergraduate_primary_language_instruction" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" name="undergraduate_institution_from" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" name="undergraduate_institution_to" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <input type="text" name="undergraduate_institution_degree" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" name="undergraduate_institution_address" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" name="undergraduate_institution_city" class="form-control" autocomplete="off">
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
                            <label style="color:black;font-weight:500;">Zip Code:</label>
                            <input type="text" name="undergraduate_institution_zip" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" name="undergraduate_certificate_img[]" class="form-control multifile" accept="gif|jpg|pdf" data-maxfile="1024" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" name="undergraduate_transcript_img[]" class="form-control multifile" accept="gif|jpg|pdf" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-group-control card-group-control-right">
    <div class="card mb-2">
        <div class="card-header">
            <h6 class="card-title">
                <a class="text-body collapsed" data-toggle="collapse" href="#postgraduate">
                    <i class="icon-help mr-2 text-secondary"></i> Postgraduate School Attend Information
                </a>
            </h6>
        </div>
        <div id="postgraduate" class="collapse">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                            <select class="form-control form-control-select2" name="postgraduate_institution_country">
                                @include('.include.student.store.educational_background.country')
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                            <input type="text" name="postgraduate_institution_name" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4" style="top:10px;">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                            <select class="form-control" name="postgraduate_education_level" style="display: block;!important;">
                                <option disabled selected>-Select-</option>
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
                            <input type="text" name="postgraduate_language_instruction" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                            <input type="date" name="postgraduate_institution_from" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                            <input type="date" name="postgraduate_institution_to" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <input type="text" name="postgraduate_institution_degree" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                            <input type="text" name="postgraduate_institution_address" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                            <input type="text" name="postgraduate_institution_city" class="form-control" autocomplete="off">
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
                            <label style="color:black;font-weight:500;">Zip Code:</label>
                            <input type="text" name="postgraduate_institution_zip" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-bold"> File Upload </h5>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Certificate</label>
                            <input type="file" name="postgraduate_certificate_img[]" class="form-control multifile" accept="gif|jpg|pdf" data-maxfile="1024" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Transcript</label>
                            <input type="file" name="postgraduate_transcript_img[]" class="form-control multifile" accept="gif|jpg|pdf" autocomplete="off" multiple>
                            <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
