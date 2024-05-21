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

    class reportController extends controller
	{
        public function report()
        {
            set_time_limit(0);
            $counselor_list = DB::table('tbl_counselor')->get();
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('report', compact('counselor_list', 'new_msg_count'));
        }
        public function admin_report_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                    ->select('student_entry.*', 'tbl_counselor.counselor_name')
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->rawColumns([])
                    ->make(true);
            }
        }
        public function date_to_date_admin_report(Request $request)
        {
            $counselor_name = $request->counselor_name;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $data = DB::table('student_entry')
                ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                ->select('student_entry.*', 'tbl_counselor.*')
                ->whereBetween('student_entry.date', [$start_date, $end_date])
                ->where('tbl_counselor.counter_no', $counselor_name)
                ->orderBy('student_entry.id', 'desc')
                ->get();
            $total_count = DB::table('student_entry')
                ->where('counselor_name', $counselor_name)
                ->whereBetween('date', [$start_date, $end_date])
                ->get()
                ->count();
            $name = DB::table('tbl_counselor')
                ->select('*')
                ->where('counter_no', $counselor_name)
                ->first();
            return view('date_to_date_report', compact('data', 'start_date', 'end_date', 'total_count', 'name', 'new_msg_count'));
        }
        public function date_to_date_report_pdf(Request $request)
        {
            $counselor_name = $request->counselor_name;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            if (isset($counselor_name) && isset($start_date) && isset($end_date)) {
                $student_data = DB::table('student_entry')
                    ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                    ->select('student_entry.*', 'tbl_counselor.*')
                    ->whereBetween('student_entry.date', [$start_date, $end_date])
                    ->where('tbl_counselor.counter_no', $counselor_name)
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                $total_count = DB::table('student_entry')
                    ->where('counselor_name', $counselor_name)
                    ->whereBetween('date', [$start_date, $end_date])
                    ->get()
                    ->count();
                $name = DB::table('tbl_counselor')
                    ->select('*')
                    ->where('counter_no', $counselor_name)
                    ->first();
                $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
                $pdf = PDF::loadView('date_to_date_counselor_report_pdf', compact('student_data', 'pdf', 'start_date', 'end_date', 'total_count', 'name'));
                return $pdf->stream('report.pdf');
            }

            if (isset($start_date) && isset($end_date)) {
                $data = DB::table('tbl_counselor')
                    ->select('*')
                    ->get();

                $pending_data = DB::table('student_entry')
                    ->where('payment_status', '0')
                    ->whereBetween('date', [$start_date, $end_date])
                    ->get();

                $count = DB::table('student_entry')
                    ->select('*')
                    ->groupBy('student_name')
                    ->get();


                $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
                $pdf = PDF::loadView('date_to_date_report_pdf', compact('data', 'count', 'pdf', 'start_date', 'end_date', 'pending_data'));
                return $pdf->stream('report.pdf');
            }


        }
        public function student_report()
        {
            return view('student_report');
        }
        public function student_report_list(Request $request)
        {
            $counter_no = Auth::user()->counter_no;
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                    ->select('student_entry.*', 'tbl_counselor.*')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $url = 'student_report_pdf/' . $row->student_id . '.';
                        $btn = '<div class="list-icons">
											<div class="dropdown">
												<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="' . url('student_report_pdf', $row->student_id) . '" id="pdf" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF</a>
												</div>
											</div>
										</div>';
                        return $btn;
                    })
                    ->addColumn('chat', function ($row) {
                        $url_1 = 'chat/' . $row->student_id;
                        $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-warning"><i class="fa fa-envelope"></i> Message</a>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action', 'chat'])
                    ->make(true);
            }
        }
        public function student_report_pdf($id)
        {
            $student_info = DB::table('student_entry')
                ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                ->select('student_entry.*', 'tbl_counselor.*')
                ->where('student_entry.student_id', $id)
                ->first();
            $payment_info = DB::table('tbl_student_payment')
                ->where('student_id', '=', $id)
                ->get();

            $payable_amount = DB::table('tbl_student_payment')
                ->where('student_id', '=', $id)
                ->groupBy('student_id')
                ->first();

            $discount_amount = DB::table('tbl_student_payment')
                ->select(DB::raw("SUM(discount_amount) as discount_amount"))
                ->where('student_id', '=', $id)
                ->groupBy('student_id')
                ->first();

            $net_payable_amount = DB::table('tbl_student_payment')
                ->select(DB::raw("SUM(pay_amount) as pay_amount"))
                ->where('student_id', '=', $id)
                ->groupBy('student_id')
                ->first();

            $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf = PDF::loadView('student_report_pdf', compact('student_info', 'pdf', 'payment_info', 'payable_amount', 'net_payable_amount', 'discount_amount'));
            return $pdf->stream('Student_Report.pdf');
        }
        public function payment_report_pdf(Request $request)
        {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $payment_status = $request->payment_status;
            $payment_info = DB::table('tbl_student_payment')
                ->select('*', DB::raw("SUM(pay_amount) as pay_amount, SUM(discount_amount) as discount_amount"))
                ->whereBetween('payment_date', [$start_date, $end_date])
                ->where('final_payment_status', $payment_status)
                ->groupBy('student_id')
                ->get();

            $total_cost = DB::table('tbl_student_payment')
                ->select(DB::raw("SUM(total_amount) as total_amount"))
                ->whereBetween('payment_date', [$start_date, $end_date])
                ->where('final_payment_status', $payment_status)
                ->first();

            $total_pay = DB::table('tbl_student_payment')
                ->select(DB::raw("SUM(pay_amount) as pay_amount"))
                ->whereBetween('payment_date', [$start_date, $end_date])
                ->where('final_payment_status', $payment_status)
                ->first();
            $total_discount = DB::table('tbl_student_payment')
                ->select(DB::raw("SUM(discount_amount) as discount_amount"))
                ->whereBetween('payment_date', [$start_date, $end_date])
                ->where('final_payment_status', $payment_status)
                ->first();
            $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf = PDF::loadView('payment_report_pdf', compact('pdf', 'payment_info', 'total_cost', 'total_pay', 'payment_status', 'total_discount', 'start_date', 'end_date'));
            return $pdf->stream('Payment_Report.pdf');
        }
        public function profile_report_pdf(Request $request)
        {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $profile_status = $request->profile_status;
            $student_info = DB::table('student_entry')
                ->select('*')
                ->whereBetween('date', [$start_date, $end_date])
                ->where('hc_status', $profile_status)
                ->get();

//        dd($student_info);
            $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf = PDF::loadView('profile_report_pdf', compact('pdf', 'student_info', 'profile_status', 'start_date', 'end_date'));
            return $pdf->stream('Profile_Report.pdf');
        }
	}
