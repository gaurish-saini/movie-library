<?php
$router->define(
	array(
		''                         => 'controllers/common/home.php',
		'index.php'                => 'controllers/common/home.php',
		'index'                    => 'controllers/common/home.php',
		'login'                    => 'controllers/users/login.controller.php',
		'logout'                   => 'controllers/auth/logout.php',
		'send_reset_password_link' => 'controllers/auth/sendResetPasswordLink.php',
		'change_password'          => 'controllers/auth/updatePassword.php',
		'passwordreset'            => 'controllers/auth/resetPassword.php',
		'verify'                   => 'controllers/auth/verifyRegistration.php',
		'registration'             => 'controllers/users/register.controller.php',
		'splashmsg'                => 'view/common/splashmsg.php',
		'addbook'                  => 'controllers/books/addbook.php',
		'readbook'                 => 'controllers/books/readBook.php',
	)
);

