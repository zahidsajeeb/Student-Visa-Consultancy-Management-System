<h4>Test Scores: <span>Step 3 - 5</span></h4>
<hr class="mt-5">
<div class="row" style="margin-bottom:15px !important;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <select class="form-control test_score_type required" name="test_score_type" id="test_score_type">
            <option value="">-Select-</option>
            <option value="IELTS" class="IELTS">IELTS</option>
            <option value="TOEFL" class="TOEFL">TOEFL</option>
            <option value="PTE"   class="PTE">PTE</option>
            <option value="Duolingo" class="Duolingo">Duolingo</option>
            <option value="I don't have this">I don't have this</option>
            <option value="Not yet, but I will in the future">Not yet, but I will in the future</option>
        </select>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row test_score" id="IELTS" style="display: none;">
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">IELTS Exam Date: <span>*</span></label>
            <input type="date"  class="form-control ielts_date_required" name="ielts_exam_date" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
            <input type="text" class="form-control decimal ielts_reading" name="ielts_reading_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
            <input type="text" class="form-control decimal ielts_listening" name="ielts_listening_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
            <input type="text" class="form-control decimal ielts_writing" name="ielts_writing_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
            <input type="text" class="form-control decimal ielts_speaking" name="ielts_speaking_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Overall Band Score: <span>*</span></label>
            <input type="text" class="form-control decimal ielts_total_required" name="ielts_total_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">IELTS Certificate Upload</label>
            <input type="file" class="form-control multifile ielts_file_required" name="ielts_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
</div>
<div class="row test_score" id="TOEFL" style="display: none;">
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">TOEFL Exam Date: <span>*</span></label>
            <input type="date" class="form-control toefl_date_required" name="toefl_exam_date"  autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
            <input type="text" class="form-control decimal toefl_reading" name="toefl_reading_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
            <input type="text" class="form-control decimal toefl_listening" name="toefl_listening_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
            <input type="text" class="form-control decimal toefl_writing" name="toefl_writing_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
            <input type="text" class="form-control decimal toefl_speaking" name="toefl_speaking_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Overall Band Score: <span>*</span></label>
            <input type="text" class="form-control decimal toefl_total_required" name="toefl_total_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">TOEFL Certificate Upload</label>
            <input type="file" name="toefl_img[]" class="form-control multifile toefl_file_required"  accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
</div>
<div class="row test_score" id="PTE" style="display: none;">
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">PTE Exam Date: <span>*</span></label>
            <input type="date" class="form-control pte_date_required" name="pte_exam_date"  autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
            <input type="text" class="form-control decimal pte_speaking" name="pte_reading_score"  autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
            <input type="text" class="form-control decimal pte_writing" name="pte_writing_score"  autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
            <input type="text" class="form-control decimal pte_listening" name="pte_listening_score"  autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
            <input type="text" class="form-control decimal pte_speaking" name="pte_speaking_score"  autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Total Score: <span>*</span></label>
            <input type="text" class="form-control decimal pte_score pte_total_required" name="pte_total_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">PTE Certificate Upload</label>
            <input type="file" accept="gif|jpg|jpeg|pdf" name="pte_img[]" class="form-control pte_file_required" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
</div>
<div class="row test_score" id="Duolingo" style="display: none;">
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Exam Date: <span>*</span></label>
            <input type="date" name="duolingo_exam_date duolingo_date_required" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Overall Band Score: <span>*</span></label>
            <input type="text" class="form-control decimal duolingo_total_required" name="duolingo_total_score" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Duolingo Certificate Upload</label>
            <input type="file" name="duolingo_img[]" class="form-control duolingo_file_required" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span><br>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
</div>
<br/>

<h4 style="font-weight:bold;">Additional Qualifications:</h4>
<hr class="mt-5">
<input type="checkbox" id="gre" class="required">
<label> I have GRE exam scores</label><br>
<input type="checkbox" id="gmat" class="required">
<label> I have GMAT exam scores</label><br>

<div class="row gre-hidden-menu" style="display: none;">
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GRE Exam Date: <span>*</span></label>
            <input type="date" class="form-control" name="gre_exam_date" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Verbal: <span>*</span></label>
            <input type="text" class="form-control decimal" name="gre_verbal_score" value="0" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Quantitative: <span>*</span></label>
            <input type="text" class="form-control decimal" name="gre_quantitative_score" value="0" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">AWA: <span>*</span></label>
            <input type="text" class="form-control decimal" name="gre_awa_score" value="0" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GRE Certificate Upload</label>
            <input type="file" class="form-control multifile" name="gre_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
</div>
<div class="row gmat-hidden-menu" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GMAT Exam Date: <span>*</span></label>
            <input type="date" class="form-control" name="gmat_exam_date"  autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Verbal: <span>*</span></label>
            <input type="text" class="form-control decimal" name="gmat_verbal_score" value="0" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Quantitative: <span>*</span></label>
            <input type="text" class="form-control decimal" name="gmat_quantitative_score" value="0" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">AWA: <span>*</span></label>
            <input type="text" class="form-control decimal" name="gmat_awa_score" value="0" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Score: <span>*</span></label>
            <input type="text" class="form-control decimal" name="gmat_total_score" value="0" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GMAT Certificate Upload</label>
            <input type="file" class="form-control multifile" name="gmat_img[]" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
</div>

<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
