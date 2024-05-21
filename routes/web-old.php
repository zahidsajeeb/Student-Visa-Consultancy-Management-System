<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('signin');
    });
    Route::get('/admin', function () {
        return view('admin/login');
    });
    Route::get('/signin', function () {
        return view('signin');
    });

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

//====================================={{+(Front Desk Section Start)+}}========================================
    Route::get('frontdesk', 'frontdeskController@frontdesk')->name('frontdesk');
    Route::post('frontdesk_store', 'frontdeskController@frontdesk_store')->name('frontdesk_store');
    Route::get('frontdesk_list', 'frontdeskController@frontdesk_list')->name('frontdesk_list');
    Route::get('pdf_show/{id}', 'frontdeskController@pdf_show')->name('pdf_show');
    Route::post('token_available', 'frontdeskController@token_available')->name('token_available');
    Route::get('frontdesk_student_list', 'frontdeskController@frontdesk_student_list')->name('frontdesk_student_list');
    Route::get('recounseling/{id}', 'frontdeskController@recounseling')->name('recounseling');
    Route::post('recounseling_store', 'frontdeskController@recounseling_store')->name('recounseling_store');
    Route::get('pdf_show', 'frontdeskController@pdf_show')->name('pdf_show');
    Route::get('student_registration_show/{id}', 'frontdeskController@student_registration_show')->name('student_registration_show');
    Route::post('job_store', 'admissionController@job_store')->name('job_store');

    Route::get('student_edit/{id}', 'frontdeskController@student_edit')->name('student_edit');
    Route::post('student_update', 'frontdeskController@student_update')->name('student_update');

    Route::get('student_visa', 'frontdeskController@student_visa')->name('student_visa');
    Route::get('student_visa_list', 'frontdeskController@student_visa_list')->name('student_visa_list');

    Route::get('immigration', 'frontdeskController@immigration')->name('immigration');
    Route::get('immigration_list', 'frontdeskController@immigration_list')->name('immigration_list');

    Route::get('meditourism', 'frontdeskController@meditourism')->name('meditourism');
    Route::get('meditourism_list', 'frontdeskController@meditourism_list')->name('meditourism_list');

    Route::get('job', 'frontdeskController@job')->name('job');
    Route::get('job_list', 'frontdeskController@job_list')->name('job_list');
//===================================={{-(Front Desk Section End)-}}==========================================

//===================================={{+(Message Section Start)+}}===========================================
    Route::get('chat/{id}', 'messageController@chat')->name('chat');
    Route::post('chat/message_store', 'messageController@message_store')->name('message_store');
    Route::get('message_approval', 'messageController@message_approval')->name('message_approval');
    Route::post('approval_message_store', 'messageController@approval_message_store')->name('approval_message_store');
    Route::get('message_approval_store/{id}', 'messageController@message_approval_store')->name('message_approval_store');
    Route::get('message_delete/{id}', 'messageController@message_delete')->name('message_delete');
    Route::get('chat/message_delete/{id}', 'messageController@message_delete')->name('message_delete');

    Route::get('sponsor_document/{id}', 'admissionController@sponsor_document')->name('sponsor_document');


//==================================={{-(Message Section End)-}}==============================================


//==================================={{+(Counselor Section Start)+}}==========================================
    Route::get('pending_student_list', 'counselorController@pending_student_list')->name('pending_student_list');
    Route::get('student', 'counselorController@student')->name('student');
    Route::get('student_list', 'counselorController@student_list')->name('student_list');
    Route::post('comment_store', 'counselorController@comment_store')->name('comment_store');
    Route::get('counselor_accept/{id}', 'counselorController@counselor_accept')->name('counselor_accept');
    Route::post('counselor_accept_store', 'counselorController@counselor_accept_store')->name('counselor_accept_store');
    Route::get('counselor_check_profile', 'counselorController@counselor_check_profile')->name('counselor_check_profile');
    Route::get('admission_check_profile', 'counselorController@admission_check_profile')->name('admission_check_profile');
    Route::get('admission_section_proceed', 'counselorController@admission_section_proceed')->name('admission_section_proceed');
    Route::get('visa_section_proceed', 'counselorController@visa_section_proceed')->name('visa_section_proceed');

    Route::get('follow', 'counselorController@follow')->name('follow');
    Route::get('follow_list', 'counselorController@follow_list')->name('follow_list');
    Route::get('follow_up_edit/{id}', 'counselorController@follow_up_edit')->name('follow_up_edit');
    Route::post('follow_up_update', 'counselorController@follow_up_update')->name('follow_up_update');
    Route::get('follow_up_pdf/{id}', 'counselorController@follow_up_pdf')->name('follow_up_pdf');

    Route::get('account', 'counselorController@account')->name('account');
    Route::get('account_list', 'counselorController@account_list')->name('account_list');
    Route::get('account_pdf/{id}', 'counselorController@account_pdf')->name('account_pdf');

    Route::get('permission/{id}', 'counselorController@permission')->name('permission');
    Route::post('permission_store', 'counselorController@permission_store')->name('permission_store');

