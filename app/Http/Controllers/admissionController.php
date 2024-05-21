<?php

    namespace App\Http\Controllers;

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

    class admissionController extends Controller
    {
        public function admission()
        {
            if (Auth::check()) {
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                return view('admission.admission_list', compact('new_msg_count'));
            } else {
                return view('signin');
            }
        }
        public function admission_list(Request $request){
            if (Auth::check()) {
                if(Auth::user()->role==='Counselor'){
                    $counter_no = Auth::user()->counter_no;
                    if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('counselor_name', $counter_no)
                            ->where('active', '1')
                            ->where('as_proceed', '1')
                            ->orderBy('id','desc')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $url = 'pdf_show/' . $row->id . '.';
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('chat', function ($row) {
                                $url_1 = 'chat/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'chat'])
                            ->make(true);
                    }
                }
                if(Auth::user()->role==='Admin'){
                    if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('active', '1')
                            ->where('as_proceed', '1')
                            ->orderBy('id','desc')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $url = 'pdf_show/' . $row->id . '.';
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('chat', function ($row) {
                                $url_1 = 'chat/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'chat'])
                            ->make(true);
                    }
                }
                if(Auth::user()->role==='Admission Section'){
                    if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('active', '1')
                            ->where('as_proceed', '1')
                            ->orderBy('id','desc')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $url = 'pdf_show/' . $row->id . '.';
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('sponsor_document', function ($row) {
                                $url_1 = 'sponsor_document/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> View</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'sponsor_document'])
                            ->make(true);
                    }
                }
                if(Auth::user()->role==='Visa Section'){
                    if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('active', '1')
                            ->where('vs_proceed', '1')
                            ->orderBy('id','desc')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $url = 'pdf_show/' . $row->id . '.';
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;padding:5px; font-size:12px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('sponsor_document', function ($row) {
                                $url_1 = 'sponsor_document/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;padding:5px; font-size:12px;"><i class="fa fa-envelope"></i> View</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'sponsor_document'])
                            ->make(true);
                    }
                }
            }
            else {
                return view('signin');
            }
        }
        public function visa_list(Request $request){
            if (Auth::check()) {
                if(Auth::user()->role==='Admin'){
                    if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('active', '1')
                            ->where('vs_proceed', '1')
                            ->orderBy('id','desc')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $url = 'pdf_show/' . $row->id . '.';
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('sponsor_document', function ($row) {
                                $url_1 = 'sponsor_document/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> View</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'sponsor_document'])
                            ->make(true);
                    }
                }
            }
            else {
                return view('signin');
            }
        }

        public function visa()
        {
            if (Auth::check()) {
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                return view('admission.visa_list', compact('new_msg_count'));
            } else {
                return view('signin');
            }
        }

        public function counselor_admission_student_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('student_id', $counter_no)
                        ->where('active', '1')
                        ->where('as_proceed', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admin_admission_student_list(Request $request)
        {
            if (Auth::check()) {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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

        public function counselor_visa_student_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('student_id', $counter_no)
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->where('vs_proceed', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admin_visa_student_list(Request $request)
        {
            if (Auth::check()) {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->where('vs_proceed', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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

        public function admission_student_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admission_immigration_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->where('purpose', 'Immigration')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admission_visa_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->where('purpose', 'Student Visa')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admission_meditourism_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->where('purpose', 'Schooling Visa')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admission_job_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('cc_status', '1')
                        ->where('as_proceed', '1')
                        ->where('purpose', 'Job Search')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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


        public function admin_student_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admin_immigration_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Immigration')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admin_visa_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Student Visa')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admin_meditourism_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Schooling Visa')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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
        public function admin_job_list(Request $request)
        {
            if (Auth::check()) {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Job Search')
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
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

        public function head_counselor_approved($id)
        {
            DB::table('student_entry')
                ->where('student_id', $id)
                ->update([
                    "hc_status" => "1",
                ]);
            $notification = array(
                'message' => 'Head Counselor Approved Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
        public function student_payment()
        {
            $id = Auth::user()->user_name;
            $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $id)->first();
            $payment_history = DB::table('tbl_student_payment')
                ->select('*')
                ->where('student_id', $id)
                ->get();
            $admin_new_msg_count = DB::table('tbl_chat')
                ->select(DB::raw('COUNT(id) as count'))
                ->where('approval', '1')
                ->where('new_message', '1')
                ->where('student_id', $id)
                ->first();
            return view('student_payment', compact('payment_history', 'payment', 'admin_new_msg_count'));
        }


        //************************(Comment Section)******************
        public function admission_section_comment_store(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_file')
                    ->where('id', $id)
                    ->update([
                        "admission_status"         => $request->status,
                        "admission_comment"        => $request->admission_comment,
                        "as_comment_notification"  => "1",
                    ]);
                $notification = array(
                    'message' => 'Admission comment stored successfully!',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }

        }
        public function personal_information_admission_comment_store(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "personal_info_admission_comment" => $request->personal_info_admission_comment,
                        "as_personal_info_comment_notification" => "1",
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
        public function additional_qualification_admission_comment_store(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "additional_qualification_admission_comment" => $request->additional_qualification_admission_comment,
                        "as_additional_qualification_comment_notification" => "1",
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
        public function background_information_admission_comment_store(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "background_information_admission_comment" => $request->background_information_admission_comment,
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
        public function educational_summery_admission_comment_store(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "education_summary_admission_comment" => $request->education_summary_admission_comment,
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
        public function test_score_admission_comment_store(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "test_score_admission_comment" => $request->test_score_admission_comment,
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




        public function admission_offer_letter_store(Request $request)
        {
            if (Auth::check()) {
                date_default_timezone_set("Asia/Dhaka");
                $date = date("Y-m-d");
                $student_id = $request->student_id;
                $data = DB::table('student_entry')
                    ->where('student_id', $student_id)
                    ->update([
                        "as_offer_letter" => "1",
                        "offer_letter_date" => $date,
                    ]);
                $notification = array(
                    'message' => 'Student Offer Letter Stored Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }

        }
        public function admission_final_offer_letter_store(Request $request)
        {
            if (Auth::check()) {
                date_default_timezone_set("Asia/Dhaka");
                $date = date("Y-m-d");
                $student_id = $request->student_id;
                $data = DB::table('student_entry')
                    ->where('student_id', $student_id)
                    ->update([
                        "as_final_offer_letter" => "1",
                        "final_offer_letter_date" => $date,
                    ]);
                $notification = array(
                    'message' => 'Student Final Offer Letter Stored Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }

        }



        public function sponsor_document($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $check = DB::table('student_entry')->select('*')->where('student_id', '=', $id)->first();
                $important_data = DB::table('tbl_imp_file')->where('student_id', '=', $id)->get();
                $visa_important_data = DB::table('tbl_imp_file')->where('student_id', '=', $id)->where('type', 'Visa')->get();
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $id)->get();
                $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $id)->first();
                $profile_data = DB::table('tbl_student_profile')->where('student_id', '=', $id)->first();
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                return view('sponsor_document', compact( 'payment', 'document_data', 'important_data', 'visa_important_data', 'check', 'profile_data','new_msg_count'));
            } else {
                return view('signin');
            }
        }

        public function profile_lock(Request $request)
        {
            if (Auth::check()) {
                $student_id = $request->student_id;
                $data = DB::table('student_entry')
                    ->where('student_id', $student_id)
                    ->update([
                        "profile_lock" => "1",
                    ]);
                $notification = array(
                    'message' => 'Student Profile Lock Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }

        }



        //***************************(Company List)******************************
        public function company_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_company')
                    ->select('*')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($row) {
                        $url = asset('upload/' . $row->image);
                        return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';
                    })
                    ->addColumn('action', function ($row) {
//                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" data-target=".bd-example-modal-lg" id="edit_company" class="edit btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
//                    <a href="javascript:void(0)" id="delete_company" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a>';
//                    return $btn;
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_company" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
							<a href="javascript:void(0)" data-id="' . $row->id . '" id="delete_company" class="dropdown-item"><i class="icon-trash"></i> Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            }
        }
        public function company_store(Request $request)
        {
            $destinationPath = 'public/upload/';
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload'), $imageName);
//        $image=$request->image->move($destinationPath, $imageName);

            DB::table('tbl_company')->insert([
                "company_name" => $request->company_name,
                "company_address" => $request->company_address,
                "image" => $imageName,
                "created_at" => date('Y-m-d h:i:s'),
            ]);

//        }

            date_default_timezone_set("Asia/Dhaka");

            $notification = array(
                'message' => 'New Cattle Store Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        public function company_edit($id)
        {
            $data = DB::table('tbl_company')->where('id', '=', $id)->first();
            return response()->json($data);
        }
        public function company_update(Request $request)
        {
            $id = $request->id;
            if (isset($request->image)) {
                $image_data = DB::table('tbl_company')->select('image')->where('id', '=', $id)->first();
                unlink(public_path("upload/$image_data->image"));

                $destinationPath = 'public/upload/';
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('upload'), $imageName);
                DB::table('tbl_company')
                    ->where('id', $id)
                    ->update([
                        "company_name" => $request->company_name,
                        "company_address" => $request->company_address,
                        "image" => $imageName,
                    ]);
            }
            if (!isset($request->image)) {
                DB::table('tbl_company')
                    ->where('id', $id)
                    ->update([
                        "company_name" => $request->company_name,
                        "company_address" => $request->company_address,
                    ]);
            }
            $notification = array(
                'message' => 'Weight Updated successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
        public function company_delete($id)
        {
            $image_data = DB::table('tbl_company')->select('image')->where('id', '=', $id)->first();
            unlink(public_path("upload/$image_data->image"));
            DB::table('tbl_company')->where('id', '=', $id)->delete();
        }
    }
