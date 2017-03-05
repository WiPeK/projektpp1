<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="row">
			<div class="col-lg-6">
				<h3><?php echo empty($data['user']['id']) ? 'Dodaj nowego użytkownika:' : 'Edycja użytkownika: ' . $data['user']['login']; ?></h3>
			</div>
		</div>
		<?php if(!empty($data['user']['id'])): ?>	
		<form action="<?php echo base_url() . 'admin_user/edit/' . $data['user']['id'] ?>" method="post">
		<?php else: ?>
			<form action="<?php echo base_url() . 'admin_user/edit/'; ?>" method="post">
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-2">
				<p>Login:</p>
			</div>
			<div class="col-lg-3">
				<input type="text" name="login" value="<?php echo isset($_POST['login']) ? $_POST['login'] : $data['user']['login']; ?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Email:</p>
			</div>
			<div class="col-lg-3">
				<input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $data['user']['email']; ?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Hasło:</p>
			</div>
			<div class="col-lg-3">
				<input type="password" name="password">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Powtórz hasło:</p>
			</div>
			<div class="col-lg-3">
				<input type="password" name="password_c">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Administrator:</p>
			</div>
			<div class="col-lg-3">
				<?php if($data['user']['mods'] === 'admin'): ?>
					<input type="checkbox" name="mods" checked>
				<?php else: ?>
					<input type="checkbox" name="mods">
				<?php endif; ?>		
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-5">
				<input type="submit" name="submit" value="Zapisz" class="btn btn-primary save_bt"></div>
		</div>
		</form>
	</div>
</div>

