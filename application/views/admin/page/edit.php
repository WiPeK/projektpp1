<div class="row edit_data no_space">
	<div class="col-lg-12">
		<h3><?php echo empty($data['page']['id']) ? 'Dodawanie nowej strony' : 'Edycja strony ' . $data['page']['title']; ?></h3>
		<?php if(!empty($data['page']['id'])): ?>
			<form action="<?php echo base_url() . 'admin_page/edit/' . $data['page']['id']; ?>" method="post">
		<?php else: ?>
			<form action="<?php echo base_url() . 'admin_page/edit/'; ?>" method="post">
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Strona nadrzędna</p>
			</div>
			<div class="col-lg-4">
				<select name="parent_id" class="input_wp">
					<?php $i = 0; foreach($data['pages_no_parents'] as $pnp): ?>
						<?php if((isset($_POST['parent_id']) && $_POST['parent_id'] === $pnp) || $data['page']['parent_id'] === $pnp): ?>
							<option value="<?php echo $i; ?>" selected="selected"><?php echo $pnp; ?></option>
						<?php else: ?>
							<option value="<?php echo $i; ?>"><?php echo $pnp; ?></option>
						<?php endif; $i++; ?>
					<?php endforeach; ?>
				</select>
				<i class="glyphicon glyphicon-question-sign"  data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Aby chcesz aby ta strona była podstroną wybierz strone 'rodzica'."></i>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Szablon</p>
			</div>
			<div class="col-lg-4">
				<select name="template" class="input_wp">
					<?php if((isset($_POST['template']) && $_POST['template'] === 'page') || $data['page']['template'] === 'page'): ?>
						<option value="page" selected="selected">Page</option>
						<option value="news_archive">News archive</option>
					<?php elseif((isset($_POST['template']) && $_POST['template'] === 'news_archive') || $data['page']['template'] === 'news_archive'): ?>
						<option value="page">Page</option>
						<option value="news_archive" selected="selected">News archive</option>
					<?php endif; ?>
				</select>

				<i class="glyphicon glyphicon-question-sign" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Wybierz typ strony: zwykła strona lub strona zawierająca artykuły."></i>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Tytuł</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="title" class="input_wp" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $data['page']['title']; ?>" required>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Alias</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="slug" class="input_wp" value="<?php echo isset($_POST['slug']) ? $_POST['slug'] : $data['page']['slug']; ?>" required>
				<i class="glyphicon glyphicon-question-sign" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Nazwa strony jaka będzie wyświetlana w pasku adresu."></i>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
				<p>Treść</p>
			</div>
			<div class="col-lg-12">
				<textarea id="ckeditor" name="body"><?php echo isset($_POST['body']) ? $_POST['body'] : $data['page']['body']; ?></textarea>
			</div>
		</div>	
		
		<div class="row">
			<div class="col-lg-12">
				<input type="submit" value="Zapisz" name="submit" class="btn btn-primary btn-lg btn-block btn_save_data">
			</div>
		</div>
		</form>
	</div>
</div>
<div class="bottom_space"></div>

