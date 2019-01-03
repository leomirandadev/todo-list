<?php

/**
 * User Class Doc Comment
 *
 * @category Class
 * @package  User
 * @author   Leonardo <leoamiranda2@gmail.com>
 *
 */

namespace Models;
use DataManager\DataCenter;

class User{

	use DataCenter;
	
	private $name;
	private $nameError = false;
	private $email;
	private $emailError = false;
	private $password;
	private $passwordError = false;
	// last error from functions
	public $lastError = "";

	/**
	 * __construct
	 *
	 * @param  mixed $argName
	 * @param  mixed $argEmail
	 * @param  mixed $argPassword
	 *
	 * @return void
	 */
	function __construct( $argName, $argEmail, $argPassword ) {
		// set table from DataBase
		$this->table = "user";
		
		// check errors
		$this->nameError = $this->checkAttrError( $argName );
		$this->emailError = $this->checkAttrError( $argEmail );
		$this->passwordError = $this->checkAttrError( $argPassword );
		
		// setAttr
		$this->name = !$this->nameError ? $argName : "";
		$this->email = !$this->emailError ? $argEmail : "";
		$this->password = !$this->passwordError ? $argPassword : "";

	}

//========================================================================================================
//                                              CHECK
//========================================================================================================


	/**
	 * checkAttrError
	 *
	 * @param  mixed $attr
	 *
	 * @return void
	 */
	function checkAttrError( $attr ) {
		if ( isset( $attr ) && !empty( $attr ) ){
			return false;
		}
		return true;
	}


//========================================================================================================
//                                              READ
//========================================================================================================
	
	/**
	 * login
	 *
	 * @return void
	 */
	public function login() {

		if ( !$this->emailError && !$this->passwordError ) {
		
			$cryptPassword =  md5( $this->password );
			$this->condition = array( "email" => $this->email );
			$user = $this->GetBy();

			if (!$user){
				$this->lastError = "Usuario nao encontrado";
				return false;
			} 

			$user = (object) $user[0];

			if( $user->password != $cryptPassword ){				
				$this->lastError = "Senha errada.";
				return false;
			}

			session_start();
			$_SESSION['user'] = $user->id;

			return true;

		}

		$this->lastError = "E-mail e senha nao foram fornecidos corretamente.";
		return false;
	}


}
?>