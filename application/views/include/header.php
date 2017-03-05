<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Keywords" content="<?php echo $data['cmscfg']['keywords']; ?>" />
	<meta name="Author" content="Krzysztof Adamczyk" />
	<meta name="Description" content="<?php echo $data['cmscfg']['description']; ?>" />
	<meta name="Robots" content="Index, Follow" />
	<title><?php echo $data['cmscfg']['name']; ?></title>
	<link rel="stylesheet" href="<?php echo base_url() . 'css/style.css'; ?> ">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
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
	<!-- bootstrap js -->
	<script src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
	<!-- frontend function -->
	<script src="<?php echo base_url() . 'assets/js/frontend_function.js'; ?>"></script>
	<!-- menu js -->
	<script src="<?php echo base_url() . 'assets/js/menu.js'; ?>"></script>
	<script src="<?php echo base_url() . 'assets/js/holder.js'; ?>"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
</head>
<body>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
      appId      : '1545214289054555',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'pl'}
</script>