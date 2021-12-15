<?php
class Router {
	protected $routes = array();
	public static function load( $file ) {
		$router = new static();
		require $file;
		return $router;
	}
	public function define( $routes ) {
		$this->routes = $routes;
	}
	public function direct( $uri ) {
		try {
			if ( array_key_exists( $uri, $this->routes ) ) {
				return $this->routes[ $uri ];
			}
			throw new Exception( "<h3 class='center'>Page Not Found!</h3>" );
		} catch ( Exception $e ) {
			die( $e->getMessage() );
		}
	}
}
