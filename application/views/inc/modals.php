<div class="modal fade bs-example-modal-lg" id="modal_support" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Support</h4>
      </div>
      <div class="modal-body">
      	<form action="<?php echo base_url() . 'support' ?>" method="post">
	<table class="table">
		<tr>
			<td>Twój email:</td>
			<td>
				<input type="text" name="email_support">
			</td>
		</tr>

		<tr>
			<td>Treść zgłoszenia:</td>
			<td>
				<textarea name="support_body" id="" cols="30" rows="10"></textarea>
			</td>
		</tr>
	</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        <input type="submit" name="submit" value="Wyślij zgłoszenie" class="btn btn-primary">
		</form>
      </div>
    </div>
  </div>
</div>