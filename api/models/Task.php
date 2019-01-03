<?php

/**
 * Task Class Doc Comment
 *
 * @category Class
 * @package  Task
 * @author   Leonardo <leoamiranda2@gmail.com>
 *
 */

namespace Models;
use DataManager\DataCenter, utf8Converter\utf8Converter;

class Task{

	use DataCenter, utf8Converter;
	
	public $id_user;
	public $title;
	public $description;
	public $id_status;
	public $created_on;
	public $removed_on;
	public $finished_on;
	// last error from functions
	public $lastError = "";
	// output from functions
	public $output = "";

	function __construct() {
		// set table from DataBase
		$this->table = "task";
	}

//========================================================================================================
//                                              GET TODAY DATE
//========================================================================================================
	
	private function getTodayDate() {		
		date_default_timezone_set("America/Sao_Paulo");
		return date('Y-m-d');
	}


//========================================================================================================
//                                              CREATE
//========================================================================================================
	
	/**
	 * login
	 *
	 * @return void
	 */
	public function new() {
		if( !isset($this->title) && empty($this->title) &&
			!isset($this->id_user) && empty($this->id_user) &&
			!isset($this->description) ){
			$lastError = array( 'description' => "Nao setada" ,
				'title' => "Nao setado ou vazio" );
			return false;
		}
		
		$this->id_status = 1; // this is Id from "ativo" on dataBase		
		$this->data = array(
			"title" => $this->title,
			"description" => $this->description,
			"id_user" => $this->id_user,
			"id_status" => $this->id_status
		);
		$idInserido = $this->Insert();

		if(!$idInserido){
			$lastError = "Ocorreu um erro ao inserir a task no banco de dados";
			return false;	
		}
		return true;
	}


//========================================================================================================
//                                              READ
//========================================================================================================


	/**
	 * getAll
	 *
	 * @return void
	 */
	public function getByStatus() {
		if ( !isset($this->id_status) && empty($this->id_status)&&
			!isset($this->id_user) && empty($this->id_user)	) {
			$lastError = array( 
				'id_status' => "Nao setado ou vazio",
				'id_user' => "Nao setado ou vazio"
			);
			return false;
		}

		$this->condition = array( "id_status" => $this->id_status,
			"id_user" => $this->id_user	);	
		$tasks = $this->GetBy();

		if ( !$tasks ) return false;
		$this->output = $this->utf8_converter( $tasks );
		return true;
	}


	/**
	 * getById
	 *
	 * @return void
	 */
	public function getById($id) {
		if ( !isset($id) && empty($id) ) {
			$lastError = "ID da task nao foi informado";
			return false;
		}

		$this->condition = array( "id" => $id );
		$task = $this->GetBy();

		if ( !$task ) return false;
		$this->output = $this->utf8_converter( $task[0] );
		return true;
	}


//========================================================================================================
//                                              UPDATE
//========================================================================================================


	/**
	 * change
	 *
	 * @return void
	 */
	public function change($id) {
		if(!isset($id) && empty($id) && !isset($this->title)
			&& empty($this->title) && !isset($this->description) ) {
			
			$lastError = array( 'id' => "Nao setada ou vazia",
				'description' => "Nao setada", 'title' => "Nao setado ou vazio"	);
			return false;
		}
		
		$this->id_status = 1; // this is Id from "ativo" on dataBase		
		$this->data = array( "title" => $this->title, "description" => $this->description,
			"id_status" => $this->id_status	); // data to update
		$this->condition = array( "id" => $id ); 
		$udapted = $this->Update();

		if(!$udapted){
			$lastError = "Ocorreu um erro ao inserir a task no banco de dados";
			return false;	
		}
		return true;
	}


	/**
	 * finished
	 *
	 * @return void
	 */
	public function finish($id) {
		if ( !isset($id) && empty($id) ) {
			$lastError = "ID da task nao foi informado";
			return false;
		}

		$this->finished_on = $this->getTodayDate();
		$this->id_status = 2;
		$this->data = array( "finished_on" => $this->finished_on, "id_status" => $this->id_status );
		$this->condition = array( "id" => $id ); 
		$udapted = $this->Update();

		if(!$udapted){
			$lastError = "Ocorreu um erro ao alterar a task no banco de dados";
			return false;	
		}
		return true;
	}
	
	
	/**
	 * notFinish
	 *
	 * @return void
	 */
	public function restart($id) {
		if ( !isset($id) && empty($id) ) {
			$lastError = "ID da task nao foi informado";
			return false;
		}

		$this->id_status = 1;
		$this->data = array( "finished_on" => null, "id_status" => $this->id_status );
		$this->condition = array( "id" => $id );
		$udapted = $this->Update();

		if(!$udapted){
			$lastError = "Ocorreu um erro ao alterar a task no banco de dados";
			return false;	
		}
		return true;
	}
	
	
	/**
	 * remove
	 *
	 * @return void
	 */
	public function remove($id) {
		if ( !isset($id) && empty($id) ) {
			$lastError = "ID da task nao foi informado";
			return false;
		}

		$this->removed_on = $this->getTodayDate();
		$this->data = array( "removed_on" => $this->removed_on );
		$this->condition = array( "id" => $id );
		$udapted = $this->Update();

		if(!$udapted){
			$lastError = "Ocorreu um erro ao alterar a task no banco de dados";
			return false;	
		}
		return true;
	}


}
?>