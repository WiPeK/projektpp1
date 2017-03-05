<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
	<div class="login_panel">
		<div class="head_login">
			<p class="text-center">Zalogowano jako: <?php echo $_SESSION['login']; ?>
				<span class="badge pull-right log_out_ic" data-toggle="tooltip" data-placement="bottom" title="Wyloguj się">
					<a href="<?php echo base_url() . 'user/logout'; ?>"><i class="glyphicon glyphicon-off"></i></a>
				</span>
			</p>
		</div>
		<div class="logged_panel">
			<label for="">Email:&nbsp&nbsp </label>
			<?php echo base64_decode($_SESSION['email']) . '&nbsp&nbsp'; ?>
			<br>
			<?php if($_SESSION['mods'] === 'admin' && $_SESSION['loggedin'] === TRUE): ?>
				<a href="<?php echo base_url() . 'admin_dashboard'; ?>">
					<button type="button" class="btn btn-default btn-sm no_border_radius btn_adm">Panel administratora</button>
				</a>
			<?php endif; ?>	
		</div>
	</div>
<?php else: ?>
<div class="login_panel">
	<div class="head_login">
		<p class="text-center">Panel logowania</p>	
	</div>
	<div class="login_inputs">
		<form action="<?php echo base_url() . 'user/login'; ?>" method="post">
			<div class="form-group">
				<label for="Input_email_login">Login</label>
				<input type="text" name="login" id="Input_email_login" class="form-control no_border_radius" placeholder="Login" required>
			</div>
			<div class="form-group">
				<label for="Password_login">Hasło</label>
				<input type="password" name="password" id="Password_login" class="form-control no_border_radius" placeholder="Hasło" required>
			</div>
			<!-- <a class="text-center" href="<?php echo base_url() . 'user/forgotten_password'; ?>"><p>Zapomniane hasło?</p></a> -->
			<input type="submit" name="submit" class="btn btn-default btn-register center-block no_border_radius" value="Logowanie">
		</form> 
	</div>
</div> <!-- login_panel -->
<?php endif; ?>
			
<!-- news-panel -->
<div class="left_news_panel">
	<div role="tabpanel">
	<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active no_border_radius"><a href="#nowe" aria-controls="nowe" role="tab" data-toggle="tab">Najnowsze</a></li>
			<li role="presentation" class="no_border_radius"><a href="#najpopularniejsze" aria-controls="rozpatrzone" role="tab" data-toggle="tab">Najpopularniejsze</a></li>
		</ul>
	<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="nowe">
				<?php if(isset($data['newest_arts']) && !empty($data['newest_arts'])): ?>
				<?php foreach($data['newest_arts'] as $newar): ?>
				<div class="simply_recent">
					<div class="row no_space">
						<div class="col-lg-4">
							<a class="img_new_art" href="<?php echo base_url() . 'article/index/' . $newar['parent_page'] . '/' . $newar['id']; ?>"><img src="<?php echo base_url() . $newar['logo']; ?>" alt="<?php echo $newar['title']; ?>"></a>
						</div>
						<div class="col-lg-8">
							<div class="rc_right">	
								<div class="rc_right_title">
									<p>
										<a href="<?php echo base_url() . 'article/index/' . $newar['parent_page'] . '/' . $newar['id']; ?>">
											<?php echo $newar['title']; ?>
										</a>
									</p>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Kategoria" class="rc_right_cat">
									<?php $slashed = explode(',',$newar['category']);
									foreach($slashed as $slash)
									{
										echo '<p><a title="' . $slash . '" href="' . base_url() . 'search/category_menager/' . str_replace(' ','',$slash) . '" >' . $slash . '</a></p>';
									}  
									?>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Wyświetlenia" class="rc_right_views">
									<p><?php echo $newar['views']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php endforeach; ?>
				<?php endif; ?>	
			</div>
			<div role="tabpanel" class="tab-pane" id="najpopularniejsze">
				<?php if(isset($data['popular_arts']) && !empty($data['popular_arts'])): ?>
				<?php foreach($data['popular_arts'] as $popar): ?>
				<div class="simply_recent">
					<div class="row no_space">
						<div class="col-lg-4">
							<a class="img_new_art" href="<?php echo base_url() . 'article/index/' . $popar['parent_page'] . '/' . $popar['id']; ?>"><img src="<?php echo base_url() . $popar['logo']; ?>" alt="<?php echo $popar['title']; ?>"></a>
						</div>
						<div class="col-lg-8">
							<div class="rc_right">	
								<div class="rc_right_title">
									<p>
										<a href="<?php echo base_url() . 'article/index/' . $popar['parent_page'] . '/' . $popar['id']; ?>">
											<?php echo $popar['title']; ?>
										</a>
									</p>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Kategoria" class="rc_right_cat">
									<?php $slashed = explode(',',$popar['category']);
									foreach($slashed as $slash)
									{
										echo '<p>'. $slash .'</p>';
									}  
									?>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Wyświetlenia" class="rc_right_views">
									<p><?php echo $popar['views']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php endforeach; ?>
				<?php endif; ?> 
			</div>
		</div> <!-- tabpanel -->
	</div> <!-- news-panel -->
</div>
<?php if(!isset($data['home_content'])): ?>
	<div class="facebook_panel">
		<div class="fb_header">
			<p class="text-center">Facebook</p>
		</div>
		<div class="fb-like-box" data-href="<?php echo $data['cmscfg']['fb_link']; ?>" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="270"></div>
	</div>
<?php endif; ?>	