<script>
	$(document).ready(function(){
	$('.modal').modal();
});
</script>
<?php if ( $_SESSION ) { ?>
<div class="container grey lighten-4">
	<div class="section book-section">
		<div class="row">
			<div class="col s12">
				<?php
				$i = 0;
				while ( $row = mysqli_fetch_assoc( $rows ) ) :
							$i++;
					?>
					<div class="col s12 md6 l4">
						<div class="card tooltipped " data-position="right" data-tooltip="<?php echo $row['book_name']; ?> </br> Available Copies : <?php echo $row['book_count']; ?>">
					<?php
						$fetch   = '../../resources/uploads/' . $row['cover_image_name'] . '.jpg';
							$pid = $row['pid'];
							$uid = $_SESSION['uid'];
					?>
							<div class="card-image waves-effect waves-block waves-light">
								<a href='#bookDetail' class="modal-trigger" data-target="bookDetail<?php echo $pid; ?>">
									<img class="bookImage" <?php echo "src='{$fetch}'"; ?> alt='Book Cover'>
									<!-- <span class="card-title white-text"><?php echo $row['book_name']; ?></span> -->
								</a>
							</div>
						</div>
						<div id="bookDetail<?php echo $pid; ?>"  class="modal modal-detail modal-fixed-footer">
							<div class="modal-content">
							<h4>
							<?php echo $row['book_name']; ?>
								<i class="right material-icons modal-close">close</i>	
							</h4>
							<h6><?php echo $row['author_name']; ?></h6></br>
							<div style="display:flex;">
								<img class="bookImage" <?php echo "src='{$fetch}'"; ?> alt='Book Cover'>
								<p class="label-margin"><?php echo $row['description']; ?></p>
							</div>
							</div>
							<div class="modal-footer">
							<?php if ( $_SESSION['type'] == 'inadmin' ) { ?>
									<span class="left modalSpan">
										<a <?php echo "href='/editbook?pid={$pid}'"; ?>><i class="material-icons indigo-text">edit</i></a>
										<a href='#deleteBook' data-target="deleteBook<?php echo $pid; ?>" class="modal-trigger indigo-text"><i class="material-icons">delete</i></a>
									</span>
								<?php } ?>
								<a <?php echo "href='/alreadyread?pid={$pid}'"; ?> class="modal-close waves-effect waves-indigo btn-flat">Mark as Read</a>
								<a <?php echo "href='/wishlist?pid={$pid}'"; ?> class="modal-close waves-effect waves-indigo btn-flat">Add to Wishlist</a>
								<a <?php echo "href='/readbook?pid={$pid}'"; ?> class="modal-close waves-effect waves-indigo btn-flat">Issue</a>
							</div>
						</div>
						<div id="deleteBook<?php echo $pid; ?>" class="modal modal-del">
							<div class="modal-content">
							<h6>Are you sure ?</h6>
							<p>You want to delete "<?php echo $row['book_name']; ?>"</p>
							</div>
							<div class="modal-footer">
								<form class="right searchBar" style="padding: 4px;" action="/delbook" method="POST">
									<input type="submit" value="Agree" class="btn white-text indigo z-depth-0">
									<input type="hidden" name="pid" value="<?php echo $pid; ?>">
								</form>
							</div>
						</div>
					</div>
					<?php
					endwhile;
				if ( $i == 0 ) :
					?>
					<h5 class="center">No Books Found !</h5>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php
	if ( ! isset( $bookIds ) && $i != 0 ) :
		?>
		<ul class="pagination center" style="padding-bottom: 90px;">
			<?php
			if ( ( $offset - $limit ) >= 0 ) :
				$offset1 = $offset - $limit;
				?>
			<li class="waves-effect"><a href="/login?view=books&offset=<?php echo $offset1; ?>"><i class="material-icons">chevron_left</i></a></li>
			<?php endif; ?>
			<?php
			if ( ( $offset + $limit ) < $total ) :
				$offset2 = $offset + $limit;
				?>
			<li class="waves-effect"><a href="/login?view=books&offset=<?php echo $offset2; ?>"><i class="material-icons">chevron_right</i></a></li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>
<?php } ?>
