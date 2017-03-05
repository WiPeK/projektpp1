<div class="row no_space">
	<div class="col-lg-10 col-lg-offset-1">
			<?php if($data['pagination']): ?>
				<?php echo $data['pagination']; ?>
			<?php endif; ?>	

			<section>
				<h2>Użytkownicy</h2>
				<a href="<?php echo base_url() . 'admin_user/edit'; ?>">
					<button class="btn btn-default add_user_bt">
						<i class="glyphicon glyphicon-plus"></i> Dodaj użytkownika
					</button>
				</a>				
				<table class="table table_hover">
					<thead>
						<tr>
							<th>Login</th>
							<th>Email</th>
							<th>Data stworzenia</th>
							<th>Ostatnie logowanie</th>
							<th>Edytuj</th>
							<th>Usuń</th>
						</tr>
					</thead>
					<tbody>
			<?php if(count($data['users'])): foreach($data['users'] as $user): ?>	
					<tr>
						<td>
							<a href="<?php echo base_url() . 'admin_user/edit/' . $user['id']; ?>">
								<?php echo $user['login']; ?>
							</a>
						</td>
						<td><?php echo $user['email']; ?></td>			
						<td><?php echo $user['create_date']; ?></td>
						<td><?php echo $user['last_login']; ?></td>
						<td><?php echo btn_edit('admin_user/edit/' . $user['id']); ?></td>
						<td><?php echo btn_delete('admin_user/delete/' . $user['id']); ?></td>
					</tr>
			<?php endforeach; ?>
			<?php else: ?>
					<tr>
						<td colspan="3">Nie można znaleźć żadnego użytkownika.</td>
					</tr>
			<?php endif; ?>	
					</tbody>
				</table>
			</section>
	</div>
</div>
