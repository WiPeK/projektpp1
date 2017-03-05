<div class="col-lg-8 left_right_body">
	<?php if(isset($data['post_oad']) && !empty($data['post_oad'])): ?>
		<div class="post_of_a_day">
			<div class="head_poad">
				Artykuł dnia
			</div>
			<div class="row body_poad">			
				<div class="col-lg-6">
					<a href="<?php echo base_url() . 'article/index/' . $data['post_oad']['parent_page'] . '/' . $data['post_oad']['id']; ?>">
						<img src="<?php echo base_url() . $data['post_oad']['logo']; ?>" alt="<?php echo $data['post_oad']['title']; ?>">
			 		</a>			
				</div>
				<div class="col-lg-6 poad">
					<a href="<?php echo base_url() . 'article/index/' . $data['post_oad']['parent_page'] . '/' . $data['post_oad']['id']; ?>">
						<p class="title_poad"><?php echo $data['post_oad']['title']; ?></p>
			 		</a>
			 		<div class="clearfix"></div>

					<p class="pubdate_poad">
						<a href="<?php echo base_url() . 'search/date_menager/' . e($data['post_oad']['pubdate']); ?>">
							<?php echo $data['post_oad']['pubdate']; ?>
						</a>
					</p>


					<div class="clearfix"></div>
					<p class="tresc_poad">
						<?php echo word_limiter(strip_tags($data['post_oad']['body']), 30); ?>
					</p>
				</div>
			</div>
		</div>
	<?php endif; ?> <?php //var_dump($data['main_pages']); ?>
	<?php if(isset($data['main_pages']) && !empty($data['main_pages'])): ?>
	<?php foreach($data['main_pages'] as $m_page): ?>
	<div class="news_from_npages">
		<div class="head_nwfp">
			<?php echo $m_page['title'];?>
		</div>
		<div class="row">
			<?php if(isset($m_page['m_art']) && !empty($m_page['m_art'])): ?>
			<div class="col-lg-6">
				<div class="left_new">
					<a href="<?php echo base_url() . 'article/index/' . $m_page['m_art'][0]['parent_page'] . '/' . $m_page['m_art'][0]['id']; ?>">
						<img src="<?php echo base_url() . $m_page['m_art'][0]['logo']; ?>" alt="<?php echo $m_page['m_art'][0]['title']; ?>">
						<p class="title_nwfp"><?php echo $m_page['m_art'][0]['title']; ?></p>
					</a>

					<p class="pubdate_nwfp">
						<a title="<?php echo $m_page['m_art'][0]['pubdate']; ?>" href="<?php echo base_url() . 'search/date_menager/' . $m_page['m_art'][0]['pubdate']; ?>">
							<?php echo $m_page['m_art'][0]['pubdate']; ?>
						</a>
					</p>


					<p class="body_nwfp"><?php echo e(word_limiter(strip_tags($m_page['m_art'][0]['body']),10)); ?></p>
				</div>
			</div>


			<div class="col-lg-6">
				<?php if(isset($m_page['m_art'][1])): ?>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="<?php echo base_url() . 'article/index/' . $m_page['m_art'][1]['parent_page'] . '/' . $m_page['m_art'][1]['id']; ?>">
								<img src="<?php echo base_url() . $m_page['m_art'][1]['logo']; ?>" alt="<?php echo $m_page['m_art'][1]['title']; ?>">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">
								<a href="<?php echo base_url() . 'article/index/' . $m_page['m_art'][1]['parent_page'] . '/' . $m_page['m_art'][1]['id']; ?>">
									<?php echo $m_page['m_art'][1]['title']; ?>
								</a>
							</p>

							<p class="simple_nwfp_pubdate">
								<a title="<?php echo $m_page['m_art'][1]['pubdate']; ?>" href="<?php echo base_url() . 'search/date_menager/' . $m_page['m_art'][1]['pubdate']; ?>">
									<?php echo $m_page['m_art'][1]['pubdate']; ?>
								</a>
							</p>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php if(isset($m_page['m_art'][2])): ?>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="<?php echo base_url() . 'article/index/' . $m_page['m_art'][2]['parent_page'] . '/' . $m_page['m_art'][2]['id']; ?>">
								<img src="<?php echo base_url() . $m_page['m_art'][2]['logo']; ?>" alt="<?php echo $m_page['m_art'][2]['title']; ?>">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">
								<a href="<?php echo base_url() . 'article/index/' . $m_page['m_art'][2]['parent_page'] . '/' . $m_page['m_art'][2]['id']; ?>">
									<?php echo $m_page['m_art'][2]['title']; ?>
								</a>
							</p>

							<p class="simple_nwfp_pubdate">
								<a title="<?php echo $m_page['m_art'][2]['pubdate']; ?>" href="<?php echo base_url() . 'search/date_menager/' . $m_page['m_art'][2]['pubdate']; ?>">
									<?php echo $m_page['m_art'][2]['pubdate']; ?>
								</a>
							</p>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php if(isset($m_page['m_art'][3])): ?>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="<?php echo base_url() . 'article/index/' . $m_page['m_art'][3]['parent_page'] . '/' . $m_page['m_art'][3]['id']; ?>">
								<img src="<?php echo base_url() . $m_page['m_art'][3]['logo']; ?>" alt="<?php echo $m_page['m_art'][3]['title']; ?>">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">
								<a href="<?php echo base_url() . 'article/index/' . $m_page['m_art'][3]['parent_page'] . '/' . $m_page['m_art'][3]['id']; ?>">
									<?php echo $m_page['m_art'][3]['title']; ?>
								</a>
							</p>

							<p class="simple_nwfp_pubdate">
								<a title="<?php echo $m_page['m_art'][3]['pubdate']; ?>" href="<?php echo base_url() . 'search/date_menager/' . $m_page['m_art'][3]['pubdate']; ?>">
									<?php echo $m_page['m_art'][3]['pubdate']; ?>
								</a>
							</p>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>	
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>