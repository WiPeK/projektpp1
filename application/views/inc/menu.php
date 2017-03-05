<div class="row menu">
	<div class="col-lg-12">
		<nav class="navbar menu_container" role="navigation">
			<div class="container-fluid menu_lp">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	              </button>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 menu_jq">
	              	<?php 
	              		echo get_menu($data['menu']); 
	              	?>
	              	<form action="<?php echo base_url() . 'search/results' ?>" method="post" role="search" class="navbar-form navbar-left pull-right search_bar">
						<div class="form-group">
							<input type="text" name="search_input" placeholder="Search" class="form-control no_radius_input">
						</div>
						<button type="submit" name="submit" class="btn btn-default no_border_radius">
					        <div class="menu_search">
		              			<span class="glyphicon glyphicon-search pull-right search_ic"></span>	
		              		</div>
					    </button>
	              	</form>
					
					<!-- <form class="navbar-form navbar-left pull-right search_bar" role="search">
				        <div class="form-group">
				          	<input type="text" class="form-control no_radius_input" placeholder="Search">
				        </div>
				        <button type="submit" class="btn btn-default no_border_radius">
				        	<div class="menu_search">
	              				<span class="glyphicon glyphicon-search pull-right search_ic"></span>	
	              			</div>
				        </button>
				      </form> -->
	            </div><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </nav>
	</div>    
</div>