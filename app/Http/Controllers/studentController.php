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
    use Validator;
    use Rakibhstu\Banglanumber\NumberToBangla;
    use Riskihajar\Terbilang\Facades\Terbilang;

    class studentController extends controller
    {
        public function student_profile()
        {
            $student_id = Auth::user()->user_name;
            $profile_data = DB::table('tbl_student_profile')->where('student_id', '=', $student_id)->first();
            $education_data = DB::table('tbl_student_education')->where('student_id', '=', $student_id)->get();
            $document_data = DB::table('tbl_student_file')->where('student_id', '=', $student_id)->get();
            $important_data = DB::table('tbl_imp_file')->where('student_id', '=', $student_id)->get();
            $data = DB::table('tbl_student_profile')->select('*')->where('student_id', '=', $student_id)->first();
            $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $student_id)->first();
            $admin_new_msg_count = DB::table('tbl_chat')
                ->select(DB::raw('COUNT(id) as count'))
                ->where('approval', '0')
                ->where('new_message', '1')
                ->where('form', 'Assistant Counselor')
                ->first();
            return view('student_profile', compact('data', 'profile_data', 'education_data', 'document_data', 'important_data', 'payment', 'admin_new_msg_count'));
        }

        public function student_profile_store(Request $request)
        {
            $student_id = Auth::user()->user_name;
            if (($request->education_level == "Grade 1") || ($request->education_level == "Grade 2") || ($request->education_level == "Grade 3") || ($request->education_level == "Grade 4") || ($request->education_level == "Grade 5") || ($request->education_level == "Grade 6") ||
                ($request->education_level == "Grade 7") || ($request->education_level == "Grade 8") || ($request->education_level == "Grade 9") || ($request->education_level == "Grade 10")) {
                $validator = Validator::make($request->all(), [
                ]);
                if ($validator->passes()) {
                    DB::table('tbl_student_profile')->insert([
                        "student_id" => $student_id,
                        "f_name" => $request->f_name,
                        "m_name" => $request->m_name,
                        "l_name" => $request->l_name,
                        "dob" => $request->dob,
                        "first_language" => $request->first_language,
                        "citizenship" => $request->citizenship,
                        "passport_no" => $request->passport_no,
                        "passport_exp" => $request->passport_exp,
                        "marital_status" => $request->marital_status,
                        "gender" => $request->gender,
                        "address" => $request->address,
                        "city" => $request->city,
                        "country" => $request->country,
                        "state" => $request->state,
                        "zip_code" => $request->zip_code,
                        "email" => $request->email,
                        "phone_no" => $request->phone_no,
                        "education_country" => $request->education_country,
                        "education_level" => $request->education_level,
                        "grading_scheme" => $request->grading_scheme,
                        "grade_avg_1" => $request->grade_avg_1,
                        "grade_avg_2" => $request->grade_avg_2,
                        "grade_avg_3" => $request->grade_avg_3,
                        "grade_avg_4" => $request->grade_avg_4,
                        "grade_avg_5" => $request->grade_avg_5,
                        "grade_avg_6" => $request->grade_avg_6,
                        "grade_avg_7" => $request->grade_avg_7,
                        "grade_scale" => $request->grade_scale,
                        "test_score_type" => $request->test_score_type,

                        "ielts_exam_date" => $request->ielts_exam_date,
                        "ielts_reading_score" => $request->ielts_reading_score,
                        "ielts_listening_score" => $request->ielts_listening_score,
                        "ielts_writing_score" => $request->ielts_writing_score,
                        "ielts_speaking_score" => $request->ielts_speaking_score,
                        "ielts_total_score" => $request->ielts_total_score,

                        "toefl_exam_date" => $request->toefl_exam_date,
                        "toefl_reading_score" => $request->toefl_reading_score,
                        "toefl_listening_score" => $request->toefl_listening_score,
                        "toefl_writing_score" => $request->toefl_writing_score,
                        "toefl_speaking_score" => $request->toefl_speaking_score,
                        "toefl_total_score" => $request->toefl_total_score,

                        "pte_exam_date" => $request->pte_exam_date,
                        "pte_reading_score" => $request->pte_reading_score,
                        "pte_writing_score" => $request->pte_writing_score,
                        "pte_listening_score" => $request->pte_listening_score,
                        "pte_speaking_score" => $request->pte_speaking_score,
                        "pte_total_score" => $request->pte_total_score,

                        "duolingo_total_score" => $request->duolingo_total_score,
                        "duolingo_exam_date" => $request->duolingo_exam_date,

                        "gre_exam_date" => $request->gre_exam_date,
                        "gre_verbal_score" => $request->gre_verbal_score,
                        "gre_quantitative_score" => $request->gre_quantitative_score,
                        "gre_awa_score" => $request->gre_awa_score,

                        "gmat_exam_date" => $request->gmat_exam_date,
                        "gmat_verbal_score" => $request->gmat_verbal_score,
                        "gmat_quantitative_score" => $request->gmat_quantitative_score,
                        "gmat_awa_score" => $request->gmat_awa_score,
                        "gmat_total_score" => $request->gmat_total_score,

                        "visa_refused" => $request->visa_refused,
                        "permit" => $request->permit,
                        "more_details" => $request->more_details,
                        "status" => "1",
                    ]);
                    DB::table('tbl_student_education')->insert([
                        "student_id" => $student_id,
                        "type" => $request->education_level,
                        "primary_institution_country" => $request->primary_institution_country,
                        "primary_two_institution_country" => $request->primary_two_institution_country,
                        "secondary_institution_country" => $request->secondary_institution_country,
                        "undergraduate_institution_country" => $request->undergraduate_institution_country,
                        "postgraduate_institution_country" => $request->postgraduate_institution_country,

                        "primary_institution_name" => $request->primary_institution_name,
                        "primary_two_institution_name" => $request->primary_two_institution_name,
                        "secondary_institution_name" => $request->secondary_institution_name,
                        "undergraduate_institution_name" => $request->undergraduate_institution_name,
                        "postgraduate_institution_name" => $request->postgraduate_institution_name,

                        "primary_education_level" => $request->primary_education_level,
                        "primary_two_education_level" => $request->primary_two_education_level,
                        "secondary_education_level" => $request->secondary_education_level,
                        "undergraduate_education_level" => $request->undergraduate_education_level,
                        "postgraduate_education_level" => $request->postgraduate_education_level,

                        "primary_language_instruction" => $request->primary_language_instruction,
                        "primary_two_language_instruction" => $request->primary_two_language_instruction,
                        "secondary_language_instruction" => $request->secondary_language_instruction,
                        "undergraduate_language_instruction" => $request->undergraduate_language_instruction,
                        "postgraduate_language_instruction" => $request->postgraduate_language_instruction,

                        "primary_institution_from" => $request->primary_institution_from,
                        "primary_two_institution_from" => $request->primary_two_institution_from,
                        "secondary_institution_from" => $request->secondary_institution_from,
                        "undergraduate_institution_from" => $request->undergraduate_institution_from,
                        "postgraduate_institution_from" => $request->postgraduate_institution_from,

                        "primary_institution_to" => $request->primary_institution_to,
                        "primary_two_institution_to" => $request->primary_two_institution_to,
                        "secondary_institution_to" => $request->secondary_institution_to,
                        "undergraduate_institution_to" => $request->undergraduate_institution_to,
                        "postgraduate_institution_to" => $request->postgraduate_institution_to,


                        "primary_institution_address" => $request->primary_institution_address,
                        "primary_two_institution_address" => $request->primary_two_institution_address,
                        "secondary_institution_address" => $request->secondary_institution_address,
                        "undergraduate_institution_address" => $request->undergraduate_institution_address,
                        "postgraduate_institution_address" => $request->postgraduate_institution_address,

                        "primary_institution_city" => $request->primary_institution_city,
                        "primary_two_institution_city" => $request->primary_two_institution_city,
                        "secondary_institution_city" => $request->secondary_institution_city,
                        "undergraduate_institution_city" => $request->undergraduate_institution_city,
                        "postgraduate_institution_city" => $request->postgraduate_institution_city,

                        "primary_institution_province" => $request->primary_institution_province,
                        "primary_two_institution_province" => $request->primary_two_institution_province,
                        "secondary_institution_province" => $request->secondary_institution_province,
                        "undergraduate_institution_province" => $request->undergraduate_institution_province,
                        "postgraduate_institution_province" => $request->postgraduate_institution_province,

                        "primary_institution_zip" => $request->primary_institution_zip,
                        "primary_two_institution_zip" => $request->primary_two_institution_zip,
                        "secondary_institution_zip" => $request->secondary_institution_zip,
                        "undergraduate_institution_zip" => $request->undergraduate_institution_zip,
                        "postgraduate_institution_zip" => $request->postgraduate_institution_zip,

                        "primary_institution_degree" => $request->primary_institution_degree,
                        "primary_two_institution_degree" => $request->primary_two_institution_degree,
                        "secondary_institution_degree" => $request->secondary_institution_degree,
                        "undergraduate_institution_degree" => $request->undergraduate_institution_degree,
                        "postgraduate_institution_degree" => $request->postgraduate_institution_degree,

                        "primary_grading_scheme" => $request->primary_grading_scheme,
                        "primary_two_grading_scheme" => $request->primary_two_grading_scheme,

                        "primary_grade_avg" => $request->primary_grade_avg,
                        "primary_two_grade_avg" => $request->primary_two_grade_avg,

                        "primary_grade_scale" => $request->primary_grade_scale,
                        "primary_two_grade_scale" => $request->primary_two_grade_scale,
                    ]);
                    if ($request->file("primary_certificate_img")) {
                        $certificate_imgs_one = $request->file("primary_certificate_img");
                        foreach ($certificate_imgs_one as $certificate_img_one) {
                            $certificate_one = rand() . '.' . $certificate_img_one->extension();
                            $request['certificate_img_one'] = $certificate_one;
                            $certificate_img_one->move(public_path('upload/primary/'), $certificate_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_one,
                                "type" => 'Primary_one',
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("primary_transcript_img")) {
                        $transcript_imgs_one = $request->file("primary_transcript_img");
                        foreach ($transcript_imgs_one as $transcript_img_one) {
                            $transcript_one = rand() . '.' . $transcript_img_one->extension();
                            $request['transcript_img_one'] = $transcript_one;
                            $transcript_img_one->move(public_path('upload/primary/'), $transcript_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_one,
                                "type" => 'Primary_one',
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("primary_two_certificate_img")) {
                        $certificate_two_imgs_one = $request->file("primary_two_certificate_img");
                        foreach ($certificate_two_imgs_one as $certificate_two_img_one) {
                            $certificate_one = rand() . '.' . $certificate_two_img_one->extension();
                            $request['certificate_two_img_one'] = $certificate_one;
                            $certificate_two_img_one->move(public_path('upload/primary/'), $certificate_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_one,
                                "type" => 'Primary_two',
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("primary_two_transcript_img")) {
                        $transcript_two_imgs_one = $request->file("primary_two_transcript_img");
                        foreach ($transcript_two_imgs_one as $transcript_two_img_one) {
                            $transcript_one = rand() . '.' . $transcript_two_img_one->extension();
                            $request['transcript_two_img_one'] = $transcript_one;
                            $transcript_two_img_one->move(public_path('upload/primary/'), $transcript_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_one,
                                "type" => 'Primary_two',
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("ielts_img")) {
                        $ielts_imgs = $request->file("ielts_img");
                        foreach ($ielts_imgs as $ielts_img) {
                            $images = rand() . '.' . $ielts_img->extension();
                            $request['ielts_img'] = $images;
                            $ielts_img->move(public_path('upload/ielts/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "IELTS",
                                "category" => 'IELTS',
                            ]);
                        }
                    }
                    if ($request->file("toefl_img")) {
                        $toefl_imgs = $request->file("toefl_img");
                        foreach ($toefl_imgs as $toefl_img) {
                            $images = rand() . '.' . $toefl_img->extension();
                            $request['toefl_img'] = $images;
                            $toefl_img->move(public_path('upload/toefl/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "TOEFL",
                                "category" => 'TOEFL',
                            ]);
                        }
                    }
                    if ($request->file("pte_img")) {
                        $pte_imgs = $request->file("pte_img");
                        foreach ($pte_imgs as $pte_img) {
                            $images = rand() . '.' . $pte_img->extension();
                            $request['pte_img'] = $images;
                            $pte_img->move(public_path('upload/pte/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "PTE",
                                "category" => 'PTE',
                            ]);
                        }
                    }
                    if ($request->file("duolingo_img")) {
                        $duolingo_imgs = $request->file("duolingo_img");
                        foreach ($duolingo_imgs as $duolingo_img) {
                            $images = rand() . '.' . $duolingo_img->extension();
                            $request['duolingo_img'] = $images;
                            $duolingo_img->move(public_path('upload/duolingo/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Duolingo",
                                "category" => 'Duolingo',
                            ]);
                        }
                    }
                    if ($request->file("gre_img")) {
                        $gre_imgs = $request->file("gre_img");
                        foreach ($gre_imgs as $gre_img) {
                            $images = rand() . '.' . $gre_img->extension();
                            $request['gre_img'] = $images;
                            $gre_img->move(public_path('upload/gre/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GRE",
                                "category" => 'GRE',
                            ]);
                        }
                    }
                    if ($request->file("gmat_img")) {
                        $gmat_imgs = $request->file("gmat_img");
                        foreach ($gmat_imgs as $gmat_img) {
                            $images = rand() . '.' . $gmat_img->extension();
                            $request['gmat_img'] = $images;
                            $gmat_img->move(public_path('upload/gmat/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GMAT",
                                "category" => 'GMAT',
                            ]);
                        }
                    }
                    if ($request->file("passport_img")) {
                        $passport_imgs = $request->file("passport_img");
                        foreach ($passport_imgs as $passport_img) {
                            $images = rand() . '.' . $passport_img->extension();
                            $request['passport_img'] = $images;
                            $passport_img->move(public_path('upload/passport/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Passport",
                                "category" => 'Passport',
                            ]);
                        }
                    }
                    if ($request->file("bc_img")) {
                        $bc_imgs = $request->file("bc_img");
                        foreach ($bc_imgs as $bc_img) {
                            $images = rand() . '.' . $bc_img->extension();
                            $request['bc_img'] = $images;
                            $bc_img->move(public_path('upload/birth_certificate/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Birth Certificate",
                                "category" => 'Birth Certificate',
                            ]);
                        }
                    }
                    if ($request->file("cv_img")) {
                        $cv_imgs = $request->file("cv_img");
                        foreach ($cv_imgs as $cv_img) {
                            $images = rand() . '.' . $cv_img->extension();
                            $request['cv_img'] = $images;
                            $cv_img->move(public_path('upload/cv/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "CV",
                                "category" => 'CV',
                            ]);
                        }
                    }
                    if ($request->file("profile_img")) {
                        $profile_imgs= $request->file("profile_img");
                        foreach ($profile_imgs as $profile_img) {
                            $images = rand() . '.' . $profile_img->extension();
                            $request['profile_img'] = $images;
                            $profile_img->move(public_path('upload'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Profile",
                                "category" => 'Profile',
                            ]);
                        }
                    }
//                    return response()->json(
//                        [
//                            'success' => true,
//                            'message' => 'Branch Stored Successfully'
//                        ]
//                    );
                }
                return redirect()->back();
//                return view('admin/dashboard');
//                return response()->json(['error' => $validator->errors()->all()]);
            }
            if (($request->education_level == "Grade 11") || ($request->education_level == "Grade 12")) {
                $validator = Validator::make($request->all(), [
                ]);
                if ($validator->passes()) {
                    DB::table('tbl_student_profile')->insert([
                        "student_id" => $student_id,
                        "f_name" => $request->f_name,
                        "m_name" => $request->m_name,
                        "l_name" => $request->l_name,
                        "dob" => $request->dob,
                        "first_language" => $request->first_language,
                        "citizenship" => $request->citizenship,
                        "passport_no" => $request->passport_no,
                        "passport_exp" => $request->passport_exp,
                        "marital_status" => $request->marital_status,
                        "gender" => $request->gender,
                        "address" => $request->address,
                        "city" => $request->city,
                        "country" => $request->country,
                        "state" => $request->state,
                        "zip_code" => $request->zip_code,
                        "email" => $request->email,
                        "phone_no" => $request->phone_no,
                        "education_country" => $request->education_country,
                        "education_level" => $request->education_level,
                        "grading_scheme" => $request->grading_scheme,
                        "grade_avg_1" => $request->grade_avg_1,
                        "grade_avg_2" => $request->grade_avg_2,
                        "grade_avg_3" => $request->grade_avg_3,
                        "grade_avg_4" => $request->grade_avg_4,
                        "grade_avg_5" => $request->grade_avg_5,
                        "grade_avg_6" => $request->grade_avg_6,
                        "grade_avg_7" => $request->grade_avg_7,
                        "grade_scale" => $request->grade_scale,
                        "test_score_type" => $request->test_score_type,
                        "ielts_exam_date" => $request->ielts_exam_date,
                        "ielts_reading_score" => $request->ielts_reading_score,
                        "ielts_listening_score" => $request->ielts_listening_score,
                        "ielts_writing_score" => $request->ielts_writing_score,
                        "ielts_speaking_score" => $request->ielts_speaking_score,
                        "ielts_total_score" => $request->ielts_total_score,

                        "toefl_exam_date" => $request->toefl_exam_date,
                        "toefl_reading_score" => $request->toefl_reading_score,
                        "toefl_listening_score" => $request->toefl_listening_score,
                        "toefl_writing_score" => $request->toefl_writing_score,
                        "toefl_speaking_score" => $request->toefl_speaking_score,
                        "toefl_total_score" => $request->toefl_total_score,

                        "pte_exam_date" => $request->pte_exam_date,
                        "pte_reading_score" => $request->pte_reading_score,
                        "pte_writing_score" => $request->pte_writing_score,
                        "pte_listening_score" => $request->pte_listening_score,
                        "pte_speaking_score" => $request->pte_speaking_score,
                        "pte_total_score" => $request->pte_total_score,

                        "duolingo_total_score" => $request->duolingo_total_score,
                        "duolingo_exam_date" => $request->duolingo_exam_date,

                        "gre_exam_date" => $request->gre_exam_date,
                        "gre_verbal_score" => $request->gre_verbal_score,
                        "gre_quantitative_score" => $request->gre_quantitative_score,
                        "gre_awa_score" => $request->gre_awa_score,

                        "gmat_exam_date" => $request->gmat_exam_date,
                        "gmat_verbal_score" => $request->gmat_verbal_score,
                        "gmat_quantitative_score" => $request->gmat_quantitative_score,
                        "gmat_awa_score" => $request->gmat_awa_score,
                        "gmat_total_score" => $request->gmat_total_score,

                        "visa_refused" => $request->visa_refused,
                        "permit" => $request->permit,
                        "more_details" => $request->more_details,
                        "status" => "1",
                    ]);
                    DB::table('tbl_student_education')->insert([
                        "student_id" => $student_id,
                        "type" => $request->education_level,
                        "primary_institution_country" => $request->primary_institution_country,
                        "secondary_institution_country" => $request->secondary_institution_country,
                        "undergraduate_institution_country" => $request->undergraduate_institution_country,
                        "postgraduate_institution_country" => $request->postgraduate_institution_country,

                        "primary_institution_name" => $request->primary_institution_name,
                        "secondary_institution_name" => $request->secondary_institution_name,
                        "undergraduate_institution_name" => $request->undergraduate_institution_name,
                        "postgraduate_institution_name" => $request->postgraduate_institution_name,

                        "primary_education_level" => $request->primary_education_level,
                        "secondary_education_level" => $request->secondary_education_level,
                        "undergraduate_education_level" => $request->undergraduate_education_level,
                        "postgraduate_education_level" => $request->postgraduate_education_level,

                        "primary_language_instruction" => $request->primary_language_instruction,
                        "secondary_language_instruction" => $request->secondary_language_instruction,
                        "undergraduate_language_instruction" => $request->undergraduate_language_instruction,
                        "postgraduate_language_instruction" => $request->postgraduate_language_instruction,

                        "primary_institution_from" => $request->primary_institution_from,
                        "secondary_institution_from" => $request->secondary_institution_from,
                        "undergraduate_institution_from" => $request->undergraduate_institution_from,
                        "postgraduate_institution_from" => $request->postgraduate_institution_from,

                        "primary_institution_to" => $request->primary_institution_to,
                        "secondary_institution_to" => $request->secondary_institution_to,
                        "undergraduate_institution_to" => $request->undergraduate_institution_to,
                        "postgraduate_institution_to" => $request->postgraduate_institution_to,


                        "primary_institution_address" => $request->primary_institution_address,
                        "secondary_institution_address" => $request->secondary_institution_address,
                        "undergraduate_institution_address" => $request->undergraduate_institution_address,
                        "postgraduate_institution_address" => $request->postgraduate_institution_address,

                        "primary_institution_city" => $request->primary_institution_city,
                        "secondary_institution_city" => $request->secondary_institution_city,
                        "undergraduate_institution_city" => $request->undergraduate_institution_city,
                        "postgraduate_institution_city" => $request->postgraduate_institution_city,

                        "primary_institution_province" => $request->primary_institution_province,
                        "secondary_institution_province" => $request->secondary_institution_province,
                        "undergraduate_institution_province" => $request->undergraduate_institution_province,
                        "postgraduate_institution_province" => $request->postgraduate_institution_province,

                        "primary_institution_zip" => $request->primary_institution_zip,
                        "secondary_institution_zip" => $request->secondary_institution_zip,
                        "undergraduate_institution_zip" => $request->undergraduate_institution_zip,
                        "postgraduate_institution_zip" => $request->postgraduate_institution_zip,

                        "primary_institution_degree" => $request->primary_institution_degree,
                        "secondary_institution_degree" => $request->secondary_institution_degree,
                        "undergraduate_institution_degree" => $request->undergraduate_institution_degree,
                        "postgraduate_institution_degree" => $request->postgraduate_institution_degree,

                        "primary_grading_scheme" => $request->primary_grading_scheme,
                        "secondary_grading_scheme" => $request->secondary_grading_scheme,

                        "primary_grade_avg" => $request->primary_grade_avg,
                        "secondary_grade_avg" => $request->secondary_grade_avg,

                        "primary_grade_scale" => $request->primary_grade_scale,
                        "secondary_grade_scale" => $request->secondary_grade_scale,
                    ]);
                    if ($request->file("primary_certificate_img")) {
                        $certificate_imgs_one = $request->file("primary_certificate_img");
                        foreach ($certificate_imgs_one as $certificate_img_one) {
                            $certificate_one = rand() . '.' . $certificate_img_one->extension();
                            $request['certificate_img_one'] = $certificate_one;
                            $certificate_img_one->move(public_path('upload/primary/'), $certificate_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_one,
                                "type" => 'Primary',
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("primary_transcript_img")) {
                        $transcript_imgs_one = $request->file("primary_transcript_img");
                        foreach ($transcript_imgs_one as $transcript_img_one) {
                            $transcript_one = rand() . '.' . $transcript_img_one->extension();
                            $request['transcript_img_one'] = $transcript_one;
                            $transcript_img_one->move(public_path('upload/primary/'), $transcript_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_one,
                                "type" => 'Primary',
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("secondary_certificate_img")) {
                        $certificate_imgs_two = $request->file("secondary_certificate_img");
                        foreach ($certificate_imgs_two as $certificate_img_two) {
                            $certificate_two = rand() . '.' . $certificate_img_two->extension();
                            $request['certificate_img_two'] = $certificate_two;
                            $certificate_img_two->move(public_path('upload/secondary/'), $certificate_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_two,
                                "type" => "Secondary",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("secondary_transcript_img")) {
                        $transcript_imgs_two = $request->file("secondary_transcript_img");
                        foreach ($transcript_imgs_two as $transcript_img_two) {
                            $transcript_two = rand() . '.' . $transcript_img_two->extension();
                            $request['transcript_img_two'] = $transcript_two;
                            $transcript_img_two->move(public_path('upload/secondary/'), $transcript_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_two,
                                "type" => "Secondary",
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("ielts_img")) {
                        $ielts_imgs = $request->file("ielts_img");
                        foreach ($ielts_imgs as $ielts_img) {
                            $images = rand() . '.' . $ielts_img->extension();
                            $request['ielts_img'] = $images;
                            $ielts_img->move(public_path('upload/ielts/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "IELTS",
                                "category" => 'IELTS',
                            ]);
                        }
                    }
                    if ($request->file("toefl_img")) {
                        $toefl_imgs = $request->file("toefl_img");
                        foreach ($toefl_imgs as $toefl_img) {
                            $images = rand() . '.' . $toefl_img->extension();
                            $request['toefl_img'] = $images;
                            $toefl_img->move(public_path('upload/toefl/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "TOEFL",
                                "category" => 'TOEFL',
                            ]);
                        }
                    }
                    if ($request->file("pte_img")) {
                        $pte_imgs = $request->file("pte_img");
                        foreach ($pte_imgs as $pte_img) {
                            $images = rand() . '.' . $pte_img->extension();
                            $request['pte_img'] = $images;
                            $pte_img->move(public_path('upload/pte/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "PTE",
                                "category" => 'PTE',
                            ]);
                        }
                    }
                    if ($request->file("duolingo_img")) {
                        $duolingo_imgs = $request->file("duolingo_img");
                        foreach ($duolingo_imgs as $duolingo_img) {
                            $images = rand() . '.' . $duolingo_img->extension();
                            $request['duolingo_img'] = $images;
                            $duolingo_img->move(public_path('upload/duolingo/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Duolingo",
                                "category" => 'Duolingo',
                            ]);
                        }
                    }
                    if ($request->file("gre_img")) {
                        $gre_imgs = $request->file("gre_img");
                        foreach ($gre_imgs as $gre_img) {
                            $images = rand() . '.' . $gre_img->extension();
                            $request['gre_img'] = $images;
                            $gre_img->move(public_path('upload/gre/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GRE",
                                "category" => 'GRE',
                            ]);
                        }
                    }
                    if ($request->file("gmat_img")) {
                        $gmat_imgs = $request->file("gmat_img");
                        foreach ($gmat_imgs as $gmat_img) {
                            $images = rand() . '.' . $gmat_img->extension();
                            $request['gmat_img'] = $images;
                            $gmat_img->move(public_path('upload/gmat/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GMAT",
                                "category" => 'GMAT',
                            ]);
                        }
                    }
                    if ($request->file("passport_img")) {
                        $passport_imgs = $request->file("passport_img");
                        foreach ($passport_imgs as $passport_img) {
                            $images = rand() . '.' . $passport_img->extension();
                            $request['passport_img'] = $images;
                            $passport_img->move(public_path('upload/passport/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Passport",
                                "category" => 'Passport',
                            ]);
                        }
                    }
                    if ($request->file("bc_img")) {
                        $bc_imgs = $request->file("bc_img");
                        foreach ($bc_imgs as $bc_img) {
                            $images = rand() . '.' . $bc_img->extension();
                            $request['bc_img'] = $images;
                            $bc_img->move(public_path('upload/birth_certificate/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Birth Certificate",
                                "category" => 'Birth Certificate',
                            ]);
                        }
                    }
                    if ($request->file("cv_img")) {
                        $cv_imgs = $request->file("cv_img");
                        foreach ($cv_imgs as $cv_img) {
                            $images = rand() . '.' . $cv_img->extension();
                            $request['cv_img'] = $images;
                            $cv_img->move(public_path('upload/cv/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "CV",
                                "category" => 'CV',
                            ]);
                        }
                    }
                    if ($request->file("profile_img")) {
                        $profile_imgs= $request->file("profile_img");
                        foreach ($profile_imgs as $profile_img) {
                            $images = rand() . '.' . $profile_img->extension();
                            $request['profile_img'] = $images;
                            $profile_img->move(public_path('upload'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Profile",
                                "category" => 'Profile',
                            ]);
                        }
                    }
//                    return response()->json(
//                        [
//                            'success' => true,
//                            'message' => 'Branch Stored Successfully'
//                        ]
//                    );
                }
                return redirect()->back();
//                return response()->json(['error' => $validator->errors()->all()]);
            }
            if (($request->education_level == "1-Year Post-Secondary Certificate") || ($request->education_level == "2-Year Undergraduate Diploma") || ($request->education_level == "3-Year Undergraduate Advanced Diploma") || ($request->education_level == "3-Year Bachalors Degree") || ($request->education_level == "4-Year Bachalors Degree")) {
                $validator = Validator::make($request->all(), [
                ]);
                if ($validator->passes()) {
                    DB::table('tbl_student_profile')->insert([
                        "student_id" => $student_id,
                        "f_name" => $request->f_name,
                        "m_name" => $request->m_name,
                        "l_name" => $request->l_name,
                        "dob" => $request->dob,
                        "first_language" => $request->first_language,
                        "citizenship" => $request->citizenship,
                        "passport_no" => $request->passport_no,
                        "passport_exp" => $request->passport_exp,
                        "marital_status" => $request->marital_status,
                        "gender" => $request->gender,
                        "address" => $request->address,
                        "city" => $request->city,
                        "country" => $request->country,
                        "state" => $request->state,
                        "zip_code" => $request->zip_code,
                        "email" => $request->email,
                        "phone_no" => $request->phone_no,
                        "education_country" => $request->education_country,
                        "education_level" => $request->education_level,
                        "grading_scheme" => $request->grading_scheme,
                        "grade_avg_1" => $request->grade_avg_1,
                        "grade_avg_2" => $request->grade_avg_2,
                        "grade_avg_3" => $request->grade_avg_3,
                        "grade_avg_4" => $request->grade_avg_4,
                        "grade_avg_5" => $request->grade_avg_5,
                        "grade_avg_6" => $request->grade_avg_6,
                        "grade_avg_7" => $request->grade_avg_7,
                        "grade_scale" => $request->grade_scale,

                        "test_score_type" => $request->test_score_type,
                        "ielts_exam_date" => $request->ielts_exam_date,
                        "ielts_reading_score" => $request->ielts_reading_score,
                        "ielts_listening_score" => $request->ielts_listening_score,
                        "ielts_writing_score" => $request->ielts_writing_score,
                        "ielts_speaking_score" => $request->ielts_speaking_score,
                        "ielts_total_score" => $request->ielts_total_score,

                        "toefl_exam_date" => $request->toefl_exam_date,
                        "toefl_reading_score" => $request->toefl_reading_score,
                        "toefl_listening_score" => $request->toefl_listening_score,
                        "toefl_writing_score" => $request->toefl_writing_score,
                        "toefl_speaking_score" => $request->toefl_speaking_score,
                        "toefl_total_score" => $request->toefl_total_score,

                        "pte_exam_date" => $request->pte_exam_date,
                        "pte_reading_score" => $request->pte_reading_score,
                        "pte_writing_score" => $request->pte_writing_score,
                        "pte_listening_score" => $request->pte_listening_score,
                        "pte_speaking_score" => $request->pte_speaking_score,
                        "pte_total_score" => $request->pte_total_score,

                        "duolingo_total_score" => $request->duolingo_total_score,
                        "duolingo_exam_date" => $request->duolingo_exam_date,

                        "gre_exam_date" => $request->gre_exam_date,
                        "gre_verbal_score" => $request->gre_verbal_score,
                        "gre_quantitative_score" => $request->gre_quantitative_score,
                        "gre_awa_score" => $request->gre_awa_score,

                        "gmat_exam_date" => $request->gmat_exam_date,
                        "gmat_verbal_score" => $request->gmat_verbal_score,
                        "gmat_quantitative_score" => $request->gmat_quantitative_score,
                        "gmat_awa_score" => $request->gmat_awa_score,
                        "gmat_total_score" => $request->gmat_total_score,

                        "visa_refused" => $request->visa_refused,
                        "permit" => $request->permit,
                        "more_details" => $request->more_details,
                        "status" => "1",
                    ]);
                    DB::table('tbl_student_education')->insert([
                        "student_id" => $student_id,
                        "type" => $request->education_level,
                        "primary_institution_country" => $request->primary_institution_country,
                        "secondary_institution_country" => $request->secondary_institution_country,
                        "undergraduate_institution_country" => $request->undergraduate_institution_country,
                        "postgraduate_institution_country" => $request->postgraduate_institution_country,

                        "primary_institution_name" => $request->primary_institution_name,
                        "secondary_institution_name" => $request->secondary_institution_name,
                        "undergraduate_institution_name" => $request->undergraduate_institution_name,
                        "postgraduate_institution_name" => $request->postgraduate_institution_name,

                        "primary_education_level" => $request->primary_education_level,
                        "secondary_education_level" => $request->secondary_education_level,
                        "undergraduate_education_level" => $request->undergraduate_education_level,
                        "postgraduate_education_level" => $request->postgraduate_education_level,

                        "primary_language_instruction" => $request->primary_language_instruction,
                        "secondary_language_instruction" => $request->secondary_language_instruction,
                        "undergraduate_language_instruction" => $request->undergraduate_language_instruction,
                        "postgraduate_language_instruction" => $request->postgraduate_language_instruction,

                        "primary_institution_from" => $request->primary_institution_from,
                        "secondary_institution_from" => $request->secondary_institution_from,
                        "undergraduate_institution_from" => $request->undergraduate_institution_from,
                        "postgraduate_institution_from" => $request->postgraduate_institution_from,

                        "primary_institution_to" => $request->primary_institution_to,
                        "secondary_institution_to" => $request->secondary_institution_to,
                        "undergraduate_institution_to" => $request->undergraduate_institution_to,
                        "postgraduate_institution_to" => $request->postgraduate_institution_to,


                        "primary_institution_address" => $request->primary_institution_address,
                        "secondary_institution_address" => $request->secondary_institution_address,
                        "undergraduate_institution_address" => $request->undergraduate_institution_address,
                        "postgraduate_institution_address" => $request->postgraduate_institution_address,

                        "primary_institution_city" => $request->primary_institution_city,
                        "secondary_institution_city" => $request->secondary_institution_city,
                        "undergraduate_institution_city" => $request->undergraduate_institution_city,
                        "postgraduate_institution_city" => $request->postgraduate_institution_city,

                        "primary_institution_province" => $request->primary_institution_province,
                        "secondary_institution_province" => $request->secondary_institution_province,
                        "undergraduate_institution_province" => $request->undergraduate_institution_province,
                        "postgraduate_institution_province" => $request->postgraduate_institution_province,

                        "primary_institution_zip" => $request->primary_institution_zip,
                        "secondary_institution_zip" => $request->secondary_institution_zip,
                        "undergraduate_institution_zip" => $request->undergraduate_institution_zip,
                        "postgraduate_institution_zip" => $request->postgraduate_institution_zip,

                        "primary_institution_degree" => $request->primary_institution_degree,
                        "secondary_institution_degree" => $request->secondary_institution_degree,
                        "undergraduate_institution_degree" => $request->undergraduate_institution_degree,
                        "postgraduate_institution_degree" => $request->postgraduate_institution_degree,

                        "primary_grading_scheme" => $request->primary_grading_scheme,
                        "secondary_grading_scheme" => $request->secondary_grading_scheme,
                        "undergraduate_grading_scheme" => $request->undergraduate_grading_scheme,

                        "primary_grade_avg" => $request->primary_grade_avg,
                        "secondary_grade_avg" => $request->secondary_grade_avg,
                        "undergraduate_grade_avg" => $request->undergraduate_grade_avg,

                        "primary_grade_scale" => $request->primary_grade_scale,
                        "secondary_grade_scale" => $request->secondary_grade_scale,
                        "undergraduate_grade_scale" => $request->undergraduate_grade_scale,
                    ]);
                    if ($request->file("primary_certificate_img")) {
                        $certificate_imgs_one = $request->file("primary_certificate_img");
                        foreach ($certificate_imgs_one as $certificate_img_one) {
                            $certificate_one = rand() . '.' . $certificate_img_one->extension();
                            $request['certificate_img_one'] = $certificate_one;
                            $certificate_img_one->move(public_path('upload/primary/'), $certificate_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_one,
                                "type" => 'Primary',
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("primary_transcript_img")) {
                        $transcript_imgs_one = $request->file("primary_transcript_img");
                        foreach ($transcript_imgs_one as $transcript_img_one) {
                            $transcript_one = rand() . '.' . $transcript_img_one->extension();
                            $request['transcript_img_one'] = $transcript_one;
                            $transcript_img_one->move(public_path('upload/primary/'), $transcript_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_one,
                                "type" => 'Primary',
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("secondary_certificate_img")) {
                        $certificate_imgs_two = $request->file("secondary_certificate_img");
                        foreach ($certificate_imgs_two as $certificate_img_two) {
                            $certificate_two = rand() . '.' . $certificate_img_two->extension();
                            $request['certificate_img_two'] = $certificate_two;
                            $certificate_img_two->move(public_path('upload/secondary/'), $certificate_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_two,
                                "type" => "Secondary",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("secondary_transcript_img")) {
                        $transcript_imgs_two = $request->file("secondary_transcript_img");
                        foreach ($transcript_imgs_two as $transcript_img_two) {
                            $transcript_two = rand() . '.' . $transcript_img_two->extension();
                            $request['transcript_img_two'] = $transcript_two;
                            $transcript_img_two->move(public_path('upload/secondary/'), $transcript_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_two,
                                "type" => "Secondary",
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("undergraduate_certificate_img")) {
                        $certificate_imgs_three = $request->file("undergraduate_certificate_img");
                        foreach ($certificate_imgs_three as $certificate_img_three) {
                            $certificate_three = rand() . '.' . $certificate_img_three->extension();
                            $request['certificate_img_three'] = $certificate_three;
                            $certificate_img_three->move(public_path('upload/undergraduate/'), $certificate_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_three,
                                "type" => "Undergraduate",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("undergraduate_transcript_img")) {
                        $transcript_imgs_three = $request->file("undergraduate_transcript_img");
                        foreach ($transcript_imgs_three as $transcript_img_three) {
                            $transcript_three = rand() . '.' . $transcript_img_three->extension();
                            $request['transcript_img_three'] = $transcript_three;
                            $transcript_img_three->move(public_path('upload/undergraduate/'), $transcript_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_three,
                                "type" => "Undergraduate",
                                "category" => 'Transcript',
                            ]);
                        }

                    }
                    if ($request->file("ielts_img")) {
                        $ielts_imgs = $request->file("ielts_img");
                        foreach ($ielts_imgs as $ielts_img) {
                            $images = rand() . '.' . $ielts_img->extension();
                            $request['ielts_img'] = $images;
                            $ielts_img->move(public_path('upload/ielts/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "IELTS",
                                "category" => 'IELTS',
                            ]);
                        }
                    }
                    if ($request->file("toefl_img")) {
                        $toefl_imgs = $request->file("toefl_img");
                        foreach ($toefl_imgs as $toefl_img) {
                            $images = rand() . '.' . $toefl_img->extension();
                            $request['toefl_img'] = $images;
                            $toefl_img->move(public_path('upload/toefl/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "TOEFL",
                                "category" => 'TOEFL',
                            ]);
                        }
                    }
                    if ($request->file("pte_img")) {
                        $pte_imgs = $request->file("pte_img");
                        foreach ($pte_imgs as $pte_img) {
                            $images = rand() . '.' . $pte_img->extension();
                            $request['pte_img'] = $images;
                            $pte_img->move(public_path('upload/pte/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "PTE",
                                "category" => 'PTE',
                            ]);
                        }
                    }
                    if ($request->file("duolingo_img")) {
                        $duolingo_imgs = $request->file("duolingo_img");
                        foreach ($duolingo_imgs as $duolingo_img) {
                            $images = rand() . '.' . $duolingo_img->extension();
                            $request['duolingo_img'] = $images;
                            $duolingo_img->move(public_path('upload/duolingo/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Duolingo",
                                "category" => 'Duolingo',
                            ]);
                        }
                    }
                    if ($request->file("gre_img")) {
                        $gre_imgs = $request->file("gre_img");
                        foreach ($gre_imgs as $gre_img) {
                            $images = rand() . '.' . $gre_img->extension();
                            $request['gre_img'] = $images;
                            $gre_img->move(public_path('upload/gre/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GRE",
                                "category" => 'GRE',
                            ]);
                        }
                    }
                    if ($request->file("gmat_img")) {
                        $gmat_imgs = $request->file("gmat_img");
                        foreach ($gmat_imgs as $gmat_img) {
                            $images = rand() . '.' . $gmat_img->extension();
                            $request['gmat_img'] = $images;
                            $gmat_img->move(public_path('upload/gmat/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GMAT",
                                "category" => 'GMAT',
                            ]);
                        }
                    }
                    if ($request->file("passport_img")) {
                        $passport_imgs = $request->file("passport_img");
                        foreach ($passport_imgs as $passport_img) {
                            $images = rand() . '.' . $passport_img->extension();
                            $request['passport_img'] = $images;
                            $passport_img->move(public_path('upload/passport/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Passport",
                                "category" => 'Passport',
                            ]);
                        }
                    }
                    if ($request->file("bc_img")) {
                        $bc_imgs = $request->file("bc_img");
                        foreach ($bc_imgs as $bc_img) {
                            $images = rand() . '.' . $bc_img->extension();
                            $request['bc_img'] = $images;
                            $bc_img->move(public_path('upload/birth_certificate/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Birth Certificate",
                                "category" => 'Birth Certificate',
                            ]);
                        }
                    }
                    if ($request->file("cv_img")) {
                        $cv_imgs = $request->file("cv_img");
                        foreach ($cv_imgs as $cv_img) {
                            $images = rand() . '.' . $cv_img->extension();
                            $request['cv_img'] = $images;
                            $cv_img->move(public_path('upload/cv/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "CV",
                                "category" => 'CV',
                            ]);
                        }
                    }
                    if ($request->file("profile_img")) {
                        $profile_imgs= $request->file("profile_img");
                        foreach ($profile_imgs as $profile_img) {
                            $images = rand() . '.' . $profile_img->extension();
                            $request['profile_img'] = $images;
                            $profile_img->move(public_path('upload'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Profile",
                                "category" => 'Profile',
                            ]);
                        }
                    }
//                    return response()->json(
//                        [
//                            'success' => true,
//                            'message' => 'Branch Stored Successfully'
//                        ]
//                    );
                }
                return redirect()->back();
//                return response()->json(['error' => $validator->errors()->all()]);
            }
            if (($request->education_level == "Postgraduate Certificate/Diploma") || ($request->education_level == "Master Degree") || ($request->education_level == "Doctoral Degree (Phd, M.D . .)")) {
                $validator = Validator::make($request->all(), [
                ]);
                if ($validator->passes()) {
                    DB::table('tbl_student_profile')->insert([
                        "student_id" => $student_id,
                        "f_name" => $request->f_name,
                        "m_name" => $request->m_name,
                        "l_name" => $request->l_name,
                        "dob" => $request->dob,
                        "first_language" => $request->first_language,
                        "citizenship" => $request->citizenship,
                        "passport_no" => $request->passport_no,
                        "passport_exp" => $request->passport_exp,
                        "marital_status" => $request->marital_status,
                        "gender" => $request->gender,
                        "address" => $request->address,
                        "city" => $request->city,
                        "country" => $request->country,
                        "state" => $request->state,
                        "zip_code" => $request->zip_code,
                        "email" => $request->email,
                        "phone_no" => $request->phone_no,
                        "education_country" => $request->education_country,
                        "education_level" => $request->education_level,
                        "grading_scheme" => $request->grading_scheme,
                        "grade_avg_1" => $request->grade_avg_1,
                        "grade_avg_2" => $request->grade_avg_2,
                        "grade_avg_3" => $request->grade_avg_3,
                        "grade_avg_4" => $request->grade_avg_4,
                        "grade_avg_5" => $request->grade_avg_5,
                        "grade_avg_6" => $request->grade_avg_6,
                        "grade_avg_7" => $request->grade_avg_7,
                        "grade_scale" => $request->grade_scale,

                        "test_score_type" => $request->test_score_type,
                        "ielts_exam_date" => $request->ielts_exam_date,
                        "ielts_reading_score" => $request->ielts_reading_score,
                        "ielts_listening_score" => $request->ielts_listening_score,
                        "ielts_writing_score" => $request->ielts_writing_score,
                        "ielts_speaking_score" => $request->ielts_speaking_score,
                        "ielts_total_score" => $request->ielts_total_score,

                        "toefl_exam_date" => $request->toefl_exam_date,
                        "toefl_reading_score" => $request->toefl_reading_score,
                        "toefl_listening_score" => $request->toefl_listening_score,
                        "toefl_writing_score" => $request->toefl_writing_score,
                        "toefl_speaking_score" => $request->toefl_speaking_score,
                        "toefl_total_score" => $request->toefl_total_score,

                        "pte_exam_date" => $request->pte_exam_date,
                        "pte_reading_score" => $request->pte_reading_score,
                        "pte_writing_score" => $request->pte_writing_score,
                        "pte_listening_score" => $request->pte_listening_score,
                        "pte_speaking_score" => $request->pte_speaking_score,
                        "pte_total_score" => $request->pte_total_score,

                        "duolingo_total_score" => $request->duolingo_total_score,
                        "duolingo_exam_date" => $request->duolingo_exam_date,

                        "gre_exam_date" => $request->gre_exam_date,
                        "gre_verbal_score" => $request->gre_verbal_score,
                        "gre_quantitative_score" => $request->gre_quantitative_score,
                        "gre_awa_score" => $request->gre_awa_score,

                        "gmat_exam_date" => $request->gmat_exam_date,
                        "gmat_verbal_score" => $request->gmat_verbal_score,
                        "gmat_quantitative_score" => $request->gmat_quantitative_score,
                        "gmat_awa_score" => $request->gmat_awa_score,
                        "gmat_total_score" => $request->gmat_total_score,

                        "visa_refused" => $request->visa_refused,
                        "permit" => $request->permit,
                        "more_details" => $request->more_details,
                        "status" => "1",
                    ]);
                    DB::table('tbl_student_education')->insert([
                        "student_id" => $student_id,
                        "type" => $request->education_level,
                        "primary_institution_country" => $request->primary_institution_country,
                        "secondary_institution_country" => $request->secondary_institution_country,
                        "undergraduate_institution_country" => $request->undergraduate_institution_country,
                        "postgraduate_institution_country" => $request->postgraduate_institution_country,

                        "primary_institution_name" => $request->primary_institution_name,
                        "secondary_institution_name" => $request->secondary_institution_name,
                        "undergraduate_institution_name" => $request->undergraduate_institution_name,
                        "postgraduate_institution_name" => $request->postgraduate_institution_name,

                        "primary_education_level" => $request->primary_education_level,
                        "secondary_education_level" => $request->secondary_education_level,
                        "undergraduate_education_level" => $request->undergraduate_education_level,
                        "postgraduate_education_level" => $request->postgraduate_education_level,

                        "primary_language_instruction" => $request->primary_language_instruction,
                        "secondary_language_instruction" => $request->secondary_language_instruction,
                        "undergraduate_language_instruction" => $request->undergraduate_language_instruction,
                        "postgraduate_language_instruction" => $request->postgraduate_language_instruction,

                        "primary_institution_from" => $request->primary_institution_from,
                        "secondary_institution_from" => $request->secondary_institution_from,
                        "undergraduate_institution_from" => $request->undergraduate_institution_from,
                        "postgraduate_institution_from" => $request->postgraduate_institution_from,

                        "primary_institution_to" => $request->primary_institution_to,
                        "secondary_institution_to" => $request->secondary_institution_to,
                        "undergraduate_institution_to" => $request->undergraduate_institution_to,
                        "postgraduate_institution_to" => $request->postgraduate_institution_to,


                        "primary_institution_address" => $request->primary_institution_address,
                        "secondary_institution_address" => $request->secondary_institution_address,
                        "undergraduate_institution_address" => $request->undergraduate_institution_address,
                        "postgraduate_institution_address" => $request->postgraduate_institution_address,

                        "primary_institution_city" => $request->primary_institution_city,
                        "secondary_institution_city" => $request->secondary_institution_city,
                        "undergraduate_institution_city" => $request->undergraduate_institution_city,
                        "postgraduate_institution_city" => $request->postgraduate_institution_city,

                        "primary_institution_province" => $request->primary_institution_province,
                        "secondary_institution_province" => $request->secondary_institution_province,
                        "undergraduate_institution_province" => $request->undergraduate_institution_province,
                        "postgraduate_institution_province" => $request->postgraduate_institution_province,

                        "primary_institution_zip" => $request->primary_institution_zip,
                        "secondary_institution_zip" => $request->secondary_institution_zip,
                        "undergraduate_institution_zip" => $request->undergraduate_institution_zip,
                        "postgraduate_institution_zip" => $request->postgraduate_institution_zip,

                        "primary_institution_degree" => $request->primary_institution_degree,
                        "secondary_institution_degree" => $request->secondary_institution_degree,
                        "undergraduate_institution_degree" => $request->undergraduate_institution_degree,
                        "postgraduate_institution_degree" => $request->postgraduate_institution_degree,

                        "primary_grading_scheme" => $request->primary_grading_scheme,
                        "secondary_grading_scheme" => $request->secondary_grading_scheme,
                        "undergraduate_grading_scheme" => $request->undergraduate_grading_scheme,
                        "postgraduate_grading_scheme" => $request->postgraduate_grading_scheme,

                        "primary_grade_avg" => $request->primary_grade_avg,
                        "secondary_grade_avg" => $request->secondary_grade_avg,
                        "undergraduate_grade_avg" => $request->undergraduate_grade_avg,
                        "postgraduate_grade_avg" => $request->postgraduate_grade_avg,

                        "primary_grade_scale" => $request->primary_grade_scale,
                        "secondary_grade_scale" => $request->secondary_grade_scale,
                        "undergraduate_grade_scale" => $request->undergraduate_grade_scale,
                        "postgraduate_grade_scale" => $request->postgraduate_grade_scale,
                    ]);
                    if ($request->file("primary_certificate_img")) {
                        $certificate_imgs_one = $request->file("primary_certificate_img");
                        foreach ($certificate_imgs_one as $certificate_img_one) {
                            $certificate_one = rand() . '.' . $certificate_img_one->extension();
                            $request['certificate_img_one'] = $certificate_one;
                            $certificate_img_one->move(public_path('upload/primary/'), $certificate_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_one,
                                "type" => 'Primary',
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("primary_transcript_img")) {
                        $transcript_imgs_one = $request->file("primary_transcript_img");
                        foreach ($transcript_imgs_one as $transcript_img_one) {
                            $transcript_one = rand() . '.' . $transcript_img_one->extension();
                            $request['transcript_img_one'] = $transcript_one;
                            $transcript_img_one->move(public_path('upload/primary/'), $transcript_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_one,
                                "type" => 'Primary',
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("secondary_certificate_img")) {
                        $certificate_imgs_two = $request->file("secondary_certificate_img");
                        foreach ($certificate_imgs_two as $certificate_img_two) {
                            $certificate_two = rand() . '.' . $certificate_img_two->extension();
                            $request['certificate_img_two'] = $certificate_two;
                            $certificate_img_two->move(public_path('upload/secondary/'), $certificate_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_two,
                                "type" => "Secondary",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("secondary_transcript_img")) {
                        $transcript_imgs_two = $request->file("secondary_transcript_img");
                        foreach ($transcript_imgs_two as $transcript_img_two) {
                            $transcript_two = rand() . '.' . $transcript_img_two->extension();
                            $request['transcript_img_two'] = $transcript_two;
                            $transcript_img_two->move(public_path('upload/secondary/'), $transcript_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_two,
                                "type" => "Secondary",
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("undergraduate_certificate_img")) {
                        $certificate_imgs_three = $request->file("undergraduate_certificate_img");
                        foreach ($certificate_imgs_three as $certificate_img_three) {
                            $certificate_three = rand() . '.' . $certificate_img_three->extension();
                            $request['certificate_img_three'] = $certificate_three;
                            $certificate_img_three->move(public_path('upload/undergraduate/'), $certificate_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_three,
                                "type" => "Undergraduate",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("undergraduate_transcript_img")) {
                        $transcript_imgs_three = $request->file("undergraduate_transcript_img");
                        foreach ($transcript_imgs_three as $transcript_img_three) {
                            $transcript_three = rand() . '.' . $transcript_img_three->extension();
                            $request['transcript_img_three'] = $transcript_three;
                            $transcript_img_three->move(public_path('upload/undergraduate/'), $transcript_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_three,
                                "type" => "Undergraduate",
                                "category" => 'Transcript',
                            ]);
                        }

                    }
                    if ($request->file("postgraduate_certificate_img")) {
                        $certificate_imgs_four = $request->file("postgraduate_certificate_img");
                        foreach ($certificate_imgs_four as $certificate_img_four) {
                            $certificate_four = rand() . '.' . $certificate_img_four->extension();
                            $request['certificate_img_four'] = $certificate_four;
                            $certificate_img_four->move(public_path('upload/postgraduate/'), $certificate_four);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_four,
                                "type" => "Postgraduate",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("postgraduate_transcript_img")) {
                        $transcript_imgs_four = $request->file("postgraduate_transcript_img");
                        foreach ($transcript_imgs_four as $transcript_img_four) {
                            $transcript_four = rand() . '.' . $transcript_img_four->extension();
                            $request['transcript_img_four'] = $transcript_four;
                            $transcript_img_four->move(public_path('upload/postgraduate/'), $transcript_four);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_four,
                                "type" => "Postgraduate",
                                "category" => 'Transcript',
                            ]);
                        }

                    }
                    if ($request->file("ielts_img")) {
                        $ielts_imgs = $request->file("ielts_img");
                        foreach ($ielts_imgs as $ielts_img) {
                            $images = rand() . '.' . $ielts_img->extension();
                            $request['ielts_img'] = $images;
                            $ielts_img->move(public_path('upload/ielts/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "IELTS",
                                "category" => 'IELTS',
                            ]);
                        }
                    }
                    if ($request->file("toefl_img")) {
                        $toefl_imgs = $request->file("toefl_img");
                        foreach ($toefl_imgs as $toefl_img) {
                            $images = rand() . '.' . $toefl_img->extension();
                            $request['toefl_img'] = $images;
                            $toefl_img->move(public_path('upload/toefl/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "TOEFL",
                                "category" => 'TOEFL',
                            ]);
                        }
                    }
                    if ($request->file("pte_img")) {
                        $pte_imgs = $request->file("pte_img");
                        foreach ($pte_imgs as $pte_img) {
                            $images = rand() . '.' . $pte_img->extension();
                            $request['pte_img'] = $images;
                            $pte_img->move(public_path('upload/pte/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "PTE",
                                "category" => 'PTE',
                            ]);
                        }
                    }
                    if ($request->file("duolingo_img")) {
                        $duolingo_imgs = $request->file("duolingo_img");
                        foreach ($duolingo_imgs as $duolingo_img) {
                            $images = rand() . '.' . $duolingo_img->extension();
                            $request['duolingo_img'] = $images;
                            $duolingo_img->move(public_path('upload/duolingo/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Duolingo",
                                "category" => 'Duolingo',
                            ]);
                        }
                    }
                    if ($request->file("gre_img")) {
                        $gre_imgs = $request->file("gre_img");
                        foreach ($gre_imgs as $gre_img) {
                            $images = rand() . '.' . $gre_img->extension();
                            $request['gre_img'] = $images;
                            $gre_img->move(public_path('upload/gre/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GRE",
                                "category" => 'GRE',
                            ]);
                        }
                    }
                    if ($request->file("gmat_img")) {
                        $gmat_imgs = $request->file("gmat_img");
                        foreach ($gmat_imgs as $gmat_img) {
                            $images = rand() . '.' . $gmat_img->extension();
                            $request['gmat_img'] = $images;
                            $gmat_img->move(public_path('upload/gmat/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GMAT",
                                "category" => 'GMAT',
                            ]);
                        }
                    }
                    if ($request->file("passport_img")) {
                        $passport_imgs = $request->file("passport_img");
                        foreach ($passport_imgs as $passport_img) {
                            $images = rand() . '.' . $passport_img->extension();
                            $request['passport_img'] = $images;
                            $passport_img->move(public_path('upload/passport/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Passport",
                                "category" => 'Passport',
                            ]);
                        }
                    }
                    if ($request->file("bc_img")) {
                        $bc_imgs = $request->file("bc_img");
                        foreach ($bc_imgs as $bc_img) {
                            $images = rand() . '.' . $bc_img->extension();
                            $request['bc_img'] = $images;
                            $bc_img->move(public_path('upload/birth_certificate/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Birth Certificate",
                                "category" => 'Birth Certificate',
                            ]);
                        }
                    }
                    if ($request->file("cv_img")) {
                        $cv_imgs = $request->file("cv_img");
                        foreach ($cv_imgs as $cv_img) {
                            $images = rand() . '.' . $cv_img->extension();
                            $request['cv_img'] = $images;
                            $cv_img->move(public_path('upload/cv/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "CV",
                                "category" => 'CV',
                            ]);
                        }
                    }
                    if ($request->file("profile_img")) {
                        $profile_imgs= $request->file("profile_img");
                        foreach ($profile_imgs as $profile_img) {
                            $images = rand() . '.' . $profile_img->extension();
                            $request['profile_img'] = $images;
                            $profile_img->move(public_path('upload'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Profile",
                                "category" => 'Profile',
                            ]);
                        }
                    }
//                    return response()->json(
//                        [
//                            'success' => true,
//                            'message' => 'Branch Stored Successfully'
//                        ]
//                    );
                }
                return redirect()->back();
//                return response()->json(['error' => $validator->errors()->all()]);
            }
            if (($request->education_level == "Double Master Degree")) {
                $validator = Validator::make($request->all(), [
                ]);
                if ($validator->passes()) {
                    DB::table('tbl_student_profile')->insert([
                        "student_id" => $student_id,
                        "f_name" => $request->f_name,
                        "m_name" => $request->m_name,
                        "l_name" => $request->l_name,
                        "dob" => $request->dob,
                        "first_language" => $request->first_language,
                        "citizenship" => $request->citizenship,
                        "passport_no" => $request->passport_no,
                        "passport_exp" => $request->passport_exp,
                        "marital_status" => $request->marital_status,
                        "gender" => $request->gender,
                        "address" => $request->address,
                        "city" => $request->city,
                        "country" => $request->country,
                        "state" => $request->state,
                        "zip_code" => $request->zip_code,
                        "email" => $request->email,
                        "phone_no" => $request->phone_no,
                        "education_country" => $request->education_country,
                        "education_level" => $request->education_level,
                        "grading_scheme" => $request->grading_scheme,
                        "grade_avg_1" => $request->grade_avg_1,
                        "grade_avg_2" => $request->grade_avg_2,
                        "grade_avg_3" => $request->grade_avg_3,
                        "grade_avg_4" => $request->grade_avg_4,
                        "grade_avg_5" => $request->grade_avg_5,
                        "grade_avg_6" => $request->grade_avg_6,
                        "grade_avg_7" => $request->grade_avg_7,
                        "grade_scale" => $request->grade_scale,

                        "test_score_type" => $request->test_score_type,
                        "ielts_exam_date" => $request->ielts_exam_date,
                        "ielts_reading_score" => $request->ielts_reading_score,
                        "ielts_listening_score" => $request->ielts_listening_score,
                        "ielts_writing_score" => $request->ielts_writing_score,
                        "ielts_speaking_score" => $request->ielts_speaking_score,
                        "ielts_total_score" => $request->ielts_total_score,

                        "toefl_exam_date" => $request->toefl_exam_date,
                        "toefl_reading_score" => $request->toefl_reading_score,
                        "toefl_listening_score" => $request->toefl_listening_score,
                        "toefl_writing_score" => $request->toefl_writing_score,
                        "toefl_speaking_score" => $request->toefl_speaking_score,
                        "toefl_total_score" => $request->toefl_total_score,

                        "pte_exam_date" => $request->pte_exam_date,
                        "pte_reading_score" => $request->pte_reading_score,
                        "pte_writing_score" => $request->pte_writing_score,
                        "pte_listening_score" => $request->pte_listening_score,
                        "pte_speaking_score" => $request->pte_speaking_score,
                        "pte_total_score" => $request->pte_total_score,

                        "duolingo_total_score" => $request->duolingo_total_score,
                        "duolingo_exam_date" => $request->duolingo_exam_date,

                        "gre_exam_date" => $request->gre_exam_date,
                        "gre_verbal_score" => $request->gre_verbal_score,
                        "gre_quantitative_score" => $request->gre_quantitative_score,
                        "gre_awa_score" => $request->gre_awa_score,

                        "gmat_exam_date" => $request->gmat_exam_date,
                        "gmat_verbal_score" => $request->gmat_verbal_score,
                        "gmat_quantitative_score" => $request->gmat_quantitative_score,
                        "gmat_awa_score" => $request->gmat_awa_score,
                        "gmat_total_score" => $request->gmat_total_score,

                        "visa_refused" => $request->visa_refused,
                        "permit" => $request->permit,
                        "more_details" => $request->more_details,
                        "status" => "1",
                    ]);
                    DB::table('tbl_student_education')->insert([
                        "student_id" => $student_id,
                        "type" => $request->education_level,
                        "primary_institution_country" => $request->primary_institution_country,
                        "secondary_institution_country" => $request->secondary_institution_country,
                        "undergraduate_institution_country" => $request->undergraduate_institution_country,
                        "postgraduate_institution_country" => $request->postgraduate_institution_country,
                        "double_postgraduate_institution_country" => $request->postgraduate_institution_country,

                        "primary_institution_name" => $request->primary_institution_name,
                        "secondary_institution_name" => $request->secondary_institution_name,
                        "undergraduate_institution_name" => $request->undergraduate_institution_name,
                        "postgraduate_institution_name" => $request->postgraduate_institution_name,
                        "double_postgraduate_institution_name" => $request->postgraduate_institution_name,

                        "primary_education_level" => $request->primary_education_level,
                        "secondary_education_level" => $request->secondary_education_level,
                        "undergraduate_education_level" => $request->undergraduate_education_level,
                        "postgraduate_education_level" => $request->postgraduate_education_level,
                        "double_postgraduate_education_level" => $request->postgraduate_education_level,

                        "primary_language_instruction" => $request->primary_language_instruction,
                        "secondary_language_instruction" => $request->secondary_language_instruction,
                        "undergraduate_language_instruction" => $request->undergraduate_language_instruction,
                        "postgraduate_language_instruction" => $request->postgraduate_language_instruction,
                        "double_postgraduate_language_instruction" => $request->postgraduate_language_instruction,

                        "primary_institution_from" => $request->primary_institution_from,
                        "secondary_institution_from" => $request->secondary_institution_from,
                        "undergraduate_institution_from" => $request->undergraduate_institution_from,
                        "postgraduate_institution_from" => $request->postgraduate_institution_from,
                        "double_postgraduate_institution_from" => $request->postgraduate_institution_from,

                        "primary_institution_to" => $request->primary_institution_to,
                        "secondary_institution_to" => $request->secondary_institution_to,
                        "undergraduate_institution_to" => $request->undergraduate_institution_to,
                        "postgraduate_institution_to" => $request->postgraduate_institution_to,
                        "double_postgraduate_institution_to" => $request->postgraduate_institution_to,

                        "primary_institution_address" => $request->primary_institution_address,
                        "secondary_institution_address" => $request->secondary_institution_address,
                        "undergraduate_institution_address" => $request->undergraduate_institution_address,
                        "postgraduate_institution_address" => $request->postgraduate_institution_address,
                        "double_postgraduate_institution_address" => $request->postgraduate_institution_address,

                        "primary_institution_city" => $request->primary_institution_city,
                        "secondary_institution_city" => $request->secondary_institution_city,
                        "undergraduate_institution_city" => $request->undergraduate_institution_city,
                        "postgraduate_institution_city" => $request->postgraduate_institution_city,
                        "double_postgraduate_institution_city" => $request->postgraduate_institution_city,

                        "primary_institution_province" => $request->primary_institution_province,
                        "secondary_institution_province" => $request->secondary_institution_province,
                        "undergraduate_institution_province" => $request->undergraduate_institution_province,
                        "postgraduate_institution_province" => $request->postgraduate_institution_province,
                        "double_postgraduate_institution_province" => $request->postgraduate_institution_province,

                        "primary_institution_zip" => $request->primary_institution_zip,
                        "secondary_institution_zip" => $request->secondary_institution_zip,
                        "undergraduate_institution_zip" => $request->undergraduate_institution_zip,
                        "postgraduate_institution_zip" => $request->postgraduate_institution_zip,
                        "double_postgraduate_institution_zip" => $request->postgraduate_institution_zip,

                        "primary_institution_degree" => $request->primary_institution_degree,
                        "secondary_institution_degree" => $request->secondary_institution_degree,
                        "undergraduate_institution_degree" => $request->undergraduate_institution_degree,
                        "postgraduate_institution_degree" => $request->postgraduate_institution_degree,
                        "double_postgraduate_institution_degree" => $request->postgraduate_institution_degree,

                        "primary_grading_scheme" => $request->primary_grading_scheme,
                        "secondary_grading_scheme" => $request->secondary_grading_scheme,
                        "undergraduate_grading_scheme" => $request->undergraduate_grading_scheme,
                        "postgraduate_grading_scheme" => $request->postgraduate_grading_scheme,
                        "double_postgraduate_grading_scheme" => $request->double_postgraduate_grading_scheme,

                        "primary_grade_avg" => $request->primary_grade_avg,
                        "secondary_grade_avg" => $request->secondary_grade_avg,
                        "undergraduate_grade_avg" => $request->undergraduate_grade_avg,
                        "postgraduate_grade_avg" => $request->postgraduate_grade_avg,
                        "double_postgraduate_grade_avg" => $request->double_postgraduate_grade_avg,

                        "primary_grade_scale" => $request->primary_grade_scale,
                        "secondary_grade_scale" => $request->secondary_grade_scale,
                        "undergraduate_grade_scale" => $request->undergraduate_grade_scale,
                        "postgraduate_grade_scale" => $request->postgraduate_grade_scale,
                        "double_postgraduate_grade_scale" => $request->double_postgraduate_grade_scale,
                    ]);
                    if ($request->file("primary_certificate_img")) {
                        $certificate_imgs_one = $request->file("primary_certificate_img");
                        foreach ($certificate_imgs_one as $certificate_img_one) {
                            $certificate_one = rand() . '.' . $certificate_img_one->extension();
                            $request['certificate_img_one'] = $certificate_one;
                            $certificate_img_one->move(public_path('upload/primary/'), $certificate_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_one,
                                "type" => 'Primary',
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("primary_transcript_img")) {
                        $transcript_imgs_one = $request->file("primary_transcript_img");
                        foreach ($transcript_imgs_one as $transcript_img_one) {
                            $transcript_one = rand() . '.' . $transcript_img_one->extension();
                            $request['transcript_img_one'] = $transcript_one;
                            $transcript_img_one->move(public_path('upload/primary/'), $transcript_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_one,
                                "type" => 'Primary',
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("secondary_certificate_img")) {
                        $certificate_imgs_two = $request->file("secondary_certificate_img");
                        foreach ($certificate_imgs_two as $certificate_img_two) {
                            $certificate_two = rand() . '.' . $certificate_img_two->extension();
                            $request['certificate_img_two'] = $certificate_two;
                            $certificate_img_two->move(public_path('upload/secondary/'), $certificate_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_two,
                                "type" => "Secondary",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("secondary_transcript_img")) {
                        $transcript_imgs_two = $request->file("secondary_transcript_img");
                        foreach ($transcript_imgs_two as $transcript_img_two) {
                            $transcript_two = rand() . '.' . $transcript_img_two->extension();
                            $request['transcript_img_two'] = $transcript_two;
                            $transcript_img_two->move(public_path('upload/secondary/'), $transcript_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_two,
                                "type" => "Secondary",
                                "category" => 'Transcript',
                            ]);
                        }
                    }
                    if ($request->file("undergraduate_certificate_img")) {
                        $certificate_imgs_three = $request->file("undergraduate_certificate_img");
                        foreach ($certificate_imgs_three as $certificate_img_three) {
                            $certificate_three = rand() . '.' . $certificate_img_three->extension();
                            $request['certificate_img_three'] = $certificate_three;
                            $certificate_img_three->move(public_path('upload/undergraduate/'), $certificate_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_three,
                                "type" => "Undergraduate",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("undergraduate_transcript_img")) {
                        $transcript_imgs_three = $request->file("undergraduate_transcript_img");
                        foreach ($transcript_imgs_three as $transcript_img_three) {
                            $transcript_three = rand() . '.' . $transcript_img_three->extension();
                            $request['transcript_img_three'] = $transcript_three;
                            $transcript_img_three->move(public_path('upload/undergraduate/'), $transcript_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_three,
                                "type" => "Undergraduate",
                                "category" => 'Transcript',
                            ]);
                        }

                    }
                    if ($request->file("postgraduate_certificate_img")) {
                        $certificate_imgs_four = $request->file("postgraduate_certificate_img");
                        foreach ($certificate_imgs_four as $certificate_img_four) {
                            $certificate_four = rand() . '.' . $certificate_img_four->extension();
                            $request['certificate_img_four'] = $certificate_four;
                            $certificate_img_four->move(public_path('upload/postgraduate/'), $certificate_four);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_four,
                                "type" => "Postgraduate",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("postgraduate_transcript_img")) {
                        $transcript_imgs_four = $request->file("postgraduate_transcript_img");
                        foreach ($transcript_imgs_four as $transcript_img_four) {
                            $transcript_four = rand() . '.' . $transcript_img_four->extension();
                            $request['transcript_img_four'] = $transcript_four;
                            $transcript_img_four->move(public_path('upload/postgraduate/'), $transcript_four);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_four,
                                "type" => "Postgraduate",
                                "category" => 'Transcript',
                            ]);
                        }

                    }
                    if ($request->file("double_postgraduate_certificate_img")) {
                        $certificate_imgs_five = $request->file("double_postgraduate_certificate_img");
                        foreach ($certificate_imgs_five as $certificate_img_five) {
                            $certificate_five = rand() . '.' . $certificate_img_five->extension();
                            $request['certificate_img_five'] = $certificate_five;
                            $certificate_img_five->move(public_path('upload/double_postgraduate/'), $certificate_five);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_five,
                                "type" => "Double Postgraduate",
                                "category" => 'Certificate',
                            ]);
                        }
                    }
                    if ($request->file("double_postgraduate_transcript_img")) {
                        $transcript_imgs_five = $request->file("double_postgraduate_transcript_img");
                        foreach ($transcript_imgs_five as $transcript_img_five) {
                            $transcript_five = rand() . '.' . $transcript_img_five->extension();
                            $request['transcript_img_five'] = $transcript_five;
                            $transcript_img_five->move(public_path('upload/double_postgraduate/'), $transcript_five);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_five,
                                "type" => "Double Postgraduate",
                                "category" => 'Transcript',
                            ]);
                        }

                    }
                    if ($request->file("ielts_img")) {
                        $ielts_imgs = $request->file("ielts_img");
                        foreach ($ielts_imgs as $ielts_img) {
                            $images = rand() . '.' . $ielts_img->extension();
                            $request['ielts_img'] = $images;
                            $ielts_img->move(public_path('upload/ielts/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "IELTS",
                                "category" => 'IELTS',
                            ]);
                        }
                    }
                    if ($request->file("toefl_img")) {
                        $toefl_imgs = $request->file("toefl_img");
                        foreach ($toefl_imgs as $toefl_img) {
                            $images = rand() . '.' . $toefl_img->extension();
                            $request['toefl_img'] = $images;
                            $toefl_img->move(public_path('upload/toefl/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "TOEFL",
                                "category" => 'TOEFL',
                            ]);
                        }
                    }
                    if ($request->file("pte_img")) {
                        $pte_imgs = $request->file("pte_img");
                        foreach ($pte_imgs as $pte_img) {
                            $images = rand() . '.' . $pte_img->extension();
                            $request['pte_img'] = $images;
                            $pte_img->move(public_path('upload/pte/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "PTE",
                                "category" => 'PTE',
                            ]);
                        }
                    }
                    if ($request->file("duolingo_img")) {
                        $duolingo_imgs = $request->file("duolingo_img");
                        foreach ($duolingo_imgs as $duolingo_img) {
                            $images = rand() . '.' . $duolingo_img->extension();
                            $request['duolingo_img'] = $images;
                            $duolingo_img->move(public_path('upload/duolingo/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Duolingo",
                                "category" => 'Duolingo',
                            ]);
                        }
                    }
                    if ($request->file("gre_img")) {
                        $gre_imgs = $request->file("gre_img");
                        foreach ($gre_imgs as $gre_img) {
                            $images = rand() . '.' . $gre_img->extension();
                            $request['gre_img'] = $images;
                            $gre_img->move(public_path('upload/gre/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GRE",
                                "category" => 'GRE',
                            ]);
                        }
                    }
                    if ($request->file("gmat_img")) {
                        $gmat_imgs = $request->file("gmat_img");
                        foreach ($gmat_imgs as $gmat_img) {
                            $images = rand() . '.' . $gmat_img->extension();
                            $request['gmat_img'] = $images;
                            $gmat_img->move(public_path('upload/gmat/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "GMAT",
                                "category" => 'GMAT',
                            ]);
                        }
                    }
                    if ($request->file("passport_img")) {
                        $passport_imgs = $request->file("passport_img");
                        foreach ($passport_imgs as $passport_img) {
                            $images = rand() . '.' . $passport_img->extension();
                            $request['passport_img'] = $images;
                            $passport_img->move(public_path('upload/passport/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Passport",
                                "category" => 'Passport',
                            ]);
                        }
                    }
                    if ($request->file("bc_img")) {
                        $bc_imgs = $request->file("bc_img");
                        foreach ($bc_imgs as $bc_img) {
                            $images = rand() . '.' . $bc_img->extension();
                            $request['bc_img'] = $images;
                            $bc_img->move(public_path('upload/birth_certificate/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Birth Certificate",
                                "category" => 'Birth Certificate',
                            ]);
                        }
                    }
                    if ($request->file("cv_img")) {
                        $cv_imgs = $request->file("cv_img");
                        foreach ($cv_imgs as $cv_img) {
                            $images = rand() . '.' . $cv_img->extension();
                            $request['cv_img'] = $images;
                            $cv_img->move(public_path('upload/cv/'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "CV",
                                "category" => 'CV',
                            ]);
                        }
                    }
                    if ($request->file("profile_img")) {
                        $profile_imgs= $request->file("profile_img");
                        foreach ($profile_imgs as $profile_img) {
                            $images = rand() . '.' . $profile_img->extension();
                            $request['profile_img'] = $images;
                            $profile_img->move(public_path('upload'), $images);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $images,
                                "type" => "Profile",
                                "category" => 'Profile',
                            ]);
                        }
                    }
//                    return response()->json(
//                        [
//                            'success' => true,
//                            'message' => 'Branch Stored Successfully'
//                        ]
//                    );
                }
                return redirect()->back();
//                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

        public function student_profile_show($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $check = DB::table('student_entry')->select('*')->where('student_id', '=', $id)->first();
                $profile_data = DB::table('tbl_student_profile')->where('student_id', '=', $id)->first();
                $education_data = DB::table('tbl_student_education')
                    ->where('student_id', '=', $id)
                    ->get();
                $important_data = DB::table('tbl_imp_file')->where('student_id', '=', $id)->get();
                $visa_important_data = DB::table('tbl_imp_file')->where('student_id', '=', $id)->where('type', 'Visa')->get();
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $id)->get();
                $country_program = DB::table('tbl_country_program')->where('student_id', '=', $id)->first();
                $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $id)->first();

            // dd($education_data);
                return view('student_profile_show', compact('profile_data', 'education_data', 'payment', 'document_data', 'important_data', 'visa_important_data', 'check', 'country_program'));
            } else {
                return view('signin');
            }
        }

        public function student_profile_edit($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $profile_data = DB::table('tbl_student_profile')->where('student_id', '=', $id)->first();
                $education_data = DB::table('tbl_student_education')->where('student_id', '=', $id)->first();
                $education_data_count = DB::table('tbl_student_education')->where('student_id', '=', $id)->count();
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $student_id)->get();
//                $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $id)->first();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('new_message', '1')
                    ->where('form', 'Assistant Counselor')
                    ->first();
                return view('student_profile_edit', compact('profile_data', 'education_data', 'counselor_accept', 'document_data', 'admin_new_msg_count', 'education_data_count'));
            } else {
                return view('signin');
            }
        }

        public function student_profile_update(Request $request)
        {
            if (Auth::check()) {
                $this->validate($request, [
                    'certificate_img_one.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'transcript_img_one.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'certificate_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'transcript_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'certificate_img_three.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'transcript_img_three.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'certificate_img_four.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'transcript_img_four.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'certificate_img_five.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'transcript_img_five.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'ielts_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'toefl_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'pte_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'duolingo_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'gre_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'gmat_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'passport_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                    'nid_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
                ]);
                $student_id = $request->student_id;
                $destinationPath = 'public/upload/';
                if ($request->add_more_one_institution_country) {
                    $check_add_more_one = DB::table('tbl_student_education')->where('student_id', '=', $student_id)->where('type', 'add_more_one')->first();
                    if (isset($check_add_more_one)) {
                        DB::table('tbl_student_education')
                            ->where('student_id', $student_id)
                            ->where('type', "add_more_one")
                            ->update([
                                "institution_country" => $request->add_more_one_institution_country,
                                "institution_name" => $request->add_more_one_institution_name,
                                "education_level" => $request->add_more_one_education_level,
                                "primary_language_instruction" => $request->add_more_one_primary_language_instruction,
                                "institution_from" => $request->add_more_one_institution_from,
                                "institution_to" => $request->add_more_one_institution_to,
                                "institution_degree" => $request->add_more_one_institution_degree,
                                "institution_address" => $request->add_more_one_institution_address,
                                "institution_city" => $request->add_more_one_institution_city,
                                "institution_province" => $request->add_more_one_institution_province,
                                "institution_zip" => $request->add_more_one_institution_zip,
                                "type" => 'add_more_one',
                            ]);
                        if ($request->file("certificate_img_one")) {
//                            $request->validate([
//                                'certificate_img_one.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
//                            ]);
                            $certificate_imgs_one = $request->file("certificate_img_one");
                            foreach ($certificate_imgs_one as $certificate_img_one) {
                                $certificate_one = rand() . '.' . $certificate_img_one->extension();
                                $request['certificate_img_one'] = $certificate_one;
                                $certificate_img_one->move(public_path('upload'), $certificate_one);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $certificate_one,
                                    "type" => $request->add_more_one_education_level,
                                ]);
                            }
                        }
                        if ($request->file("transcript_img_one")) {
//                            $request->validate([
//                                'transcript_img_one.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                            ]);
                            $transcript_imgs_one = $request->file("transcript_img_one");
                            foreach ($transcript_imgs_one as $transcript_img_one) {
                                $transcript_one = rand() . '.' . $transcript_img_one->extension();
                                $request['transcript_img_one'] = $transcript_one;
                                $transcript_img_one->move(public_path('upload'), $transcript_one);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $transcript_one,
                                    "type" => $request->add_more_one_education_level,
                                ]);
                            }
                        }
                    } else {
//                        $request->validate([
//                            'certificate_img_one.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
//                            'transcript_img_one.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                        ]);
                        $certificate_imgs_one = $request->file("certificate_img_one");
                        $transcript_imgs_one = $request->file("transcript_img_one");
                        foreach ($request->addmore_one as $key => $value) {
                            $education_level_one = $value['education_level'];
                            DB::table('tbl_student_education')->insert([
                                "student_id" => $student_id,
                                "institution_country" => $value['institution_country'],
                                "institution_name" => $value['institution_name'],
                                "education_level" => $value['education_level'],
                                "primary_language_instruction" => $value['primary_language_instruction'],
                                "institution_from" => $value['institution_from'],
                                "institution_to" => $value['institution_to'],
                                "institution_address" => $value['institution_address'],
                                "institution_city" => $value['institution_city'],
                                "institution_province" => $value['institution_province'],
                                "institution_zip" => $value['institution_zip'],
                                "institution_degree" => $value['institution_degree'],
                            ]);
                        }
                        foreach ($certificate_imgs_one as $certificate_img_one) {
                            $certificate_one = rand() . '.' . $certificate_img_one->extension();
                            $request['certificate_img_one'] = $certificate_one;
                            $certificate_img_one->move(public_path('upload'), $certificate_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_one,
                                "type" => $education_level_one,
                            ]);
                        }
                        foreach ($transcript_imgs_one as $transcript_img_one) {
                            $transcript_one = rand() . '.' . $transcript_img_one->extension();
                            $request['transcript_img_one'] = $transcript_one;
                            $transcript_img_one->move(public_path('upload'), $transcript_one);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_one,
                                "type" => $education_level_one,
                            ]);
                        }
                    }
                }
                if ($request->add_more_two_institution_country) {
                    $check_add_more_two = DB::table('tbl_student_education')->where('student_id', '=', $student_id)->where('type', 'add_more_two')->first();
                    if (isset($check_add_more_two)) {
                        DB::table('tbl_student_education')
                            ->where('student_id', $student_id)
                            ->where('type', "add_more_two")
                            ->update([
                                "institution_country" => $request->add_more_two_institution_country,
                                "institution_name" => $request->add_more_two_institution_name,
                                "education_level" => $request->add_more_two_education_level,
                                "primary_language_instruction" => $request->add_more_two_primary_language_instruction,
                                "institution_from" => $request->add_more_two_institution_from,
                                "institution_to" => $request->add_more_two_institution_to,
                                "institution_degree" => $request->add_more_two_institution_degree,
                                "institution_address" => $request->add_more_two_institution_address,
                                "institution_city" => $request->add_more_two_institution_city,
                                "institution_province" => $request->add_more_two_institution_province,
                                "institution_zip" => $request->add_more_two_institution_zip,
                                "type" => 'add_more_two',
                            ]);
//                        $request->validate([
//                            'certificate_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
//                            'transcript_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                        ]);
                        if ($request->file("certificate_img_two")) {
//                            $request->validate([
//                                'certificate_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                            ]);
                            $certificate_imgs_two = $request->file("certificate_img_two");
                            foreach ($certificate_imgs_two as $certificate_img_two) {
                                $certificate_two = rand() . '.' . $certificate_img_two->extension();
                                $request['certificate_img_two'] = $certificate_two;
                                $certificate_img_two->move(public_path('upload'), $certificate_two);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $certificate_two,
                                    "type" => $request->add_more_two_education_level,
                                ]);
                            }
                        }
                        if ($request->file("transcript_img_two")) {
//                            $request->validate([
//                                'transcript_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                            ]);
                            $transcript_imgs_two = $request->file("transcript_img_two");
                            foreach ($transcript_imgs_two as $transcript_img_two) {
                                $transcript_two = rand() . '.' . $transcript_img_two->extension();
                                $request['transcript_img_two'] = $transcript_two;
                                $transcript_img_two->move(public_path('upload'), $transcript_two);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $transcript_two,
                                    "type" => $request->add_more_two_education_level,
                                ]);
                            }
                        }


                    } else {
//                        $request->validate([
//                            'certificate_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
//                            'transcript_img_two.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                        ]);
                        $certificate_imgs_two = $request->file("certificate_img_two");
                        $transcript_imgs_two = $request->file("transcript_img_two");
                        foreach ($request->addmore_two as $key => $value) {
                            $education_level_two = $value['education_level'];
                            DB::table('tbl_student_education')->insert([
                                "student_id" => $student_id,
                                "institution_country" => $value['institution_country'],
                                "institution_name" => $value['institution_name'],
                                "education_level" => $value['education_level'],
                                "primary_language_instruction" => $value['primary_language_instruction'],
                                "institution_from" => $value['institution_from'],
                                "institution_to" => $value['institution_to'],
                                "institution_address" => $value['institution_address'],
                                "institution_city" => $value['institution_city'],
                                "institution_province" => $value['institution_province'],
                                "institution_zip" => $value['institution_zip'],
                                "institution_degree" => $value['institution_degree'],
                            ]);
                        }
                        foreach ($certificate_imgs_two as $certificate_img_two) {
                            $certificate_two = rand() . '.' . $certificate_img_two->extension();
                            $request['certificate_img_two'] = $certificate_two;
                            $certificate_img_two->move(public_path('upload'), $certificate_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_two,
                                "type" => $education_level_two,
                            ]);
                        }
                        foreach ($transcript_imgs_two as $transcript_img_two) {
                            $transcript_two = rand() . '.' . $transcript_img_two->extension();
                            $request['transcript_img_two'] = $transcript_two;
                            $transcript_img_two->move(public_path('upload'), $transcript_two);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_two,
                                "type" => $education_level_two,
                            ]);
                        }
                    }
                }
                if ($request->add_more_three_institution_country) {
                    $check_add_more_three = DB::table('tbl_student_education')->where('student_id', '=', $student_id)->where('type', 'add_more_three')->first();
                    if (isset($check_add_more_three)) {
                        DB::table('tbl_student_education')
                            ->where('student_id', $student_id)
                            ->where('type', "add_more_three")
                            ->update([
                                "institution_country" => $request->add_more_three_institution_country,
                                "institution_name" => $request->add_more_three_institution_name,
                                "education_level" => $request->add_more_three_education_level,
                                "primary_language_instruction" => $request->add_more_three_primary_language_instruction,
                                "institution_from" => $request->add_more_three_institution_from,
                                "institution_to" => $request->add_more_three_institution_to,
                                "institution_degree" => $request->add_more_three_institution_degree,
                                "institution_address" => $request->add_more_three_institution_address,
                                "institution_city" => $request->add_more_three_institution_city,
                                "institution_province" => $request->add_more_three_institution_province,
                                "institution_zip" => $request->add_more_three_institution_zip,
                                "type" => 'add_more_three',
                            ]);

                        if ($request->file("certificate_img_three")) {
//                            $request->validate([
//                                'certificate_img_three.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                            ]);
                            $certificate_imgs_three = $request->file("certificate_img_three");
                            foreach ($certificate_imgs_three as $certificate_img_three) {
                                $certificate_three = rand() . '.' . $certificate_img_three->extension();
                                $request['certificate_img_three'] = $certificate_three;
                                $certificate_img_three->move(public_path('upload'), $certificate_three);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $certificate_three,
                                    "type" => $request->add_more_three_education_level,
                                ]);
                            }
                        }
                        if ($request->file("transcript_img_three")) {
//                            $request->validate([
//                                'transcript_img_three.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                            ]);
                            $transcript_imgs_three = $request->file("transcript_img_three");
                            foreach ($transcript_imgs_three as $transcript_img_three) {
                                $transcript_three = rand() . '.' . $transcript_img_three->extension();
                                $request['transcript_img_three'] = $transcript_three;
                                $transcript_img_three->move(public_path('upload'), $transcript_three);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $transcript_three,
                                    "type" => $request->add_more_three_education_level,
                                ]);
                            }
                        }

                    } else {
//                        $request->validate([
//                            'certificate_img_three.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
//                            'transcript_img_three.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                        ]);
                        $certificate_imgs_three = $request->file("certificate_img_three");
                        $transcript_imgs_three = $request->file("transcript_img_three");
                        foreach ($request->addmore_three as $key => $value) {
                            $education_level_three = $value['education_level'];
                            DB::table('tbl_student_education')->insert([
                                "student_id" => $student_id,
                                "institution_country" => $value['institution_country'],
                                "institution_name" => $value['institution_name'],
                                "education_level" => $value['education_level'],
                                "primary_language_instruction" => $value['primary_language_instruction'],
                                "institution_from" => $value['institution_from'],
                                "institution_to" => $value['institution_to'],
                                "institution_address" => $value['institution_address'],
                                "institution_city" => $value['institution_city'],
                                "institution_province" => $value['institution_province'],
                                "institution_zip" => $value['institution_zip'],
                                "institution_degree" => $value['institution_degree'],
                            ]);
                        }
                        foreach ($certificate_imgs_three as $certificate_img_three) {
                            $certificate_three = rand() . '.' . $certificate_img_three->extension();
                            $request['certificate_img_three'] = $certificate_three;
                            $certificate_img_three->move(public_path('upload'), $certificate_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_three,
                                "type" => $education_level_three,
                            ]);
                        }
                        foreach ($transcript_imgs_three as $transcript_img_three) {
                            $transcript_three = rand() . '.' . $transcript_img_three->extension();
                            $request['transcript_img_three'] = $transcript_three;
                            $transcript_img_three->move(public_path('upload'), $transcript_three);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_three,
                                "type" => $education_level_three,
                            ]);
                        }
                    }

                }
                if ($request->add_more_four_institution_country) {
                    $check_add_more_four = DB::table('tbl_student_education')->where('student_id', '=', $student_id)->where('type', 'add_more_four')->first();
                    if (isset($check_add_more_four)) {
                        DB::table('tbl_student_education')
                            ->where('student_id', $student_id)
                            ->where('type', "add_more_four")
                            ->update([
                                "institution_country" => $request->add_more_four_institution_country,
                                "institution_name" => $request->add_more_four_institution_name,
                                "education_level" => $request->add_more_four_education_level,
                                "primary_language_instruction" => $request->add_more_foure_primary_language_instruction,
                                "institution_from" => $request->add_more_four_institution_from,
                                "institution_to" => $request->add_more_four_institution_to,
                                "institution_degree" => $request->add_more_four_institution_degree,
                                "institution_address" => $request->add_more_four_institution_address,
                                "institution_city" => $request->add_more_four_institution_city,
                                "institution_province" => $request->add_more_four_institution_province,
                                "institution_zip" => $request->add_more_four_institution_zip,
                                "type" => 'add_more_four',
                            ]);

                        if ($request->file("certificate_img_four")) {
                            $certificate_imgs_four = $request->file("certificate_img_four");
                            foreach ($certificate_imgs_four as $certificate_img_four) {
                                $certificate_four = rand() . '.' . $certificate_img_four->extension();
                                $request['certificate_img_four'] = $certificate_four;
                                $certificate_img_four->move(public_path('upload'), $certificate_four);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $certificate_four,
                                    "type" => $request->add_more_four_education_level,
                                ]);
                            }
                        }
                        if ($request->file("transcript_img_four")) {
                            $transcript_imgs_four = $request->file("transcript_img_four");
                            foreach ($transcript_imgs_four as $transcript_img_four) {
                                $transcript_four = rand() . '.' . $transcript_img_four->extension();
                                $request['transcript_img_four'] = $transcript_four;
                                $transcript_img_four->move(public_path('upload'), $transcript_four);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $transcript_four,
                                    "type" => $request->add_more_four_education_level,
                                ]);
                            }
                        }

                    } else {
                        $certificate_imgs_four = $request->file("certificate_img_four");
                        $transcript_imgs_four = $request->file("transcript_img_four");
                        foreach ($request->addmore_four as $key => $value) {
                            $education_level_four = $value['education_level'];
                            DB::table('tbl_student_education')->insert([
                                "student_id" => $student_id,
                                "institution_country" => $value['institution_country'],
                                "institution_name" => $value['institution_name'],
                                "education_level" => $value['education_level'],
                                "primary_language_instruction" => $value['primary_language_instruction'],
                                "institution_from" => $value['institution_from'],
                                "institution_to" => $value['institution_to'],
                                "institution_address" => $value['institution_address'],
                                "institution_city" => $value['institution_city'],
                                "institution_province" => $value['institution_province'],
                                "institution_zip" => $value['institution_zip'],
                                "institution_degree" => $value['institution_degree'],
                            ]);
                        }
                        foreach ($certificate_imgs_four as $certificate_img_four) {
                            $certificate_four = rand() . '.' . $certificate_img_four->extension();
                            $request['certificate_img_four'] = $certificate_four;
                            $certificate_img_four->move(public_path('upload'), $certificate_four);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_four,
                                "type" => $education_level_four,
                            ]);
                        }
                        foreach ($transcript_imgs_four as $transcript_img_four) {
                            $transcript_four = rand() . '.' . $transcript_img_four->extension();
                            $request['transcript_img_four'] = $transcript_four;
                            $transcript_img_four->move(public_path('upload'), $transcript_four);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_four,
                                "type" => $education_level_four,
                            ]);
                        }
                    }

                }
                if ($request->add_more_five_institution_country) {
                    $check_add_more_five = DB::table('tbl_student_education')->where('student_id', '=', $student_id)->where('type', 'add_more_five')->first();
                    if (isset($check_add_more_five)) {
                        DB::table('tbl_student_education')
                            ->where('student_id', $student_id)
                            ->where('type', "add_more_five")
                            ->update([
                                "institution_country" => $request->add_more_five_institution_country,
                                "institution_name" => $request->add_more_five_institution_name,
                                "education_level" => $request->add_more_five_education_level,
                                "primary_language_instruction" => $request->add_more_five_primary_language_instruction,
                                "institution_from" => $request->add_more_five_institution_from,
                                "institution_to" => $request->add_more_five_institution_to,
                                "institution_degree" => $request->add_more_five_institution_degree,
                                "institution_address" => $request->add_more_five_institution_address,
                                "institution_city" => $request->add_more_five_institution_city,
                                "institution_province" => $request->add_more_five_institution_province,
                                "institution_zip" => $request->add_more_five_institution_zip,
                                "type" => 'add_more_five',
                            ]);

                        if ($request->file("certificate_img_five")) {
                            $certificate_imgs_five = $request->file("certificate_img_five");
                            foreach ($certificate_imgs_five as $certificate_img_five) {
                                $certificate_five = rand() . '.' . $certificate_img_five->extension();
                                $request['certificate_img_five'] = $certificate_five;
                                $certificate_img_five->move(public_path('upload'), $certificate_five);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $certificate_five,
                                    "type" => $request->add_more_five_education_level,
                                ]);
                            }
                        }
                        if ($request->file("transcript_img_five")) {
                            $transcript_imgs_five = $request->file("transcript_img_five");
                            foreach ($transcript_imgs_five as $transcript_img_five) {
                                $transcript_five = rand() . '.' . $transcript_img_five->extension();
                                $request['transcript_img_five'] = $transcript_five;
                                $transcript_img_five->move(public_path('upload'), $transcript_five);
                                DB::table('tbl_student_file')->insert([
                                    "student_id" => $student_id,
                                    "file_name" => $transcript_five,
                                    "type" => $request->add_more_five_education_level,
                                ]);
                            }
                        }

                    } else {
                        $certificate_imgs_five = $request->file("certificate_img_five");
                        $transcript_imgs_five = $request->file("transcript_img_five");
                        foreach ($request->addmore_five as $key => $value) {
                            $education_level_five = $value['education_level'];
                            DB::table('tbl_student_education')->insert([
                                "student_id" => $student_id,
                                "institution_country" => $value['institution_country'],
                                "institution_name" => $value['institution_name'],
                                "education_level" => $value['education_level'],
                                "primary_language_instruction" => $value['primary_language_instruction'],
                                "institution_from" => $value['institution_from'],
                                "institution_to" => $value['institution_to'],
                                "institution_address" => $value['institution_address'],
                                "institution_city" => $value['institution_city'],
                                "institution_province" => $value['institution_province'],
                                "institution_zip" => $value['institution_zip'],
                                "institution_degree" => $value['institution_degree'],
                            ]);
                        }
                        foreach ($certificate_imgs_five as $certificate_img_five) {
                            $certificate_five = rand() . '.' . $certificate_img_five->extension();
                            $request['certificate_img_five'] = $certificate_five;
                            $certificate_img_five->move(public_path('upload'), $certificate_five);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $certificate_five,
                                "type" => $education_level_five,
                            ]);
                        }
                        foreach ($transcript_imgs_five as $transcript_img_five) {
                            $transcript_five = rand() . '.' . $transcript_img_five->extension();
                            $request['transcript_img_five'] = $transcript_five;
                            $transcript_img_five->move(public_path('upload'), $transcript_five);
                            DB::table('tbl_student_file')->insert([
                                "student_id" => $student_id,
                                "file_name" => $transcript_five,
                                "type" => $education_level_five,
                            ]);
                        }
                    }

                }

                if ($request->file("ielts_img")) {
//                    $request->validate([
//                        'ielts_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                    ]);
                    $ielts_imgs = $request->file("ielts_img");
                    foreach ($ielts_imgs as $ielts_img) {
                        $images = rand() . '.' . $ielts_img->extension();
                        $request['ielts_img'] = $images;
                        $ielts_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "IELTS",
                        ]);
                    }
                }
                if ($request->file("toefl_img")) {
//                    $request->validate([
//                        'toefl_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                    ]);
                    $toefl_imgs = $request->file("toefl_img");
                    foreach ($toefl_imgs as $toefl_img) {
                        $images = rand() . '.' . $toefl_img->extension();
                        $request['toefl_img'] = $images;
                        $toefl_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "TOEFL",
                        ]);
                    }
                }
                if ($request->file("pte_img")) {
//                    $request->validate([
//                        'pte_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                    ]);
                    $pte_imgs = $request->file("pte_img");
                    foreach ($pte_imgs as $pte_img) {
                        $images = rand() . '.' . $pte_img->extension();
                        $request['pte_img'] = $images;
                        $pte_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "PTE",
                        ]);
                    }
                }
                if ($request->file("duolingo_img")) {
//                    $request->validate([
//                        'duolingo_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                    ]);
                    $duolingo_imgs = $request->file("duolingo_img");
                    foreach ($duolingo_imgs as $duolingo_img) {
                        $images = rand() . '.' . $duolingo_img->extension();
                        $request['duolingo_img'] = $images;
                        $duolingo_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "Duolingo",
                        ]);
                    }
                }
                if ($request->file("gre_img")) {
//                $request->validate([
//                    'gre_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                ]);
                    $gre_imgs = $request->file("gre_img");
                    foreach ($gre_imgs as $gre_img) {
                        $images = rand() . '.' . $gre_img->extension();
                        $request['gre_img'] = $images;
                        $gre_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "GRE",
                        ]);
                    }
                }
                if ($request->file("gmat_img")) {
//                $request->validate([
//                    'gmat_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                ]);
                    $gmat_imgs = $request->file("gmat_img");
                    foreach ($gmat_imgs as $gmat_img) {
                        $images = rand() . '.' . $gmat_img->extension();
                        $request['gmat_img'] = $images;
                        $gmat_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "GMAT",
                        ]);
                    }
                }
                if ($request->file("passport_img")) {
//                    $request->validate([
//                        'passport_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                    ]);
                    $passport_imgs = $request->file("passport_img");
                    foreach ($passport_imgs as $passport_img) {
                        $images = rand() . '.' . $passport_img->extension();
                        $request['passport_img'] = $images;
                        $passport_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "Passport",
                        ]);
                    }
                }
                if ($request->file("nid_img")) {
//                    $request->validate([
//                        'nid_img.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
//                    ]);
                    $nid_imgs = $request->file("nid_img");
                    foreach ($nid_imgs as $nid_img) {
                        $images = rand() . '.' . $nid_img->extension();
                        $request['nid_img'] = $images;
                        $nid_img->move(public_path('upload'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "NID",
                        ]);
                    }
                }

                if ($request->education_level) {
                    DB::table('tbl_student_profile')
                        ->where('student_id', $student_id)
                        ->update([
                            "education_country" => $request->education_country,
                            "education_level" => $request->education_level,
                            "grading_scheme" => $request->grading_scheme,
                            "grade_avg_1" => $request->grade_avg_1,
                            "grade_avg_2" => $request->grade_avg_2,
                            "grade_avg_3" => $request->grade_avg_3,
                            "grade_avg_4" => $request->grade_avg_4,
                            "grade_avg_5" => $request->grade_avg_5,
                            "grade_avg_6" => $request->grade_avg_6,
                            "grade_avg_7" => $request->grade_avg_7,
                            "grade_scale" => $request->grade_scale,
                            "grade_institute" => $request->grade_institute,
                        ]);
                }

                DB::table('tbl_student_profile')
                    ->where('student_id', $student_id)
                    ->update([
                        "student_id" => $student_id,
                        "f_name" => $request->f_name,
                        "m_name" => $request->m_name,
                        "l_name" => $request->l_name,
                        "dob" => $request->dob,
                        "first_language" => $request->first_language,
                        "citizenship" => $request->citizenship,
                        "passport_no" => $request->passport_no,
                        "passport_exp" => $request->passport_exp,
                        "marital_status" => $request->marital_status,
                        "gender" => $request->gender,
                        "address" => $request->address,
                        "city" => $request->city,
                        "country" => $request->country,
                        "state" => $request->state,
                        "zip_code" => $request->zip_code,
                        "email" => $request->email,
                        "phone_no" => $request->phone_no,

                        "test_score_type" => $request->test_score_type,

                        "ielts_exam_date" => $request->ielts_exam_date,
                        "ielts_reading_score" => $request->ielts_reading_score,
                        "ielts_listening_score" => $request->ielts_listening_score,
                        "ielts_writing_score" => $request->ielts_writing_score,
                        "ielts_speaking_score" => $request->ielts_speaking_score,

                        "toefl_exam_date" => $request->toefl_exam_date,
                        "toefl_reading_score" => $request->toefl_reading_score,
                        "toefl_listening_score" => $request->toefl_listening_score,
                        "toefl_writing_score" => $request->toefl_writing_score,
                        "toefl_speaking_score" => $request->toefl_speaking_score,

                        "pte_exam_date" => $request->pte_exam_date,
                        "pte_reading_score" => $request->pte_reading_score,
                        "pte_writing_score" => $request->pte_writing_score,
                        "pte_listening_score" => $request->pte_listening_score,
                        "pte_speaking_score" => $request->pte_speaking_score,
                        "pte_total_score" => $request->pte_total_score,

                        "duolingo_total_score" => $request->duolingo_total_score,
                        "duolingo_exam_date" => $request->duolingo_exam_date,

                        "gre_exam_date" => $request->gre_exam_date,
                        "gre_verbal_score" => $request->gre_verbal_score,
                        "gre_quantitative_score" => $request->gre_quantitative_score,
                        "gre_awa_score" => $request->gre_awa_score,

                        "gmat_exam_date" => $request->gmat_exam_date,
                        "gmat_verbal_score" => $request->gmat_verbal_score,
                        "gmat_quantitative_score" => $request->gmat_quantitative_score,
                        "gmat_awa_score" => $request->gmat_awa_score,
                        "gmat_total_score" => $request->gmat_total_score,

                        "visa_refused" => $request->visa_refused,
                        "permit" => $request->permit,
                        "more_details" => $request->more_details,
                        "status" => "1",
                    ]);
                return redirect()->route('home')->with('success', 'Student Profile Edit Successfully.');
