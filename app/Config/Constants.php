<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/* Custom define */

defined('DS') 							|| define('DS', DIRECTORY_SEPARATOR);
defined('WEB_ROOT') 				|| define('WEB_ROOT', ROOTPATH);
defined('USERDATA_FOLDER') 	|| define('USERDATA_FOLDER', ROOTPATH.'public/user-data');
defined('INTERNATIONAL_SHIPPING_CHARGE') 	|| define('INTERNATIONAL_SHIPPING_CHARGE', 20);

/* Tables */

// Frontend
defined('TBL_STUDENTS')     						  || define('TBL_STUDENTS', 'students');
defined('TBL_QUIZ')     						  		|| define('TBL_QUIZ', 'quiz');
defined('TBL_QUIZ_QUESTIONS')     				|| define('TBL_QUIZ_QUESTIONS', 'quiz_questions');
defined('TBL_QUIZ_ATTEMPTS')     					|| define('TBL_QUIZ_ATTEMPTS', 'quiz_attempts');
defined('TBL_QUIZ_ATTEMPTS_PARTS')     		|| define('TBL_QUIZ_ATTEMPTS_PARTS', 'quiz_attempts_parts');





// Admin

defined('TBL_SITE_SETTINGS')      	      || define('TBL_SITE_SETTINGS', 'site_settings');
defined('TBL_ADMIN')     						      || define('TBL_ADMIN', 'admin');

defined('TBL_CLASSES')     						     || define('TBL_CLASSES', 'classes');
defined('TBL_SUBJECTS')     						     || define('TBL_SUBJECTS', 'subjects');
defined('TBL_TOPICS')     						     || define('TBL_TOPICS', 'topics');
defined('TBL_PACKAGES')     						   || define('TBL_PACKAGES', 'packages');




/** Email config ***/
defined('MAIL_CONFIG_FROM_MAIL')  || define('MAIL_CONFIG_FROM_MAIL', 'no-reply@cnsacademia.com');   //  from
defined('MAIL_CONFIG_FROM_NAME')  || define('MAIL_CONFIG_FROM_NAME', 'Education Management');   //  to
defined('ADMIN_MAIL')  || define('ADMIN_MAIL', 'enquiry@cnsacademia.com');


defined('DEFAULT_DATE_FORMAT')  	|| define('DEFAULT_DATE_FORMAT', 'Y-m-d H:i:s');

