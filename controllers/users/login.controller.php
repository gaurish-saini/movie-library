<?php
if ( session_status() == PHP_SESSION_NONE ) {
	session_start();
}
$user = new Users();
// $book = new Books();

if ( isset( $_SESSION['token'] ) and isset( $_SESSION['loginid'] ) ) {
	$name  = $_SESSION['loginid'];
	$row   = $user->fetchUserAuth( $name );
	$type  = $row['type'];
	$uid   = $row['uid'];
	$name  = $row['user_name'];
	$email = $row['email_id'];
	unset( $_SESSION['token'] );
	unset( $_SESSION['loginid'] );
	require __dir__ . '/' . '../../controllers/common/setUserSession.php';
	header( 'location:/' );
} elseif ( ! isset( $_SESSION['uid'] ) ) {
	if ( isset( $_POST['emailid'] ) && $_POST['emailid'] != '' ) {
		$name             = mysqli_escape_string( $conn, $_POST['emailid'] );
		$_SESSION['name'] = $name;
		if ( isset( $_POST['password'] ) && $_POST['password'] != '' ) {
			$pass                 = mysqli_escape_string( $conn, $_POST['password'] );
			$_SESSION['password'] = $pass;
			$row                  = $user->fetchUserAuth( $name );
			// $user->verify( $row, $pass );
		} else {
			$user->flashError( array( null, 'Please Enter Password' ), '/' );
		}
	} else {
		$user->flashError( array( 'Please Enter Email Address', 'Please Enter Password' ), '/' );
	}
}

if ( isset( $_SESSION['type'] ) ) {
	echo 'try1';
	if ( $_SESSION['type'] == 'normalUser' || ! isset( $_GET['listbooks'] ) ) {
		require __dir__ . '/' . '../../view/common/sidebar.php';
		echo 'here';
		// if ( ! ( isset( $_GET['view'] ) && $_GET['view'] == 'users' ) ) {
		// <div class="fixed-action-btn add">
		// <a class="btn-floating btn-large brand indigo tooltipped"  data-position="left" data-tooltip="Add Book" href="/addbook"><i class="large material-icons">add</i></a>
		// </div>
		// }
		// if ( ! isset( $_GET['view'] ) ) {
		// 		require __dir__ . '/' . '../books/ListBooks.php';
		// } elseif ( $_GET['view'] == 'books' ) {
		// 	// require __dir__ . '/' . '../books/ListBooks.php';
		// 	echo 'here';
		// }
	}
}
