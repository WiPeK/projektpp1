<footer>
		<div class="row">
			<div class="footer_container">
				<div class="col-lg-3">
					<div class="about_ft">
						<div class="head_item_ft center-block">
							O serwisie
						</div>
						<div class="body_about_ft">
							<p>
								<?php echo e($data['cmscfg']['about']); ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="tags_ft">
						<div class="head_item_ft center-block">
							Tagi
						</div>
						<div class="body_tags_ft">
						<?php
							if(isset($data['tags_data']) && !empty($data['tags_data']))
							{
								foreach($data['tags_data'] as $tags)
								{
									$tagss = explode(',',$tags);
									foreach($tagss as $tag)
									{
										echo '<p><a href="' . base_url() . 'search/tags_menager/' . str_replace(' ','',$tag) . '">' . $tag . '</a></p>';
									}
								}	
							} 
						?>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="recent_ft">
						<div class="head_item_ft center-block">
							Zgłoszenia
						</div>
						<div class="body_recent_ft">
							<div class="simply_recent_ft">
					        	<div class="rc_right_ft">	
						        	<div class="rc_right_title_ft">
						        		<p>Aby napisać do nas zgłoszenie kliknij w poniższy przycisk.</p>
						        		<button type="button" class="btn btn-default btn-lg no_border_radius center-block btn_support" data-toggle="modal" data-target="#modal_support">Kontakt</button>
						        	</div>
						        </div>
					        </div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="gallery_ft">
						<div class="head_item_ft center-block">
							Losowe zdjęcia
						</div>
						<div class="body_gallery_ft">
							<?php
								if(isset($data['fimages']) && !empty($data['fimages']))
								{
									foreach($data['fimages'] as $fimg)
									{
										echo '<a href="' . base_url() . 'home/galeria"><img src="' . base_url() . $fimg . '"></a>';
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
			<hr class="footer_hr">
			<div class="footer_copyright">
				<div class="row">
					<div class="col-lg-4">
						<p class="ft_lf">
						© 2016 WiPeK. All Right Reserved. Created by WiPeK
						</p>
					</div>				
					<div class="col-lg-5 col-lg-offset-3">					
						<p class="ft_rg pull-right">Strona wygenerowana dnia <strong><?php echo date('Y-m-d H-i-s') ?></p>
					</div>
			</div>	
				</div>
	</footer>