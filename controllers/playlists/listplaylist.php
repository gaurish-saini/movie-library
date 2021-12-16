<?php
$playlist    = new Playlists();
$search      = '';
$playlistIds = null;
$rows        = $playlist->fetchPlaylists();

if ( isset( $_GET['search'] ) && ! empty( $_GET['search'] ) ) {
	$search = $_GET['search'];
}
require __dir__ . '/' . '../../view/playlists/playlistcard_view.php';
