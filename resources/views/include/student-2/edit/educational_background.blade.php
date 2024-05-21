<style>
    .select2-selection--single {
        margin-top: 0px;
    }
</style>
<h4 class="mt-2" style="font-weight:bold;">Education Summary :<span>Step 2 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <td>Country of Education:</td>
                <td>{{$profile_data->education_country}}</td>
            </tr>
            <tr>
                <td>Highest Level of Education:</td>
                <td>{{$profile_data->education_level}}</td>
            </tr>
            <tr>
                <td>Grading Scheme:</td>
                <td>
                    @if($profile_data->grading_scheme=="Secondary_Education_Letter_Scale")
                        Secondary Education Letter Scale F - A+
                    @endif
                    @if($profile_data->grading_scheme=="Secondary_Education_Percentage_Scale")
                        Secondary Education Percentage Scale 0-100
                    @endif
                    @if($profile_data->grading_scheme=="Secondary_Education_Grade_Point")
                        Secondary Education Grade Point 5.0 Scale
                    @endif
                    @if($profile_data->grading_scheme=="Higher_Education_Letter_Scale")
                        Higher Education Letter Scale F - A+
                    @endif
                    @if($profile_data->grading_scheme=="Higher_Education_Grade_Point")
                        Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)
                    @endif
                    @if($profile_data->grading_scheme=="Higher_Education_Percentage_Scale")
                        Higher Education Percentage Scale 0-100
                    @endif
                    @if($profile_data->grading_scheme=="Other")
                        Other
                    @endif
                </td>
            </tr>
            <tr>
                <td>Grade Average:</td>
                <td>
                    @if(isset($profile_data->grade_avg_1)===true)
                        {{$profile_data->grade_avg_1}}
                    @endif
                    @if(isset($profile_data->grade_avg_2)===true)
                        {{$profile_data->grade_avg_2}}
                    @endif
                    @if(isset($profile_data->grade_avg_3)===true)
                        {{$profile_data->grade_avg_3}}
                    @endif
                    @if(isset($profile_data->grade_avg_4)===true)
                        {{$profile_data->grade_avg_4}}
                    @endif
                    @if(isset($profile_data->grade_avg_5)===true)
                        {{$profile_data->grade_avg_5}}
                    @endif
                    @if(isset($profile_data->grade_avg_6)===true)
                        {{$profile_data->grade_avg_6}}
                    @endif
                    @if(isset($profile_data->grade_avg_7)===true)
                        {{$profile_data->grade_avg_7}}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Grade Scale (Out of):</td>
                <td>{{$profile_data->grade_scale}}"</td>
            </tr>
            <tr>
                <td>I have graduated from this institution?</td>
                <td>{{$profile_data->grade_institute}}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 style="text-align:center;"><span style="color:red;">If Edit Please Fill Up This. . .</span></h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Country of Education</label>
            <select class="form-control form-control-select2" name="education_country">
                <option value="{{$profile_data->education_country}}">{{$profile_data->education_country}}</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Highest Level of Education</label>
        </div>
        <select class="js-example-basic-single form-control" id="select1" name="education_level" style="display: block;!important;">
            <option disabled selected>-Select-</option>
            <optgroup label="Primary">
                <option value="Grade 1">Grade 1</option>
                <option value="Grade 2">Grade 2</option>
                <option value="Grade 3">Grade 3</option>
                <option value="Grade 4">Grade 4</option>
                <option value="Grade 5">Grade 5</option>
                <option value="Grade 6">Grade 6</option>
                <option value="Grade 7">Grade 7</option>
                <option value="Grade 8">Grade 8</option>
            </optgroup>
            <optgroup label="Secondary">
                <option value="Grade 9">Grade 9</option>
                <option value="Grade 10">Grade 10</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12/High School</option>
            </optgroup>
            <optgroup label="Undergraduate">
                <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
            </optgroup>
            <optgroup label="Postgraduate">
                <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                <option value="Master Degree">Master Degree</option>
                <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
            </optgroup>
        </select>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Grading Scheme</label>
            <select class="form-control colorselector" name="grading_scheme" id="select2">
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
                <option value="Other" data-section1="Doctoral Degree (Phd, M.D . .)">Other</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div id="Secondary_Education_Letter_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <select class="form-control" name="grade_avg_1">
                    <option disabled selected>-Select-</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B">B</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>
        <div id="Secondary_Education_Percentage_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_2" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Secondary_Education_Grade_Point" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_3" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Higher_Education_Letter_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <select class="form-control" name="grade_avg_4">
                    <option selected disabled>-Select-</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>
        <div id="Higher_Education_Percentage_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_5" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Higher_Education_Grade_Point" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_6" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Other" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_7" class="form-control" autocomplete="off">
                <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                <select class="form-control" name="grade_scale">
                    <option disabled selected>-Select-</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">I have graduated from this institution?</label>
            <select class="form-control" name="grade_institute">
                <option disabled selected>-Select-</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if($education_data_count==1)
            <button type="button" class="btn btn-primary btn-sm" onclick="add_two()" style="border-radius:0px;"><i class="icon icon-plus2"></i> Add School</button>
            <div class="btn btn-danger" id="btn_two" style="cursor:pointer; border-radius:0px;"><p><i class="fa fa-close"></i> Remove</p></div>
        @endif
            @if($education_data_count==2)
                <button type="button" class="btn btn-primary btn-sm" onclick="add_three()" style="border-radius:0px;"><i class="icon icon-plus2"></i> Add School</button>
                <div class="btn btn-danger" id="btn_three" style="cursor:pointer; border-radius:0px;"><p><i class="fa fa-close"></i> Remove</p></div>
            @endif
            @if($education_data_count==3)
                <button type="button" class="btn btn-primary btn-sm" onclick="add_four()" style="border-radius:0px;"><i class="icon icon-plus2"></i> Add School</button>
                <div class="btn btn-danger" id="btn_four" style="cursor:pointer; border-radius:0px;"><p><i class="fa fa-close"></i> Remove</p></div>
            @endif
            @if($education_data_count==4)
                <button type="button" class="btn btn-primary btn-sm" onclick="add_five()" style="border-radius:0px;"><i class="icon icon-plus2"></i> Add School</button>
                <div class="btn btn-danger" id="btn_four" style="cursor:pointer; border-radius:0px;"><p><i class="fa fa-close"></i> Remove</p></div>
            @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="box" style="width:100%;">
            @foreach($education_data as $key=>$row)
                <h4 style="font-weight:bold; margin-top:10px;">Schools Attended {{++$key}} :</h4>
                <hr style="margin-top:30px;">
                @if($row->type=="add_more_one")
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Country of Institution:</label>
                                <select class="form-control form-control-select2" name="add_more_one_institution_country">
                                    <option value="{{$row->institution_country}}">{{$row->institution_country}}</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Name of Institution</label>
                                <input type="text" name="add_more_one_institution_name" value="{{$row->institution_name}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Level of Education</label>
                                <input type="text" name="add_more_one_education_level" value="{{$row->education_level}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Primary Language of Instructions:</label>
                                <input type="text" name="add_more_one_primary_language_instruction" value="{{$row->primary_language_instruction}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Attended Institution From:</label>
                                <input type="date" name="add_more_one_institution_from" value="{{$row->institution_from}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Attended Institution To</label>
                                <input type="date" name="add_more_one_institution_to" value="{{$row->institution_to}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                <input type="text" name="add_more_one_institution_degree" value="{{$row->institution_degree}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Address:</label>
                                <input type="text" name="add_more_one_institution_address" value="{{$row->institution_address}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">City/Town:</label>
                                <input type="text" name="add_more_one_institution_city" value="{{$row->institution_city}}" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Province</label>
                                <input type="text" name="add_more_one_institution_province" value="{{$row->institution_province}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                <input type="text" name="add_more_one_institution_zip" value="{{$row->institution_zip}}" class="form-control" autocomplete="off">
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
                                <input type="file" name="certificate_img_one[]" class="form-control" autocomplete="off" multiple>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Transcript</label>
                                <input type="file" name="transcript_img_one[]" class="form-control" autocomplete="off" multiple>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="add_more_one_table" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>File View</th>
                                    <th>File Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($document_data as $key=>$result)
                                    @if(($row->education_level)==($result->type))
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                </button>
                                            </td>
                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm add_more_one_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}?>"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                            </td>
                                            <div id="modal_theme_primary<?php echo $row->id; ?>"
                                                 class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h6 class="modal-title">Uploaded File</h6>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                @if($row->type=="add_more_two")
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Country of Institution:</label>
                                <select class="form-control form-control-select2" name="add_more_two_institution_country">
                                    <option value="{{$row->institution_country}}">{{$row->institution_country}}</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Name of Institution</label>
                                <input type="text" name="add_more_two_institution_name" value="{{$row->institution_name}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Level of Education</label>
                                <input type="text" name="add_more_two_education_level" value="{{$row->education_level}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Primary Language of Instructions:</label>
                                <input type="text" name="add_more_two_primary_language_instruction" value="{{$row->primary_language_instruction}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Attended Institution From:</label>
                                <input type="date" name="add_more_two_institution_from" value="{{$row->institution_from}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Attended Institution To</label>
                                <input type="date" name="add_more_two_institution_to" value="{{$row->institution_to}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                <input type="text" name="add_more_two_institution_degree" value="{{$row->institution_degree}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Address:</label>
                                <input type="text" name="add_more_two_institution_address" value="{{$row->institution_address}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">City/Town:</label>
                                <input type="text" name="add_more_two_institution_city" value="{{$row->institution_city}}" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Province</label>
                                <input type="text" name="add_more_two_institution_province" value="{{$row->institution_province}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                <input type="text" name="add_more_two_institution_zip" value="{{$row->institution_zip}}" class="form-control" autocomplete="off">
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
                                <input type="file" name="certificate_img_two[]" class="form-control" autocomplete="off" multiple>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Transcript</label>
                                <input type="file" name="transcript_img_two[]" class="form-control" autocomplete="off" multiple>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="add_more_two_table" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>File View</th>
                                    <th>File Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($document_data as $key=>$result)
                                    @if(($row->education_level)==($result->type))
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                </button>
                                            </td>
                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm add_more_two_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                            </td>

                                            <div id="modal_theme_primary<?php echo $row->id; ?>"
                                                 class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h6 class="modal-title">Uploaded File</h6>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                @if($row->type=="add_more_three")
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Country of Institution:</label>
                                <select class="form-control form-control-select2" name="add_more_three_institution_country">
                                    <option value="{{$row->institution_country}}">{{$row->institution_country}}</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Name of Institution</label>
                                <input type="text" name="add_more_three_institution_name" value="{{$row->institution_name}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Level of Education</label>
                                <input type="text" name="add_more_three_education_level" value="{{$row->education_level}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Primary Language of Instructions:</label>
                                <input type="text" name="add_more_three_primary_language_instruction" value="{{$row->primary_language_instruction}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Attended Institution From:</label>
                                <input type="date" name="add_more_three_institution_from" value="{{$row->institution_from}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Attended Institution To</label>
                                <input type="date" name="add_more_three_institution_to" value="{{$row->institution_to}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                <input type="text" name="add_more_three_institution_degree" value="{{$row->institution_degree}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Address:</label>
                                <input type="text" name="add_more_three_institution_address" value="{{$row->institution_address}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">City/Town:</label>
                                <input type="text" name="add_more_three_institution_city" value="{{$row->institution_city}}" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Province</label>
                                <input type="text" name="add_more_three_institution_province" value="{{$row->institution_province}}" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                <input type="text" name="add_more_three_institution_zip" value="{{$row->institution_zip}}" class="form-control" autocomplete="off">
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
                                <input type="file" name="certificate_img_three[]" class="form-control" autocomplete="off" multiple>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="color:black;font-weight:500;">Transcript</label>
                                <input type="file" name="transcript_img_three[]" class="form-control" autocomplete="off" multiple>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="add_more_three_table" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>File View</th>
                                    <th>File Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($document_data as $result)
                                    @if(($row->education_level)==($result->type))
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>"><i class="icon-file-pdf ml-2"></i> File View
                                                </button>
                                            </td>
                                            <td><span><a href="javascript:void(0)" class="btn btn-danger btn-sm add_more_three_delete_file" style="border-radius:0px;" data-id="{{$result->file_name}}"><i class="icon-trash ml-2"></i> Delete File</a></span>
                                            </td>

                                            <div id="modal_theme_primary<?php echo $row->id; ?>"
                                                 class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h6 class="modal-title">Uploaded File</h6>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <embed src="{{ url('upload/'.$result->file_name) }}" frameborder="0" width="100%" height="780">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div id="fileUploadsContainer"></div>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
