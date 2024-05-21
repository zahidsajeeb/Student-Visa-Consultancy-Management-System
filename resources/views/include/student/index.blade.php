<?php
    error_reporting(0);
    $student_id = $profile_data->student_id;
    $education_data = DB::table('tbl_student_education')
        ->select('*')
        ->where('student_id', $student_id)
        ->get();
?>
<link href="{{asset('backend/all_file.css')}}" rel="stylesheet" type="text/css">
<style>
    .error {
        display: none;
        color: red;
    }

    .state-visible {
        display: block;
    }
    .hide {
        display: none;
    }
    .hide_box{
        display: none;
    }
</style>

@if($counselor_accept->accept==0 || $counselor_proceed->counselor_proceed==0)
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Counselor Panel) </h4>
                        </div>
                        <div class="navbar-right">
                            <a href="{{url('frontdesk_student_list')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 style="text-align:center;">Your System Is Currently Disable. Please Contact Counselor Section.</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if($counselor_accept->accept==1 && $counselor_proceed->counselor_proceed==1)
    @if($data->status==0 )
        @include('include.student.profile_pending')
    @endif
    @if($data->status==1)
        @include('include.student.profile_done')
    @endif
@endif

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/jquery.MultiFile.js')}}"></script>
<script>
    "use strict";

    function scroll_to_class(element_class, removed_height) {
        var scroll_to = $(element_class).offset().top - removed_height;
        if ($(window).scrollTop() != scroll_to) {
            $('.form-wizard').stop().animate({scrollTop: scroll_to}, 0);
        }
    }

    function bar_progress(progress_line_object, direction) {
        var number_of_steps = progress_line_object.data('number-of-steps');
        var now_value = progress_line_object.data('now-value');
        var new_value = 0;
        if (direction == 'right') {
            new_value = now_value + (100 / number_of_steps);
        } else if (direction == 'left') {
            new_value = now_value - (100 / number_of_steps);
        }
        progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
    }

    jQuery(document).ready(function () {
        $('.form-wizard fieldset:first').fadeIn('slow');
        $('.form-wizard .required').on('focus', function () {
            $(this).removeClass('input-error');
        });

        $('.form-wizard .btn-next').on('click', function () {
            var parent_fieldset = $(this).parents('fieldset');
            var next_step = true;
            var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
            var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

            parent_fieldset.find('.required').each(function () {
                if ($(this).val() == "") {
                    $(this).addClass('input-error');
                    next_step = false;
                } else {
                    $(this).removeClass('input-error');
                }
            });
            if (next_step) {
                parent_fieldset.fadeOut(400, function () {
                    current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                    bar_progress(progress_line, 'right');
                    $(this).next().fadeIn();
                    scroll_to_class($('.form-wizard'), 20);
                });
            }
        });
        // previous step
        $('.form-wizard .btn-previous').on('click', function () {
            var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
            var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

            $(this).parents('fieldset').fadeOut(400, function () {
                current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
                bar_progress(progress_line, 'left');
                $(this).prev().fadeIn();
                scroll_to_class($('.form-wizard'), 20);
            });
        });

        // submit
        $('.form-wizard').on('submit', function (e) {
            $(this).find('.required').each(function () {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass('input-error');
                } else {
                    $(this).removeClass('input-error');
                }
            });
        });
    });

    var $dropzone = $('.image_picker'),
        $droptarget = $('.drop_target'),
        $dropinput = $('#inputFile'),
        $dropimg = $('.image_preview'),
        $remover = $('[data-action="remove_current_image"]');

    $dropzone.on('dragover', function () {
        $droptarget.addClass('dropping');
        return false;
    });

    $dropzone.on('dragend dragleave', function () {
        $droptarget.removeClass('dropping');
        return false;
    });
    $dropzone.on('drop', function (e) {
        $droptarget.removeClass('dropping');
        $droptarget.addClass('dropped');
        $remover.removeClass('disabled');
        e.preventDefault();

        var file = e.originalEvent.dataTransfer.files[0],
            reader = new FileReader();

        reader.onload = function (event) {
            $dropimg.css('background-image', 'url(' + event.target.result + ')');
        };

        console.log(file);
        reader.readAsDataURL(file);

        return false;
    });
    $dropinput.change(function (e) {
        $droptarget.addClass('dropped');
        $remover.removeClass('disabled');
        $('.image_title input').val('');

        var file = $dropinput.get(0).files[0],
            reader = new FileReader();

        reader.onload = function (event) {
            $dropimg.css('background-image', 'url(' + event.target.result + ')');
        }

        reader.readAsDataURL(file);
    });
    $remover.on('click', function () {
        $dropimg.css('background-image', '');
        $droptarget.removeClass('dropped');
        $remover.addClass('disabled');
        $('.image_title input').val('');
    });
    $('.image_title input').blur(function () {
        if ($(this).val() != '') {
            $droptarget.removeClass('dropped');
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $('#load2').on('click', function() {
    //     var $this = $(this);
    //     $this.button('loading');
    //     setTimeout(function() {
    //         $this.button('reset');
    //     }, 8000);
    // });

    $('#profileForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $('#load2').html('Sending..');
        $.ajax({
            type: 'POST',
            url: "{{ url('student_profile_store')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                if ($.isEmptyObject(data.error)) {
                    $('#profileForm').trigger("reset");
                    swal.fire({
                        icon: 'success',
                        title: 'Student Profile Stored Successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    setInterval('location.reload()', 2000);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
                else {
                    printErrorMsg(data.error);
                    $("#saveBtn").prop("disabled", false);
                    $('#load2').html('Submit');
                }
            }
        });
        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function (key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    });


    $(document).ready(function () {
        $("#proficiency_test").change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".proficiency_test_box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".proficiency_test_box").hide();
                }
            });
        }).change();
        $("#standardized_test").change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".standardized_test_box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".standardized_test_box").hide();
                }
            });
        }).change();
    });
    $("#single").select2({
        placeholder: "Select a programming language",
        allowClear: true
    });