//                return response()->json(
//                    [
//                        'success' => true,
//                        'message' => 'Data inserted successfully'
//                    ]
//                );
            } else {
                return view('signin');
            }
        }

        public function student_password_change()
        {
            if (Auth::check()) {
                $id = Auth::user()->id;
                $student_id = Auth::user()->user_name;
                $profile_data = DB::table('tbl_student_profile')->where('student_id', '=', $student_id)->first();
                $data = DB::table('users')->select('confirm_password', 'id')->where('id', '=', $id)->first();
//                $payment = DB::table('tbl_student_payment')->select('payment_status')->where('student_id', $student_id)->first();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('new_message', '1')
                    ->where('form', 'Assistant Counselor')
                    ->first();
                return view('student_password_change', compact('data', 'counselor_accept', 'admin_new_msg_count','profile_data'));
            } else {
                return view('signin');
            }
        }

        public function student_password_update(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        "password" => Hash::make($request->password),
                        "confirm_password" => $request->password,
                    ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Password Updated successfully'
                    ]
                );
            } else {
                return view('signin');
            }
        }

        public function delete_important_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
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

        public function delete_student($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('student_entry')->select('student_img')->where('id', '=', $id)->first();
                unlink(public_path("upload/$image_data->student_img"));
                DB::table('student_entry')->where('id', '=', $id)->delete();
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

        public function student_document_store(Request $request)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $destinationPath = 'public/upload/';
                $imp_doc_one_img = $request->file("imp_doc_one_img");
                $imp_doc_two_img = $request->file("imp_doc_two_img");
                $imp_doc_three_img = $request->file("imp_doc_three_img");
                $imp_doc_four_img = $request->file("imp_doc_four_img");
                $imp_doc_five_img = $request->file("imp_doc_five_img");
                foreach ($imp_doc_one_img as $file) {
                    $imageName1 = rand() . '.' . $file->extension();
                    $request['imp_doc_one_img'] = $imageName1;
                    $file->move(public_path('upload'), $imageName1);
                    DB::table('tbl_student_file')->insert([
                        "student_id" => $student_id,
                        "file_name" => $imageName1,
                        "type" => 'imp_doc_one',
                    ]);
                }
                foreach ($imp_doc_two_img as $file2) {
                    $imageName2 = rand() . '.' . $file2->extension();
                    $request['imp_doc_two_img'] = $imageName2;
                    $file2->move(public_path('upload'), $imageName2);
                    DB::table('tbl_student_file')->insert([
                        "student_id" => $student_id,
                        "file_name" => $imageName2,
                        "type" => 'imp_doc_two',
                    ]);
                }
                foreach ($imp_doc_three_img as $file3) {
                    $imageName3 = rand() . '.' . $file3->extension();
                    $request['imp_doc_three_img'] = $imageName3;
                    $file3->move(public_path('upload'), $imageName3);
                    DB::table('tbl_student_file')->insert([
                        "student_id" => $student_id,
                        "file_name" => $imageName3,
                        "type" => 'imp_doc_three',
                    ]);
                }
                foreach ($imp_doc_four_img as $file4) {
                    $imageName4 = rand() . '.' . $file4->extension();
                    $request['imp_doc_four_img'] = $imageName4;
                    $file4->move(public_path('upload'), $imageName4);
                    DB::table('tbl_student_file')->insert([
                        "student_id" => $student_id,
                        "file_name" => $imageName4,
                        "type" => 'imp_doc_four',
                    ]);
                }
                foreach ($imp_doc_five_img as $file5) {
                    $imageName5 = rand() . '.' . $file5->extension();
                    $request['imp_doc_five_img'] = $imageName5;
                    $file5->move(public_path('upload'), $imageName5);
                    DB::table('tbl_student_file')->insert([
                        "student_id" => $student_id,
                        "file_name" => $imageName5,
                        "type" => 'imp_doc_five',
                    ]);
                }
                $notification = array(
                    'message' => 'Documents Stored successfully!',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            } else {
                return view('signin');
            }
        }

        public function delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/ielts/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function ielts_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/ielts/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function toefl_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/toefl/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function pte_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/pte/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function duolingo_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/duolingo/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function gre_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/gre/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function gmat_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/gmat/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function passport_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/passport/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function birth_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/birth_certificate/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function cv_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/cv/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function profile_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function primary_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/primary/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function secondary_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/secondary/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function undergraduate_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/undergrauate/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function postgraduate_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/postgraduate/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }

        public function double_postgraduate_delete_file($id)
        {
            if (Auth::check()) {
                $image_data = DB::table('tbl_student_file')->select('file_name')->where('file_name', '=', $id)->first();
                unlink(public_path("upload/double_postgraduate/$image_data->file_name"));
                DB::table('tbl_student_file')->where('file_name', '=', $id)->delete();
            } else {
                return view('signin');
            }
        }


        public function edit_general_information($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $profile_data = DB::table('tbl_student_profile')->where('id', '=', $id)->first();
//                $education_data = DB::table('tbl_student_education')->where('student_id', '=', $id)->first();
//                $education_data_count = DB::table('tbl_student_education')->where('student_id', '=', $id)->count();
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $student_id)->get();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('new_message', '1')
                    ->where('form', 'Assistant Counselor')
                    ->first();
                return view('include.student.edit_general_information', compact('profile_data', 'counselor_accept', 'document_data', 'admin_new_msg_count'));
            } else {
                return view('signin');
            }
        }

        public function update_general_information(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "f_name" => $request->f_name,
                        "m_name" => $request->m_name,
                        "l_name" => $request->l_name,
                        "dob" => $request->dob,
                        "first_language" => $request->first_language,
                        "citizenship" => $request->citizenship,
                        "passport_no" => $request->passport_no,
                        "passport_exp" => $request->passport_exp,
                        "marital_status" => $request->marital_status,
                        "gender" => $request->gender,
                        "address" => $request->address,
                        "city" => $request->city,
                        "country" => $request->country,
                        "state" => $request->state,
                        "zip_code" => $request->zip_code,
                    ]);
                $notification = array(
                    'message' => 'Student General Information Update Successfully!',
                    'alert-type' => 'success'
                );
                return redirect('home')->with($notification);
            } else {
                return view('signin');
            }
        }

        public function edit_education_summary($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $education_data = DB::table('tbl_student_education')->where('student_id', '=', $id)->first();
//                $education_data_count = DB::table('tbl_student_education')->where('student_id', '=', $id)->count();
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $student_id)->get();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('new_message', '1')
                    ->where('form', 'Assistant Counselor')
                    ->first();
