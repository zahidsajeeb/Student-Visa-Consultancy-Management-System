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
        $('#test_score_type').change(function () {
            $('.test_score').hide();
            $('#' + $(this).val()).show();
        });
        $(".education_level").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("class");
                if(optionValue){
                    $(".hide_box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                    $("input").addClass("required");
                } else{
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
