<?php include_once('include/header.php'); ?>
<div class="container-fluid container_center">
	<?php
		include_once('inc/strap_top.php');
		include_once('inc/strap_logo.php');
		include_once('inc/menu.php');
	?>
	<div class="row body_row">
		<?php if(isset($_SESSION['err']) && !empty($_SESSION['err'])): ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Informacja</strong> <?php echo $_SESSION['err']; ?>
				</div>
		<?php unset($_SESSION['err']); endif; ?>
		<div class="col-lg-9 left_body">
			<?php if(isset($data['subview'])): ?>
			<div class="row row_subview">
				<div class="col-lg-12">
					<?php include_once($data['subview']); ?>
				</div>
			</div>
			<?php endif; ?>	
			<div class="row">
				<?php if(isset($data['home_content']) && $data['home_content'] === 1): ?>
					<?php
						include_once('inc/left_lbody.php');
						include_once('inc/left_rbody.php');		
					?>
				<?php endif; ?>					
			</div>			
		</div>

		<div class="col-lg-3 right_body">
			<?php include_once('inc/right_body.php'); ?>	
		</div> <!-- right body -->
	</div>
</div>
<?php
	include_once('inc/modals.php');
	include_once('inc/footer_s.php');		
?>
<?php include_once('include/footer.php'); ?>