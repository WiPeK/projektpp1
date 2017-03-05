<div class="row no_space row_db">
	<div class="col-lg-12">
		<h2 class="text-center">Witaj w panelu administracyjnym</h2>
		<div class="bottom_space"></div>
		<div class="row no_space">
			<div class="col-lg-3">
				<div class="bar_stats">
					<div class="panel panel-default">
					  <div class="panel-body">
					    <i class="glyphicon glyphicon-user pull-left user_icon"></i>
					    <p class="count_us text-center">
					    	<?php echo $data['stats']['users']['users']; ?>
					    </p>
						<p class="bar_title text-center">Użytkowników</p>
					  </div>
					  <div class="panel-footer">
					  	<a href="<?php echo base_url() . 'admin_user'; ?>">
					  		<p class="sh_more">Zobacz więcej</p>
							<i class="glyphicon glyphicon-chevron-right sh_mr"></i>
					  	</a>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="bar_stats">
					<div class="panel panel-default">
					  <div class="panel-body">
					    <i class="glyphicon glyphicon-book pull-left page_icon"></i>
					    <p class="count_us text-center">
					    	<?php echo $data['stats']['pages']['pages']; ?>
					    </p>
						<p class="bar_title text-center">Dodanych stron</p>
					  </div>
					  <div class="panel-footer">
					  	<a href="<?php echo base_url() . 'admin_page'; ?>">
					  		<p class="sh_pg">Zobacz więcej</p>
							<i class="glyphicon glyphicon-chevron-right sh_pg"></i>
					  	</a>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="bar_stats">
					<div class="panel panel-default">
					  <div class="panel-body">
					    <i class="glyphicon glyphicon-credit-card pull-left article_icon"></i>
					    <p class="count_us text-center">
					    	<?php echo $data['stats']['articles']['articles']; ?>
					    </p>
						<p class="bar_title text-center">Artykułów</p>
					  </div>
					  <div class="panel-footer">
					  	<a href="<?php echo base_url() . 'admin_article'; ?>">
					  		<p class="sh_art">Zobacz więcej</p>
							<i class="glyphicon glyphicon-chevron-right sh_art"></i>
					  	</a>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="bar_stats">
					<div class="panel panel-default">
					  <div class="panel-body">
					    <i class="glyphicon glyphicon-exclamation-sign pull-left support_icon"></i>
					    <p class="count_us text-center">
					    	<?php echo $data['stats']['support']['support']; ?>
					    </p>
						<p class="bar_title text-center">Zgłoszeń</p>
					  </div>
					  <div class="panel-footer">
					  	<a href="<?php echo base_url() . 'admin_support'; ?>">
					  		<p class="sh_supp">Zobacz więcej</p>
							<i class="glyphicon glyphicon-chevron-right sh_supp"></i>
					  	</a>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row no_space">
	<div class="col-lg-12">
		<div class="row no_space">
			<div class="col-lg-6">
				<div id="charts_browser"></div>
			</div>
			<div class="col-lg-6">
				<div id="charts_system"></div>
			</div>			
		</div>
	</div>
	<div class="col-lg-12">
		
	</div>
</div>
<div class="bottom_space"></div>