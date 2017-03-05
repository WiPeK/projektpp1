<div class="row edit_data no_space">
	<div class="col-lg-12">
		<h3><?php echo empty($data['article']['id']) ? 'Dodaj artykuł' : 'Edycja artykułu ' . $data['article']['title']; ?></h3>

		<form action="<?php echo base_url() . 'admin_article/edit/' . get_segment(3); ?>" method="post" enctype="multipart/form-data">
		
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Logo artykułu</p>
			</div>
			<div class="col-lg-3">
				<?php //if((int)$data['article']['logo'] !== 0 || $data['article']['logo'] != null || $data['article']['logo'] != '' || $data['article']['logo'] == ' '): ?>

					<?php if(strlen($data['article']['logo']) > 2): ?>
					<div class="article_logo">
						<img src="<?php echo base_url() . $data['article']['logo']; ?>" alt="" class="logo_edit">
						<span>
							<a href="<?php echo base_url() . 'admin_article/deletelogo/' . $data['article']['id']; ?>" onclick="return confirm('Czy napewno chcesz usunąć logo? Wszystkie niezapisane edytowane elementy zostaną niezapisane. Zapisz edycję a następnie usuń logo. Czy nadal chcesz usunąć logo?');">
								<i class="glyphicon glyphicon-remove"></i>
							</a>
						</span>
						<input type="hidden" name="logo_exist" value="1">
					</div>
				<?php elseif($data['article']['logo'] == 0 || $data['article']['logo'] == null || $data['article']['logo'] == '' || $data['article']['logo'] == ' '): ?>
					<input type="file" name="article_logo" class="input_file">
				<?php endif; ?>	
			</div>
			<div class="col-lg-3 no_space">
				<p class="pull-right">Strona do której zostanie dodany artykuł</p>
			</div>
			<div class="col-lg-4">
				<select name="parent_page" class="input_wp">
					<?php foreach ($data['article_parent'] as $arpr): ?>
						<?php if ((isset($_POST['article_parent']) && $_POST['article_parent'] == $arpr) || ($arpr == $data['article']['parent_page'])): ?>
							<option value="<?php echo $arpr; ?>" selected="selected"><?php echo $arpr; ?></option>
						<?php else: ?>
							<option value="<?php echo $arpr; ?>"><?php echo $arpr; ?></option>
						<?php endif ?>
						
					<?php endforeach ?>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Data publikacji</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="pubdate" class="datepicker" value="<?php echo isset($_POST['pubdate']) ? $_POST['pubdate'] : $data['article']['pubdate']; ?>" required>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Tytuł</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $data['article']['title']; ?>" required>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Kategoria</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="category" value="<?php echo isset($_POST['category']) ? $_POST['category'] : $data['article']['category']; ?>" required>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Tagi</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="tags" value="<?php echo isset($_POST['tags']) ? $_POST['tags'] : $data['article']['tags']; ?>" required>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-2">
				<p>Treść</p>
			</div>
			<div class="col-lg-12">
				<textarea id="ckeditor" name="body"><?php echo isset($_POST['body']) ? $_POST['body'] : $data['article']['body']; ?></textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<input type="submit" name="submit" value="Zapisz" class="btn btn-primary btn-lg btn-block btn_save_data">
			</div>
		</div>	
		</form>
	</div>
</div>
<div class="bottom_space"></div>

<script>
$(function() {
	$('.datepicker').datepicker({ format : 'yyyy-mm-dd' });
});
</script>