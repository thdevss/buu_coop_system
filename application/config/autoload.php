<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array(
    'database', 'session', 'template',
    'service_ldap' => 'ldap'
);

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url', 'file', 'form', 'MY_helper');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
    'BUUMember_model' => 'BUUMember',
    'Company_person_login_model' => 'Company_person_login',
    'Login_session_model' => 'Login_session',

    'Teacher/Assessment_teacher_model' => 'Teacher_Assessmentteacher',
    'Teacher/Actionplanform_model' => 'Teacher_Actionplanform',
    'Teacher/Supervisiondocument_model' => 'Teacher_Supervisiondocument',

    'Company/Assessmentstudent_model' => 'Company_Assessmentstudent',
    'Company/Company_address_model' => 'Company_address',
    'Company/Company_info_model' => 'Company',
    'Coop_student/Permit_form_model' => 'Coop_student_Permit_form',
    'Coop_student/Coop_student_info_model' => 'Coop_student',
    'Coop_student/Reportmanager_model' => 'Report',
    'News_model' => 'News',
    'Student/Train_register_model' => 'Train',
    'Term_model' => 'Term',
    'Officer/Assessment_student' => 'Officer_Assessment_student',
    
    'Officer/Validate_assessment_list_coop_student_model' => 'validate_assessment_coop',

    'Officer/Train_register_management_model' => 'Train_register',
    'Officer/Test_Management_model' => 'Test_Management',
    'Coop_student/Coop_document_model' => 'Coop_document',



    'Coop_student/Coop_document_model' => 'Coop_document',
    
    'Officer/List_coop_student_model' => 'List_coop',

    //add new
    'DB/Company_model' => 'DB_company',
    'DB/Company_address_model' => 'DB_company_address',
    'DB/Company_benefit_model' => 'DB_company_benefit',
    'DB/Company_has_coop_company_questionnaire_item_model' => 'DB_company_has_coop_company_questionnaire_item',
    'DB/Company_has_student_field_model' => 'DB_company_has_student_field',
    'DB/Company_has_time_period_model' => 'DB_company_has_time_period',
    'DB/Company_job_position_model' => 'DB_company_job_position',
    'DB/Company_job_position_has_skill_model' => 'DB_company_job_position_has_skill',
    'DB/Company_job_position_has_student_model' => 'DB_company_job_position_has_student',
    'DB/Company_person_model' => 'DB_company_person',
    'DB/Company_person_login_model' => 'DB_company_person_login',
    'DB/Company_time_period_model' => 'DB_company_time_period',
    'DB/Coop_company_questionnaire_item_model' => 'DB_coop_company_questionnaire_item',
    'DB/Coop_document_model' => 'DB_coop_document',
    'DB/Coop_student_model' => 'DB_coop_student',
    'DB/Coop_student_condition_model' => 'DB_coop_student_condition',
    'DB/Coop_student_daily_activity_model' => 'DB_coop_student_daily_activity',
    'DB/Coop_student_dorm_model' => 'DB_coop_student_dorm',
    'DB/Coop_student_emergency_contact_model' => 'DB_coop_student_emergency_contact',
    'DB/Coop_student_has_coop_document_model' => 'DB_coop_student_has_coop_document',
    'DB/Coop_student_has_coop_student_questionnaire_item_model' => 'DB_coop_student_has_coop_student_questionnaire_item',
    'DB/Coop_student_permit_model' => 'DB_coop_student_permit',
    'DB/Coop_student_plan_model' => 'DB_coop_student_plan',
    'DB/Coop_student_questionnaire_item_model' => 'DB_coop_student_questionnaire_item',
    'DB/Coop_student_subject_report_model' => 'DB_coop_student_subject_report',
    'DB/Coop_test_model' => 'DB_coop_test',
    'DB/Coop_test_has_student_model' => 'DB_coop_test_has_student',
    'DB/News_model' => 'DB_news',
    'DB/News_file_model' => 'DB_news_file',
    'DB/Officer_model' => 'DB_officer',
    'DB/Skill_model' => 'DB_skill',
    'DB/Student_model' => 'DB_student',
    'DB/Student_field_model' => 'DB_student_field',
    'DB/Student_has_skill_model' => 'DB_student_has_skill',
    'DB/Student_train_register_model' => 'DB_student_train_register',
    'DB/Teacher_model' => 'DB_teacher',
    'DB/Term_model' => 'DB_term',
    'DB/Train_model' => 'DB_train',
    'DB/Train_check_student_model' => 'DB_train_check_student',
    'DB/Train_location_model' => 'DB_train_location',
    'DB/Train_type_model' => 'DB_train_type'
    
    


);
