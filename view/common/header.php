<header> 
<nav class="white z-depth-0 " id="nav">
	<div class="container">
		<a href="/" class="brand-logo brand-text" >Movie Library</a>
		<ul id="nav-mobile" class="right hide-on-small-and-down"></ul>
	</div>
	<?php if ( ( Request::uri() == 'login' ) || ( Request::uri() == 'addbook' ) ) { ?>
	<div class="container">
		<a href="#" ><i  data-target="slide-out" class="material-icons sidenav-trigger label-btn brand-text z-depth-0 right menu">menu</i></a>
	</div>
	<ul id="slide-out" class="sidenav">
		<li>
			<div class="user-view">
			<span class="indigo-text name">Hello</span>
			<span class="indigo-text email"><?php echo $_SESSION['username']; ?></span>
			<span class="indigo-text name">Dashboard</span>
			</div>
		</li>
		<li><div class="divider brand-text"></div></li></br>
		<li><a href="/logout">Log Out</a></li>
	</ul>
		<?php if ( ( ! isset( $_GET['listbooks'] ) ) || ! ( isset( $_GET['view'] ) || $_GET['view'] == 'users' ) || ( Request::uri() !== 'addbook' )) { ?>
	<div class="nav-wrapper right">
		<form class="searchBar" accept="/" method="GET">
			<div class="input-field white">
			<input id="search" type="search" placeholder="Search" name="search" required>
			<label class="label-icon" for="search"><i class="material-icons indigo-text text-darken-4">search</i></label>
			</div>
		</form>
	</div>
	<?php } ?>
	<?php } ?>
</nav>
</header>
<?php
if ( isset( $_GET['search'] ) ) {
	?>
<div class="container" style="margin-top: 30px;">
	<div class="chip indigo-text indigo lighten-4">
	<span>Keyword :</span>
		<?php echo $_GET['search']; ?>
	<i class="close material-icons"><a href="/login" class="indigo-text text-darken-4">close</a></i>
	</div>
</div>
	<?php
}
?>
<script>
$(document).ready(function(){
	$('.dropdown-trigger').dropdown();
	$('.tooltipped').tooltip();
	$('select').formSelect();
	$('.chips').chips();
});
</script>
