	<script src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
	<!--Bootstrap Datepicker-->
	<script src="<?php echo base_url() . 'assets/js/bootstrap-datepicker.js'; ?>"></script>

	<script src="<?php echo base_url() . 'assets/js/admin_functions.js'; ?>"></script>

	<script src="<?php echo base_url() . 'assets/ckeditor/ckeditor.js'; ?>"></script>
	<script>
		CKEDITOR.replace('ckeditor');
	</script>
	<script>
		jQuery(document).ready(function(){
			$(".nav-adm").height($(document).height());
		});
		
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
		$(function () {
  			$('[data-toggle="popover"]').popover()
		})
	</script>
</body>
</html>