//Route::get('counselor_immigration_list', 'counselorController@counselor_immigration_list')->name('counselor_immigration_list');
//Route::get('counselor_visa_list', 'counselorController@counselor_visa_list')->name('counselor_visa_list');
//Route::get('counselor_meditourism_list', 'counselorController@counselor_meditourism_list')->name('counselor_meditourism_list');
//Route::get('counselor_job_list', 'counselorController@counselor_job_list')->name('counselor_job_list');

    Route::post('important_file_store', 'counselorController@important_file_store')->name('important_file_store');
    Route::post('important_file_update', 'counselorController@important_file_update')->name('important_file_update');
    Route::get('student_profile_show/important_file_description_delete/{id}', 'counselorController@important_file_description_delete')->name('important_file_description_delete');
    Route::get('important_file_delete/{id}', 'counselorController@important_file_delete')->name('important_file_delete');


    Route::get('counselor/student_visa', 'counselorController@student_visa')->name('student_visa');
    Route::get('counselor/immigration', 'counselorController@immigration')->name('immigration');
    Route::get('counselor/schooling_visa', 'counselorController@schooling_visa')->name('schooling_visa');
    Route::get('counselor/job', 'counselorController@job')->name('job');

//==================================={{-(Counselor Section End)-}}============================================


//==================================={{+(Admin Section Start)+}}=========================================
    Route::get('employee', 'adminController@employee')->name('employee');
    Route::get('employee_list', 'adminController@employee_list')->name('employee_list');
    Route::post('employee_store', 'adminController@employee_store')->name('employee_store');
    Route::get('employee_edit/{id}', 'adminController@employee_edit')->name('employee_edit');
    Route::post('employee_update', 'adminController@employee_update')->name('employee_update');
    Route::get('employee_delete/{id}', 'adminController@employee_delete')->name('employee_delete');
    Route::get('all_student_list', 'adminController@all_student_list')->name('all_student_list');
    Route::get('admin_student_list', 'admissionController@admin_student_list')->name('admin_student_list');

    Route::get('student', 'adminController@student')->name('student');
    Route::get('student_list', 'adminController@student_list')->name('student_list');

//Route::get('admin_immigration_list', 'admissionController@admin_immigration_list')->name('admin_immigration_list');
//Route::get('admin_visa_list', 'admissionController@admin_visa_list')->name('admin_visa_list');
//Route::get('admin_meditourism_list', 'admissionController@admin_meditourism_list')->name('admin_meditourism_list');
//Route::get('admin_job_list', 'admissionController@admin_job_list')->name('admin_job_list');
//=================================={{-(Admin Section End)-}}==============================================