//                dd($education_data);
                return view('include.student.edit_education_summary', compact('counselor_accept', 'document_data', 'admin_new_msg_count', 'education_data'));
            } else {
                return view('signin');
            }
        }

        public function update_education_summary(Request $request)
        {
            if (Auth::check()) {
                $student_id = $request->student_id;
                DB::table('tbl_student_education')
                    ->where('student_id', $student_id)
                    ->update([
                        "student_id" => $student_id,
                        "type" => $request->education_level,
                        "primary_institution_country" => $request->primary_institution_country,
                        "primary_two_institution_country" => $request->primary_two_institution_country,
                        "secondary_institution_country" => $request->secondary_institution_country,
                        "undergraduate_institution_country" => $request->undergraduate_institution_country,
                        "postgraduate_institution_country" => $request->postgraduate_institution_country,
                        "double_postgraduate_institution_country" => $request->postgraduate_institution_country,

                        "primary_institution_name" => $request->primary_institution_name,
                        "primary_two_institution_name" => $request->primary_two_institution_name,
                        "secondary_institution_name" => $request->secondary_institution_name,
                        "undergraduate_institution_name" => $request->undergraduate_institution_name,
                        "postgraduate_institution_name" => $request->postgraduate_institution_name,
                        "double_postgraduate_institution_name" => $request->postgraduate_institution_name,

                        "primary_education_level" => $request->primary_education_level,
                        "primary_two_education_level" => $request->primary_two_education_level,
                        "secondary_education_level" => $request->secondary_education_level,
                        "undergraduate_education_level" => $request->undergraduate_education_level,
                        "postgraduate_education_level" => $request->postgraduate_education_level,
                        "double_postgraduate_education_level" => $request->postgraduate_education_level,

                        "primary_language_instruction" => $request->primary_language_instruction,
                        "primary_two_language_instruction" => $request->primary_two_language_instruction,
                        "secondary_language_instruction" => $request->secondary_language_instruction,
                        "undergraduate_language_instruction" => $request->undergraduate_language_instruction,
                        "postgraduate_language_instruction" => $request->postgraduate_language_instruction,
                        "double_postgraduate_language_instruction" => $request->postgraduate_language_instruction,

                        "primary_institution_from" => $request->primary_institution_from,
                        "primary_two_institution_from" => $request->primary_two_institution_from,
                        "secondary_institution_from" => $request->secondary_institution_from,
                        "undergraduate_institution_from" => $request->undergraduate_institution_from,
                        "postgraduate_institution_from" => $request->postgraduate_institution_from,
                        "double_postgraduate_institution_from" => $request->postgraduate_institution_from,

                        "primary_institution_to" => $request->primary_institution_to,
                        "primary_two_institution_to" => $request->primary_two_institution_to,
                        "secondary_institution_to" => $request->secondary_institution_to,
                        "undergraduate_institution_to" => $request->undergraduate_institution_to,
                        "postgraduate_institution_to" => $request->postgraduate_institution_to,
                        "double_postgraduate_institution_to" => $request->postgraduate_institution_to,

                        "primary_institution_address" => $request->primary_institution_address,
                        "primary_two_institution_address" => $request->primary_two_institution_address,
                        "secondary_institution_address" => $request->secondary_institution_address,
                        "undergraduate_institution_address" => $request->undergraduate_institution_address,
                        "postgraduate_institution_address" => $request->postgraduate_institution_address,
                        "double_postgraduate_institution_address" => $request->postgraduate_institution_address,

                        "primary_institution_city" => $request->primary_institution_city,
                        "primary_two_institution_city" => $request->primary_two_institution_city,
                        "secondary_institution_city" => $request->secondary_institution_city,
                        "undergraduate_institution_city" => $request->undergraduate_institution_city,
                        "postgraduate_institution_city" => $request->postgraduate_institution_city,
                        "double_postgraduate_institution_city" => $request->postgraduate_institution_city,

                        "primary_institution_province" => $request->primary_institution_province,
                        "primary_two_institution_province" => $request->primary_two_institution_province,
                        "secondary_institution_province" => $request->secondary_institution_province,
                        "undergraduate_institution_province" => $request->undergraduate_institution_province,
                        "postgraduate_institution_province" => $request->postgraduate_institution_province,
                        "double_postgraduate_institution_province" => $request->postgraduate_institution_province,

                        "primary_institution_zip" => $request->primary_institution_zip,
                        "primary_two_institution_zip" => $request->primary_two_institution_zip,
                        "secondary_institution_zip" => $request->secondary_institution_zip,
                        "undergraduate_institution_zip" => $request->undergraduate_institution_zip,
                        "postgraduate_institution_zip" => $request->postgraduate_institution_zip,
                        "double_postgraduate_institution_zip" => $request->postgraduate_institution_zip,

                        "primary_institution_degree" => $request->primary_institution_degree,
                        "primary_two_institution_degree" => $request->primary_two_institution_degree,
                        "secondary_institution_degree" => $request->secondary_institution_degree,
                        "undergraduate_institution_degree" => $request->undergraduate_institution_degree,
                        "postgraduate_institution_degree" => $request->postgraduate_institution_degree,
                        "double_postgraduate_institution_degree" => $request->postgraduate_institution_degree,

                        "primary_grading_scheme" => $request->primary_grading_scheme,
                        "primary_two_grading_scheme" => $request->primary_two_grading_scheme,
                        "secondary_grading_scheme" => $request->secondary_grading_scheme,
                        "undergraduate_grading_scheme" => $request->undergraduate_grading_scheme,
                        "postgraduate_grading_scheme" => $request->postgraduate_grading_scheme,
                        "double_postgraduate_grading_scheme" => $request->double_postgraduate_grading_scheme,

                        "primary_grade_avg" => $request->primary_grade_avg,
                        "primary_two_grade_avg" => $request->primary_two_grade_avg,
                        "secondary_grade_avg" => $request->secondary_grade_avg,
                        "undergraduate_grade_avg" => $request->undergraduate_grade_avg,
                        "postgraduate_grade_avg" => $request->postgraduate_grade_avg,
                        "double_postgraduate_grade_avg" => $request->double_postgraduate_grade_avg,

                        "primary_grade_scale" => $request->primary_grade_scale,
                        "primary_two_grade_scale" => $request->primary_two_grade_scale,
                        "secondary_grade_scale" => $request->secondary_grade_scale,
                        "undergraduate_grade_scale" => $request->undergraduate_grade_scale,
                        "postgraduate_grade_scale" => $request->postgraduate_grade_scale,
                        "double_postgraduate_grade_scale" => $request->double_postgraduate_grade_scale,
                    ]);
                if ($request->file("primary_certificate_img")) {
                    $certificate_imgs_one = $request->file("primary_certificate_img");
                    foreach ($certificate_imgs_one as $certificate_img_one) {
                        $certificate_one = rand() . '.' . $certificate_img_one->extension();
                        $request['certificate_img_one'] = $certificate_one;
                        $certificate_img_one->move(public_path('upload/primary/'), $certificate_one);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $certificate_one,
                            "type" => 'Primary',
                        ]);
                    }
                }
                if ($request->file("primary_transcript_img")) {
                    $transcript_imgs_one = $request->file("primary_transcript_img");
                    foreach ($transcript_imgs_one as $transcript_img_one) {
                        $transcript_one = rand() . '.' . $transcript_img_one->extension();
                        $request['transcript_img_one'] = $transcript_one;
                        $transcript_img_one->move(public_path('upload/primary/'), $transcript_one);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $transcript_one,
                            "type" => 'Primary',
                        ]);
                    }
                }
                if ($request->file("primary_two_certificate_img")) {
                    $certificate_two_imgs_one = $request->file("primary_two_certificate_img");
                    foreach ($certificate_two_imgs_one as $certificate_two_img_one) {
                        $certificate_one = rand() . '.' . $certificate_two_img_one->extension();
                        $request['certificate_two_img_one'] = $certificate_one;
                        $certificate_two_img_one->move(public_path('upload/primary/'), $certificate_one);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $certificate_one,
                            "type" => 'Primary',
                        ]);
                    }
                }
                if ($request->file("primary_two_transcript_img")) {
                    $transcript_two_imgs_one = $request->file("primary_two_transcript_img");
                    foreach ($transcript_two_imgs_one as $transcript_two_img_one) {
                        $transcript_one = rand() . '.' . $transcript_two_img_one->extension();
                        $request['transcript_two_img_one'] = $transcript_one;
                        $transcript_two_img_one->move(public_path('upload/primary/'), $transcript_one);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $transcript_one,
                            "type" => 'Primary',
                        ]);
                    }
                }
                if ($request->file("secondary_certificate_img")) {
                    $certificate_imgs_two = $request->file("secondary_certificate_img");
                    foreach ($certificate_imgs_two as $certificate_img_two) {
                        $certificate_two = rand() . '.' . $certificate_img_two->extension();
                        $request['certificate_img_two'] = $certificate_two;
                        $certificate_img_two->move(public_path('upload/secondary/'), $certificate_two);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $certificate_two,
                            "type" => "Secondary",
                        ]);
                    }
                }
                if ($request->file("secondary_transcript_img")) {
                    $transcript_imgs_two = $request->file("secondary_transcript_img");
                    foreach ($transcript_imgs_two as $transcript_img_two) {
                        $transcript_two = rand() . '.' . $transcript_img_two->extension();
                        $request['transcript_img_two'] = $transcript_two;
                        $transcript_img_two->move(public_path('upload/secondary/'), $transcript_two);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $transcript_two,
                            "type" => "Secondary",
                        ]);
                    }
                }
                if ($request->file("undergraduate_certificate_img")) {
                    $certificate_imgs_three = $request->file("undergraduate_certificate_img");
                    foreach ($certificate_imgs_three as $certificate_img_three) {
                        $certificate_three = rand() . '.' . $certificate_img_three->extension();
                        $request['certificate_img_three'] = $certificate_three;
                        $certificate_img_three->move(public_path('upload/undergraduate/'), $certificate_three);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $certificate_three,
                            "type" => "Undergraduate",
                        ]);
                    }
                }
                if ($request->file("undergraduate_transcript_img")) {
                    $transcript_imgs_three = $request->file("undergraduate_transcript_img");
                    foreach ($transcript_imgs_three as $transcript_img_three) {
                        $transcript_three = rand() . '.' . $transcript_img_three->extension();
                        $request['transcript_img_three'] = $transcript_three;
                        $transcript_img_three->move(public_path('upload/undergraduate/'), $transcript_three);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $transcript_three,
                            "type" => "Undergraduate",
                        ]);
                    }

                }
                if ($request->file("postgraduate_certificate_img")) {
                    $certificate_imgs_four = $request->file("postgraduate_certificate_img");
                    foreach ($certificate_imgs_four as $certificate_img_four) {
                        $certificate_four = rand() . '.' . $certificate_img_four->extension();
                        $request['certificate_img_four'] = $certificate_four;
                        $certificate_img_four->move(public_path('upload/postgraduate/'), $certificate_four);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $certificate_four,
                            "type" => "Postgraduate",
                        ]);
                    }
                }
                if ($request->file("postgraduate_transcript_img")) {
                    $transcript_imgs_four = $request->file("postgraduate_transcript_img");
                    foreach ($transcript_imgs_four as $transcript_img_four) {
                        $transcript_four = rand() . '.' . $transcript_img_four->extension();
                        $request['transcript_img_four'] = $transcript_four;
                        $transcript_img_four->move(public_path('upload/postgraduate/'), $transcript_four);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $transcript_four,
                            "type" => "Postgraduate",
                        ]);
                    }

                }
                if ($request->file("double_postgraduate_certificate_img")) {
                    $certificate_imgs_five = $request->file("double_postgraduate_certificate_img");
                    foreach ($certificate_imgs_five as $certificate_img_five) {
                        $certificate_five = rand() . '.' . $certificate_img_five->extension();
                        $request['certificate_img_five'] = $certificate_five;
                        $certificate_img_five->move(public_path('upload/double_postgraduate/'), $certificate_five);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $certificate_five,
                            "type" => "Double Postgraduate",
                        ]);
                    }
                }
                if ($request->file("double_postgraduate_transcript_img")) {
                    $transcript_imgs_five = $request->file("double_postgraduate_transcript_img");
                    foreach ($transcript_imgs_five as $transcript_img_five) {
                        $transcript_five = rand() . '.' . $transcript_img_five->extension();
                        $request['transcript_img_five'] = $transcript_five;
                        $transcript_img_five->move(public_path('upload/double_postgraduate/'), $transcript_five);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $transcript_five,
                            "type" => "Doube Postgraduate",
                        ]);
                    }

                }
                $notification = array(
                    'message' => 'Student Education Summary Update Successfully!',
                    'alert-type' => 'success'
                );
                return redirect('home')->with($notification);
            } else {
                return view('signin');
            }
        }

        public function edit_test_score($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $profile_data = DB::table('tbl_student_profile')->where('id', '=', $id)->first();
//                $education_data = DB::table('tbl_student_education')->where('student_id', '=', $id)->first();
//                $education_data_count = DB::table('tbl_student_education')->where('student_id', '=', $id)->count();
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $student_id)->get();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('new_message', '1')
                    ->where('form', 'Assistant Counselor')
                    ->first();
                return view('include.student.edit_test_score', compact('profile_data', 'counselor_accept', 'document_data', 'admin_new_msg_count'));
            } else {
                return view('signin');
            }
        }

        public function update_test_score(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                $student_id = $request->student_id;
                if ($request->file("ielts_img")) {
                    $ielts_imgs = $request->file("ielts_img");
                    foreach ($ielts_imgs as $ielts_img) {
                        $images = rand() . '.' . $ielts_img->extension();
                        $request['ielts_img'] = $images;
                        $ielts_img->move(public_path('upload/ielts/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "IELTS",
                        ]);
                    }
                }
                if ($request->file("toefl_img")) {
                    $toefl_imgs = $request->file("toefl_img");
                    foreach ($toefl_imgs as $toefl_img) {
                        $images = rand() . '.' . $toefl_img->extension();
                        $request['toefl_img'] = $images;
                        $toefl_img->move(public_path('upload/toefl/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "TOEFL",
                        ]);
                    }
                }
                if ($request->file("pte_img")) {
                    $pte_imgs = $request->file("pte_img");
                    foreach ($pte_imgs as $pte_img) {
                        $images = rand() . '.' . $pte_img->extension();
                        $request['pte_img'] = $images;
                        $pte_img->move(public_path('upload/pte/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "PTE",
                        ]);
                    }
                }
                if ($request->file("duolingo_img")) {
                    $duolingo_imgs = $request->file("duolingo_img");
                    foreach ($duolingo_imgs as $duolingo_img) {
                        $images = rand() . '.' . $duolingo_img->extension();
                        $request['duolingo_img'] = $images;
                        $duolingo_img->move(public_path('upload/duolingo/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "Duolingo",
                        ]);
                    }
                }
                if ($request->file("gre_img")) {
                    $gre_imgs = $request->file("gre_img");
                    foreach ($gre_imgs as $gre_img) {
                        $images = rand() . '.' . $gre_img->extension();
                        $request['gre_img'] = $images;
                        $gre_img->move(public_path('upload/gre/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "GRE",
                        ]);
                    }
                }
                if ($request->file("gmat_img")) {
                    $gmat_imgs = $request->file("gmat_img");
                    foreach ($gmat_imgs as $gmat_img) {
                        $images = rand() . '.' . $gmat_img->extension();
                        $request['gmat_img'] = $images;
                        $gmat_img->move(public_path('upload/gmat/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "GMAT",
                        ]);
                    }
                }
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "ielts_exam_date" => $request->ielts_exam_date,
                        "ielts_reading_score" => $request->ielts_reading_score,
                        "ielts_listening_score" => $request->ielts_listening_score,
                        "ielts_writing_score" => $request->ielts_writing_score,
                        "ielts_speaking_score" => $request->ielts_speaking_score,

                        "toefl_exam_date" => $request->toefl_exam_date,
                        "toefl_reading_score" => $request->toefl_reading_score,
                        "toefl_listening_score" => $request->toefl_listening_score,
                        "toefl_writing_score" => $request->toefl_writing_score,
                        "toefl_speaking_score" => $request->toefl_speaking_score,

                        "pte_exam_date" => $request->pte_exam_date,
                        "pte_reading_score" => $request->pte_reading_score,
                        "pte_writing_score" => $request->pte_writing_score,
                        "pte_listening_score" => $request->pte_listening_score,
                        "pte_speaking_score" => $request->pte_speaking_score,
                        "pte_total_score" => $request->pte_total_score,

                        "duolingo_total_score" => $request->duolingo_total_score,
                        "duolingo_exam_date" => $request->duolingo_exam_date,

                        "gre_exam_date" => $request->gre_exam_date,
                        "gre_verbal_score" => $request->gre_verbal_score,
                        "gre_quantitative_score" => $request->gre_quantitative_score,
                        "gre_awa_score" => $request->gre_awa_score,

                        "gmat_exam_date" => $request->gmat_exam_date,
                        "gmat_verbal_score" => $request->gmat_verbal_score,
                        "gmat_quantitative_score" => $request->gmat_quantitative_score,
                        "gmat_awa_score" => $request->gmat_awa_score,
                        "gmat_total_score" => $request->gmat_total_score,
                    ]);
                $notification = array(
                    'message' => 'Student General Information Update Successfully!',
                    'alert-type' => 'success'
                );
                return redirect('home')->with($notification);
