<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="row answer_block">
			<div class="col-lg-2">
				<p class="pull-right">Od:</p>
			</div>
			<div class="col-lg-10">
				<?php echo $data['support']['email']; ?>
			</div>
		</div>
		<div class="row answer_block">
			<div class="col-lg-2">
				<p class="pull-right">Treść:</p>
			</div>
			<div class="col-lg-10">
				<?php echo $data['support']['body']; ?>
			</div>
		</div>
		<form action="<?php echo base_url() . 'admin_support/answer/' . $data['support']['id']; ?>" method="post">
			<div class="row">
				<div class="col-lg-12">
					<p>Treść odpowiedzi:</p>
				</div>
				<div class="col-lg-12">
					<textarea name="answer_body" id="ckeditor" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<input type="submit" class="btn btn-primary btn_save_data btn-block" value="Wyślij odpowiedź" name="submit">
				</div>
			</div>
		</form>	
		<div class="bottom_space"></div>
	</div>
</div>