//======================================={{+(Student Section Start)+}}=========================================
    Route::get('visa_info', 'studentController@visa_info')->name('visa_info');
    Route::get('admission_info', 'studentController@admission_info')->name('admission_info');
    Route::get('student_password_change', 'studentController@student_password_change')->name('student_password_change');
    Route::post('student_password_update', 'studentController@student_password_update')->name('student_password_update');
    Route::get('student_profile', 'studentController@student_profile')->name('student_profile');
    Route::post('student_profile_store', 'studentController@student_profile_store')->name('student_profile_store');
    Route::get('student_profile_show/{id}', 'studentController@student_profile_show')->name('student_profile_show');
    Route::get('student_profile_edit/{id}', 'studentController@student_profile_edit')->name('student_profile_edit');
    Route::post('student_profile_update', 'studentController@student_profile_update')->name('student_profile_update');
    Route::get('student_profile_edit/delete_file/{id}', 'studentController@delete_file')->name('delete_file');
    Route::get('delete_important_file/{id}', 'studentController@delete_important_file')->name('delete_important_file');
    Route::get('delete_student/{id}', 'studentController@delete_student')->name('delete_student');
    Route::post('student_document_store', 'studentController@student_document_store')->name('student_document_store');

    Route::get('student_profile_edit/ielts_delete_file/{id}', 'studentController@ielts_delete_file')->name('ielts_delete_file');
    Route::get('student_profile_edit/toefl_delete_file/{id}', 'studentController@toefl_delete_file')->name('toefl_delete_file');
    Route::get('student_profile_edit/pte_delete_file/{id}', 'studentController@pte_delete_file')->name('pte_delete_file');
    Route::get('student_profile_edit/duolingo_delete_file/{id}', 'studentController@duolingo_delete_file')->name('duolingo_delete_file');
    Route::get('student_profile_edit/gre_delete_file/{id}', 'studentController@gre_delete_file')->name('gre_delete_file');
    Route::get('student_profile_edit/gmat_delete_file/{id}', 'studentController@gmat_delete_file')->name('gmat_delete_file');
    Route::get('student_profile_edit/passport_delete_file/{id}', 'studentController@passport_delete_file')->name('passport_delete_file');
    Route::get('student_profile_edit/birth_delete_file/{id}', 'studentController@birth_delete_file')->name('birth_delete_file');
    Route::get('student_profile_edit/cv_delete_file/{id}', 'studentController@cv_delete_file')->name('cv_delete_file');
    Route::get('student_profile_edit/profile_delete_file/{id}', 'studentController@profile_delete_file')->name('profile_delete_file');

    Route::get('student_profile_edit/primary_delete_file/{id}', 'studentController@primary_delete_file')->name('primary_delete_file');
    Route::get('student_profile_edit/secondary_delete_file/{id}', 'studentController@secondary_delete_file')->name('secondary_delete_file');
    Route::get('student_profile_edit/undergraduate_delete_file/{id}', 'studentController@undergraduate_delete_file')->name('undergraduate_delete_file');
    Route::get('student_profile_edit/postgraduate_delete_file/{id}', 'studentController@postgraduate_delete_file')->name('postgraduate_delete_file');
    Route::get('student_profile_edit/double_postgraduate_delete_file/{id}', 'studentController@double_postgraduate_delete_file')->name('double_postgraduate_delete_file');


     Route::get('edit_general_information/{id}', 'studentController@edit_general_information')->name('edit_general_information');
    Route::post('update_general_information', 'studentController@update_general_information')->name('update_general_information');

    Route::get('edit_education_summary/{id}', 'studentController@edit_education_summary')->name('edit_education_summary');
    Route::get('edit_education_summary/primary_delete_file/{id}', 'studentController@primary_delete_file')->name('primary_delete_file');
    Route::get('edit_education_summary/secondary_delete_file/{id}', 'studentController@secondary_delete_file')->name('secondary_delete_file');
    Route::get('edit_education_summary/undergraduate_delete_file/{id}', 'studentController@undergraduate_delete_file')->name('undergraduate_delete_file');
    Route::get('edit_education_summary/postgraduate_delete_file/{id}', 'studentController@postgraduate_delete_file')->name('postgraduate_delete_file');
    Route::get('edit_education_summary/double_postgraduate_delete_file/{id}', 'studentController@passport_delete_file')->name('double_postgraduate_delete_file');
    Route::post('update_education_summary', 'studentController@update_education_summary')->name('update_education_summary');

    Route::get('edit_test_score/{id}', 'studentController@edit_test_score')->name('edit_test_score');
    Route::get('edit_test_score/ielts_delete_file/{id}', 'studentController@ielts_delete_file')->name('ielts_delete_file');
    Route::get('edit_test_score/toefl_delete_file/{id}', 'studentController@toefl_delete_file')->name('toefl_delete_file');
    Route::get('edit_test_score/pte_delete_file/{id}', 'studentController@pte_delete_file')->name('pte_delete_file');
    Route::get('edit_test_score/duolingo_delete_file/{id}', 'studentController@duolingo_delete_file')->name('duolingo_delete_file');
    Route::get('edit_test_score/gre_delete_file/{id}', 'studentController@gre_delete_file')->name('gre_delete_file');
    Route::get('edit_test_score/gmat_delete_file/{id}', 'studentController@gmat_delete_file')->name('gmat_delete_file');
    Route::post('update_test_score', 'studentController@update_test_score')->name('update_test_score');

    Route::get('edit_background_information/{id}', 'studentController@edit_background_information')->name('edit_background_information');
    Route::post('update_background_information', 'studentController@update_background_information')->name('update_background_information');

    Route::get('edit_update_document/{id}', 'studentController@edit_update_document')->name('edit_update_document');
    Route::get('edit_update_document/passport_delete_file/{id}', 'studentController@passport_delete_file')->name('passport_delete_file');
    Route::get('edit_update_document/birth_delete_file/{id}', 'studentController@birth_delete_file')->name('birth_delete_file');
    Route::get('edit_update_document/cv_delete_file/{id}', 'studentController@cv_delete_file')->name('cv_delete_file');
    Route::get('edit_update_document/profile_delete_file/{id}', 'studentController@profile_delete_file')->name('profile_delete_file');
    Route::post('update_document', 'studentController@update_document')->name('update_document');
    
    
    Route::get('country_programme', 'studentController@country_programme')->name('country_programme');
    Route::post('store_country_program', 'studentController@store_country_program')->name('store_country_program');
    Route::get('edit_country_program/{id}', 'studentController@edit_country_program')->name('edit_country_program');
    Route::post('edit_country_program/update_country_program', 'studentController@update_country_program')->name('update_country_program');



