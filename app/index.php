<?php
	include_once(__DIR__."/vendor/autoload.php");
	use Components\login\controller as login,
		Components\home\controller as home,
		Components\edit\controller as edit;
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
			case 'edit':
				if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
					$page = new edit( $_GET['id'] );
				}else{
					$page = new home();
					echo $_GET['id'];
				}
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