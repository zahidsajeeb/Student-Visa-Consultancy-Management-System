<tr>
    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;"><h3>Country & Program</h3></td>
</tr>
<fieldset>
    {{--    <legend> <h1><b>Above grade 12: (Bachelor, Master, PhD etc……):</b></h1></legend>--}}
    <tr>
        <td colspan="6"><h1><b>Above grade 12: (Bachelor, Master, PhD etc……):</b></h1></td>
    </tr>
    <table class="table table-bordered">
        <tr>
            <td>Country:</td>
            <td colspan="2">
                {{$country_program->above_country}}
            </td>
        </tr>
        <tr>
            <td colspan="3"><h4 style="text-align:center;"><b>Institute Name 1: {{$country_program->above_ins_one}} </b></h4></td>
        </tr>
        <tr>
            <td><h4><b>Program Choose1 </b></h4></td>
            <td><h4><b>Program Choose2 </b></h4></td>
            <td><h4><b>Program Choose3 </b></h4></td>
        </tr>
        <tr>
            <td>Program Level:</td>
            <td>Program Level:</td>
            <td>Program Level:</td>
        </tr>
        <tr>
            <td>
                @if(($country_program->above_level_one)!='0')
                    {{$country_program->above_level_one}}
                @endif
                @if(($country_program->above_level_one_optional))
                    {{$country_program->above_level_one_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->above_level_two)!='0')
                    {{$country_program->above_level_two}}
                @else
                    {{$country_program->above_level_two_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->above_level_three)!='0')
                    {{$country_program->above_level_three}}
                @else
                    {{$country_program->above_level_three_optional}}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="3"><h4 style="text-align:center;"><b>Institute Name 2: {{$country_program->above_ins_two}}</b></h4></td>
        </tr>
        <tr>
            <td><h4><b>Program Choose1 </b></h4></td>
            <td><h4><b>Program Choose2 </b></h4></td>
            <td><h4><b>Program Choose3 </b></h4></td>
        </tr>
        <tr>
            <td>Program Level:</td>
            <td>Program Level:</td>
            <td>Program Level:</td>
        </tr>
        <tr>
            <td>
                @if(($country_program->above_level_four)!='0')
                    {{$country_program->above_level_four}}
                @else
                    {{$country_program->above_level_four_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->above_level_five)!='0')
                    {{$country_program->above_level_five}}
                @else
                    {{$country_program->above_level_five_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->above_level_six)!='0')
                    {{$country_program->above_level_six}}
                @else
                    {{$country_program->above_level_six_optional}}
                @endif
            </td>
        </tr>

        <tr>
            <td colspan="3"><h4 style="text-align:center;"><b>Institute Name 3: {{$country_program->above_ins_three}}</b></h4></td>
        </tr>
        <tr>
            <td><h4><b>Program Choose1 </b></h4></td>
            <td><h4><b>Program Choose2 </b></h4></td>
            <td><h4><b>Program Choose3 </b></h4></td>
        </tr>
        <tr>
            <td>Program Level:</td>
            <td>Program Level:</td>
            <td>Program Level:</td>
        </tr>
        <tr>
            <td>
                @if(($country_program->above_level_seven)!='0')
                    {{$country_program->above_level_seven}}
                @else
                    {{$country_program->above_level_seven_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->above_level_eight)!='0')
                    {{$country_program->above_level_eight}}
                @else
                    {{$country_program->above_level_eight_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->above_level_nine)!='0')
                    {{$country_program->above_level_nine}}
                @else
                    {{$country_program->above_level_nine_optional}}
                @endif
            </td>
        </tr>

    </table>
</fieldset>
<fieldset>
    <legend><h1><b>Below grade 12: (Bachelor, Master, PhD etc……)</b></h1></legend>
    <table class="table table-bordered">
        <tr>
            <td>Choose Country:</td>
            <td colspan="3">
                {{$country_program->below_country}}
            </td>
        </tr>
        <tr>
            <td><h4><b>Institute Name 1 : {{$country_program->below_ins_one}} </b></h4></td>
            <td><h4><b>Institute Name 2 : {{$country_program->below_ins_two}} </b></h4></td>
            <td><h4><b>Institute Name 3 : {{$country_program->below_ins_three}} </b></h4></td>
        </tr>
        <tr>
            <td>Grade/Class Level:</td>
            <td>Grade/Class Level:</td>
            <td>Grade/Class Level:</td>
        </tr>
        <tr>
            <td>
                @if(($country_program->below_grade_one)!='0')
                    {{$country_program->below_grade_one}}
                @else
                    {{$country_program->below_grade_one_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->below_grade_two)!='0')
                    {{$country_program->below_grade_two}}
                @else
                    {{$country_program->below_grade_one_optional}}
                @endif
            </td>
            <td>
                @if(($country_program->below_grade_three)!='0')
                    {{$country_program->below_grade_three}}
                @else
                    {{$country_program->below_grade_three_optional}}
                @endif
            </td>
        </tr>
    </table>
</fieldset>