//                return redirect()->route('home')->with('success', 'Student General Information Update Successfully.');
            } else {
                return view('signin');
            }
        }

        public function edit_background_information($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $profile_data = DB::table('tbl_student_profile')->where('id', '=', $id)->first();
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $student_id)->get();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('new_message', '1')
                    ->where('form', 'Assistant Counselor')
                    ->first();
                return view('include.student.edit_background_information', compact('profile_data', 'counselor_accept', 'document_data', 'admin_new_msg_count'));
            } else {
                return view('signin');
            }
        }

        public function update_background_information(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_student_profile')
                    ->where('id', $id)
                    ->update([
                        "visa_refused" => $request->visa_refused,
                        "permit" => $request->permit,
                        "more_details" => $request->more_details,
                    ]);
                $notification = array(
                    'message' => 'Student Background Information Update Successfully!',
                    'alert-type' => 'success'
                );
                return redirect('home')->with($notification);
            } else {
                return view('signin');
            }
        }

        public function edit_update_document($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $document_data = DB::table('tbl_student_file')->where('student_id', '=', $student_id)->get();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $admin_new_msg_count = DB::table('tbl_chat')
                    ->select(DB::raw('COUNT(id) as count'))
                    ->where('approval', '0')
                    ->where('new_message', '1')
                    ->where('form', 'Assistant Counselor')
                    ->first();
                return view('include.student.edit_update_document', compact('counselor_accept', 'document_data', 'admin_new_msg_count', 'student_id'));
            } else {
                return view('signin');
            }
        }

        public function update_document(Request $request)
        {
            if (Auth::check()) {
                $student_id = $request->student_id;
                if ($request->file("passport_img")) {
                    $passport_imgs = $request->file("passport_img");
                    foreach ($passport_imgs as $passport_img) {
                        $images = rand() . '.' . $passport_img->extension();
                        $request['passport_img'] = $images;
                        $passport_img->move(public_path('upload/passport/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "Passport",
                        ]);
                    }
                }
                if ($request->file("bc_img")) {
                    $bc_imgs = $request->file("bc_img");
                    foreach ($bc_imgs as $bc_img) {
                        $images = rand() . '.' . $bc_img->extension();
                        $request['bc_img'] = $images;
                        $bc_img->move(public_path('upload/birth_certificate/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "Birth Certificate",
                        ]);
                    }
                }
                if ($request->file("cv_img")) {
                    $cv_imgs = $request->file("cv_img");
                    foreach ($cv_imgs as $cv_img) {
                        $images = rand() . '.' . $cv_img->extension();
                        $request['cv_img'] = $images;
                        $cv_img->move(public_path('upload/cv/'), $images);
                        DB::table('tbl_student_file')->insert([
                            "student_id" => $student_id,
                            "file_name" => $images,
                            "type" => "CV",
                        ]);
                    }
                }
//                if ($request->file("profile_img")) {
//                    $profile_img = rand() . '.' . $request->profile_img->extension();
//                    $request->profile_img->move(public_path('upload'), $profile_img);
//                    DB::table('tbl_student_file')->insert([
//                        "student_id" => $student_id,
//                        "file_name" => $profile_img,
//                        "type" => "Profile",
//                    ]);
//                }
                if ($request->file("profile_img")) {
                    $profile_img = rand() . '.' . $request->profile_img->extension();
                    $request->profile_img->move(public_path('upload'), $profile_img);
                    DB::table('tbl_student_file')->insert([
                        "student_id" => $student_id,
                        "file_name" => $profile_img,
                        "type" => "Profile",
                    ]);
                }
                $notification = array(
                    'message' => 'Student Documents Update Successfully!',
                    'alert-type' => 'success'
                );
                return redirect('home')->with($notification);
            } else {
                return view('signin');
            }
        }

                public function admission_info()
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $counselor_id = Auth::user()->counter_no;
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

                return view('admission_info', compact('data', 'counselor', 'token', 'counselor_accept', 'admin_new_msg_count', 'new_msg_count', 'last_id', 'admission_payment', 'accounts_data', 'profile_data', 'admission_important_data', 'visa_important_data', 'document_data', 'check', 'admission_important_data_count','visa_important_data_count','student_visa_profile_create_notification', 'immigration_profile_create_notification',
                    'medi_profile_create_notification', 'job_profile_create_notification','counselor_proceed',
                    'as_personal_info_comment_notification', 'as_additional_qualification_comment_notification', 'as_education_summery_comment_notification', 'as_school_attend_comment_notification', 'as_test_score_comment_notification', 'as_background_info_comment_notification',
                    'vs_personal_info_comment_notification', 'vs_additional_qualification_comment_notification', 'vs_education_summery_comment_notification', 'vs_school_attend_comment_notification', 'vs_test_score_comment_notification', 'vs_background_info_comment_notification',
                    'as_passport_comment_notification','as_birth_comment_notification','as_cv_comment_notification','as_profile_comment_notification',
                    'vs_passport_comment_notification','vs_birth_comment_notification','vs_cv_comment_notification','vs_profile_comment_notification'));
            } else {
                return view('signin');
            }
        }
        public function visa_info()
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $counselor_id = Auth::user()->counter_no;
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