//======================================{{-(Student Section End)-}}=============================================


//======================================{{+(Accounts Section Start)+}}==================================================
    Route::get('payment_pending_student_list', 'accountsController@payment_pending_student_list')->name('payment_pending_student_list');
    Route::get('balance_check', 'accountsController@balance_check')->name('balance_check');
    Route::get('admin_balance_check', 'accountsController@admin_balance_check')->name('admin_balance_check');
    Route::get('balance_check_details/{id}', 'accountsController@balance_check_details')->name('balance_check_details');
    Route::get('payment_pending_student_info/{id}', 'accountsController@payment_pending_student_info')->name('payment_pending_student_info');
    Route::post('payment_store', 'accountsController@payment_store')->name('payment_store');
    Route::get('balance_check_details/payment_edit/{id}', 'accountsController@payment_edit')->name('payment_edit');
    Route::get('payment_edit/{id}', 'accountsController@payment_edit')->name('payment_edit');
    Route::get('accounts_edit/{id}', 'accountsController@accounts_edit')->name('accounts_edit');
    Route::post('payment_update', 'accountsController@payment_update')->name('payment_update');
    Route::post('balance_store', 'accountsController@balance_store')->name('balance_store');
    Route::get('balance_check_details/balance_update_info/{id}', 'accountsController@balance_update_info')->name('balance_update_info');
    Route::get('balance_update', 'accountsController@balance_update')->name('balance_update');
    Route::get('payment_delete/{id}', 'accountsController@payment_delete')->name('payment_delete');
    Route::get('payment_status_update/{id}', 'accountsController@payment_status_update')->name('payment_status_update');
    Route::get('accounts_bill_pdf/{id}', 'accountsController@accounts_bill_pdf')->name('accounts_bill_pdf');
    Route::get('admission_fee', 'accountsController@admission_fee')->name('admission_fee');
    Route::get('step_one', 'accountsController@step_one')->name('step_one');
    Route::get('step_two', 'accountsController@step_two')->name('step_two');
    Route::get('step_three', 'accountsController@step_three')->name('step_three');
    Route::get('step_four', 'accountsController@step_four')->name('step_four');
    Route::get('step_five', 'accountsController@step_five')->name('step_five');
    Route::get('processing_fee', 'accountsController@processing_fee')->name('processing_fee');
    Route::get('servicing_fee', 'accountsController@servicing_fee')->name('servicing_fee');
    Route::get('accounts_bill/{id}', 'accountsController@accounts_bill')->name('accounts_bill');

    Route::get('accounts/student_visa', 'accountsController@student_visa')->name('student_visa');
    Route::get('accounts/immigration', 'accountsController@immigration')->name('immigration');
    Route::get('accounts/meditourism', 'accountsController@meditourism')->name('meditourism');
    Route::get('accounts/job', 'accountsController@job')->name('job');
//===================================={{-(Accounts Section End)-}}======================================================


