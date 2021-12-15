<?php

if ( session_status() == PHP_SESSION_NONE ) {
		session_start();
}
if ( isset( $_SESSION['type'] ) ) {
	header( 'location:/login' );
}
	$msg1 = $msg2 = $msg3 = $emailid = $password = $password1 = $rname = null;
if ( isset( $_SESSION['error1'] ) ) {
	$msg1 = $_SESSION['error1'];
	unset( $_SESSION['error1'] );
}
if ( isset( $_SESSION['error2'] ) ) {
	$msg2 = $_SESSION['error2'];
	unset( $_SESSION['error2'] );
}
if ( isset( $_SESSION['error3'] ) ) {
	$msg3 = $_SESSION['error3'];
	unset( $_SESSION['error3'] );
}
if ( isset( $_SESSION['name'] ) ) {
	$emailid = $_SESSION['name'];
	unset( $_SESSION['name'] );
}

if ( isset( $_SESSION['password'] ) ) {
	$password = $_SESSION['password'];
	unset( $_SESSION['password'] );
}
if ( isset( $_SESSION['rname'] ) ) {
	$rname = $_SESSION['rname'];
	unset( $_SESSION['rname'] );
}

if ( isset( $_GET['register'] ) ) {
	require __dir__ . '/' . '../../view/users/register.view.php';
	require __dir__ . '/' . '../../view/common/footer.php';
} elseif ( ( Request::uri() == '' ) || ( Request::uri() == 'index.php' ) || ( Request::uri() == 'index' ) ) {
	require __dir__ . '/' . '../../view/users/login.view.php';
	require __dir__ . '/' . '../../view/common/footer.php';
}
