<script>

    $('#btn_two').on('click', function () {
        $('.box:last').remove();
    });

    function remove_two() {
        $('.box_two').remove();
    }

    function remove_three() {
        $('.box_three').remove();
    }

    function remove_four() {
        $('.box_four').remove();
    }

    function remove_five() {
        $('.box_five').remove();
    }

    $(document).ready(function () {
        $('#gre').click(function () {
            $('.gre-hidden-menu').slideToggle("slow");
        });
        $('#gmat').click(function () {
            $('.gmat-hidden-menu').slideToggle("slow");
        });
    });
    $(function () {
        // $('#test_score_type').change(function () {
        //     $('.test_score').hide();
        //     $('#' + $(this).val()).show();
        //     $("input[type=text]").addClass("required");
        //     $('.file_required').addClass("required");
        //     $('.date_required').addClass("required");
        // });

        $('.passport_img').addClass("required");
        $('.bc_img').addClass("required");
        $('.cv_img').addClass("required");
        $('.profile_img').addClass("required");

        $('.test_score_type').change(function () {
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("class");
                if(optionValue=='IELTS'){
                    $('.test_score').hide();
                    $('#IELTS').show();
                    // $("input[type=text]").addClass("required");
                    $('.ielts_reading').addClass("required");
                    $('.ielts_writing').addClass("required");
                    $('.ielts_listening').addClass("required");
                    $('.ielts_speaking').addClass("required");
                    $('.ielts_file_required').addClass("required");
                    $('.ielts_date_required').addClass("required");
                    $('.ielts_total_required').addClass("required");

                    $('.toefl_reading').removeClass("required");
                    $('.toefl_writing').removeClass("required");
                    $('.toefl_listening').removeClass("required");
                    $('.toefl_speaking').removeClass("required");
                    $('.toefl_file_required').removeClass("required");
                    $('.toefl_total_required').removeClass("required");
                    $('.toefl_date_required').removeClass("required");

                    $('.pte_reading').removeClass("required");
                    $('.pte_writing').removeClass("required");
                    $('.pte_listening').removeClass("required");
                    $('.pte_speaking').removeClass("required");
                    $('.pte_file_required').removeClass("required");
                    $('.pte_date_required').removeClass("required");
                    $('.pte_total_required').removeClass("required");

                    $('.duolingo_file_required').removeClass("required");
                    $('.duolingo_date_required').removeClass("required");
                    $('.duolingo_total_required').removeClass("required");

                }
                if(optionValue=='TOEFL'){
                    $('.test_score').hide();
                    $('#TOEFL').show();
                    $('.toefl_reading').addClass("required");
                    $('.toefl_writing').addClass("required");
                    $('.toefl_listening').addClass("required");
                    $('.toefl_speaking').addClass("required");
                    $('.toefl_file_required').addClass("required");
                    $('.toefl_total_required').addClass("required");
                    $('.toefl_date_required').addClass("required");

                    $('.ielts_reading').removeClass("required");
                    $('.ielts_writing').removeClass("required");
                    $('.ielts_listening').removeClass("required");
                    $('.ielts_speaking').removeClass("required");
                    $('.ielts_file_required').removeClass("required");
                    $('.ielts_date_required').removeClass("required");
                    $('.ielts_total_required').removeClass("required");

                    $('.pte_reading').removeClass("required");
                    $('.pte_writing').removeClass("required");
                    $('.pte_listening').removeClass("required");
                    $('.pte_speaking').removeClass("required");
                    $('.pte_file_required').removeClass("required");
                    $('.pte_date_required').removeClass("required");
                    $('.pte_total_required').removeClass("required");

                    $('.duolingo_file_required').removeClass("required");
                    $('.duolingo_date_required').removeClass("required");
                    $('.duolingo_total_required').removeClass("required");
                }
                if(optionValue=='PTE'){
                    $('.test_score').hide();
                    $('#PTE').show();
                    $('.pte_reading').addClass("required");
                    $('.pte_writing').addClass("required");
                    $('.pte_listening').addClass("required");
                    $('.pte_speaking').addClass("required");
                    $('.pte_file_required').addClass("required");
                    $('.pte_date_required').addClass("required");
                    $('.pte_total_required').addClass("required");

                    $('.ielts_reading').removeClass("required");
                    $('.ielts_writing').removeClass("required");
                    $('.ielts_listening').removeClass("required");
                    $('.ielts_speaking').removeClass("required");
                    $('.ielts_file_required').removeClass("required");
                    $('.ielts_date_required').removeClass("required");
                    $('.ielts_total_required').removeClass("required");

                    $('.toefl_reading').removeClass("required");
                    $('.toefl_writing').removeClass("required");
                    $('.toefl_listening').removeClass("required");
                    $('.toefl_speaking').removeClass("required");
                    $('.toefl_file_required').removeClass("required");
                    $('.toefl_total_required').removeClass("required");
                    $('.toefl_date_required').removeClass("required");

                    $('.duolingo_file_required').removeClass("required");
                    $('.duolingo_date_required').removeClass("required");
                    $('.duolingo_total_required').removeClass("required");
                }
                if(optionValue=='Duolingo'){
                    $('.test_score').hide();
                    $('#Duolingo').show();
                    $('.duolingo_file_required').addClass("required");
                    $('.duolingo_date_required').addClass("required");
                    $('.duolingo_total_required').addClass("required");

                    $('.ielts_reading').removeClass("required");
                    $('.ielts_writing').removeClass("required");
                    $('.ielts_listening').removeClass("required");
                    $('.ielts_speaking').removeClass("required");
                    $('.ielts_file_required').removeClass("required");
                    $('.ielts_date_required').removeClass("required");
                    $('.ielts_total_required').removeClass("required");

                    $('.toefl_reading').removeClass("required");
                    $('.toefl_writing').removeClass("required");
                    $('.toefl_listening').removeClass("required");
                    $('.toefl_speaking').removeClass("required");
                    $('.toefl_file_required').removeClass("required");
                    $('.toefl_total_required').removeClass("required");
                    $('.toefl_date_required').removeClass("required");

                    $('.pte_reading').removeClass("required");
                    $('.pte_writing').removeClass("required");
                    $('.pte_listening').removeClass("required");
                    $('.pte_speaking').removeClass("required");
                    $('.pte_file_required').removeClass("required");
                    $('.pte_date_required').removeClass("required");
                    $('.pte_total_required').removeClass("required");
                }
            });
        });

        $('.education_level').change(function () {
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("class");
                if(optionValue=='primary'){
                    $('.test_score').hide();
                    $('#primary').show();
                    $('#primary_two').show();
                    $('.primary_required_country').addClass("required");
                    $('.primary_required_one').addClass("required");
                    $('.primary_required_two').addClass("required");
                    $('.primary_required_three').addClass("required");
                    $('.primary_required_four').addClass("required");
                    $('.primary_required_five').addClass("required");
                    $('.primary_required_six').addClass("required");
                    $('.primary_required_seven').addClass("required");
                    $('.primary_required_eight').addClass("required");
                    $('.primary_required_nine').addClass("required");
                    $('.primary_required_ten').addClass("required");
                    $('.primary_required_eleven').addClass("required");
                    $('.primary_grading_scheme').addClass("required");
                    $('.primary_grade_avg').addClass("required");

                    $('.primary_two_required_country').addClass("required");
                    $('.primary_two_required_one').addClass("required");
                    $('.primary_two_required_two').addClass("required");
                    $('.primary_two_required_three').addClass("required");
                    $('.primary_two_required_four').addClass("required");
                    $('.primary_two_required_five').addClass("required");
                    $('.primary_two_required_six').addClass("required");
                    $('.primary_two_required_seven').addClass("required");
                    $('.primary_two_required_eight').addClass("required");
                    $('.primary_two_required_nine').addClass("required");
                    $('.primary_two_required_ten').addClass("required");
                    $('.primary_two_required_eleven').addClass("required");
                    $('.primary_two_grading_scheme').addClass("required");
                    $('.primary_two_grade_avg').addClass("required");

                    $('.secondary_required_country').removeClass("required");
                    $('.secondary_required_one').removeClass("required");
                    $('.secondary_required_two').removeClass("required");
                    $('.secondary_required_three').removeClass("required");
                    $('.secondary_required_four').removeClass("required");
                    $('.secondary_required_five').removeClass("required");
                    $('.secondary_required_six').removeClass("required");
                    $('.secondary_required_seven').removeClass("required");
                    $('.secondary_required_eight').removeClass("required");
                    $('.secondary_required_nine').removeClass("required");
                    $('.secondary_required_ten').removeClass("required");
                    $('.secondary_required_eleven').removeClass("required");

                    $('.undergraduate_required_country').removeClass("required");
                    $('.undergraduate_required_one').removeClass("required");
                    $('.undergraduate_required_two').removeClass("required");
                    $('.undergraduate_required_three').removeClass("required");
                    $('.undergraduate_required_four').removeClass("required");
                    $('.undergraduate_required_five').removeClass("required");
                    $('.undergraduate_required_six').removeClass("required");
                    $('.undergraduate_required_seven').removeClass("required");
                    $('.undergraduate_required_eight').removeClass("required");
                    $('.undergraduate_required_nine').removeClass("required");
                    $('.undergraduate_required_ten').removeClass("required");
                    $('.undergraduate_required_eleven').removeClass("required");

                    $('.postgraduate_required_country').removeClass("required");
                    $('.postgraduate_required_one').removeClass("required");
                    $('.postgraduate_required_two').removeClass("required");
                    $('.postgraduate_required_three').removeClass("required");
                    $('.postgraduate_required_four').removeClass("required");
                    $('.postgraduate_required_five').removeClass("required");
                    $('.postgraduate_required_six').removeClass("required");
                    $('.postgraduate_required_seven').removeClass("required");
                    $('.postgraduate_required_eight').removeClass("required");
                    $('.postgraduate_required_nine').removeClass("required");
                    $('.postgraduate_required_ten').removeClass("required");
                    $('.postgraduate_required_eleven').removeClass("required");

                    $('.double_postgraduate_required_country').removeClass("required");
                    $('.double_postgraduate_required_one').removeClass("required");
                    $('.double_postgraduate_required_two').removeClass("required");
                    $('.double_postgraduate_required_three').removeClass("required");
                    $('.double_postgraduate_required_four').removeClass("required");
                    $('.double_postgraduate_required_five').removeClass("required");
                    $('.double_postgraduate_required_six').removeClass("required");
                    $('.double_postgraduate_required_seven').removeClass("required");
                    $('.double_postgraduate_required_eight').removeClass("required");
                    $('.double_postgraduate_required_nine').removeClass("required");
                    $('.double_postgraduate_required_ten').removeClass("required");
                    $('.double_postgraduate_required_eleven').removeClass("required");
                }
                if(optionValue=='secondary'){
                    $('.test_score').hide();
                    $('#primary').show();
                    $('#secondary').show();

                    $('.primary_required_country').addClass("required");
                    $('.primary_required_one').addClass("required");
                    $('.primary_required_two').addClass("required");
                    $('.primary_required_three').addClass("required");
                    $('.primary_required_four').addClass("required");
                    $('.primary_required_five').addClass("required");
                    $('.primary_required_six').addClass("required");
                    $('.primary_required_seven').addClass("required");
                    $('.primary_required_eight').addClass("required");
                    $('.primary_required_nine').addClass("required");
                    $('.primary_required_ten').addClass("required");
                    $('.primary_required_eleven').addClass("required");

                    $('.secondary_required_country').addClass("required");
                    $('.secondary_required_one').addClass("required");
                    $('.secondary_required_two').addClass("required");
                    $('.secondary_required_three').addClass("required");
                    $('.secondary_required_four').addClass("required");
                    $('.secondary_required_five').addClass("required");
                    $('.secondary_required_six').addClass("required");
                    $('.secondary_required_seven').addClass("required");
                    $('.secondary_required_eight').addClass("required");
                    $('.secondary_required_nine').addClass("required");
                    $('.secondary_required_ten').addClass("required");
                    $('.secondary_required_eleven').addClass("required");

                    $('.primary_two_required_country').removeClass("required");
                    $('.primary_two_required_one').removeClass("required");
                    $('.primary_two_required_two').removeClass("required");
                    $('.primary_two_required_three').removeClass("required");
                    $('.primary_two_required_four').removeClass("required");
                    $('.primary_two_required_five').removeClass("required");
                    $('.primary_two_required_six').removeClass("required");
                    $('.primary_two_required_seven').removeClass("required");
                    $('.primary_two_required_eight').removeClass("required");
                    $('.primary_two_required_nine').removeClass("required");
                    $('.primary_two_required_ten').removeClass("required");
                    $('.primary_two_required_eleven').removeClass("required");
                    $('.primary_two_grading_scheme').removeClass("required");
                    $('.primary_two_grade_avg').removeClass("required");

                    $('.undergraduate_required_country').removeClass("required");
                    $('.undergraduate_required_one').removeClass("required");
                    $('.undergraduate_required_two').removeClass("required");
                    $('.undergraduate_required_three').removeClass("required");
                    $('.undergraduate_required_four').removeClass("required");
                    $('.undergraduate_required_five').removeClass("required");
                    $('.undergraduate_required_six').removeClass("required");
                    $('.undergraduate_required_seven').removeClass("required");
                    $('.undergraduate_required_eight').removeClass("required");
                    $('.undergraduate_required_nine').removeClass("required");
                    $('.undergraduate_required_ten').removeClass("required");
                    $('.undergraduate_required_eleven').removeClass("required");

                    $('.postgraduate_required_country').removeClass("required");
                    $('.postgraduate_required_one').removeClass("required");
                    $('.postgraduate_required_two').removeClass("required");
                    $('.postgraduate_required_three').removeClass("required");
                    $('.postgraduate_required_four').removeClass("required");
                    $('.postgraduate_required_five').removeClass("required");
                    $('.postgraduate_required_six').removeClass("required");
                    $('.postgraduate_required_seven').removeClass("required");
                    $('.postgraduate_required_eight').removeClass("required");
                    $('.postgraduate_required_nine').removeClass("required");
                    $('.postgraduate_required_ten').removeClass("required");
                    $('.postgraduate_required_eleven').removeClass("required");

                    $('.double_postgraduate_required_country').removeClass("required");
                    $('.double_postgraduate_required_one').removeClass("required");
                    $('.double_postgraduate_required_two').removeClass("required");
                    $('.double_postgraduate_required_three').removeClass("required");
                    $('.double_postgraduate_required_four').removeClass("required");
                    $('.double_postgraduate_required_five').removeClass("required");
                    $('.double_postgraduate_required_six').removeClass("required");
                    $('.double_postgraduate_required_seven').removeClass("required");
                    $('.double_postgraduate_required_eight').removeClass("required");
                    $('.double_postgraduate_required_nine').removeClass("required");
                    $('.double_postgraduate_required_ten').removeClass("required");
                    $('.double_postgraduate_required_eleven').removeClass("required");
                }
                if(optionValue=='undergraduate'){
                    $('.test_score').hide();
                    $('#primary').show();
                    $('#secondary').show();
                    $('#undergraduate').show();

                    $('.primary_required_country').addClass("required");
                    $('.primary_required_one').addClass("required");
                    $('.primary_required_two').addClass("required");
                    $('.primary_required_three').addClass("required");
                    $('.primary_required_four').addClass("required");
                    $('.primary_required_five').addClass("required");
                    $('.primary_required_six').addClass("required");
                    $('.primary_required_seven').addClass("required");
                    $('.primary_required_eight').addClass("required");
                    $('.primary_required_nine').addClass("required");
                    $('.primary_required_ten').addClass("required");
                    $('.primary_required_eleven').addClass("required");

                    $('.secondary_required_country').addClass("required");
                    $('.secondary_required_one').addClass("required");
                    $('.secondary_required_two').addClass("required");
                    $('.secondary_required_three').addClass("required");
                    $('.secondary_required_four').addClass("required");
                    $('.secondary_required_five').addClass("required");
                    $('.secondary_required_six').addClass("required");
                    $('.secondary_required_seven').addClass("required");
                    $('.secondary_required_eight').addClass("required");
                    $('.secondary_required_nine').addClass("required");
                    $('.secondary_required_ten').addClass("required");
                    $('.secondary_required_eleven').addClass("required");

                    $('.undergraduate_required_country').addClass("required");
                    $('.undergraduate_required_one').addClass("required");
                    $('.undergraduate_required_two').addClass("required");
                    $('.undergraduate_required_three').addClass("required");
                    $('.undergraduate_required_four').addClass("required");
                    $('.undergraduate_required_five').addClass("required");
                    $('.undergraduate_required_six').addClass("required");
                    $('.undergraduate_required_seven').addClass("required");
                    $('.undergraduate_required_eight').addClass("required");
                    $('.undergraduate_required_nine').addClass("required");
                    $('.undergraduate_required_ten').addClass("required");
                    $('.undergraduate_required_eleven').addClass("required");

                    $('.primary_two_required_country').removeClass("required");
                    $('.primary_two_required_one').removeClass("required");
                    $('.primary_two_required_two').removeClass("required");
                    $('.primary_two_required_three').removeClass("required");
                    $('.primary_two_required_four').removeClass("required");
                    $('.primary_two_required_five').removeClass("required");
                    $('.primary_two_required_six').removeClass("required");
                    $('.primary_two_required_seven').removeClass("required");
                    $('.primary_two_required_eight').removeClass("required");
                    $('.primary_two_required_nine').removeClass("required");
                    $('.primary_two_required_ten').removeClass("required");
                    $('.primary_two_required_eleven').removeClass("required");
                    $('.primary_two_grading_scheme').removeClass("required");
                    $('.primary_two_grade_avg').removeClass("required");

                    $('.postgraduate_required_country').removeClass("required");
                    $('.postgraduate_required_one').removeClass("required");
                    $('.postgraduate_required_two').removeClass("required");
                    $('.postgraduate_required_three').removeClass("required");
                    $('.postgraduate_required_four').removeClass("required");
                    $('.postgraduate_required_five').removeClass("required");
                    $('.postgraduate_required_six').removeClass("required");
                    $('.postgraduate_required_seven').removeClass("required");
                    $('.postgraduate_required_eight').removeClass("required");
                    $('.postgraduate_required_nine').removeClass("required");
                    $('.postgraduate_required_ten').removeClass("required");
                    $('.postgraduate_required_eleven').removeClass("required");

                    $('.double_postgraduate_required_country').removeClass("required");
                    $('.double_postgraduate_required_one').removeClass("required");
                    $('.double_postgraduate_required_two').removeClass("required");
                    $('.double_postgraduate_required_three').removeClass("required");
                    $('.double_postgraduate_required_four').removeClass("required");
                    $('.double_postgraduate_required_five').removeClass("required");
                    $('.double_postgraduate_required_six').removeClass("required");
                    $('.double_postgraduate_required_seven').removeClass("required");
                    $('.double_postgraduate_required_eight').removeClass("required");
                    $('.double_postgraduate_required_nine').removeClass("required");
                    $('.double_postgraduate_required_ten').removeClass("required");
                    $('.double_postgraduate_required_eleven').removeClass("required");
                }
                if(optionValue=='postgraduate'){
                    $('.test_score').hide();
                    $('#primary').show();
                    $('#secondary').show();
                    $('#undergraduate').show();
                    $('#postgraduate').show();

                    $('.primary_required_country').addClass("required");
                    $('.primary_required_one').addClass("required");
                    $('.primary_required_two').addClass("required");
                    $('.primary_required_three').addClass("required");
                    $('.primary_required_four').addClass("required");
                    $('.primary_required_five').addClass("required");
                    $('.primary_required_six').addClass("required");
                    $('.primary_required_seven').addClass("required");
                    $('.primary_required_eight').addClass("required");
                    $('.primary_required_nine').addClass("required");
                    $('.primary_required_ten').addClass("required");
                    $('.primary_required_eleven').addClass("required");

                    $('.secondary_required_country').addClass("required");
                    $('.secondary_required_one').addClass("required");
                    $('.secondary_required_two').addClass("required");
                    $('.secondary_required_three').addClass("required");
                    $('.secondary_required_four').addClass("required");
                    $('.secondary_required_five').addClass("required");
                    $('.secondary_required_six').addClass("required");
                    $('.secondary_required_seven').addClass("required");
                    $('.secondary_required_eight').addClass("required");
                    $('.secondary_required_nine').addClass("required");
                    $('.secondary_required_ten').addClass("required");
                    $('.secondary_required_eleven').addClass("required");

                    $('.undergraduate_required_country').addClass("required");
                    $('.undergraduate_required_one').addClass("required");
                    $('.undergraduate_required_two').addClass("required");
                    $('.undergraduate_required_three').addClass("required");
                    $('.undergraduate_required_four').addClass("required");
                    $('.undergraduate_required_five').addClass("required");
                    $('.undergraduate_required_six').addClass("required");
                    $('.undergraduate_required_seven').addClass("required");
                    $('.undergraduate_required_eight').addClass("required");
                    $('.undergraduate_required_nine').addClass("required");
                    $('.undergraduate_required_ten').addClass("required");
                    $('.undergraduate_required_eleven').addClass("required");


                    $('.postgraduate_required_country').addClass("required");
                    $('.postgraduate_required_one').addClass("required");
                    $('.postgraduate_required_two').addClass("required");
                    $('.postgraduate_required_three').addClass("required");
                    $('.postgraduate_required_four').addClass("required");
                    $('.postgraduate_required_five').addClass("required");
                    $('.postgraduate_required_six').addClass("required");
                    $('.postgraduate_required_seven').addClass("required");
                    $('.postgraduate_required_eight').addClass("required");
                    $('.postgraduate_required_nine').addClass("required");
                    $('.postgraduate_required_ten').addClass("required");
                    $('.postgraduate_required_eleven').addClass("required");

                    $('.primary_two_required_country').removeClass("required");
                    $('.primary_two_required_one').removeClass("required");
                    $('.primary_two_required_two').removeClass("required");
                    $('.primary_two_required_three').removeClass("required");
                    $('.primary_two_required_four').removeClass("required");
                    $('.primary_two_required_five').removeClass("required");
                    $('.primary_two_required_six').removeClass("required");
                    $('.primary_two_required_seven').removeClass("required");
                    $('.primary_two_required_eight').removeClass("required");
                    $('.primary_two_required_nine').removeClass("required");
                    $('.primary_two_required_ten').removeClass("required");
                    $('.primary_two_required_eleven').removeClass("required");
                    $('.primary_two_grading_scheme').removeClass("required");
                    $('.primary_two_grade_avg').removeClass("required");

                    $('.double_postgraduate_required_country').removeClass("required");
                    $('.double_postgraduate_required_one').removeClass("required");
                    $('.double_postgraduate_required_two').removeClass("required");
                    $('.double_postgraduate_required_three').removeClass("required");
                    $('.double_postgraduate_required_four').removeClass("required");
                    $('.double_postgraduate_required_five').removeClass("required");
                    $('.double_postgraduate_required_six').removeClass("required");
                    $('.double_postgraduate_required_seven').removeClass("required");
                    $('.double_postgraduate_required_eight').removeClass("required");
                    $('.double_postgraduate_required_nine').removeClass("required");
                    $('.double_postgraduate_required_ten').removeClass("required");
                    $('.double_postgraduate_required_eleven').removeClass("required");
                }
                if(optionValue=='double_postgraduate'){
                    $('.test_score').hide();
                    $('#primary').show();
                    $('#secondary').show();
                    $('#undergraduate').show();
                    $('#postgraduate').show();
                    $('#double_postgraduate').show();

                    $('.primary_required_country').addClass("required");
                    $('.primary_required_one').addClass("required");
                    $('.primary_required_two').addClass("required");
                    $('.primary_required_three').addClass("required");
                    $('.primary_required_four').addClass("required");
                    $('.primary_required_five').addClass("required");
                    $('.primary_required_six').addClass("required");
                    $('.primary_required_seven').addClass("required");
                    $('.primary_required_eight').addClass("required");
                    $('.primary_required_nine').addClass("required");
                    $('.primary_required_ten').addClass("required");
                    $('.primary_required_eleven').addClass("required");

                    $('.secondary_required_country').addClass("required");
                    $('.secondary_required_one').addClass("required");
                    $('.secondary_required_two').addClass("required");
                    $('.secondary_required_three').addClass("required");
                    $('.secondary_required_four').addClass("required");
                    $('.secondary_required_five').addClass("required");
                    $('.secondary_required_six').addClass("required");
                    $('.secondary_required_seven').addClass("required");
                    $('.secondary_required_eight').addClass("required");
                    $('.secondary_required_nine').addClass("required");
                    $('.secondary_required_ten').addClass("required");
                    $('.secondary_required_eleven').addClass("required");

                    $('.undergraduate_required_country').addClass("required");
                    $('.undergraduate_required_one').addClass("required");
                    $('.undergraduate_required_two').addClass("required");
                    $('.undergraduate_required_three').addClass("required");
                    $('.undergraduate_required_four').addClass("required");
                    $('.undergraduate_required_five').addClass("required");
                    $('.undergraduate_required_six').addClass("required");
                    $('.undergraduate_required_seven').addClass("required");
                    $('.undergraduate_required_eight').addClass("required");
                    $('.undergraduate_required_nine').addClass("required");
                    $('.undergraduate_required_ten').addClass("required");
                    $('.undergraduate_required_eleven').addClass("required");

                    $('.postgraduate_required_country').addClass("required");
                    $('.postgraduate_required_one').addClass("required");
                    $('.postgraduate_required_two').addClass("required");
                    $('.postgraduate_required_three').addClass("required");
                    $('.postgraduate_required_four').addClass("required");
                    $('.postgraduate_required_five').addClass("required");
                    $('.postgraduate_required_six').addClass("required");
                    $('.postgraduate_required_seven').addClass("required");
                    $('.postgraduate_required_eight').addClass("required");
                    $('.postgraduate_required_nine').addClass("required");
                    $('.postgraduate_required_ten').addClass("required");
                    $('.postgraduate_required_eleven').addClass("required");

                    $('.double_postgraduate_required_country').addClass("required");
                    $('.double_postgraduate_required_one').addClass("required");
                    $('.double_postgraduate_required_two').addClass("required");
                    $('.double_postgraduate_required_three').addClass("required");
                    $('.double_postgraduate_required_four').addClass("required");
                    $('.double_postgraduate_required_five').addClass("required");
                    $('.double_postgraduate_required_six').addClass("required");
                    $('.double_postgraduate_required_seven').addClass("required");
                    $('.double_postgraduate_required_eight').addClass("required");
                    $('.double_postgraduate_required_nine').addClass("required");
                    $('.double_postgraduate_required_ten').addClass("required");
                    $('.double_postgraduate_required_eleven').addClass("required");

                    $('.primary_two_required_country').removeClass("required");
                    $('.primary_two_required_one').removeClass("required");
                    $('.primary_two_required_two').removeClass("required");
                    $('.primary_two_required_three').removeClass("required");
                    $('.primary_two_required_four').removeClass("required");
                    $('.primary_two_required_five').removeClass("required");
                    $('.primary_two_required_six').removeClass("required");
                    $('.primary_two_required_seven').removeClass("required");
                    $('.primary_two_required_eight').removeClass("required");
                    $('.primary_two_required_nine').removeClass("required");
                    $('.primary_two_required_ten').removeClass("required");
                    $('.primary_two_required_eleven').removeClass("required");
                    $('.primary_two_grading_scheme').removeClass("required");
                    $('.primary_two_grade_avg').removeClass("required");
                }
            });
        });


        $(".education_level").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("class");
                // console.log(optionValue);
                if(optionValue){
                    $(".hide_box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                    // $("input[type=text]").addClass("required");
                }
                else{
                    $(".hide_box").hide();
                }
            });
        }).change();
    });
</script>
{{--<script>--}}
{{--    $('.add_one').hide()--}}
{{--    jQuery('#add_one').on('click',function(){--}}
{{--        jQuery('.add_one').toggle();--}}
{{--    })--}}

{{--    function hide() {--}}
{{--        x = document.getElementsByClassName('add_one');--}}
{{--        x.className = 'hide';--}}
{{--    }--}}
{{--</script>--}}

<script>
    function add_more_one(id, visibility) {
        document.getElementById(id).style.display = visibility;
    }
    function add_more_two(id, visibility) {
        document.getElementById(id).style.display = visibility;
    }
    function add_more_three(id, visibility) {
        document.getElementById(id).style.display = visibility;
    }
    function add_more_four(id, visibility) {
        document.getElementById(id).style.display = visibility;
    }
</script>