//==================================={{+(Report Section Start)+}}=======================================================
    Route::get('report', 'reportController@report')->name('report');
    Route::get('admin_report_list', 'reportController@admin_report_list')->name('admin_report_list');
    Route::get('student_report', 'reportController@student_report')->name('student_report');
    Route::get('student_report_list', 'reportController@student_report_list')->name('student_report_list');
    Route::get('student_report_pdf/{id}', 'reportController@student_report_pdf')->name('student_report_pdf');
    Route::get('date_to_date_admin_report', 'reportController@date_to_date_admin_report')->name('date_to_date_admin_report');
    Route::get('date_to_date_report_pdf', 'reportController@date_to_date_report_pdf')->name('date_to_date_report_pdf');
    Route::get('payment_report_pdf', 'reportController@payment_report_pdf')->name('payment_report_pdf');
    Route::get('profile_report_pdf', 'reportController@profile_report_pdf')->name('profile_report_pdf');
//=================================={{-(Report Section End)-}}==========================================================


//==================================={{+(Admission Section Start)+}}=======================================================
    Route::get('admission', 'admissionController@admission')->name('admission');
    Route::get('admission_list', 'admissionController@admission_list')->name('admission_list');
     Route::get('visa_list', 'admissionController@visa_list')->name('visa_list');
    Route::get('visa', 'admissionController@visa')->name('visa');
    Route::get('counselor_admission_student_list', 'admissionController@counselor_admission_student_list')->name('counselor_admission_student_list');
    Route::get('counselor_visa_student_list', 'admissionController@counselor_visa_student_list')->name('counselor_visa_student_list');
    Route::get('admin_visa_student_list', 'admissionController@admin_visa_student_list')->name('admin_visa_student_list');
    Route::get('admin_admission_student_list', 'admissionController@admin_admission_student_list')->name('admin_admission_student_list');
    Route::post('important_file_update', 'counselorController@important_file_update')->name('important_file_update');

    Route::post('admission_section_comment_store', 'admissionController@admission_section_comment_store')->name('admission_section_comment_store');
    Route::post('personal_information_admission_comment_store', 'admissionController@personal_information_admission_comment_store')->name('personal_information_admission_comment_store');
    Route::post('additional_qualification_admission_comment_store', 'admissionController@additional_qualification_admission_comment_store')->name('additional_qualification_admission_comment_store');
    Route::post('background_information_admission_comment_store', 'admissionController@background_information_admission_comment_store')->name('background_information_admission_comment_store');
    Route::post('educational_summery_admission_comment_store', 'admissionController@educational_summery_admission_comment_store')->name('educational_summery_admission_comment_store');
    Route::post('test_score_admission_comment_store', 'admissionController@test_score_admission_comment_store')->name('test_score_admission_comment_store');

    Route::get('head_counselor_approved/{id}', 'admissionController@head_counselor_approved')->name('head_counselor_approved');

    Route::get('admission_offer_letter_store', 'admissionController@admission_offer_letter_store')->name('admission_offer_letter_store');
    Route::get('admission_final_offer_letter_store', 'admissionController@admission_final_offer_letter_store')->name('admission_final_offer_letter_store');
    Route::get('profile_lock', 'admissionController@profile_lock')->name('profile_lock');


    //=================================={{-(Admission Section End)-}}==========================================================



//==================================={{+(Visa Section Start)+}}=======================================================
    Route::post('visa_important_file_store', 'visaController@visa_important_file_store')->name('visa_important_file_store');
    Route::get('student_profile_show/visa_file_delete/{id}', 'visaController@visa_file_delete')->name('visa_file_delete');

    Route::post('visa_section_comment_store', 'visaController@visa_section_comment_store')->name('visa_section_comment_store');
    Route::post('personal_information_visa_comment_store', 'visaController@personal_information_visa_comment_store')->name('personal_information_visa_comment_store');
    Route::post('additional_qualification_visa_comment_store', 'visaController@additional_qualification_visa_comment_store')->name('additional_qualification_visa_comment_store');
    Route::post('background_information_visa_comment_store', 'visaController@background_information_visa_comment_store')->name('background_information_visa_comment_store');
    Route::post('educational_summery_visa_comment_store', 'visaController@educational_summery_visa_comment_store')->name('educational_summery_visa_comment_store');
    Route::post('test_score_visa_comment_store', 'visaController@test_score_visa_comment_store')->name('test_score_visa_comment_store');
    Route::get('visa_check_profile', 'visaController@visa_check_profile')->name('visa_check_profile');
