<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
    <div class="sidebar-content">
        <div class="sidebar-section sidebar-user my-1">
            <div class="sidebar-section-body">
                <div class="media">
                    <a href="#" class="mr-3">
                        <!--<img src="{{asset('backend/global_assets/images/demo/users/face11.jpg')}}" class="rounded-circle" alt="">-->
                    </a>
                    <div class="media-body">
                        <div class="font-weight-semibold">
                            @if(Auth::user()->role == "Student")
                            {{$profile_data->f_name}} {{$profile_data->m_name}} {{$profile_data->l_name}}
                            @else
                                {{Auth::user()->name}}
                            @endif
                        </div>
                        <div class="font-size-sm line-height-sm opacity-50">

                            @if(Auth::user()->role == "Assistant Counselor")
                                Admission Section
                            @else
                                <b>Role</b>: {{Auth::user()->role}}<br>
                                <b>User ID</b>: {{Auth::user()->user_name}}
                            @endif
                        </div>
                    </div>
                    <div class="ml-3 align-self-center">
                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                            <i class="icon-transmission"></i>
                        </button>
                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                            <i class="icon-cross2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                @if(Auth::user()->role==='Admin')
                    <li class="nav-item nav-item-submenu">
                    <li class="nav-item">
                        <a class="{{ (request()->is('home')) ? 'active' : '' }} nav-link" href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Home</span></a>
                        <a class="{{ (request()->is('employee')) ? 'active' : '' }} nav-link" href="{{url('employee')}}" class="nav-link"><i class="fa fa-bars"></i><span>Employee List</span></a>
                        <a class="{{ (request()->is('employee')) ? 'active' : '' }} nav-link" href="{{url('student')}}" class="nav-link"><i class="fa fa-bars"></i><span>Student List</span></a>
                        <a class="{{ (request()->is('follow')) ? 'active' : '' }} nav-link" href="{{url('follow')}}" class="nav-link"><i class="fa fa-bars"></i><span>Follow Up List</span></a>
                        <a class="{{ (request()->is('account')) ? 'active' : '' }} nav-link" href="{{url('account')}}" class="nav-link"><i class="fa fa-bars"></i><span>Account List</span></a>
                        <a class="{{ (request()->is('admission')) ? 'active' : '' }} nav-link" href="{{url('admission')}}" class="nav-link"><i class="fa fa-bars"></i><span>Admission Section</span></a>
                        <a class="{{ (request()->is('visa')) ? 'active' : '' }} nav-link" href="{{url('visa')}}" class="nav-link"><i class="fa fa-bars"></i><span>Visa Section</span></a>
                        {{--                        <a class="{{ (request()->is('student')) ? 'active' : '' }} nav-link" href="{{url('student')}}" class="nav-link"><i class="fa fa-bars"></i><span>Student List</span></a>--}}
                        <a class="{{ (request()->is('student_visa')) ? 'active' : '' }} nav-link" href="{{url('student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                        <a class="{{ (request()->is('immigration')) ? 'active' : '' }} nav-link" href="{{url('immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                        <a class="{{ (request()->is('meditourism')) ? 'active' : '' }} nav-link" href="{{url('meditourism')}}"><i class="fa fa-bars"></i><span>Schooling Visa </span></a>
                        <a class="{{ (request()->is('job')) ? 'active' : '' }} nav-link" href="{{url('job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                        <!--<a class="{{ (request()->is('balance_check')) ? 'active' : '' }} nav-link" href="{{url('balance_check')}}"><i class="fa fa-bars"></i><span>Balance Check</span></a>-->
                        <a class="{{ (request()->is('message_approval')) ? 'active' : '' }} nav-link" href="{{url('message_approval')}}" class="nav-link"><i class="fa fa-bars"></i><span>New Message</span> &nbsp;<span class="badge badge-light">{{$new_msg_count->count}}</span></a>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Report</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <li class="nav-item"><a class="{{ (request()->is('student_report')) ? 'active' : '' }} nav-link" href="{{url('student_report')}}" class="nav-link"><i class="fa fa-bars"></i><span>Student Report</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->is('report')) ? 'active' : '' }} nav-link" href="{{url('report')}}" class="nav-link"><i class="fa fa-bars"></i><span>Counselor Report</span></a></li>
                        </ul>
                    </li>
                     <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="fa fa-bars"></i> <span>Accounts & Finance</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <a class="{{ (request()->is('counselor/student_visa')) ? 'active' : '' }} nav-link" href="{{url('counselor/student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                            <a class="{{ (request()->is('counselor/immigration')) ? 'active' : '' }} nav-link" href="{{url('counselor/immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                            <a class="{{ (request()->is('counselor/schooling_visa')) ? 'active' : '' }} nav-link" href="{{url('counselor/schooling_visa')}}"><i class="fa fa-bars"></i><span>Schooling Visa</span></a>
                            <a class="{{ (request()->is('counselor/job')) ? 'active' : '' }} nav-link" href="{{url('counselor/job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->role==='Counselor')
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">Main</div>
                        <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">
                        <a class="{{ (request()->is('home')) ? 'active' : '' }} nav-link" href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Home</span></a>
                        {{--                        <a class="{{ (request()->is('student')) ? 'active' : '' }} nav-link" href="{{url('student')}}" class="nav-link"><i class="fa fa-bars"></i><span>Student List</span></a>--}}
                        <a class="{{ (request()->is('follow')) ? 'active' : '' }} nav-link" href="{{url('follow')}}" class="nav-link"><i class="fa fa-bars"></i><span>Follow Up List</span></a>
                        <a class="{{ (request()->is('account')) ? 'active' : '' }} nav-link" href="{{url('account')}}" class="nav-link"><i class="fa fa-bars"></i><span>Account List</span></a>
                        <a class="{{ (request()->is('admission')) ? 'active' : '' }} nav-link" href="{{url('admission')}}" class="nav-link"><i class="fa fa-bars"></i><span>Admission Section</span></a>
                        <a class="{{ (request()->is('visa')) ? 'active' : '' }} nav-link" href="{{url('visa')}}" class="nav-link"><i class="fa fa-bars"></i><span>Visa Section</span></a>
                        <a class="{{ (request()->is('student_visa')) ? 'active' : '' }} nav-link" href="{{url('student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                        <a class="{{ (request()->is('immigration')) ? 'active' : '' }} nav-link" href="{{url('immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                        <a class="{{ (request()->is('meditourism')) ? 'active' : '' }} nav-link" href="{{url('meditourism')}}"><i class="fa fa-bars"></i><span>Schooling Visa</span></a>
                        <a class="{{ (request()->is('job')) ? 'active' : '' }} nav-link" href="{{url('job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                        <a class="{{ (request()->is('message_approval')) ? 'active' : '' }} nav-link" href="{{url('message_approval')}}" class="nav-link"><i class="fa fa-bars"></i><span>New Message</span> &nbsp;<span class="badge badge-light">{{$new_msg_count->count}}</span></a>
                        <!--<a class="{{ (request()->is('balance_check')) ? 'active' : '' }} nav-link" href="{{url('balance_check')}}"><i class="fa fa-bars"></i><span>Balance Check</span></a>-->
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="fa fa-bars"></i> <span>Accounts & Finance</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <a class="{{ (request()->is('counselor/student_visa')) ? 'active' : '' }} nav-link" href="{{url('counselor/student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                            <a class="{{ (request()->is('counselor/immigration')) ? 'active' : '' }} nav-link" href="{{url('counselor/immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                            <a class="{{ (request()->is('counselor/schooling_visa')) ? 'active' : '' }} nav-link" href="{{url('counselor/schooling_visa')}}"><i class="fa fa-bars"></i><span>Schooling Visa</span></a>
                            <a class="{{ (request()->is('counselor/job')) ? 'active' : '' }} nav-link" href="{{url('counselor/job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->role==='Admission Section')
                    <li class="nav-item nav-item-submenu">
                    <li class="nav-item">
                        <a class="{{ (request()->is('home')) ? 'active' : '' }} nav-link" href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Home</span></a>
                        {{--                        <a class="{{ (request()->is('student')) ? 'active' : '' }} nav-link" href="{{url('student')}}" class="nav-link"><i class="fa fa-bars"></i><span>Student List</span></a>--}}
                        <a class="{{ (request()->is('student_visa')) ? 'active' : '' }} nav-link" href="{{url('student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                        <a class="{{ (request()->is('immigration')) ? 'active' : '' }} nav-link" href="{{url('immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                        <a class="{{ (request()->is('meditourism')) ? 'active' : '' }} nav-link" href="{{url('meditourism')}}"><i class="fa fa-bars"></i><span>Schooling Visa</span></a>
                        <a class="{{ (request()->is('job')) ? 'active' : '' }} nav-link" href="{{url('job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                        <a class="{{ (request()->is('message_approval')) ? 'active' : '' }} nav-link" href="{{url('message_approval')}}" class="nav-link"><i class="fa fa-bars"></i><span>New Message</span>&nbsp<span class="badge badge-light">{{$new_msg_count->count}}</span></a>
                        {{--                            <a class="{{ (request()->is('balance_check')) ? 'active' : '' }} nav-link" href="{{url('balance_check')}}"><i class="fa fa-bars"></i><span>Balance Check</span></a>--}}
                    </li>
                @endif
                @if(Auth::user()->role==='Visa Section')
                    <a class="{{ (request()->is('home')) ? 'active' : '' }} nav-link" href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Home</span></a>
                    {{--                        <a class="{{ (request()->is('student')) ? 'active' : '' }} nav-link" href="{{url('student')}}" class="nav-link"><i class="fa fa-bars"></i><span>Student List</span></a>--}}
                    <a class="{{ (request()->is('student_visa')) ? 'active' : '' }} nav-link" href="{{url('student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                    <a class="{{ (request()->is('immigration')) ? 'active' : '' }} nav-link" href="{{url('immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                    <a class="{{ (request()->is('meditourism')) ? 'active' : '' }} nav-link" href="{{url('meditourism')}}"><i class="fa fa-bars"></i><span>Schooling Visa</span></a>
                    <a class="{{ (request()->is('job')) ? 'active' : '' }} nav-link" href="{{url('job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                    <a class="{{ (request()->is('message_approval')) ? 'active' : '' }} nav-link" href="{{url('message_approval')}}" class="nav-link"><i class="fa fa-bars"></i><span>New Message</span>&nbsp<span class="badge badge-light">{{$new_msg_count->count}}</span></a>
                    {{--                        <a class="{{ (request()->is('balance_check')) ? 'active' : '' }} nav-link" href="{{url('balance_check')}}"><i class="fa fa-bars"></i><span>Balance Check</span></a>--}}
                @endif
                @if(Auth::user()->role==='Operator')
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">Main</div>
                        <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">
                        <a class="{{ (request()->is('home')) ? 'active' : '' }} nav-link" href="{{url('home')}}" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
                        <a class="{{ (request()->is('frontdesk_student_list')) ? 'active' : '' }} nav-link" href="{{url('frontdesk_student_list')}}" class="nav-link"><i class="fa fa-bars"></i><span>All Student List- (Check List)</span></a>
                        <a class="{{ (request()->is('student_visa')) ? 'active' : '' }} nav-link" href="{{url('student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                        <a class="{{ (request()->is('immigration')) ? 'active' : '' }} nav-link" href="{{url('immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                        <a class="{{ (request()->is('meditourism')) ? 'active' : '' }} nav-link" href="{{url('meditourism')}}"><i class="fa fa-bars"></i><span>Schooling Visa</span></a>
                        <a class="{{ (request()->is('job')) ? 'active' : '' }} nav-link" href="{{url('job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                    </li>
                @endif
                @if(Auth::user()->role==='Student')
                    @if($counselor_accept->accept==1)
                        <?php $token = Auth::user()->user_name; ?>
                        <li class="nav-item-header">
                            <div class="text-uppercase font-size-xs line-height-xs">Main</div>
                            <i class="icon-menu" title="Main"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Academic Information</span></a>
                            <a class="{{ (request()->is('country_programme')) ? 'active' : '' }} nav-link" href="{{url('country_programme')}}"><i class="fa fa-bars"></i><span>Choose Country & Program</span></a>
                            <a class="{{ (request()->is('visa_info')) ? 'active' : '' }} nav-link" href="{{url('visa_info')}}"><i class="fa fa-bars"></i><span>Visa Section</span></a>
                            <a class="{{ (request()->is('admission_info')) ? 'active' : '' }} nav-link" href="{{url('admission_info')}}"><i class="fa fa-bars"></i><span>Admission Section</span></a>
                            <a class="{{ (request()->is('student_password_change')) ? 'active' : '' }} nav-link" href="{{url('student_password_change')}}"><i class="fa fa-bars"></i><span>Password Change</span></a>
                            <!--<a class="{{ (request()->is('student_profile_edit')) ? 'active' : '' }} nav-link" href="{{url('student_profile_edit')}}/<?php echo $token;?>" class="nav-link"><i class="fa fa-bars"></i><span>Student Profile Edit</span></a>-->
                            <a class="{{ (request()->is('chat')) ? 'active' : '' }} nav-link" href="{{url('chat',$token)}}" class="nav-link"><i class="fa fa-bars"></i><span>Message</span> &nbsp;<span class="badge badge-light">{{$admin_new_msg_count->count}}</span></a>
                            {{--                            <a class="{{ (request()->is('student_payment')) ? 'active' : '' }} nav-link" href="{{url('student_payment')}}" class="nav-link"><i class="icon-home4"></i><span>Payment History</span></a>--}}
                        </li>
                    @endif
                @endif
                @if(Auth::user()->role==='Accountant')
                    <li class="nav-item">
                        <a href="{{url('home')}}" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
                        <a class="{{ (request()->is('accounts/student_visa')) ? 'active' : '' }} nav-link" href="{{url('accounts/student_visa')}}"><i class="fa fa-bars"></i><span>Student Visa</span></a>
                        <a class="{{ (request()->is('accounts/immigration')) ? 'active' : '' }} nav-link" href="{{url('accounts/immigration')}}"><i class="fa fa-bars"></i><span>Immigration</span></a>
                        <a class="{{ (request()->is('accounts/meditourism')) ? 'active' : '' }} nav-link" href="{{url('accounts/meditourism')}}"><i class="fa fa-bars"></i><span>Schooling Visa</span></a>
                        <a class="{{ (request()->is('accounts/job')) ? 'active' : '' }} nav-link" href="{{url('accounts/job')}}"><i class="fa fa-bars"></i><span>Job Search</span></a>
                        {{--                        <a class="{{ (request()->is('balance_check')) ? 'active' : '' }} nav-link" href="{{url('balance_check')}}"><i class="icon-home4"></i><span>Balance Check</span></a>--}}
                        {{--                        <a class="{{ (request()->is('admission_fee')) ? 'active' : '' }} nav-link" href="{{url('admission_fee')}}"><i class="fa fa-bars"></i><span>Admission Fee</span></a>--}}
                        {{--                        <a class="{{ (request()->is('step_one')) ? 'active' : '' }} nav-link" href="{{url('step_one')}}"><i class="fa fa-bars"></i><span>Step 1</span></a>--}}
                        {{--                        <a class="{{ (request()->is('step_two')) ? 'active' : '' }} nav-link" href="{{url('step_two')}}"><i class="fa fa-bars"></i><span>Step 2</span></a>--}}
                        {{--                        <a class="{{ (request()->is('step_three')) ? 'active' : '' }} nav-link" href="{{url('step_three')}}"><i class="fa fa-bars"></i><span>Step 3</span></a>--}}
                        {{--                        <a class="{{ (request()->is('step_four')) ? 'active' : '' }} nav-link" href="{{url('step_four')}}"><i class="fa fa-bars"></i><span>Step 4</span></a>--}}
                        {{--                        <a class="{{ (request()->is('step_five')) ? 'active' : '' }} nav-link" href="{{url('step_five')}}"><i class="fa fa-bars"></i><span>Step 5</span></a>--}}
                        {{--                        <a class="{{ (request()->is('processing_fee')) ? 'active' : '' }} nav-link" href="{{url('processing_fee')}}"><i class="fa fa-bars"></i><span>Processing Fee</span></a>--}}
                        {{--                        <a class="{{ (request()->is('servicing_fee')) ? 'active' : '' }} nav-link" href="{{url('servicing_fee')}}"><i class="fa fa-bars"></i><span>Service Charge</span></a>--}}
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
