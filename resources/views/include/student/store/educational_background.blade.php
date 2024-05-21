<h4 class="mt-2" style="font-weight:bold;">Education Summary :<span>Step 2 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Country of Education <span>*</span></label>
            <select class="form-control required form-control-select2" required name="education_country">
                @include('.include.student.store.educational_background.country')
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Highest Level of Education <span>*</span></label>
        </div>
        <select class="form-control required form-control-select2 education_level" id="select1" name="education_level" style="display: block;!important;">
            <option value="">Select</option>
            <optgroup label="Primary School">
                <option value="Grade 1" class="primary">Grade 1</option>
                <option value="Grade 2" class="primary">Grade 2</option>
                <option value="Grade 3" class="primary">Grade 3</option>
                <option value="Grade 4" class="primary">Grade 4</option>
                <option value="Grade 5" class="primary">Grade 5</option>
                <option value="Grade 6" class="primary">Grade 6</option>
                <option value="Grade 7" class="primary">Grade 7</option>
                <option value="Grade 8" class="primary">Grade 8</option>
                <option value="Grade 9"  class="primary" >Grade 9</option>
                <option value="Grade 10" class="primary">Grade 10</option>
            </optgroup>
            <optgroup label="Secondary School">
                <option value="Grade 11" class="secondary">Grade 11</option>
                <option value="Grade 12" class="secondary">Grade 12/High School</option>
            </optgroup>
            <optgroup label="Bachelor">
                <option value="1-Year Post-Secondary Certificate" class="undergraduate">1-Year Post-Secondary Certificate</option>
                <option value="2-Year Undergraduate Diploma" class="undergraduate">2-Year Undergraduate Diploma</option>
                <option value="3-Year Undergraduate Advanced Diploma" class="undergraduate">3-Year Undergraduate Advanced Diploma</option>
                <option value="3-Year Bachalors Degree" class="undergraduate">3-Year Bachalors Degree</option>
                <option value="4-Year Bachalors Degree" class="undergraduate">4-Year Bachalors Degree</option>
            </optgroup>
            <optgroup label="Masters">
                <option value="Postgraduate Certificate/Diploma" class="postgraduate">Postgraduate Certificate/Diploma</option>
                <option value="Master Degree" class="postgraduate">Master Degree</option>
                <option value="Doctoral Degree (Phd, M.D . .)" class="postgraduate">Doctoral Degree (Phd, M.D . .)</option>
            </optgroup>
            <optgroup label="Double Masters">
                <option value="Double Master Degree" class="double_postgraduate">Double Master Degree</option>
            </optgroup>
        </select>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Grading Scheme <span>*</span></label>
            <select class="form-control colorselector required" name="grading_scheme" id="select2" style="margin-top: 20px; !important;">
                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 1">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 1">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 1">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 1">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 2">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 2">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 2">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 2">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 3">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 3">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 3">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 3">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 4">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 4">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 4">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 4">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 5">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 5">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 5">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 5">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 6">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 6">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 6">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 6">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 7">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 7">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 7">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 7">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 8">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 8">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 8">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 8">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 9">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 9">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 9">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 9">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 10">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 10">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 10">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 10">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 11">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 11">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 11">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 11">Other</option>

                <option value="Secondary_Education_Letter_Scale" data-section1="Grade 12">Secondary Education Letter Scale F - A+</option>
                <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 12">Secondary Education Percentage Scale 0-100</option>
                <option value="Secondary_Education_Grade_Point" data-section1="Grade 12">Secondary Education Grade Point 5.0 Scale</option>
                <option value="Other" data-section1="Grade 12">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="1-Year Post-Secondary Certificate">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Percentage Scale 0-100</option>
                <option value="Other" data-section1="1-Year Post-Secondary Certificate">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="2-Year Undergraduate Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Percentage Scale 0-100</option>
                <option value="Other" data-section1="2-Year Undergraduate Diploma">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Percentage Scale 0-100</option>
                <option value="Other" data-section1="3-Year Undergraduate Advanced Diploma">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="3-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="3-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="3-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                <option value="Other" data-section1="3-Year Bachalors Degree">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="4-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="4-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="4-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                <option value="Other" data-section1="4-Year Bachalors Degree">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="Postgraduate Certificate/Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Percentage Scale 0-100</option>
                <option value="Other" data-section1="Postgraduate Certificate/Diploma">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="Master Degree">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="Master Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="Master Degree">Higher Education Percentage Scale 0-100</option>
                <option value="Other" data-section1="Master Degree">Other</option>

                <option value="Higher_Education_Letter_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Letter Scale F - A+</option>
                <option value="Higher_Education_Grade_Point" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Percentage Scale 0-100</option>
                <option value="Higher_Education_Percentage_Scale" data-section1="Double Master Degree">Double Master Percentage Scale 0-100</option>
                <option value="Other" data-section1="Doctoral Degree (Phd, M.D . .)">Other</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div id="Secondary_Education_Letter_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                <select class="form-control" name="grade_avg_1">
                    <option value="">-Select</option>
                    <option>A+</option>
                    <option>A</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B</option>
                    <option>B-</option>
                    <option>C+</option>
                    <option>C</option>
                    <option>C-</option>
                    <option>D</option>
                    <option>F</option>
                </select>
            </div>
        </div>
        <div id="Secondary_Education_Percentage_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                <input type="text" name="grade_avg_2" class="form-control decimal" autocomplete="off">
            </div>
        </div>
        <div id="Secondary_Education_Grade_Point" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                <input type="text" name="grade_avg_3" class="form-control decimal" autocomplete="off">
            </div>
        </div>
        <div id="Higher_Education_Letter_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                <select class="form-control" name="grade_avg_4">
                    <option value="">-Select</option>
                    <option>A+</option>
                    <option>A</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B</option>
                    <option>B-</option>
                    <option>C+</option>
                    <option>C</option>
                    <option>C-</option>
                    <option>D</option>
                    <option>F</option>
                </select>
            </div>
        </div>
        <div id="Higher_Education_Percentage_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                <input type="text" name="grade_avg_5" class="form-control decimal" autocomplete="off">
            </div>
        </div>
        <div id="Higher_Education_Grade_Point" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                <input type="text" name="grade_avg_6" class="form-control decimal" autocomplete="off">
            </div>
        </div>
        <div id="Other" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                <input type="text" name="grade_avg_7" class="form-control" autocomplete="off">
                <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                <select class="form-control" name="grade_scale">
                    <option value="">-Select</option>
                    <option>4</option>
                    <option>5</option>
                    <option>7</option>
                    <option>10</option>
                    <option>20</option>
                    <option>100</option>
                </select>
            </div>
        </div>
    </div>
</div>
<hr>
@include('.include.student.store.educational_background.index')


{{--<div id="fileUploadsContainer"></div>--}}
{{--<div class="form-wizard-buttons">--}}
{{--    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>--}}
{{--    <button type="submit" class="btn btn-submit second" style="border-radius:0px;" id="load2" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order"><i class="fa fa-check"></i> Submit</button>--}}
{{--</div>--}}

<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
