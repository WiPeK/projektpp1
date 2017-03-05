<div class="news_archive_template">
	<div class="articles_list">
		<h3 class="article_search">Wyniki</h3>
		<?php if (count($data['search_data'])): foreach ($data['search_data'] as $sr_data): ?>
			<div class="row">
 				<article>
 					<div class="col-lg-3">
 						<a class="a_articles_list" href="<?php echo base_url() . 'article/index/' . $sr_data['parent_page'] . '/' . $sr_data['id']; ?>">
 							<img src="<?php echo base_url() . $sr_data['logo']; ?>" alt="<?php echo $sr_data['title']; ?>">
 						</a>
 					</div>
 					<div class="col-lg-9 narticle_right">
 						<h2>
 							<a href="<?php echo base_url() . 'article/index/' . e($sr_data['parent_page']) . '/' . intval($sr_data['id']); ?>">
								<?php echo $sr_data['title']; ?>
 							</a>
 						</h2>
 						<p class="pubdate"><?php echo e($sr_data['pubdate']); ?></p>
 						<p><?php echo e(word_limiter(strip_tags($sr_data['body']), 50)); ?></p>
 						<p>
 							<a title="<?php echo $sr_data['title']; ?>" href="<?php echo base_url() . 'article/index/' . e($sr_data['parent_page']) . '/' . intval($sr_data['id']); ?>">
								Czytaj więcej...
 							</a>
 						</p>
 					</div>
 				</article>
 			</div><hr>
		<?php endforeach; else: ?>
			<div class="row">
				<article>
					<div class="col-lg-12">
						<p>Nie znaleziono pasujących wyników</p>
					</div>
				</article>
			</div>
		<?php endif; ?>	
	</div>
</div>
