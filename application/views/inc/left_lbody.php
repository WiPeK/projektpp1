<div class="col-lg-4 left_left_body">
	<div class="random_posts">
		<?php if(isset($data['random_arts']) && !empty($data['random_arts'])): ?>
		<div class="head_rp">
			Losowe artykuły
		</div>
			<?php foreach($data['random_arts'] as $rand_art): ?>
				<div class="simply_rrp">
					<a href="<?php echo base_url() . 'article/index/' . $rand_art['parent_page'] . '/' . $rand_art['id']; ?>">
						<img src="<?php echo base_url() . $rand_art['logo']; ?>" alt="<?php echo $rand_art['title']; ?>">
					</a>
						<div class="rrp_content">
							<div class="rrp_cat">
								<ul>
									<?php $rp_cat = explode(',',$rand_art['category']);
									foreach($rp_cat as $rpcat)
									{
										echo '<li><a title="' . $rpcat . '" href="' . base_url() . 'search/category_menager/' . str_replace(' ','',$rpcat) . '">'. $rpcat . '</a></li>';
									}
									?>
								</ul>
							</div>
							<div class="rrp_title">
								<a href="<?php echo base_url() . 'article/index/' . $rand_art['parent_page'] . '/' . $rand_art['id']; ?>">
									<?php echo $rand_art['title']; ?>
								</a>
							</div>
						</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="head_rp">
				Brak artykułów
			</div>	
		<?php endif; ?>
	</div>
	<div class="clearfix"></div>
	<div class="facebook_panel">
		<div class="fb_header">
			<p class="text-center">Facebook</p>
		</div>
		<div class="fb-like-box" data-href="<?php echo $data['cmscfg']['fb_link']; ?>" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="270"></div>
	</div>
</div>