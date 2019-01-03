<?php
	include_once(__DIR__."/vendor/autoload.php");
	use Components\login\controller as login,
		Components\home\controller as home;
	//get the url
	$urlExtended = (isset($_GET['url'])) ? $_GET['url']:'';
	$urlArray = explode("/", $urlExtended);
	$page = $urlArray[0];
	session_start();
	
	if ( isset( $_SESSION['user'] ) ):
		switch ($page) {
			case 'home':
				$page = new home();
			break;
			default:
				$page = new login();
			break;
		}
	else:
		$page = new login();
	endif;
	
	$page->render();
?>