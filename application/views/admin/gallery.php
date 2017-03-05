<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">		
		<div id="upload">
			<h3>Zuploaduj zdjęcie</h3>
			<form action="<?php echo base_url() . 'admin_gallery/do_upload'; ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-2">
					<p class="pull-right">Tytuł obrazka:</p>
				</div>
				<div class="col-lg-4">
					<input type="text" name="img_title" required>
				</div>
				<div class="col-lg-2">
					<p class="pull-right">Wybierz plik:</p> 
				</div>
				<div class="col-lg-4">
					<input type="file" name="userfile" class="input_file">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<input type="submit" name="submit" value="Upload" class="btn_upload">
				</div>
			</div>
			</form>				
		</div>

		<div id="gallery">
			<div class="row row_gallery">
				<?php if(isset($data['images']) && count($data['images'])):  
					foreach($data['images'] as $image): ?>
					<div class="col-lg-2">	
						<div class="img_a">
							<a class="" href="<?php echo $image['img_url']; ?>">
								<img src="<?php echo $image['img_url']; ?>" alt="">
							<span><?php echo btn_delete('admin_gallery/delete_image/' . $image['id']); ?></span><br>
							</a> 
						</div>
					</div>
				<?php endforeach; else: ?>
					<div id="blank_gallery">Brak obrazów</div>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</div>

