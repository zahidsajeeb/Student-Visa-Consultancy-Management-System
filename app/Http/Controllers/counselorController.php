<?php
namespace App\Http\Controllers;
use App\Mail\FileTransfer;
use App\Mail\UserInfo;
use DataTables;
use PDF;
use File;
use NumberFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Mail;
use Auth;
use Rakibhstu\Banglanumber\NumberToBangla;
use Riskihajar\Terbilang\Facades\Terbilang;

class counselorController extends Controller
{
    public function student()
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('counselor.student_list', compact('new_msg_count'));
        } else {
            return view('signin');
        }

    }
    public function student_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counter_no)
                    ->where('active', '1')
                    ->where('admission_type', 'admission')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action', 'chat'])
                    ->make(true);
            }
        } else {
            return view('signin');
        }
    }

    public function pending_student_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counter_no)
                    ->where('accept', '0')
                    ->where('active', '1')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $url = 'pdf_show/' . $row->id . '.';
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="accept_student" class="btn btn-teal btn-xs" style="border-radius:0px;text-align:center;"><i class="fa fa-folder-plus"></i> Attend</a>';
//                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="accept_student" class="dropdown-item"><i class="fa fa-edit"></i> Accept</a>
//                                <button type="submit" data-id="' . $row->id . '" id="delete_student" class="dropdown-item"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
        } else {
            return view('signin');
        }

    }

    public function counselor_accept($id)
    {
        if (Auth::check()) {
            $data = DB::table('student_entry')->where('id', '=', $id)->first();
            return response()->json($data);
        } else {
            return view('signin');
        }

    }
    public function counselor_accept_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            $email = $request->email;
            date_default_timezone_set("Asia/Dhaka");
            $date = date("Y-m-d");
            if ($request->admission_type == "follow_up") {
                DB::table('student_entry')
                    ->where('id', $id)
                    ->update([
                        "accept" => "1",
                        "note" => $request->note,
                        "commitment" => $request->commitment,
                        "next_app_date" => $request->next_app_date,
                        "admission_type" => $request->admission_type,
                    ]);
                $notification = array(
                    'message' => 'Counselor Listed Student successfully!!!!',
                    'alert-type' => 'info'
                );
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                $data = DB::table('student_entry')->select('*')->where('id', '=', $id)->first();
                return view('counselor.follow_up_show', compact('data', 'new_msg_count'))->with($notification);
            }
            if ($request->admission_type == "admission") {
                DB::table('student_entry')
                    ->where('id', $id)
                    ->update([
                        "accept" => "1",
                        "admission_type" => $request->admission_type,
                        "counselor_date" => $date,
                    ]);
                DB::table('users')->insert([
                    "name" => $request->name,
                    "role" => "Student",
                    "counter_no" => $request->counselor_name,
                    "user_name" => $request->student_id,
                    "password" => Hash::make($request->student_id),
                    "confirm_password" => $request->student_id,
                ]);

                $mail_description = [
                    'student_id' => $request->student_id,
                    'email' => $request->email,
                    'password' => $request->student_id,
                    'link' => 'software.giisbd.net',
                ];
                try {
                    Mail::to($email)->send(new UserInfo($mail_description));
                }
                catch (Exception $e) {
                    echo 'Error - ' . $e;
                }
                $notification = array(
                    'message' => 'Counselor Listed Student successfully!!!!',
                    'alert-type' => 'info'
                );
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                $data = DB::table('student_entry')->select('*')->where('id', '=', $id)->first();
                return view('counselor.account_show', compact('data', 'new_msg_count'))->with($notification);
            }
        } else {
            return view('signin');
        }
    }
    public function counselor_check_profile(Request $request)
    {
        if (Auth::check()) {
            $student_id = $request->student_id;
            $data = DB::table('student_entry')
                ->where('student_id', $student_id)
                ->update([
                    "cc_status" => "1",
                ]);
            $notification = array(
                'message' => 'Student Profile Approved By Counselor Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function admission_check_profile(Request $request)
    {
        if (Auth::check()) {
            $student_id = $request->student_id;
            $data = DB::table('student_entry')
                ->where('student_id', $student_id)
                ->update([
                    "as_status" => "1",
                ]);
            $notification = array(
                'message' => 'Student Profile Approved By Admission Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function admission_section_proceed(Request $request)
    {
        if (Auth::check()) {
            date_default_timezone_set("Asia/Dhaka");
            $date = date("Y-m-d");
            $student_id = $request->student_id;
            $data = DB::table('student_entry')
                ->where('student_id', $student_id)
                ->update([
                    "as_proceed" => "1",
                    "admission_date" => $date,
                ]);
            $notification = array(
                'message' => 'Student Profile Transfer To Admission Section Successfully!!!!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function visa_section_proceed(Request $request)
    {
        if (Auth::check()) {
            date_default_timezone_set("Asia/Dhaka");
            $date = date("Y-m-d");
            $student_id = $request->student_id;
            $data = DB::table('student_entry')
                ->where('student_id', $student_id)
                ->update([
                    "vs_proceed" => "1",
                    "visa_date" => $date,
                ]);
            $notification = array(
                'message' => 'Student Profile Transfer To Visa Section Successfully!!!!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }

    public function permission($id)
    {
        if (Auth::check()) {
            $data = DB::table('student_entry')->where('id', '=', $id)->first();
            return response()->json($data);
        } else {
            return view('signin');
        }

    }
    public function permission_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            DB::table('student_entry')
                    ->where('id', $id)
                    ->update([
                        "counselor_proceed" => "1",
                    ]);
                $notification = array(
                    'message' => 'Permission Store successfully!!!!',
                    'alert-type' => 'info'
                );
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                $data = DB::table('student_entry')->select('*')->where('id', '=', $id)->first();
//                return view('counselor.account_list', compact('data', 'new_msg_count'))->with($notification);
            return redirect()->back()->with($notification);

        } else {
            return view('signin');
        }
    }

    public function comment_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->student_id;
            DB::table('tbl_student_profile')
                ->where('student_id', $id)
                ->update([
                    "personal_info_comment" => $request->personal_info_comment,
                    "education_summary_comment" => $request->education_summary_comment,
                    "school_attended_comment" => $request->school_attended_comment,
                    "test_score_comment" => $request->test_score_comment,
                    "additional_qualification_comment" => $request->additional_qualification_comment,
                    "background_information_comment" => $request->background_information_comment,
                    "passport_comment" => $request->passport_comment,
                    "ssc_comment" => $request->ssc_comment,
                    "hsc_comment" => $request->hsc_comment,
                    "university_comment" => $request->university_comment,
                    "imp_doc_one" => $request->imp_doc_one,
                    "imp_doc_two" => $request->imp_doc_two,
                    "imp_doc_three" => $request->imp_doc_three,
                    "imp_doc_four" => $request->imp_doc_four,
                    "imp_doc_five" => $request->imp_doc_five,
                ]);
            $notification = array(
                'message' => 'Comment Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }

    public function follow()
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('counselor.follow_list', compact('new_msg_count'));
        } else {
            return view('signin');
        }
    }
    public function follow_list(Request $request)
    {
        if (Auth::check()) {
            if(Auth::user()->role==='Counselor'){
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counter_no)
                    ->where('admission_type', 'follow_up')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="accept_student" class="btn btn-success btn-xs" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Revisit/Admission</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
            }
            if(Auth::user()->role==='Admin'){
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('admission_type', 'follow_up')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="accept_student" class="btn btn-success btn-xs" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Revisit/Admission</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
            }
        } else {
            return view('signin');
        }
    }
    public function follow_up_edit($id)
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $data = DB::table('student_entry')->where('id', '=', $id)->first();
            return view('counselor.follow_up_edit', compact('data', 'new_msg_count'));
        } else {
            return view('signin');
        }
    }
    public function follow_up_update(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            $data = DB::table('student_entry')
                ->where('id', $id)
                ->update([
                    "note" => $request->note,
                    "commitment" => $request->commitment,
                    "next_app_date" => $request->next_app_date,
                ]);
            $notification = array(
                'message' => 'Follow Up Update Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }
    }
    public function follow_up_pdf($id)
    {
        if (Auth::check()) {
            $data = DB::table('student_entry')->where('id', '=', $id)->where('active', '1')->first();
            $count = DB::table('student_entry')->select(DB::raw('COUNT(id) as count'))->where('student_id', $id)->first();
            $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf = PDF::loadView('counselor.follow_up_pdf', compact('data', 'pdf'));
            return $pdf->stream('student_follow_up.pdf');
        } else {
            return view('signin');
        }
    }

    public function account()
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('counselor.account_list', compact('new_msg_count'));
        } else {
            return view('signin');
        }
    }
    public function account_list(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'Admin') {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('admission_type', 'admission')
                        ->where('active', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if (Auth::user()->role === 'Counselor') {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('counselor_name', $counter_no)
                        ->where('admission_type', 'admission')
                        ->where('active', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->counselor_proceed==0) {
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>
                                    <a href="javascript:void(0)" data-id="' . $row->id . '" id="permission" class="btn btn-teal btn-xs" style="border-radius:0px;text-align:center;"><i class="fa fa-folder-plus"></i> Permission</a>';
                                return $btn;
                            }
                            if ($row->counselor_proceed==1) {
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-xs" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            }
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
        } else {
            return view('signin');
        }
    }
    public function account_pdf($id)
    {
        if (Auth::check()) {
            $data = DB::table('student_entry')->where('id', '=', $id)->where('active', '1')->first();
            $count = DB::table('student_entry')->select(DB::raw('COUNT(id) as count'))->where('student_id', $id)->first();
            $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf = PDF::loadView('counselor.account_pdf', compact('data', 'pdf'));
            return $pdf->stream('admission.pdf');
        } else {
            return view('signin');
        }
    }

    public function counselor_immigration_list(Request $request)
    {
        $counter_no = Auth::user()->counter_no;
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counter_no)
                    ->where('active', '1')
                    ->where('purpose', 'Immigration')
                    ->where('admission_type', 'admission')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action', 'chat'])
                    ->make(true);
            }
        }
        else {
            return view('signin');
        }
    }
    public function counselor_visa_list(Request $request)
    {
        $counter_no = Auth::user()->counter_no;
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counter_no)
                    ->where('active', '1')
                    ->where('purpose', 'Student Visa')
                    ->where('admission_type', 'admission')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action', 'chat'])
                    ->make(true);
            }
        } else {
            return view('signin');
        }
    }
    public function counselor_meditourism_list(Request $request)
    {
        $counter_no = Auth::user()->counter_no;
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counter_no)
                    ->where('active', '1')
                    ->where('purpose', 'Schooling Visa')
                    ->where('admission_type', 'admission')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action', 'chat'])
                    ->make(true);
            }
        } else {
            return view('signin');
        }
    }
    public function counselor_job_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('counselor_name', $counter_no)
                    ->where('active', '1')
                    ->where('purpose', 'Job Search')
                    ->where('admission_type', 'admission')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action', 'chat'])
                    ->make(true);
            }
        } else {
            return view('signin');
        }

    }

    public function important_file_store(Request $request)
    {
//        if (Auth::check()) {
//            foreach ($request->addmore as $key => $value) {
//                DB::table('tbl_imp_file')->insert([
//                    "student_id" => $value['student_id'],
//                    "req_file_name" => $value['req_file_name'],
//                    "note" => $value['note'],
//                    "type" => "Admission",
//                ]);
//            }
//            $notification = array(
//                'message' => 'Insert Successfully!',
//                'alert-type' => 'info'
//            );
//            return redirect()->back()->with($notification);
//        }
        if (Auth::check()) {
            $email = $request->email;
//            foreach ($request->addmore as $key => $value) {
//                $imageName = time() . '.' .$key.'.'. $value['visa_req_file']->extension();
//                $value['visa_req_file']->move(public_path('upload/imp_file/admission'), $imageName);
//                DB::table('tbl_imp_file')->insert([
//                    "student_id"    => $value['student_id'],
//                    "req_file_name" => $value['req_file_name'],
//                    "note"          => $value['note'],
//                    "visa_req_file" => $imageName,
//                    "type"          => "Admission",
//                ]);
//            }
            foreach ($request->addmore as $key => $value) {
                DB::table('tbl_imp_file')->insert([
                    "student_id"    => $value['student_id'],
                    "req_file_name" => $value['req_file_name'],
                    "note"          => $value['note'],
                    "type"          => "Admission",
                ]);
            }
            $mail_description = [
                'email' => $request->email,
            ];
            try {
                Mail::to($email)->send(new FileTransfer($mail_description));
            }
            catch (Exception $e) {
                echo 'Error - ' . $e;
            }
            $notification = array(
                'message' => 'Insert Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
        else {
            return view('signin');
        }
    }
    public function important_file_update(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            $this->validate($request, [
                'imp_file' => 'required|mimes:jpeg,jpg,png,pdf|max:5120',
            ]);
            $imageName = time() . '.' . $request->imp_file->extension();
            $request->imp_file->move(public_path('upload/imp_file/admission'), $imageName);
            DB::table('tbl_imp_file')
                ->where('id', $id)
                ->update([
                    "imp_file" => $imageName,
                ]);
            $notification = array(
                'message' => 'File Stored Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }
    }
    public function important_file_description_delete($id)
    {
        if (Auth::check()) {
            $image_data = DB::table('tbl_imp_file')->select('visa_req_file')->where('id', '=', $id)->first();
            unlink(public_path("upload/imp_file/admission/$image_data->visa_req_file"));
            DB::table('tbl_imp_file')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data deleted successfully'
                ]
            );
        } else {
            return view('signin');
        }
    }
    public function important_file_delete($id)
    {
        if (Auth::check()) {
            $image_data = DB::table('tbl_imp_file')->select('imp_file')->where('id', '=', $id)->first();
            unlink(public_path("upload/imp_file/admission/$image_data->imp_file"));
            DB::table('tbl_imp_file')
                ->where('id', $id)
                ->update([
                    "imp_file" => "",
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Student deleted successfully'
                ]
            );
        } else {
            return view('signin');
        }
    }


    public function student_visa()
    {
        if (Auth::check()) {
             if(Auth::user()->role==='Counselor'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Student Visa')
                ->where('counselor_name', $counter_no)
                ->orderBy('id', 'desc')
                ->get();
            return view('counselor.accounts.student_visa', compact('new_msg_count','accounts_data'));
        }
        if(Auth::user()->role==='Admin'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Student Visa')
                ->orderBy('id', 'desc')
                ->get();
            return view('counselor.accounts.student_visa', compact('new_msg_count','accounts_data'));
        }
        }
        else {
            return view('signin');
        }
    }
    public function immigration()
    {
        if (Auth::check()) {
            if(Auth::user()->role==='Counselor'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Immigration')
                ->where('counselor_name', $counter_no)
                ->orderBy('id', 'desc')
                ->get();
            return view('counselor.accounts.immigration', compact('new_msg_count','accounts_data'));
        }
        if(Auth::user()->role==='Admin'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Immigration')
                ->orderBy('id', 'desc')
                ->get();
            return view('counselor.accounts.immigration', compact('new_msg_count','accounts_data'));
        }
        }
        else {
            return view('signin');
        }
    }
    public function schooling_visa()
    {
        if (Auth::check()) {
             if(Auth::user()->role==='Counselor'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Schooling Visa')
                ->where('counselor_name', $counter_no)
                ->orderBy('id', 'desc')
                ->get();
            return view('counselor.accounts.schooling_visa', compact('new_msg_count','accounts_data'));
        }
        if(Auth::user()->role==='Admin'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Schooling Visa')
                ->orderBy('id', 'desc')
                ->get();
            return view('counselor.accounts.schooling_visa', compact('new_msg_count','accounts_data'));
        }
        }
        else {
            return view('signin');
        }

    }
    public function job()
    {
        if (Auth::check()) {
             if(Auth::user()->role==='Counselor'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Job Search')
                ->where('counselor_name', $counter_no)
                ->orderBy('student_entry.id', 'desc')
                ->get();
            return view('counselor.accounts.job_search', compact('new_msg_count','accounts_data'));
        }
         if(Auth::user()->role==='Admin'){
            $counter_no = Auth::user()->counter_no;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $accounts_data = DB::table('student_entry')
                ->select('student_entry.*')
                ->where('active', 1)
                ->where('admission_type', 'admission')
                ->where('purpose', 'Job Search')
                ->orderBy('student_entry.id', 'desc')
                ->get();
            return view('counselor.accounts.job_search', compact('new_msg_count','accounts_data'));
        }
        }
        else {
            return view('signin');
        }

    }
}
