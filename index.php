<?php
	require 'core/models/database/connection.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Movie Library</title>
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
		<?php
			require __dir__ . '/resources/materialize/materialize_css.php';
			require __dir__ . '/resources/materialize/materialize_js.php';
		?>
	</head>
	<body class="grey lighten-4">
		<?php
		require 'core/materialize.php';
		require __dir__ . '/view/common/header.php';
		require Router::load( 'routes.php' )->direct( Request::uri() );
		if ( ( Request::uri() != '' ) && ( Request::uri() != 'index' ) && ( Request::uri() != 'index.php' ) && ! ( isset( $_GET['register'] ) ) ) :
			require __dir__ . '/view/common/footer.php';
		endif;
		?>
	<script type="text/javascript" src='resources/js/custom_Js_functions.js'></script>
	</body>
</html>
