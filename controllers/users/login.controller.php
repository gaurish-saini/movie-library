<?php
if ( session_status() == PHP_SESSION_NONE ) {
	session_start();
}
$user = new Users();
// $book = new Books();

if ( isset( $_SESSION['name'] ) ) {
	session_destroy();
	unset( $_SESSION['name'] );
	var_dump('hello');
	require __dir__ . '/' . '../../controllers/common/setUserSession.php';
	header( 'location:/' );
} elseif ( isset( $_POST['emailid'] ) && $_POST['emailid'] != '' ) {
	var_dump('here');
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

if ( $_SESSION ) {
	require __dir__ . '/' . '../../view/common/sidebar.php';
	if ( ! isset( $_GET['view'] ) ) {
			require __dir__ . '/' . '../playlists/listplaylist.php';
	} elseif ( $_GET['view'] == 'playlists' ) {
		require __dir__ . '/' . '../playlists/listplaylist.php';
	}
}
if ( $_SESSION || ! isset( $_GET['listplaylists'] ) ) {
	require __dir__ . '/' . '../../view/common/sidebar.php';
	?>
		<div class="fixed-action-btn add">
		<a class="btn-floating btn-large brand indigo tooltipped"  data-position="left" data-tooltip="Add Playlist" href="/addplaylist"><i class="large material-icons">add</i></a>
		</div>
		<?php
		// if ( ! isset( $_GET['view'] ) ) {
		// require __dir__ . '/' . '../books/ListBooks.php';
		// } elseif ( $_GET['view'] == 'books' ) {
		// require __dir__ . '/' . '../books/ListBooks.php';
		// echo 'here';
		// }
}
