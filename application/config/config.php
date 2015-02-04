<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: URL
 * Here we auto-detect your applications URL and the potential sub-folder. Works perfectly on most servers and in local
 * development environments (like WAMP, MAMP, etc.). Don't touch this unless you know what you do.
 *
 * URL_PUBLIC_FOLDER:
 * The folder that is visible to public, users will only have access to that folder so nobody can have a look into
 * "/application" or other folder inside your application or call any other .php file than index.php inside "/public".
 *
 * URL_PROTOCOL:
 * The protocol. Don't change unless you know exactly what you do.
 *
 * URL_DOMAIN:
 * The domain. Don't change unless you know exactly what you do.
 *
 * URL_SUB_FOLDER:
 * The sub-folder. Leave it like it is, even if you don't use a sub-folder (then this will be just "/").
 *
 * URL:
 * The final, auto-detected URL (build via the segments above). If you don't want to use auto-detection,
 * then replace this line with full URL (and sub-folder) and a trailing slash.
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('COOKIE_RUNTIME', 1209600);
define('COOKIE_DOMAIN', '.localhost');

define('HASH_COST_FACTOR', "10");

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mini');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

/**
 * Configuration for: Email
 * This is the place where you define your database credentials, database type etc.
 */
define('PHPMAILER_DEBUG_MODE', 0);
define('EMAIL_USE_SMTP', true);
define('EMAIL_SMTP_HOST', 'localhost');
define('EMAIL_SMTP_AUTH', false);
define('EMAIL_SMTP_USERNAME', '');
define('EMAIL_SMTP_PASSWORD', '');
define('EMAIL_SMTP_PORT', 25);
define('EMAIL_SMTP_ENCRYPTION', 'tls');

define('EMAIL_PASSWORD_RESET_URL', URL . 'login/verifypasswordreset');
define('EMAIL_PASSWORD_RESET_FROM_EMAIL', 'no-reply@example.com');
define('EMAIL_PASSWORD_RESET_FROM_NAME', 'My Project');
define('EMAIL_PASSWORD_RESET_SUBJECT', 'Password reset for Projectname');
define('EMAIL_PASSWORD_RESET_CONTENT', 'Please click the link to reset your password: ');

define('EMAIL_VERIFICATION_URL', URL . 'login/verifypasswordreset');
define('EMAIL_VERIFICATION_FROM_EMAIL', 'no-reply@example.com');
define('EMAIL_VERIFICATION_FROM_NAME', 'My Project');
define('EMAIL_VERIFICATION_SUBJECT', 'Account activation for Projectname');
define('EMAIL_VERIFICATION_CONTENT', 'Please click the link to activate your account: ');

define('FEEDBACK_USERNAME_FIELD_EMPTY','Username field was empty!');
define('FEEDBACK_PASSWORD_FIELD_EMPTY','Password field was empty!');
define('FEEDBACK_LOGIN_FAILED','Login failed.');
define('FEEDBACK_PASSWORD_WRONG_3_TIMES', 'You have typed in a wrong password 3 or more times already. Please wait 30 seconds to try again.');
define('FEEDBACK_PASSWORD_REPEAT_WRONG', 'Password and password repeat are not the same.');
define('FEEDBACK_PASSWORD_TOO_SHORT', 'Password has a minimum length of 6 characters');
define('FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG', 'Username cannot be shorter than 2 or longer than 64 characters');
define('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN', 'Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters.');
define('FEEDBACK_EMAIL_FIELD_EMPTY', 'Email field was empty!');
define('FEEDBACK_EMAIL_TOO_LONG', 'Email cannot be longer than 64 characters');
define('FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN', 'Sorry, your chosen email does not fit into the email naming pattern');
define('FEEDBACK_UNKNOWN_ERROR', 'WTF?');
define('FEEDBACK_USERNAME_ALREADY_TAKEN', 'Username is already taken.');
define('FEEDBACK_EMAIL_ALREADY_TAKEN', 'Email is already taken.');
define('FEEDBACK_ACCOUNT_CREATION_FAILED', 'Failed to create account.');
define('FEEDBACK_ACCOUNT_SUCCESFULLY_CREATED', 'Your account has been created succesfully.');
define('FEEDBACK_VERIFICATION_MAIL_SENDING_FAILED', 'Sending account verification mail failed.');
define('FEEDBACK_VERIFICATION_MAIL_SENDING_SUCCESFULL', 'Sending account verification mail succeeded.');
define('FEEDBACK_VERIFICATION_MAIL_SENDING_ERROR', 'Error sending account verification mail.');
define('FEEDBACK_ACCOUNT_NOT_ACTIVATED_YET', 'Account isnt activated yet.');