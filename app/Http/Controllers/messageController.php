<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Auth;

    class messageController extends controller
    {
        public function chat($id)
        {
            $student_id = $id;
            if (Auth::user()->role === 'Student') {
                DB::table('tbl_chat')
                    ->where('student_id', $student_id)
                    ->update([
                        "new_message" => "0",
                    ]);
            }
            $profile_data = DB::table('tbl_student_profile')->where('student_id', '=', $student_id)->first();
            $student_msg_data = DB::table('tbl_chat')->where('student_id', '=', $id)->where('approval', '1')->get();
            $admin_msg_data = DB::table('tbl_chat')->where('student_id', '=', $id)->get();
//            $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $student_id)->first();
            $counselor_accept = DB::table('student_entry')
                ->select('accept')
                ->where('student_id', $student_id)
                ->first();
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            $admin_new_msg_count = DB::table('tbl_chat')
                ->select(DB::raw('COUNT(id) as count'))
                ->where('approval', '1')
                ->where('new_message', '1')
                ->where('student_id', $student_id)
//            ->where('form', 'Assistant Counselor')
                ->first();
            return view('chat', compact('student_id', 'student_msg_data', 'admin_msg_data', 'counselor_accept', 'new_msg_count', 'admin_new_msg_count','profile_data'));
        }
        public function message_approval()
        {
            $pending_message = DB::table('tbl_chat')->where('approval', '0')->where('form', 'Student')->get();
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('message_approval', compact('pending_message', 'new_msg_count'));
        }
        public function message_store(Request $request)
        {
            $message_form = Auth::user()->role;
            if ($message_form == 'Student') {
                DB::table('tbl_chat')->insert([
                    "student_id" => $request->student_id,
                    "message" => $request->message,
                    "form" => $message_form,
                    "approval" => '0',
                    "new_message" => '0',
                ]);
            }
            if (($message_form == 'Admission Section') || ($message_form == 'Visa Section') || ($message_form == 'Counselor')) {
                DB::table('tbl_chat')->insert([
                    "student_id" => $request->student_id,
                    "message" => $request->message,
                    "form" => $message_form,
                    "approval" => '1',
                    "new_message" => '1',
                ]);
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data inserted successfully'
                ]
            );
        }
        public function approval_message_store(Request $request)
        {
            $message_form = Auth::user()->role;
            DB::table('tbl_chat')->insert([
                "student_id" => $request->student_id,
                "message" => $request->message,
                "form" => $message_form,
                "approval" => '1',
            ]);
            DB::table('tbl_chat')
                ->where('id', $request->id)
                ->update([
                    "approval" => "1",
                    "new_message" => "0",
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Message Stored Successfully'
                ]
            );
        }
        public function message_approval_store($id)
        {
            DB::table('tbl_chat')
                ->where('id', $id)
                ->update([
                    "approval" => "1",
                ]);
            $notification = array(
                'message' => 'Disease Created Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
        public function message_delete($id)
        {
            $data = DB::table('tbl_chat')->where('id', '=', $id)->delete();
            return response()->json($data);
        }

    }
