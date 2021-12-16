<?php
class Playlists extends QueryBuilder {
	protected $table  = 'movie_playlist';
	protected $names  = array( 'pid' );
	protected $values = array();
	public function fetchPlaylist( $values ) {
		$values = explode( ',', $values );
		return parent::fetchOne( $this->table, $this->names, $values );
	}
	public function fetchPlaylists() {
		return parent::fetchList( $this->table );
	}
	public function freshPlaylist( $bid ) {
		$row = $this->fetchPlaylist( $bid );
		if ( isset( $row ) ) {
			return false;
		} else {
			return true;
		}
	}
	public function fetchPlaylistsLimit( $limit, $offset, $order = null, $search = '' ) {
		if ( ! is_null( $order ) ) {
			switch ( $order ) {
				case 'a-z':
					$order = 'Playlist_name';
					break;
				case 'z-a':
					$order = 'Playlist_name DESC';
					break;
				default:
					$order = 'last_modify DESC';
					break;
			}
		}
		if ( ! is_null( $search ) && ! empty( $search ) ) {
			$search = "Playlist_name LIKE '%{$search}%' OR author_name LIKE '%{$search}%'";
		}
		return parent::fetchList3( $this->table, ( $limit - 1 ), $offset, $order, $search );
	}
	public function deletePlaylist( $bid ) {
		$this->deleteAllReaders( $bid );
		return parent::delete( $this->table, 'bid', $bid );
	}
	public function registerPlaylist( $playlistname, $description, $title ) {
		$this->names  = array( 'playlist_name', 'description', 'cover_image_name' );
		$this->values = array( "'{$playlistname}'", "'{$description}'", "'{$title}'" );
		return ( parent::insert( $this->table, $this->names, $this->values ) );
	}
	public function updatePlaylist( $Playlistnames, $Playlistvalues, $bid ) {
		$i      = 0;
		$update = array();
		while ( isset( $Playlistnames[ $i ] ) ) {
			$update += array( $Playlistnames[ $i ] => $Playlistvalues[ $i ] );
			$i++;
		}
		return ( parent::update( $this->table, $update, 'bid', $bid ) );
	}
	public function updatePlaylistCount( $bid, $type = 'decrement' ) {
		if ( $type == 'decrement' ) {
			$Playlist       = $this->fetchPlaylist( $bid );
			$count          = $Playlist['Playlist_count'] - 1;
			$Playlistnames  = array( 'Playlist_count' );
			$Playlistvalues = array( $count );
			$this->updatePlaylist( $Playlistnames, $Playlistvalues, $bid );
		} elseif ( $type == 'increment' ) {
			$Playlist       = $this->fetchPlaylist( $bid );
			$count          = $Playlist['Playlist_count'] + 1;
			$Playlistnames  = array( 'Playlist_count' );
			$Playlistvalues = array( $count );
			$this->updatePlaylist( $Playlistnames, $Playlistvalues, $bid );
		}
	}
	public function deleteAllReaders( $bid ) {
		parent::delete( 'has_Playlist', 'bid', $bid );
	}
}

