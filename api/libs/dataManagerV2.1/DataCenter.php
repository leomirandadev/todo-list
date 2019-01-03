<?php  

/**
 * DataCenter Trait Doc Comment
 *
 * @category Trait
 * @package  DataCenter
 * @author   Leonardo <leoamiranda2@gmail.com>
 *
 */

namespace DataManager;
use \PDO;

trait DataCenter{

	protected $db = null;
	private $dsn = "mysql:dbname=supero_bd; host=localhost";
	private $user = 'root';
	private $pass = 'root';

	protected $table = null;
	public $data = array();
	public $condition = array();
	public $orderBy = null;
	public $errorDB = null;

	
	/**
	 * Open
	 *
	 * @return void
	 */
	protected function Open(){
		try{

			$options= array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			$this->db = new PDO($this->dsn, $this->user, $this->pass, $options);
			return $this->db;
		
		}catch (PDOException $e){

			echo 'Connection failed: '.$e->getMessage();

		}
	}


	/**
	 * Close
	 *
	 * @return void
	 */
	protected function Close(){
		$this->db = null;
		return true;
	}


	/**
	 * Insert
	 *
	 * @return void
	 */
	protected function Insert(){
		$this->Open();
		$conector = $this->db;
		$first = 0;
		$values = null;
		$camps = null;
		//camps to create
		foreach ($this->data as $camp => $value) {
			if($first==1){
				$camps.=",";
				$values.=",";
			}
			$camps .= $camp;
			$values .= "\"".$value."\"";
			$first=1;
		}
		$sql = "INSERT INTO $this->table ($camps) VALUES ($values)";
		//try to insert
		try{
			$conector->exec($sql);
			$this->Close();
			return $conector->lastInsertId();
		}catch (Exception $e) {
			$this->errorDB = $e;
			$this->Close();
			return FALSE;
		}
	}

	
	/**
	 * Update
	 *
	 * @return void
	 */
	protected function Update(){
		$this->Open();
		$conector = $this->db;
		$first = false;
		$camps = null;
		//camps to update
		foreach ($this->data as $camp => $value) {
			//para corrigir o erro de virgula e ponto transmitido pelo foreach
			$valueFloated = $this->isFloat($value);
			$value = !$valueFloated ? $value : $valueFloated ;
			if ($first)	$camps.=",";
			$camps .= $camp."=\"$value\"";
			$first = true;
		}
		$conditions = $this->conditionForeachEqual();
		$sql = "UPDATE $this->table SET $camps WHERE $conditions ";
		//try to update
		return $this->TryCatch($sql,$conector);
	}

	
	/**
	 * Delete
	 *
	 * @return void
	 */
	protected function Delete(){
		$this->Open();
		$conector = $this->db;
		$conditions = $this->conditionForeachEqual();

		$sql = "DELETE FROM $this->table WHERE $conditions ";
		//try to delete
		return $this->TryCatch($sql,$conector);
	}

	private function conditionForeachEqual(){
		$first = false;
		$conditions = null;
		
		foreach ($this->condition as $camp => $value) {
			if ($first) $conditions .= "AND";
			$first = true;
			$conditions .= " $this->table.$camp = \"$value\" ";
		}
		return $conditions;
	}
	
	private function conditionForeachLike(){
		$first = false;
		$conditions = null;
		
		foreach ($this->condition as $camp => $value) {
			if ($first) $conditions .= "AND";
			$first = true;
			$conditions .= " $this->table.$camp LIKE \"%$value%\" ";
		}
		return $conditions;
	}
	
	/**
	 * GetBy
	 *
	 * @return void
	 */
	protected function GetBy(){
		$this->Open();
		$conector = $this->db;
		$innerJoin = (isset($this->innerJoin)) ? "INNER JOIN ".$this->innerJoin['table']." ON $this->table.".$this->innerJoin["camps"][0]." = ".$this->innerJoin['table'].".".$this->innerJoin['camps'][1] : "";
		$anotherCamp = (isset($this->innerJoin)) ? $this->innerJoin['table'].".*," : "";
		$orderBySelected = (!empty($this->orderBy)) ? $this->orderBy : $this->table.".id";
		//conditions for selection 
		if($this->condition!="all"){
			$conditions = $this->conditionForeachEqual();
			$sql = "SELECT $anotherCamp $this->table.* FROM $this->table $innerJoin WHERE $conditions ORDER BY $orderBySelected DESC";
		}else{
			$sql = "SELECT $anotherCamp $this->table.* FROM $this->table $innerJoin ORDER BY $orderBySelected DESC";
		}
		return $this->Pesquisa($sql,$conector);
	}

	
	/**
	 * GetLike
	 *
	 * @return void
	 */
	protected function GetLike(){
		$this->Open();
		$conector = $this->db;
		$innerJoin = (isset($this->innerJoin)) ? "INNER JOIN ".$this->innerJoin['table']." ON $this->table.".$this->innerJoin["camps"][0]." = ".$this->innerJoin['table'].".".$this->innerJoin['camps'][1] : "";
		//conditions for selection 
		if($this->condition!="all"){
			$conditions = $this->conditionForeachLike();
			$sql = "SELECT * FROM $this->table $innerJoin WHERE $conditions ORDER BY $this->table.id DESC";
		}else{
			$sql = "SELECT * FROM $this->table $innerJoin ORDER BY $this->table.id DESC";
		}
		return $this->Pesquisa($sql,$conector);
	}


	/**
	 * Pesquisa
	 *
	 * @param  mixed $sql
	 * @param  mixed $conector
	 *
	 * @return void
	 */
	protected function Pesquisa($sql,$conector){
		$pesquisaSql = $conector->query($sql);
		$rows = $pesquisaSql->rowCount();

		if($rows<1){
			$this->Close();
			return FALSE;
		}
		$dados = $pesquisaSql->fetchAll();
		$this->Close();
		return $dados;
	}

	
	/**
	 * TryCatch
	 *
	 * @param  mixed $sql
	 * @param  mixed $conector
	 *
	 * @return void
	 */
	protected function TryCatch($sql,$conector){
		try{
			$conector->exec($sql);
			$this->Close();
			return true;
		}catch(Exception $e){
			$this->errorDB = $e;
			$this->Close();
			return false;
		}
	}

	
	/**
	 * isFloat
	 *
	 * @param  mixed $value
	 *
	 * @return void
	 */
	private function isFloat($value){
		$pos = strpos($value, ",");
		if($pos !== false){
			$x = explode (",", $value);
			if( !empty($x[0]) && is_numeric($x[0][-1]) && is_numeric($x[1][0]) ){
				return $value = $x[0].".".$x[1];
			}
		}
		return false;
	}

}