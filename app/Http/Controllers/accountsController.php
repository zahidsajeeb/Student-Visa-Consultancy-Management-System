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

    class accountsController extends controller
    {
        public function balance_check()
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $counter_no = Auth::user()->counter_no;
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('admission_type', 'admission')
                    ->where('counselor_name', $counter_no)
                    ->get();

                $admin_data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('admission_type', 'admission')
                    ->get();

                $admission_payment = DB::table('tbl_student_payment')
                    ->select('payment_purpose')
                    ->where('payment_purpose', 'Admission')
                    ->get();
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                return view('accounts.balance_check', compact('data', 'admission_payment', 'new_msg_count', 'admin_data'));
            } else {
                return view('signin');
            }
        }

        public function balance_check_details($id)
        {
            if (Auth::check()) {
                $last_id = DB::table('tbl_student_payment')->select('*')->orderBy('id', 'desc')->first();
                $payment_history = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('student_id', $id)
                    ->get();
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('student_id', $id)
                    ->first();
                $payment_purpose = DB::table('tbl_student_payment')
                    ->select('payment_purpose')
                    ->where('student_id', $id)
                    ->orderBy('id', 'desc')
                    ->first();
                return view('accounts.balance_check_details', compact('data', 'payment_purpose', 'payment_history', 'last_id'));
            } else {
                return view('signin');
            }
        }

        public function admin_balance_check()
        {
            if (Auth::check()) {
                $admin_data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('admission_type', 'admission')
                    ->get();

                $admission_payment = DB::table('tbl_student_payment')
                    ->select('payment_purpose')
                    ->where('payment_purpose', 'Admission')
                    ->get();
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();

                dd($admission_payment);

                return view('accounts.balance_check', compact('data', 'admission_payment', 'new_msg_count'));
            } else {
                return view('signin');
            }
        }

        public function payment_pending_student_list(Request $request)
        {
            if (Auth::check()) {
                if ($request->ajax()) {
                    $data = DB::table('tbl_student_payment')
                        ->select('*')
                        ->where('payment_status', "0")
                        ->orderBy('id','desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->student_id . '" id="make_payment" class="btn btn-primary"><i class="fa fa-dollar"></i> Admission Payment</a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            } else {
                return view('signin');
            }
        }

        public function payment_pending_student_info($id)
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')->where('student_id', '=', $id)->first();
                return response()->json($data);
            } else {
                return view('signin');
            }
        }

        public function payment_store(Request $request)
        {
            $student_id = $request->student_id;
            if ($request->payment_type == 'bkash') {
                $data = DB::table('tbl_student_payment')
                    ->where('student_id', $student_id)
                    ->update([
                        "payment_status" => "1",
                        "payment_purpose" => $request->payment_purpose,
                        "total_amount" => $request->total_amount,
                        "pay_amount" => $request->pay_amount,
                        "discount_amount" => $request->discount_amount,
                        "payment_date" => $request->payment_date,
                        "payment_type" => $request->payment_type,
                        "bkash_mobile" => $request->bkash_mobile,
                        "cheque_no" => "0",
                        "cheque_date" => "0",
                    ]);
            }
            if ($request->payment_type == 'cheque') {
                $data = DB::table('tbl_student_payment')
                    ->where('student_id', $student_id)
                    ->update([
                        "payment_status" => "1",
                        "payment_purpose" => $request->payment_purpose,
                        "total_amount" => $request->total_amount,
                        "pay_amount" => $request->pay_amount,
                        "discount_amount" => $request->discount_amount,
                        "payment_date" => $request->payment_date,
                        "payment_type" => $request->payment_type,
                        "bkash_mobile" => "0",
                        "cheque_no" => $request->cheque_no,
                        "cheque_date" => $request->cheque_date,
                    ]);
            }
            if ($request->payment_type == 'cash') {
                $data = DB::table('tbl_student_payment')
                    ->where('student_id', $student_id)
                    ->update([
                        "payment_status" => "1",
                        "payment_purpose" => $request->payment_purpose,
                        "total_amount" => $request->total_amount,
                        "pay_amount" => $request->pay_amount,
                        "discount_amount" => $request->discount_amount,
                        "payment_date" => $request->payment_date,
                        "payment_type" => $request->payment_type,
                        "bkash_mobile" => "0",
                        "cheque_no" => "0",
                        "cheque_date" => "0",
                    ]);
            }
            return response()->json($data);
        }

        public function payment_edit($id)
        {
            if (Auth::check()) {
                $data = DB::table('tbl_student_payment')->where('id', '=', $id)->first();
                return view('accounts.payment_edit', compact('data'));
            } else {
                return view('signin');
            }
        }

        public function payment_update(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                $data = DB::table('tbl_student_payment')
                    ->where('id', $id)
                    ->update([
                        "payment_mode" => $request->payment_mode,
                        "note" => $request->note,
                        "pay_amount" => $request->pay_amount,
                        "payment_date" => $request->payment_date,
                    ]);
                $notification = array(
                    'message' => 'Balance Update Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }
        }

        public function payment_delete($id)
        {
            if (Auth::check()) {
                DB::table('tbl_student_payment')->where('id', '=', $id)->delete();
                $notification = array(
                    'message' => 'Payment Deletes Successfully!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }
        }

        public function balance_store(Request $request)
        {
            if (Auth::check()) {
                $last_id = $request->last_id + 1;
                DB::table('tbl_student_payment')
                    ->insert([
                        "payment_status" => "1",
                        "student_id" => $request->student_id,
                        "student_name" => $request->student_name,
                        "payment_mode" => $request->payment_mode,
                        "pay_amount" => $request->pay_amount,
                        "payment_date" => $request->payment_date,
                        "note" => $request->note,
                    ]);
                DB::table('student_entry')
                    ->where('student_id', $request->student_id)
                    ->update([
                        "payment_step" => $request->payment_purpose,
                    ]);
                if ($request->payment_purpose == 'Service Charge') {
                    DB::table('student_entry')
                        ->where('student_id', $request->student_id)
                        ->update([
                            "payment_status" => "1",
                        ]);
                }
                $prepared_by = Auth::user()->name;
                $payment_info = DB::table('tbl_student_payment')->where('id', '=', $last_id)->first();
                $pay_amount = $payment_info->pay_amount;
                $payment_history = DB::table('tbl_student_payment')->where('student_id', $payment_info->student_id)->get();
                $convert_payment = Terbilang::make($pay_amount, ' Taka Only');
                return view('accounts.accounts_bill', compact('payment_info', 'payment_history', 'convert_payment', 'prepared_by'));
            } else {
                return view('signin');
            }
        }

        public function student_visa()
        {
            if (Auth::check()) {
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                $accounts_data = DB::table('student_entry')
                    ->join('tbl_counselor','tbl_counselor.counter_no','=','student_entry.counselor_name')
                    ->select('student_entry.*','tbl_counselor.counselor_name')
                    ->where('student_entry.active', 1)
                    ->where('student_entry.admission_type', 'admission')
                    ->where('student_entry.purpose', 'Student Visa')
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                return view('accounts.student_visa', compact('new_msg_count','accounts_data'));
            } else {
                return view('signin');
            }
        }
        public function immigration()
        {
            if (Auth::check()) {
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                $accounts_data = DB::table('student_entry')
                    ->join('tbl_counselor','tbl_counselor.counter_no','=','student_entry.counselor_name')
                    ->select('student_entry.*','tbl_counselor.counselor_name')
                    ->where('student_entry.active', 1)
                    ->where('student_entry.admission_type', 'admission')
                    ->where('student_entry.purpose', 'Immigration')
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                return view('accounts.immigration', compact('new_msg_count','accounts_data'));
            } else {
                return view('signin');
            }
        }
        public function meditourism()
        {
            if (Auth::check()) {
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                $accounts_data = DB::table('student_entry')
                    ->join('tbl_counselor','tbl_counselor.counter_no','=','student_entry.counselor_name')
                    ->select('student_entry.*','tbl_counselor.counselor_name')
                    ->where('student_entry.active', 1)
                    ->where('student_entry.admission_type', 'admission')
                    ->where('student_entry.purpose', 'Schooling Visa')
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                return view('accounts.medi_tourism', compact('new_msg_count','accounts_data'));
            } else {
                return view('signin');
            }

        }
        public function job()
        {
            if (Auth::check()) {
                $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
                $accounts_data = DB::table('student_entry')
                    ->join('tbl_counselor','tbl_counselor.counter_no','=','student_entry.counselor_name')
                    ->select('student_entry.*','tbl_counselor.counselor_name')
                    ->where('student_entry.active', 1)
                    ->where('student_entry.admission_type', 'admission')
                    ->where('student_entry.purpose', 'Job Search')
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                return view('accounts.job_search', compact('new_msg_count','accounts_data'));
            } else {
                return view('signin');
            }

        }


//    public function balance_update_info($id)
//    {
//        if (Auth::check()) {
//            $data = DB::table('tbl_student_payment')->where('id', '=', $id)->first();
//            return response()->json($data);
//        }
//        else {
//            return view('signin');
//        }
//    }
//    public function balance_update(Request $request)
//    {
//        if (Auth::check()) {
//            $id = $request->id;
//            $data = DB::table('tbl_student_payment')
//                ->where('id', $id)
//                ->update([
//                    "pay_amount" => $request->pay_amount,
//                    "payment_date" => $request->payment_date,
//                ]);
//            $notification = array(
//                'message' => 'Balance Update Successfully!',
//                'alert-type' => 'success'
//            );
//            return redirect()->back();
//        }
//        else {
//            return view('signin');
//        }
//    }

        public function payment_status_update($id)
        {
            if (Auth::check()) {
                DB::table('student_entry')
                    ->where('student_id', $id)
                    ->update([
                        "payment_status" => '1',
                    ]);
                DB::table('tbl_student_payment')
                    ->where('student_id', $id)
                    ->update([
                        "final_payment_status" => '1',
                    ]);
                $notification = array(
                    'message' => 'Payment Status Done Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }
        }

        public function accounts_bill_pdf($id)
        {
            if (Auth::check()) {
                $prepared_by = Auth::user()->name;
                $payment_info = DB::table('tbl_student_payment')
                    ->where('id', '=', $id)
                    ->first();
                $pay_amount = $payment_info->pay_amount;
                $convert_payment = Terbilang::make($pay_amount, ' Taka Only');

                $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
                $pdf = PDF::loadView('accounts.accounts_bill_pdf', compact('pdf', 'payment_info', 'convert_payment', 'prepared_by'));
                return $pdf->stream('accounts_bill.pdf');
            } else {
                return view('signin');
            }

        }

        public function accounts_bill($id)
        {
            if (Auth::check()) {
                $prepared_by = Auth::user()->name;
                $payment_info = DB::table('tbl_student_payment')
                    ->where('id', '=', $id)
                    ->first();
                $pay_amount = $payment_info->pay_amount;
                $convert_payment = Terbilang::make($pay_amount, ' Taka Only');
                return view('accounts.accounts_bill', compact('payment_info', 'convert_payment', 'prepared_by'));
            } else {
                return view('signin');
            }
        }

        public function admission_fee()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Admission')
                    ->get();
                return view('accounts.admission_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }
        }

        public function step_one()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Step 1')
                    ->get();
                return view('accounts.stepone_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }

        }

        public function step_two()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Step 2')
                    ->get();
                return view('accounts.steptwo_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }
        }

        public function step_three()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Step 1')
                    ->get();
                return view('accounts.stepthree_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }

        }

        public function step_four()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Step 4')
                    ->get();
                return view('accounts.stepfour_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }

        }

        public function step_five()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Step 5')
                    ->get();
                return view('accounts.stepfive_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }

        }

        public function processing_fee()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Processing Fee')
                    ->get();
                return view('accounts.processing_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }

        }

        public function servicing_fee()
        {
            if (Auth::check()) {
                $data = DB::table('student_entry')
                    ->select('*')
                    ->where('active', 1)
                    ->where('accept', 1)
                    ->get();
                $payment_list = DB::table('tbl_student_payment')
                    ->select('*')
                    ->where('payment_purpose', 'Service Charge')
                    ->get();
                return view('accounts.service_payment_list', compact('payment_list', 'data'));
            } else {
                return view('signin');
            }

        }
    }
