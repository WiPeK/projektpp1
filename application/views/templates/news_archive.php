<div class="news_archive_template">
	<?php if($data['pagination']): ?>
		<div class="text-center">
			<?php echo $data['pagination']; ?>
		</div>
	<?php endif; ?>
	<div class="articles_list"> <?php //var_dump($data['articles']); ?>
		<?php if (count($data['articles'])): foreach ($data['articles'] as $article): ?>
			<div class="row">
 				<article>
 					<div class="col-lg-3">
 						<a class="a_articles_list" href="<?php echo base_url() . 'article/index/' . $article['parent_page'] . '/' . $article['id']; ?>">
 							<img src="<?php echo base_url() . $article['logo']; ?>" alt="<?php echo $article['title']; ?>">
 						</a>
 					</div>
 					<div class="col-lg-9 narticle_right">
 						<h2>
 							<a href="<?php echo base_url() . 'article/index/' . e($article['parent_page']) . '/' . intval($article['id']); ?>">
								<?php echo $article['title']; ?>
 							</a>
 						</h2>
 						<p class="pubdate"><?php echo e($article['pubdate']); ?></p>
 						<p><?php echo e(word_limiter(strip_tags($article['body']), 50)); ?></p>
 						<p>
 							<a title="<?php echo $article['title']; ?>" href="<?php echo base_url() . 'article/index/' . e($article['parent_page']) . intval($article['id']); ?>">
								Czytaj więcej...
 							</a>
 						</p>
 					</div>
 				</article>
 			</div><hr>
		<?php endforeach; endif; ?>
	</div>
	<?php if($data['pagination']): ?>
		<div class="text-center">
			<?php echo $data['pagination']; ?>
		</div>
	<?php endif; ?>
</div>
