<meta charset="utf-8">
<meta name="description" content="@lang('metas.description')">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Visa Software Admin Panel</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{asset('backend/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('backend/assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script src="{{asset('backend/global_assets/js/main/jquery.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/jgrowl.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/wizards/steps.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/inputs/inputmask.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{asset('backend/assets/js/app.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/form_layouts.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/form_wizard.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/dashboard.js')}}"></script>
{{--<script src="{{asset('backend/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/global_assets/js/demo_pages/datatables_basic.js')}}"></script>--}}
<script src="{{asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js')}}"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

{{--<link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">--}}
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>


