<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $data['cmscfg']['name']; ?> </title>
	<link rel="stylesheet" href="<?php echo base_url() . 'css/style_admin.css'; ?> ">
	<link href="<?php echo base_url() . 'css/datepicker.css'; ?>" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/favicon.ico'; ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url() . 'assets/images/favicon.ico'; ?>" type="image/x-icon">

	<!-- jquery -->
	<script src="<?php echo base_url() . 'assets/js/jquery-latest.js'; ?>"></script>
	<?php if(isset($data['sortable']) && $data['sortable'] === TRUE): ?>
	<script src="<?php echo base_url() . 'assets/js/jquery-ui-1.9.1.custom.min.js'; ?>"></script>
	<script src="<?php echo base_url() . 'assets/js/jquery.mjs.nestedSortable.js'; ?>"></script>
	<?php endif; ?>
</head>
<body>