//                dd($counselor_accept);
                $counselor_proceed = DB::table('student_entry')
                    ->select('counselor_proceed')
                    ->where('student_id', $student_id)
                    ->first();
//                dd($counselor_proceed);
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

                return view('visa_info', compact('data', 'counselor', 'token', 'counselor_accept', 'admin_new_msg_count', 'new_msg_count', 'last_id', 'admission_payment', 'accounts_data', 'profile_data', 'admission_important_data', 'visa_important_data', 'document_data', 'check', 'admission_important_data_count','visa_important_data_count','student_visa_profile_create_notification', 'immigration_profile_create_notification',
                    'medi_profile_create_notification', 'job_profile_create_notification','counselor_proceed',
                    'as_personal_info_comment_notification', 'as_additional_qualification_comment_notification', 'as_education_summery_comment_notification', 'as_school_attend_comment_notification', 'as_test_score_comment_notification', 'as_background_info_comment_notification',
                    'vs_personal_info_comment_notification', 'vs_additional_qualification_comment_notification', 'vs_education_summery_comment_notification', 'vs_school_attend_comment_notification', 'vs_test_score_comment_notification', 'vs_background_info_comment_notification',
                    'as_passport_comment_notification','as_birth_comment_notification','as_cv_comment_notification','as_profile_comment_notification',
                    'vs_passport_comment_notification','vs_birth_comment_notification','vs_cv_comment_notification','vs_profile_comment_notification'));
            } else {
                return view('signin');
            }
        }


                public function country_programme()
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $counselor_id = Auth::user()->counter_no;
                $info = DB::table('tbl_country_program')->where('student_id', '=', $student_id)->first();
                $data = DB::table('tbl_student_profile')->select('*')->where('student_id', '=', $student_id)->first();
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                return view('country_program',compact('data','info','counselor_accept'));
            } else {
                return view('signin');
            }
        }
        public function store_country_program(Request $request)
        {
//            dd($request);

            $student_id = Auth::user()->user_name;
            $notification = "1";
            $validator = Validator::make($request->all(), [
            ]);
            if ($validator->passes()) {
                DB::table('tbl_country_program')->insert([
                    "student_id" => $request->student_id,
                    "above_country" => $request->above_country,
                    "above_level_one" => $request->above_level_one,
                    "above_level_one_optional" => $request->above_level_one_optional,
                    "above_level_two" => $request->above_level_two,
                    "above_level_two_optional" => $request->above_level_two_optional,
                    "above_level_three" => $request->above_level_three,
                    "above_level_three_optional" => $request->above_level_three_optional,
                    "above_level_four" => $request->above_level_four,
                    "above_level_four_optional" => $request->above_level_four_optional,
                    "above_level_five" => $request->above_level_five,
                    "above_level_five_optional" => $request->above_level_five_optional,
                    "above_level_six" => $request->above_level_six,
                    "above_level_six_optional" => $request->above_level_six_optional,
                    "above_level_seven" => $request->above_level_seven,
                    "above_level_seven_optional" => $request->above_level_seven_optional,
                    "above_level_eight" => $request->above_level_eight,
                    "above_level_eight_optional" => $request->above_level_eight_optional,
                    "above_level_nine" => $request->above_level_nine,
                    "above_level_nine_optional" => $request->above_level_nine_optional,
                    "below_country" => $request->below_country,
                    "below_grade_one" => $request->below_grade_one,
                    "below_grade_one_optional" => $request->below_grade_one_optional,
                    "below_grade_two" => $request->below_grade_two,
                    "below_grade_two_optional" => $request->below_grade_two_optional,
                    "below_grade_three" => $request->below_grade_three,
                    "below_grade_three_optional" => $request->below_grade_three_optional,
                    "above_ins_one" => $request->above_ins_one,
                    "above_ins_two" => $request->above_ins_two,
                    "above_ins_three" => $request->above_ins_three,
                    "below_ins_one" => $request->below_ins_one,
                    "below_ins_two" => $request->below_ins_two,
                    "below_ins_three" => $request->below_ins_three,
                ]);
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Password Updated successfully'
                ]
            );
