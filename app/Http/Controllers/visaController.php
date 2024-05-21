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

class visaController extends Controller
{
    public function visa_student_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', '1')
                    ->where('cc_status', '1')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $url = 'pdf_show/' . $row->id . '.';
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-file"></i> Profile Show</a>
													<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal"><i class="fa fa-envelope"></i> Message</a>';
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
    public function visa_immigration_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', '1')
                    ->where('cc_status', '1')
                    ->where('purpose', 'Immigration')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $url = 'pdf_show/' . $row->id . '.';
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-file"></i> Profile Show</a>
													<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal"><i class="fa fa-envelope"></i> Message</a>';
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
    public function visa_visa_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', '1')
                    ->where('cc_status', '1')
                    ->where('purpose', 'Student Visa')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $url = 'pdf_show/' . $row->id . '.';
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-file"></i> Profile Show</a>
													<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal"><i class="fa fa-envelope"></i> Message</a>';
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
    public function visa_meditourism_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', '1')
                    ->where('cc_status', '1')
                    ->where('purpose', 'Schooling Visa')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $url = 'pdf_show/' . $row->id . '.';
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-file"></i> Profile Show</a>
													<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal"><i class="fa fa-envelope"></i> Message</a>';
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
    public function visa_job_list(Request $request)
    {
        if (Auth::check()) {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', '1')
                    ->where('cc_status', '1')
                    ->where('purpose', 'Job Search')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $url = 'pdf_show/' . $row->id . '.';
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-file"></i> Profile Show</a>
													<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF</a>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal"><i class="fa fa-envelope"></i> Message</a>';
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


    public function visa_important_file_store(Request $request)
    {
        if (Auth::check()) {
            // $email = $request->email;
            foreach ($request->addmore as $key => $value) {
                $imageName = time() . '.' .$key.'.'. $value['visa_req_file']->extension();
                $value['visa_req_file']->move(public_path('upload/imp_file/visa'), $imageName);
                DB::table('tbl_imp_file')->insert([
                    "student_id"    => $value['student_id'],
                    "req_file_name" => $value['req_file_name'],
                    "note"          => $value['note'],
                    "visa_req_file" => $imageName,
                    "type"          => "Visa",
                ]);
            }
            // $mail_description = [
            //     'email' => $request->email,
            // ];
            // try {
            //     Mail::to($email)->send(new FileTransfer($mail_description));
            // }
            // catch (Exception $e) {
            //     echo 'Error - ' . $e;
            // }
            $notification = array(
                'message' => 'Insert Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
        return view('signin');
    }
    public function visa_file_delete($id)
    {
        if (Auth::check()) {
            $image_data = DB::table('tbl_imp_file')->select('visa_req_file')->where('id', '=', $id)->first();
            unlink(public_path("upload/imp_file/visa/$image_data->visa_req_file"));
            DB::table('tbl_imp_file')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Visa File deleted successfully'
                ]
            );
        }
        else {
            return view('signin');
        }
    }

    public function visa_section_comment_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            DB::table('tbl_student_file')
                ->where('id', $id)
                ->update([
                    "visa_status"              => $request->status,
                    "visa_comment"             => $request->visa_comment,
                    "vs_comment_notification"  => "1",
                ]);
            $notification = array(
                'message' => 'Visa comment stored successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function personal_information_visa_comment_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            DB::table('tbl_student_profile')
                ->where('id', $id)
                ->update([
                    "personal_info_visa_comment" => $request->personal_info_visa_comment,
                    "vs_personal_info_comment_notification"    => "1",
                ]);
            $notification = array(
                'message' => 'Personal information comment stored successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function additional_qualification_visa_comment_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            DB::table('tbl_student_profile')
                ->where('id', $id)
                ->update([
                    "additional_qualification_visa_comment" => $request->additional_qualification_visa_comment,
                    "vs_additional_qualification_comment_notification" => "1",
                ]);
            $notification = array(
                'message' => 'Additional qualification comment stored successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function background_information_visa_comment_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            DB::table('tbl_student_profile')
                ->where('id', $id)
                ->update([
                    "background_information_visa_comment"     => $request->background_information_visa_comment,
                    "as_background_info_comment_notification" => "1",
                ]);
            $notification = array(
                'message' => 'Background information comment stored successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function educational_summery_visa_comment_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            DB::table('tbl_student_profile')
                ->where('id', $id)
                ->update([
                    "education_summary_visa_comment" => $request->education_summary_visa_comment,
                    "as_education_summery_comment_notification" => "1",
                ]);
            $notification = array(
                'message' => 'Educational summery comment stored successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function test_score_visa_comment_store(Request $request)
    {
        if (Auth::check()) {
            $id = $request->id;
            DB::table('tbl_student_profile')
                ->where('id', $id)
                ->update([
                    "test_score_visa_comment" => $request->test_score_visa_comment,
                    "as_test_score_comment_notification" => "1",
                ]);
            $notification = array(
                'message' => 'Test score comment stored successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }

    public function visa_check_profile(Request $request)
    {
        if (Auth::check()) {
            $student_id = $request->student_id;
            $data = DB::table('student_entry')
                ->where('student_id', $student_id)
                ->update([
                    "vs_status" => "1",
                ]);
            $notification = array(
                'message' => 'Student Profile Approved By Visa Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }

    public function visa_submit(Request $request)
    {
        if (Auth::check()) {
            $student_id = $request->student_id;
            $data = DB::table('student_entry')
                ->where('student_id', $student_id)
                ->update([
                    "vs_submit" => "1",
                ]);
            $notification = array(
                'message' => 'Student Visa Submitted Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }
    public function visa_reject(Request $request)
    {
        if (Auth::check()) {
            $student_id = $request->student_id;
            $data = DB::table('student_entry')
                ->where('student_id', $student_id)
                ->update([
                    "vs_reject" => "1",
                ]);
            $notification = array(
                'message' => 'Student Visa Reject Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return view('signin');
        }

    }

}

