<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Auth;

    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $counselor_id = Auth::user()->counter_no;
                
                $counselor_name =  DB::table('student_entry')
                ->join('tbl_counselor','tbl_counselor.counter_no','student_entry.counselor_name')
                ->select('tbl_counselor.counselor_name')
                ->where('student_entry.student_id',$student_id)
                ->first();
                
                $last_id = DB::table('student_entry')->select('*')->orderBy('id', 'desc')->first();
                $data = DB::table('tbl_student_profile')
                    ->select('status')
                    ->where('student_id', $student_id)
                    ->first();
//              $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $student_id)->first();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $counselor_proceed = DB::table('student_entry')
                    ->select('counselor_proceed')
                    ->where('student_id', $student_id)
                    ->first();
                $token = DB::table('student_entry')->select('id')->orderBy('id', 'desc')->first();
                $counselor = DB::table('tbl_counselor')->select('*')->orderBy('counter_no', 'asc')->get();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '1')
                    ->where('new_message', '1')
                    ->where('student_id', $student_id)
                    ->first();
                $new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('form', 'Student')
                    ->first();
                $accounts_data = DB::table('student_entry')
                    ->join('tbl_counselor','tbl_counselor.counter_no','=','student_entry.counselor_name')
                    ->select('student_entry.*','tbl_counselor.counselor_name')
                    ->where('student_entry.active', 1)
                    ->where('student_entry.admission_type', 'admission')
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                $admission_payment = DB::table('tbl_student_payment')
                    ->select('payment_purpose')
                    ->where('payment_purpose', 'Admission')
                    ->get();
                $profile_data = DB::table('tbl_student_profile')->where('student_id', '=', $student_id)->first();
                $admission_important_data = DB::table('tbl_imp_file')->where('student_id', '=', $student_id)->where('type', '=', 'Admission')->get();
                $visa_important_data = DB::table('tbl_imp_file')->where('student_id', '=', $student_id)->where('type', '=', 'Visa')->get();
                $admission_important_data_count = DB::table('tbl_imp_file')->where('student_id', '=', $student_id)->where('type','Admission')->count();
                $visa_important_data_count = DB::table('tbl_imp_file')->where('student_id', '=', $student_id)->where('type','Visa')->count();
                $document_data = DB::table('tbl_student_file')->select('*')->where('student_id', '=', $student_id)->get();
                $check = DB::table('student_entry')->select('*')->where('student_id', '=', $student_id)->first();

                $student_visa_profile_create_notification = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counselor_id)
                    ->where('profile_create', '1')
                    ->where('purpose', 'Student Visa')
                    ->get();

                $immigration_profile_create_notification = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counselor_id)
                    ->where('profile_create', '1')
                    ->where('purpose', 'Immigration')
                    ->get();

                $medi_profile_create_notification = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counselor_id)
                    ->where('profile_create', '1')
                    ->where('purpose', 'Schooling Visa')
                    ->get();

                $job_profile_create_notification = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counselor_id)
                    ->where('profile_create', '1')
                    ->where('purpose', 'Job Search')
                    ->get();

                $as_personal_info_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_personal_info_comment_notification', '1')
                    ->first();

                $as_education_summery_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_education_summery_comment_notification', '1')
                    ->first();

                $as_school_attend_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_school_attend_comment_notification', '1')
                    ->first();

                $as_test_score_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_test_score_comment_notification', '1')
                    ->first();

                $as_additional_qualification_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_additional_qualification_comment_notification', '1')
                    ->first();
                $as_background_info_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_background_info_comment_notification', '1')
                    ->first();

                $vs_personal_info_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_personal_info_comment_notification', '1')
                    ->first();

                $vs_education_summery_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_education_summery_comment_notification', '1')
                    ->first();

                $vs_school_attend_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_school_attend_comment_notification', '1')
                    ->first();

                $vs_test_score_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_test_score_comment_notification', '1')
                    ->first();

                $vs_additional_qualification_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_additional_qualification_comment_notification', '1')
                    ->first();
                $vs_background_info_comment_notification = DB::table('tbl_student_profile')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_background_info_comment_notification', '1')
                    ->first();


                $as_passport_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_comment_notification', '1')
                    ->where('type', 'Passport')
                    ->first();
                $as_birth_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_comment_notification', '1')
                    ->where('type', 'Birth Certificate')
                    ->first();
                $as_cv_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_comment_notification', '1')
                    ->where('type', 'CV')
                    ->first();

                $as_profile_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('as_comment_notification', '1')
                    ->where('type', 'Profile')
                    ->first();
                $vs_passport_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_comment_notification', '1')
                    ->where('type', 'Passport')
                    ->first();
                $vs_birth_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_comment_notification', '1')
                    ->where('type', 'Birth Certificate')
                    ->first();
                $vs_cv_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_comment_notification', '1')
                    ->where('type', 'CV')
                    ->first();
                $vs_profile_comment_notification = DB::table('tbl_student_file')
                    ->select('*')
                    ->where('student_id', $student_id)
                    ->where('vs_comment_notification', '1')
                    ->where('type', 'Profile')
                    ->first();

            DB::table('tbl_student_profile')
                ->where('student_id', $student_id)
                ->update([
                    "as_personal_info_comment_notification" => "0",
                    "as_education_summery_comment_notification" => "0",
                    "as_school_attend_comment_notification" => "0",
                    "as_test_score_comment_notification" => "0",
                    "as_additional_qualification_comment_notification" => "0",
                    "as_background_info_comment_notification" => "0",

                    "vs_personal_info_comment_notification" => "0",
                    "vs_education_summery_comment_notification" => "0",
                    "vs_school_attend_comment_notification" => "0",
                    "vs_test_score_comment_notification" => "0",
                    "vs_additional_qualification_comment_notification" => "0",
                    "vs_background_info_comment_notification" => "0",
                ]);
                DB::table('tbl_student_file')
                    ->where('student_id', $student_id)
                    ->update([
                        "as_comment_notification" => "0",
                        "vs_comment_notification" => "0",
                    ]);

//                dd($counselor_accept);

                return view('admin/dashboard', compact('data', 'counselor', 'token', 'counselor_accept', 'admin_new_msg_count', 'new_msg_count', 'last_id', 'admission_payment', 'accounts_data', 'profile_data', 'admission_important_data', 'visa_important_data', 'document_data', 'check', 'admission_important_data_count','visa_important_data_count','student_visa_profile_create_notification', 'immigration_profile_create_notification',
                    'medi_profile_create_notification', 'job_profile_create_notification','counselor_proceed',
                    'as_personal_info_comment_notification', 'as_additional_qualification_comment_notification', 'as_education_summery_comment_notification', 'as_school_attend_comment_notification', 'as_test_score_comment_notification', 'as_background_info_comment_notification',
                    'vs_personal_info_comment_notification', 'vs_additional_qualification_comment_notification', 'vs_education_summery_comment_notification', 'vs_school_attend_comment_notification', 'vs_test_score_comment_notification', 'vs_background_info_comment_notification',
                    'as_passport_comment_notification','as_birth_comment_notification','as_cv_comment_notification','as_profile_comment_notification',
                    'vs_passport_comment_notification','vs_birth_comment_notification','vs_cv_comment_notification','vs_profile_comment_notification','counselor_name'));
            } else {
                return view('signin');
            }
        }

    }
