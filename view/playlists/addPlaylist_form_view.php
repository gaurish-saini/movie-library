<section class="container grey-text"  style="margin-top: 80px;">
	<div class="col s6 md6">
		<form class="grey lighten-4 " action="/addplaylist" method="POST" enctype="multipart/form-data" onsubmit="return (checkFieldName('playlist_name') && checkFileInput('playlist_cover'))">
			<h5 class="center">Add Playlist</h5>
		<div class="divider"></div>
		</br>    
		<div class="input-field indigo-text text-darken-4 ">
				<i class="material-icons prefix">book</i>
				<input id="icon_prefix" class="validate" type="text" id="playlist_name" name="playlist_name" onkeyup="checkFieldName('playlist_name')">
				<label for="email">Enter Playlist Name*</label>
			</div>
			<?php if ( $msg1 ) : ?>
				<small class="red-text left" id='errorplaylist_name'><?php echo $msg1; ?></small></br>
			<?php endif ?>
			<div class="input-field indigo-text text-darken-4 ">
				<i class="material-icons prefix">description</i>
				<textarea id="textarea" class="materialize-textarea" class="validate" id="description" name="description" onkeyup="checkFieldName('description')"></textarea>
				<label for="email">Enter Description/About</label>
			</div>
			<div class="file-field input-field">
				<div class="btn grey ">
					<span>Upload Image<i class="material-icons left indigo-text text-darken-4">photo_album</i></span>
					<input type="file" id="playlist_cover" accept="image/*" name="playlist_cover" onchange="checkFileInput('playlist_cover')">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate grey-text" type="text" value="playlist Cover (Max Size-1Mb)*">
				</div>
			</div>
			<?php if ( $msg2 ) : ?>
				<small class="red-text left label-margin" id='errorplaylist_cover'><?php echo $msg4; ?></small></br>
			<?php endif ?></br>
			<div class="grey lighten-4 center border">
				<button class="btn indigo waves-effect waves-light" type="submit" name="action">Publish Playlist
				<i class="material-icons right">publish</i>
			</div>
		</form></br>
	</div>		
</section>