</script>
@include('.include.student.store.js.educational_js')
<script>
    $('.multifile').MultiFile({
        // list: '#myList',
        // max: 3,
        // fileSize:1024,

        error: function (s) {
            if (typeof console != 'undefined') console.log(s);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: s
            })
        }
    });

    $(function () {
        $("input.decimal").bind("change keyup input", function () {
            var position = this.selectionStart - 1;
            //remove all but number and .
            var fixed = this.value.replace(/[^0-9\.]/g, "");
            if (fixed.charAt(0) === ".")
                //can't start with .
                fixed = fixed.slice(1);

            var pos = fixed.indexOf(".") + 1;
            if (pos >= 0)
                //avoid more than one .
                fixed = fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");

            if (this.value !== fixed) {
                this.value = fixed;
                this.selectionStart = position;
                this.selectionEnd = position;
            }
        });
    })
</script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        $('.previousOne').select2();
        $('.previousTwo').select2();
    });

    $(document).ready(function () {
        var $order_name = $('#order-name');
        var $output = $('#output');
        var $select1 = $('#select1');
        var $select2 = $('#select2');
        var $select3 = $('#select3');
        var $options2 = $select2.find('option');
        var $options3 = $select3.find('option');
        $select1.on('change', function (event) {
            $select2.html(
                $options2.filter(
                    function () {
                        return $(this).data('section1') == $select1[0].selectedOptions[0].value;
                    }
                )
            );
            $select2.trigger('change');
        }).trigger('change');
        $select2.on('change', function (event) {
            $select3.html(
                $options3.filter(
                    function () {
                        return $(this).val() == $select2[0].selectedOptions[0].value;
                    }
                )
            );
        }).trigger('change');
        var $previousOneselect1 = $('#previousOneselect1');
        var $previousOneselect2 = $('#previousOneselect2');
        var $previousOneselect3 = $('#previousOneselect3');
        var $previousOneoptions2 = $previousOneselect2.find('option');
        var $previousOneoptions3 = $previousOneselect3.find('option');
        $previousOneselect1.on('change', function (event) {
            $previousOneselect2.html(
                $previousOneoptions2.filter(
                    function () {
                        return $(this).data('section1') == $previousOneselect1[0].selectedOptions[0].value;
                    }
                )
            );
            $previousOneselect2.trigger('change');
        }).trigger('change');
        $previousOneselect2.on('change', function (event) {
            $previousOneselect3.html(
                $previousOneoptions3.filter(
                    function () {
                        return $(this).val() == $previousOneselect2[0].selectedOptions[0].value;
                    }
                )
            );
        }).trigger('change');

        var $previousTwoselect1 = $('#previousTwoselect1');
        var $previousTwoselect2 = $('#previousTwoselect2');
        var $previousTwoselect3 = $('#previousTwoselect3');
        var $previousTwooptions2 = $previousTwoselect2.find('option');
        var $previousTwooptions3 = $previousTwoselect3.find('option');
        $previousTwoselect1.on('change', function (event) {
            $previousTwoselect2.html(
                $previousTwooptions2.filter(
                    function () {
                        return $(this).data('section1') == $previousTwoselect1[0].selectedOptions[0].value;
                    }
                )
            );
            $previousTwoselect2.trigger('change');
        }).trigger('change');
        $previousTwoselect2.on('change', function (event) {
            $previousTwoselect3.html(
                $previousTwooptions3.filter(
                    function () {
                        return $(this).val() == $previousTwoselect2[0].selectedOptions[0].value;
                    }
                )
            );
        }).trigger('change');


    });
    $(function () {
        $('.colorselector').change(function () {
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
        $('.previousOnecolorselector').change(function () {
            $('.previousOnecolors').hide();
            $('#' + $(this).val()).show();
        });
        $('.previousTwocolorselector').change(function () {
            $('.previousTwocolors').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script>
    $('body').on('click', '.delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "delete_important_file/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Employee Information Delete Successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    setInterval('location.reload()', 2000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
    $('body').on('click', '.imp_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "important_file_delete/" + id,
                success: function (data) {
                    swal.fire({
                        icon: 'error',
                        title: 'Important File Delete Successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    setInterval('location.reload()', 2000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>
