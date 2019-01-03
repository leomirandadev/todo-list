<?php
	include_once(__DIR__."/vendor/autoload.php");
	use components\login\controller as login;
	//get the url
	$urlExtended = (isset($_GET['url'])) ? $_GET['url']:'';
	$urlArray = explode("/", $urlExtended);
	$page = $urlArray[0];
	session_start();
	
	if ( isset( $_SESSION['user'] ) ):
		switch ($page) {
			case 'home':
				$page = new login();
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