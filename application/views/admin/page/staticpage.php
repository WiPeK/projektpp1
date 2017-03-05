<div class="row edit_data no_space">
	<div class="col-lg-12">
		<h3>Dodawanie nowej strony statycznej</h3>		
		<form action="<?php echo base_url() . 'admin_page/staticpage'; ?>" method=
		"post">
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
		</div>
		
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Tytuł</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="title" class="input_wp" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>" required>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Alias</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="slug" class="input_wp" value="<?php echo isset($_POST['slug']) ? $_POST['slug'] : ''; ?>" required>
				<i class="glyphicon glyphicon-question-sign" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Nazwa strony jaka będzie wyświetlana w pasku adresu."></i>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<p class="pull-right">Ładowanie domyślnego headera i stopki</p>
			</div>
			<div class="col-lg-1">
				<input type="checkbox" name="headnfoot" value="1" checked>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Ścieżka do strony</p>
			</div>
			<div class="col-lg-4">
				<input type="text" name="pageadress" class="input_wp" value="<?php echo isset($_POST['pageadress']) ? $_POST['pageadress'] : ''; ?>" required>
				<i class="glyphicon glyphicon-question-sign" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Niezbędne do prawidłowego ładowania twojej strony statycznej. Pliki strony muszą się znajdować w folderze application/views/static/. Podaj nazwe pliku strony bez rozszerzenia."></i>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5">
				<input type="submit" value="Zapisz" name="submit" class="btn btn-primary btn-lg btn-block btn_save_data">
			</div>
		</div>
		</form>
	</div>
</div>

