<?php
if ( session_status() == PHP_SESSION_NONE ) {
	session_start();
}
if ( isset( $type ) && isset( $uid ) ) {
	$_SESSION['uid']      = $uid;
	$_SESSION['username'] = $name;
	$_SESSION['email']    = $email;
}
