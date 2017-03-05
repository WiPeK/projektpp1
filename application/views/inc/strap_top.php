<div class="row pasek_top">		
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 left_data_top">
		<?php echo 'Witaj na ' . $data['cmscfg']['name'] . '. Twoje ip to: ' . $_SERVER['REMOTE_ADDR']; ?>
	</div>
	<div class="col-lg-2 col-lg-offset-2 col-md-2 col-sm-2 col-xs-12 data_top">
		<div class="pull-right">
			<?php echo dateV('l j f Y',strtotime(date('Y-m-d'))); ?>
		</div>
	</div>
</div>