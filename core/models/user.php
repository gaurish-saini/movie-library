<?php
class Users extends QueryBuilder {
	protected $table  = 'users';
	protected $names  = array( 'email_id' );
	protected $values = array();

	public function flashError( $msg, $dir ) {
		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		$i = 1;
		foreach ( $msg as $values ) {
			$param              = 'error' . $i++;
			$_SESSION[ $param ] = $values;
		}
		header( "location:{$dir}" );
	}
	public function registerUser( $name, $emailid, $pass ) {
		$pass         = password_hash( $pass, PASSWORD_DEFAULT );
		$this->names  = array( 'user_name', 'email_id', 'password' );
		$this->values = array( "'{$name}'", "'{$emailid}'", "'{$pass}'" );
		parent::insert( $this->table, $this->names, $this->values );
	}
	// public function verify( $row, $pass ) {
	// 	if ( isset( $row ) ) {
	// 		if ( password_verify( $pass, $row['password'] ) ) {
	// 			if ( $row['verified_id'] == '0' ) {
	// 				$email    = $row['email_id'];
	// 				$name     = $row['user_name'];
	// 				$password = $row['password'];
	// 				$lnk      = 'http://65.0.94.238/verify?id=' . $email . '&secret=' . $password;
	// 				if ( $this->sendVerificationMail( $lnk, $email, $name ) ) {
	// 					session_destroy();
	// 					header( 'location:/splashmsg?msgtype=unverified' );
	// 				}
	// 			} else {
	// 				$type  = $row['type'];
	// 				$uid   = $row['uid'];
	// 				$name  = $row['user_name'];
	// 				$email = $row['email_id'];
	// 				require __dir__ . '/' . '../../controllers/common/setUserSession.php';
	// 				header( 'location:/login' );
	// 			}
	// 		} else {
	// 			$this->flashError( array( null, 'Invalid Password' ), '/' );
	// 		}
	// 	} else {
	// 		$this->flashError( array( 'Invalid Email Address', 'Invalid Password' ), '/' );
	// 	}
	// }
	public function readBook( $uid, $bid ) {
		$this->names  = array( 'uid', 'bid', 'status' );
		$this->values = array( "'{$uid}'", "'{$bid}'", "'issued'" );
		$book         = new Books();
		$book->updateBookCount( $bid );
		parent::insert( 'has_book', $this->names, $this->values );
	}
	public function fetchUser( $tablename ) {
		return parent::fetchList( $tablename );
	}
	public function fetchUserAuth( $values ) {
		$values = explode( ',', $values );
		return parent::fetchOne( $this->table, $this->names, $values );
	}
	public function freshUser( $emailid ) {
		$row = $this->fetchUserAuth( $emailid );
		if ( isset( $row ) ) {
			return false;
		} else {
			return true;
		}
	}
	public function fetchBooks( $uid, $type = 'issued' ) {
		$check = " uid='" . $uid . "' AND status='" . $type . "'";
		return ( parent::fetchList1( 'has_book', $check ) );
	}
}
