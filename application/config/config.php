<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
define('IP','10.9.201.6');
define('URL', 'http://'.IP.'/basever/'); 

define('LIBS_PATH', 'application/libs/');
define('CONTROLLER_PATH', 'application/controllers/');
define('MODELS_PATH', 'application/models/');
define('VIEWS_PATH', 'application/views/');

define('AVATAR_PATH', 'public/avatars/');

define('FORMS','application/views/forms/');


// 1209600 seconds = 2 weeks
define('COOKIE_RUNTIME', 1209600);
// the domain where the cookie is valid for, for local development ".127.0.0.1" and ".localhost" will work
// IMPORTANT: always put a dot in front of the domain, like ".mydomain.com" !
define('COOKIE_DOMAIN', '.'.IP);

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'allapps');
define('DB_USER', 'app');
define('DB_PASS', 'root');

define("HASH_COST_FACTOR", "10");

define("FEEDBACK_UNKNOWN_ERROR", "Unknown error occurred!");
define("FEEDBACK_FIELD_EMPTY_USERNAME","Please enter Username ");
define("FEEDBACK_FIELD_EMPTY_PASSWORD","Please enter Password ");

define("FEEDBACK_USER_NOTFOUND","User not found please check with your IT administrator");
define("FEEDBACK_USER_NOT_ACTIVE","Not an active user check with your IT administrator");

define("FEEDBACK_FIELD_EMPTY_FORM","Please fill the form completely");


/**
 * define("PHPMAILER_DEBUG_MODE", 0);
 * define("EMAIL_USE_SMTP", true);
 * define("EMAIL_SMTP_HOST", 'ssl://smtp.gmail.com');
 * define("EMAIL_SMTP_AUTH", true);
 * define("EMAIL_SMTP_USERNAME", 'xxxxxxxxxx@gmail.com');
 * define("EMAIL_SMTP_PASSWORD", 'xxxxxxxxxxxxxxxxxxxx');
 * define("EMAIL_SMTP_PORT", 465);
 * define("EMAIL_SMTP_ENCRYPTION", 'ssl');
 *
 * It's really recommended to use SMTP!
 */

/*define("PHPMAILER_DEBUG_MODE", 0);
// use SMTP or basic mail() ? SMTP is strongly recommended
define("EMAIL_USE_SMTP", false);
// name of your host
define("EMAIL_SMTP_HOST", 'yourhost');
// leave this true until your SMTP can be used without login
define("EMAIL_SMTP_AUTH", true);
// SMTP provider username
define("EMAIL_SMTP_USERNAME", 'yourusername');
// SMTP provider password
define("EMAIL_SMTP_PASSWORD", 'yourpassword');
// SMTP provider port
define("EMAIL_SMTP_PORT", 465);
// SMTP encryption, usually SMTP providers use "tls" or "ssl", for details see the PHPMailer manual
define("EMAIL_SMTP_ENCRYPTION", 'ssl');

// Options: 0 = off, 1 = commands, 2 = commands and data, perfect to see SMTP errors, see the PHPMailer manual for more


/**
 * Configuration for: Email content data
 *
 * php-login uses the PHPMailer library, please have a look here if you want to add more
 * config stuff: @see https://github.com/PHPMailer/PHPMailer
 *
 * As email sending within your project needs some setting, you can do this here:
 *
 * Absolute URL to password reset action, necessary for email password reset links
 * define("EMAIL_PASSWORD_RESET_URL", "http://127.0.0.1/php-login/4-full-mvc-framework/login/passwordReset");
 * define("EMAIL_PASSWORD_RESET_FROM_EMAIL", "noreply@example.com");
 * define("EMAIL_PASSWORD_RESET_FROM_NAME", "My Project");
 * define("EMAIL_PASSWORD_RESET_SUBJECT", "Password reset for PROJECT XY");
 * define("EMAIL_PASSWORD_RESET_CONTENT", "Please click on this link to reset your password:");
 *
 * absolute URL to verification action, necessary for email verification links
 * define("EMAIL_VERIFICATION_URL", "http://127.0.0.1/php-login/4-full-mvc-framework/login/verify/");
 * define("EMAIL_VERIFICATION_FROM_EMAIL", "noreply@example.com");
 * define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
 * define("EMAIL_VERIFICATION_SUBJECT", "Account Activation for PROJECT XY");
 * define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account:");
 * define("EMAIL_PASSWORD_RESET_URL", URL . "login/verifypasswordreset");
define("EMAIL_PASSWORD_RESET_FROM_EMAIL", "no-reply@example.com");
define("EMAIL_PASSWORD_RESET_FROM_NAME", "My Project");
define("EMAIL_PASSWORD_RESET_SUBJECT", "Password reset for PROJECT XY");
define("EMAIL_PASSWORD_RESET_CONTENT", "Please click on this link to reset your password: ");

define("EMAIL_VERIFICATION_URL", URL . "login/verify");
define("EMAIL_VERIFICATION_FROM_EMAIL", "no-reply@example.com");
define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
define("EMAIL_VERIFICATION_SUBJECT", "Account activation for PROJECT XY");
define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account: ");


 */
/**
 * Configuration for: Error messages and notices
 *
 * In this project, the error messages, notices etc are all-together called "feedback".
 */