//            return view('country_program', compact('notification'));
//            return redirect()->back();
        }
        public function edit_country_program($id)
        {
            if (Auth::check()) {
                $student_id = Auth::user()->user_name;
                $counselor_accept = DB::table('student_entry')
                    ->select('accept')
                    ->where('student_id', $student_id)
                    ->first();
                $data = DB::table('tbl_country_program')->where('student_id', '=', $id)->first();
//                dd($data);
                return view('edit_country_program', compact('data','counselor_accept'));
            } else {
                return view('signin');
            }
        }
        public function update_country_program(Request $request)
        {
            if (Auth::check()) {
                $id = $request->id;
                DB::table('tbl_country_program')
                    ->where('id', $id)
                    ->update([
                        "above_country" => $request->above_country,
                        "above_level_one" => $request->above_level_one,
                        "above_level_one_optional" => $request->above_level_one_optional,
                        "above_level_two" => $request->above_level_two,
                        "above_level_two_optional" => $request->above_level_two_optional,
                        "above_level_three" => $request->above_level_three,
                        "above_level_three_optional" => $request->above_level_three_optional,
                        "above_level_four" => $request->above_level_four,
                        "above_level_four_optional" => $request->above_level_four_optional,
                        "above_level_five" => $request->above_level_five,
                        "above_level_five_optional" => $request->above_level_five_optional,
                        "above_level_six" => $request->above_level_six,
                        "above_level_six_optional" => $request->above_level_six_optional,
                        "above_level_seven" => $request->above_level_seven,
                        "above_level_seven_optional" => $request->above_level_seven_optional,
                        "above_level_eight" => $request->above_level_eight,
                        "above_level_eight_optional" => $request->above_level_eight_optional,
                        "above_level_nine" => $request->above_level_nine,
                        "above_level_nine_optional" => $request->above_level_nine_optional,
                        "below_country" => $request->below_country,
                        "below_grade_one" => $request->below_grade_one,
                        "below_grade_one_optional" => $request->below_grade_one_optional,
                        "below_grade_two" => $request->below_grade_two,
                        "below_grade_two_optional" => $request->below_grade_two_optional,
                        "below_grade_three" => $request->below_grade_three,
                        "below_grade_three_optional" => $request->below_grade_three_optional,
                        "above_ins_one" => $request->above_ins_one,
                        "above_ins_two" => $request->above_ins_two,
                        "above_ins_three" => $request->above_ins_three,
                        "below_ins_one" => $request->below_ins_one,
                        "below_ins_two" => $request->below_ins_two,
                        "below_ins_three" => $request->below_ins_three,
                    ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Password Updated successfully'
                    ]
                );
            } else {
                return view('signin');
            }
        }

    }
