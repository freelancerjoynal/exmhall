<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');


/* ----------------------------------------------	Frotnend	------------------------------------------------------ */

$routes->get('/', 'Home::index');

//  Newly added
$routes->get('/logout', 'Admin\Logout::frontend_logout');
$routes->post('/student-registration-save', 'StudentRegistrations::student_registration_save');
$routes->post('/student-login-auth', 'StudentsLogin::login_auth');

// STUDENT PROFILE
$routes->get('/profile', 'StudentProfile::student_profile');
$routes->post('/profile-data-save', 'StudentProfile::student_profile_save');


// STUDENT EXAMS
$routes->get('/exams', 'StudentExam::student_exams');
$routes->get('/exam/(:any)/(:any)', 'StudentExam::student_exam/$1/$2');
$routes->get('/exam/(:any)', 'StudentExam::student_exam_check/$1');

$routes->post('/exam-answers-submit', 'StudentExam::exam_answers_submit');  // Save
$routes->get('/exam-result', 'StudentExam::exam_result');  // Save

// Ajax call
$routes->post('/ajax-get-subject-list', 'StudentExam::ajax_get_subject_list'); 
$routes->post('/ajax-get-topic-list', 'StudentExam::ajax_get_topic_list');
$routes->post('/ajax-exam-advance-filter', 'StudentExam::ajax_exam_advance_filter');


/* ------------------------------------------------	ADMIN	--------------------------------------------------------- */

$routes->add('/admin', 'Admin\Login::index');
$routes->get('/admin/logout', 'Admin\Logout::admin_logout');

// Dashboard
$routes->add('/admin/dashboard', 'Admin\Dashboard\Dashboard::index');

// Students
$routes->get('/admin/students', 'Admin\Students\Students::students_list');

// Classes
$routes->get('/admin/masters/classes', 'Admin\Masters\Classes::classes_list'); // View
$routes->get('/admin/masters/class-add', 'Admin\Masters\Classes::class_add');  // View
$routes->post('/admin/masters/class-add-save', 'Admin\Masters\Classes::class_add'); // Save

$routes->get('/admin/masters/class-edit/(:any)', 'Admin\Masters\Classes::class_edit/$1');  // View
$routes->post('/admin/masters/class-edit-save', 'Admin\Masters\Classes::class_edit');  // Save

$routes->get('/admin/masters/class-delete/(:any)', 'Admin\Masters\Classes::class_delete/$1');

//Subjects
$routes->get('/admin/masters/subjects', 'Admin\Masters\Subjects::subjects_list'); // View
$routes->get('/admin/masters/subject-add', 'Admin\Masters\Subjects::subject_add');
$routes->post('/admin/masters/subject-add-save', 'Admin\Masters\Subjects::subject_add'); // Save

$routes->get('/admin/masters/subject-edit/(:any)', 'Admin\Masters\Subjects::subjects_edit/$1');  // View
$routes->post('/admin/masters/subject-edit-save', 'Admin\Masters\Subjects::subjects_edit');  // Save

$routes->get('/admin/masters/subject-delete/(:any)', 'Admin\Masters\Subjects::subject_delete/$1');

//topics
$routes->get('/admin/masters/topics', 'Admin\Masters\Topics::topics_list'); // View
$routes->get('/admin/masters/topic-add', 'Admin\Masters\Topics::topic_add');
$routes->post('/admin/masters/topic-add-save', 'Admin\Masters\Topics::topic_add'); // Save

$routes->get('/admin/masters/topic-edit/(:any)', 'Admin\Masters\Topics::topics_edit/$1');  // View
$routes->post('/admin/masters/topic-edit-save', 'Admin\Masters\Topics::topics_edit');  // Save																			

$routes->get('/admin/masters/topic-delete/(:any)', 'Admin\Masters\Topics::topic_delete/$1');

//students
$routes->get('/admin/students/status-edit/(:any)', 'Admin\Students\Students::status_edit/$1'); // View

//Exams
$routes->get('/admin/exams', 'Admin\Exams\Exams::exam_list'); // View
$routes->get('admin/exams/exam-add', 'Admin\Exams\Exams::exam_insert'); // View
$routes->post('/admin/exams/exam-add-save', 'Admin\Exams\Exams::exam_insert'); // Save

$routes->get('/admin/exams/exam-edit/(:any)', 'Admin\Exams\Exams::exam_edit/$1'); // View
$routes->post('/admin/exams/exam-edit-save', 'Admin\Exams\Exams::exam_edit'); // Save
$routes->get('/admin/exams/exam-delete/(:any)', 'Admin\Exams\Exams::exam_delete/$1');


// Ajax call
$routes->post('/admin/ajax-get-subject-list', 'Admin\Exams\Exams::ajax_get_subject_list'); 
$routes->post('/admin/ajax-get-topic-list', 'Admin\Exams\Exams::ajax_get_topic_list');


// Exam Questions
$routes->get('/admin/exam-questions', 'Admin\Exams\Exams::exam_questions_list'); // View
$routes->get('admin/exam-question-add', 'Admin\Exams\Exams::exam_question_insert'); // View
$routes->post('/admin/exam-question-add-save', 'Admin\Exams\Exams::exam_question_insert'); // Save 

$routes->get('/admin/exam-question-edit/(:any)', 'Admin\Exams\Exams::exam_questions_edit/$1'); // View
$routes->post('/admin/exam-question-edit-save', 'Admin\Exams\Exams::exam_questions_edit'); // Save
$routes->get('/admin/exam-question-delete/(:any)', 'Admin\Exams\Exams::exam_questions_delete/$1');

// Site Settings 
$routes->get('/admin/site-settings', 'Admin\Settings\Settings::site_settings'); // View
$routes->post('/admin/site-settings-save', 'Admin\Settings\Settings::site_settings'); // Save 

 
/*$routes->get('/admin/masters/subject-edit/(:any)', function(){
	echo 'Testing';
});  */


// Warranties
//$routes->add('/control/product-warranties', 'Admin\Products\Warranties::warranties');
//$routes->add('/control/product-warranty/(:any)/(:any)', 'Admin\Products\Warranties::warranty_accept_decline/$1/$2');

// Change Password
//$routes->add('/control/change-password', 'Admin\Tickets\Tickets::change_password');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
