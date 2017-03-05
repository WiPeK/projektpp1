<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">		
		<div id="upload">
			<h3>Zuploaduj plik</h3>
			<form action="<?php echo base_url() . 'admin_manage_files/do_upload'; ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-2">
					<p class="pull-right">Tytuł pliku:</p>
				</div>
				<div class="col-lg-4">
					<input type="text" name="file_title" value="<?php echo isset($_POST['file_title']) ? $_POST['file_title'] : ''; ?>" required>
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
					<input type="submit" name="upload" value="Upload" class="btn_upload">
				</div>
			</div>
			</form>			
		</div>

		<section>
			<table class="table table_hover">
				<thead>
					<tr>
						<th>Plik</th>
						<th>Dodany przez</th>
						<th>Data dodania</th>
						<th>Rozmiar</th>
						<th>Pobierz</th>
						<th>Usuń</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($data['files'])): foreach($data['files'] as $file): ?>
						<tr>
							<td>
								<?php echo $file['file_title'] . '.' . $file['extension']; ?>
							</td>
							<td>
								<?php echo $file['file_who_add']; ?>
							</td>
							<td>
								<?php echo $file['add_date']; ?>
							</td>
							<td>
								<?php echo round($file['file_size']/1024,2) . ' Kb'; ?>
							</td>
							<td>
								<a class="center-block text-center" href="<?php echo base_url() . 'download_menager/index/' . $file['hash']; ?>">
									<i class="glyphicon glyphicon-download-alt"></i>
								</a>
							</td>
							<td>
								<?php echo btn_delete(base_url() . 'admin_manage_files/delete/' . $file['hash']); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td class="col-lg-3">Nie znaleziono żadnego pliku</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</section>
	</div>
</div>

