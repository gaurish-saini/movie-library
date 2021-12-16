<?php
if ( session_status() == PHP_SESSION_NONE ) {
	session_start();
}
$msg1     = $msg2 = $msg3 = $msg4 = null;
$playlist = new Playlists();
$user     = new Users();
if ( ! $_SESSION ) {
	header( 'location:/' );
} else {
	if ( isset( $_POST['playlist_name'] ) && isset( $_POST['description'] ) ) {
		if ( $_POST['playlist_name'] != '' ) {
			$playlist_name             = mysqli_escape_string( $conn, $_POST['playlist_name'] );
			$_SESSION['playlist_name'] = $playlist_name;
		} else {
			$user->flashError( array( 'Invalid Playlist Name' ), '/addplaylist' );
		}
		if ( $_POST['description'] != '' ) {
			$description             = mysqli_escape_string( $conn, $_POST['description'] );
			$_SESSION['description'] = $description;
		} else {
			$user->flashError( array( null, null, null, 'Invalid Description' ), '/addplaylist' );
		}
		if ( isset( $playlist_name ) && isset( $description ) ) {
			$playlist_name = mysqli_escape_string( $conn, $_POST['playlist_name'] );
			$description   = mysqli_escape_string( $conn, $_POST['description'] );
			$i             = 1;
			$t             = substr( $playlist_name, 0, 5 );
			$i             = substr( $description, 0, 5 );
			$title         = str_replace( ' ', '', $t ) . str_replace( ' ', '', $i );
			$target_dir    = __dir__ . '/' . '../../resources/uploads/';
			$filename      = $title . '.jpg';
			$target_file   = $target_dir . $filename;
			$uploadOk      = 1;
			$imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
			$check         = getimagesize( $_FILES['playlist_cover']['tmp_name'] );
			if ( ( $check == true ) && ( $_FILES['playlist_cover']['size'] < 1048576 ) && ( $imageFileType == 'jpg' ) ) {
				if ( move_uploaded_file( $_FILES['playlist_cover']['tmp_name'], $target_file ) ) {
					if ( $pid = $playlist->registerPlaylist( $playlist_name, $description, $title ) ) {
						header( 'location:/login?view=playlists' );
					} else {
						header( 'location:/login?view=playlists' );
					}
				} else {
					header( 'location:/login?view=playlists' );
				}
			} else {
				header( 'location:/login?playlists=1' );
			}
		} else {
			$user->flashError( array( 'Invalid Playlist Name' ), '/addplaylist' );
		}
	} else {
		$msg1 = $msg2 = $msg3 = $playlist_name = null;
		if ( isset( $_SESSION['error1'] ) ) {
			$msg1 = "<p class='red-text playlist-form-label'>{$_SESSION['error1']}</p>";
			unset( $_SESSION['error1'] );
		}
		if ( isset( $_SESSION['error2'] ) ) {
			$msg2 = "<p class='red-text playlist-form-label'>{$_SESSION['error2']}</p>";
			unset( $_SESSION['error2'] );
		}
		if ( isset( $_SESSION['error3'] ) ) {
			$msg3 = "<p class='red-text playlist-form-label'>{$_SESSION['error3']}</p>";
			unset( $_SESSION['error3'] );
		}
		if ( isset( $_SESSION['playlist_name'] ) ) {
			$playlist_name = $_SESSION['playlist_name'];
			unset( $_SESSION['playlist_name'] );
		}
		require __dir__ . '/' . '../../view/common/sidebar.php';
		require __dir__ . '/' . '../../view/playlists/addPlaylist_form_view.php';
	}
}
