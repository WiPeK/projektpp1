<div class="simple_page_template">
	<div class="page_title">
		<h2><?php echo $data['page']['title']; ?></h2>
	</div>
	<div class="page_body">
		<?php echo $data['page']['body']; ?>
	</div>	
	<div class="page_views">
		<p>Wyświetlenia: <span><?php echo $data['page']['views']; ?></span></p>
	</div>
</div>


 	<?php //if($page->logo != 0 || $page->logo != null || $page->logo != '' || $page->logo == ' '): ?>
 		<!-- <img src="<?php //echo site_url() . $page->logo; ?>" alt="" class="logo_edit"> -->
 	<?php //endif; ?>	 

