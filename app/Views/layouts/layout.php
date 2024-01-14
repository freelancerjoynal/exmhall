<!DOCTYPE html>  
<html lang="en">
  
<head>
	<title> <?php echo $site_details['app_full_name'];?> </title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keyword" content="">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="<?php echo base_url('public/assets/frontend')?>/images/fav.ico" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="<?php echo base_url('public/assets/frontend')?>/css/font-awesome.min.css">
	<!-- ALL CSS FILES -->
	<link href="<?php echo base_url('public/assets/frontend')?>/css/materialize.css" rel="stylesheet">
	<link href="<?php echo base_url('public/assets/frontend')?>/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo base_url('public/assets/frontend')?>/css/style.css" rel="stylesheet" />
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="<?php echo base_url('public/assets/frontend')?>/css/style-mob.css" rel="stylesheet" />
</head>
<body>
	
	
<script>
	var baseURL = '<?php echo base_url()?>/';
	var noImageSrc = '<?php echo base_url("public/assets/images/no-product-image.png")?>';
</script>

<!------	Header	---->
<?php if($header) echo $header;?>
<?php if($content) echo $content;?>
<?php if($footer) echo $footer;?>



    <!--Import jQuery before materialize.js-->
    <script src="<?php echo base_url('public/assets/frontend')?>/js/main.min.js"></script>
    <script src="<?php echo base_url('public/assets/frontend')?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('public/assets/frontend')?>/js/materialize.min.js"></script>
    <script src="<?php echo base_url('public/assets/frontend')?>/js/custom.js"></script>
    <script src="<?php echo base_url('public/assets/frontend')?>/js/common.js"></script>
</body>

</html>