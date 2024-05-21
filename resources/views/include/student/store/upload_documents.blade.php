<h4>Upload Documents: <span>Step 5 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport Upload (Automated): <span>*</span></label><br>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span>
            <input type="file" name="passport_img[]" class="form-control multifile passport_img" id="passport_img" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Birth Certificate Upload: <span>*</span></label><br>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span>
            <input type="file" name="bc_img[]" class="form-control multifile bc_img" id="bc_img" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">CV Upload: <span>*</span></label><br>
            <span style="color:blue;">(***File Must be jpg, jpeg, png, pdf & File size max 1MB***)</span>
            <input type="file" name="cv_img[]" class="form-control multifile cv_img" id="cv_img" accept="png|jpg|jpeg|pdf" data-maxfile="1024" multiple>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport Size Image Upload: <span>*</span></label><br>
            <span style="color:blue;">(***File Must be jpg, jpeg, png & File size max 1MB***)</span>
            <input type="file" name="profile_img[]" class="form-control multifile profile_img" id="profile_img" accept="png|jpg|jpeg" data-maxfile="1024" multiple>
            <span style="color:blue;"><b>(*** If the red sign doesn't go, cross the file and upload the file again.*** )</b></span>
        </div>
    </div>
</div>
<br/>

<div id="fileUploadsContainer"></div>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="submit" class="btn btn-submit second" style="border-radius:0px;" id="load2" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order"><i class="fa fa-check"></i> Submit</button>
</div>



