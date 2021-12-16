<?php
$playlist    = new Playlists();
$search      = '';
$playlistIds = null;
if ( isset( $playlistIds ) ) {
	$rows = $playlist->fetchPlaylists();
} else {
	if ( isset( $_GET['search'] ) && ! empty( $_GET['search'] ) ) {
		$search = $_GET['search'];
	}
}
require __dir__ . '/' . '../../view/playlists/playlistcard_view.php';
