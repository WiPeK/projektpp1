<div class="nav-adm no_space">
	<div class="div_nav_adm no_space">			
		<div class="row">
			<div class="col-lg-6">
				<img src="<?php echo base_url() . 'images/sample.jpg'; ?>" alt="example" class="img-admin img-responsive">
			</div>
			<div class="col-lg-5 no_space logged_as">
				<p class="logas"><i class="glyphicon glyphicon-user"></i> Zalogowano jako: </p>
				<p class="text-center"><?php echo strtoupper($_SESSION['login']); ?></p>
				<p class="text-center">
					<ul class="act_ico">
						<!--<li>
							<a href="<?php //echo base_url() . 'admin/user/edit' . '/' . $admin->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Przejdź do profilu"><i class="glyphicon glyphicon-th-large"></i></a>
						</li>-->
						<li>
							<a href="<?php echo base_url() . 'user/logout'; ?>" data-toggle="tooltip" data-placement="bottom" title="Wyloguj się"><i class="glyphicon glyphicon-off"></i></a>
						</li>
					</ul>
				</p>
			</div>
		</div>
		<div class="row no_space">
				<form action="<?php echo base_url() . 'search/results'; ?>" method="post" role="search" class="navbar-form search_bar no_border_radius">
				<div class="form-group">
					<input type="text" name="search_input" class="form-control no_radius_input" placeholder="Search">
				</div>
				<button type="submit" name="submit" class="btn btn-default">
					<div class="menu_search">
	            		<span class="glyphicon glyphicon-search pull-right search_ic"></span>	
	            	</div>
				</button>
				</form>
			<ul class="navadmin nav">
				<li class="navadminli">
					<a href="<?php echo base_url(); ?>" title="Homepage">Strona główna</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_user'; ?>" title="Użytkownicy">Użytkownicy</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_page'; ?>" title="Strony">Strony</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_article'; ?>" title="Artykuły">Artykuły</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_page/order'; ?>" title="Kolejność stron">Kolejność stron</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_gallery'; ?>" title="Zarządzanie galerią">Zarządzanie galerią</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_configuration'; ?>" title="Zarządzanie CMS">Zarządzanie CMS</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_support'; ?>" title="Support">Support</a>
				</li>
				<li class="navadminli">
					<a href="<?php echo base_url() . 'admin_manage_files'; ?>" title="Pliki">Pliki</a>
				</li>
			</ul>
		</div>		
	</div>	
</div>















