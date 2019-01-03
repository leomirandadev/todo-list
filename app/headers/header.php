<!-- importa as configurações da página -->
<?php 
	$config = json_decode(file_get_contents('json/config.json'));
	// reescrevendo caso haja mais parâmetros sendo enviados pela URL
	$config->urlLogo = $config->urlLogo;
	$config->urlLogoEmblema = $config->urlLogoEmblema;
	$config->urlLogoIcon = $config->urlLogoIcon;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$pagina?> | <?=$config->title?></title>
	<!-- Icone navegador -->
	<link rel="shortcut icon" href="<?=$config->urlLogoIcon?>" >
	<!-- meta tags -->
	<meta name="description" content="<?=$config->desc?>">
	<meta name="keywords" content="">
	<meta name="author" content="<?=$config->title?>">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="<?=$config->urlLogo?>" >
	<meta property="og:image:type" content="image/png">
	<meta name="description" content="<?=$config->desc?>">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- Fonts externo -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet"> 
	<!-- JQuery e Bootstrap -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src='js/bootstrap.js'></script>
</head>
<!-- recursos de design -->
<link rel="stylesheet" href="css/animate.css">

<!-- importa banco de mensagens pré-configuradas -->
<?php $msg = json_decode(file_get_contents('json/msgs.json')); ?>
<script type="text/javascript">
	msg = "";	$.getJSON('json/msgs.json', function(data){msg = data;}); 
</script>
<script type="text/javascript" src="js/ajax.js"></script>
					
<!-- LOADER -->
<div class="loader"><div class="loader-icon"></div></div>