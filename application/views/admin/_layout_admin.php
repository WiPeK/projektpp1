<?php include('admin/include/header.php'); ?>
<div class="container-fluid">
	<div class="row no_space">
		<div class="col-lg-3 col-xs-12 no_space">
			<?php include('admin/dashboard/navbar_admin.php'); ?>
		</div>
		<div class="col-lg-9 no_space">
			 <div class="row top_strap">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-9 uri_top no_space">
						</div>
						<div class="col-lg-3 no_space fast_add">
							<ul class="pull-right">
								<li>
									<a href="<?php echo base_url() . 'admin_user/edit'; ?>" data-toggle="tooltip" data-placement="bottom" title="Dodaj nowego użytkownika">
										<i class="glyphicon glyphicon-user"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'admin_page/edit'; ?>" data-toggle="tooltip" data-placement="bottom" title="Dodaj nową stronę">
										<i class="glyphicon glyphicon-book"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'admin_article/edit'; ?>" data-toggle="tooltip" data-placement="bottom" title="Dodaj nowy artykuł">
										<i class="glyphicon glyphicon-credit-card"></i>
									</a>
								</li>
							</ul>
						</div>			
					</div>	
				</div>
			</div>
			<?php if(isset($_SESSION['err']) && !empty($_SESSION['err'])): ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Informacja </strong> <?php echo $_SESSION['err']; ?>
				</div>
			<?php unset($_SESSION['err']); endif; ?>
			<?php include($data['subview']); ?>
		</div>
	</div>
</div>
<?php include('admin/include/footer.php'); ?>