<?php
	class db{
		public $host   ='localhost';
		public $user   ='root';
		public $pass   ='';
		public $dbName ='ders_db';
		public $sql    ='';
		public $con;
		
		
		public function __construct(){
			$this->con = mysqli_connect($this->host,$this->user,$this->pass,$this->dbName);
			mysqli_set_charset($this->con,"utf8");
			if(!$this->con){
				die("Connection Fail" . mysqli_connect_error());
			}
		}
		
		function select($columName = null){
			$this->sql = "SELECT ";
			if($columName == null){
				$this->sql .= " * ";
			}else{
				$field ='';
				for($i=0; $i<count($columName); $i++){
					$field  .=$columName[$i].",";
				}
				$this->sql .= substr($field, 0,-1);
				
			}
			
		}
		function from($tableName){
			$this->sql .= " FROM ".$tableName;
		}
		//user_id=? and user_name=?
		function where($string,$value){
			$this->sql .= " WHERE ";
			$stringParts = explode("?", $string);
			for($i =0 ;$i<count($value);$i++){
				$this->sql .= " ".$stringParts[$i]." '".$value[$i]."' ";
			}
			
		}
		
		function insert($values, $tableName){
			$this->sql = "INSERT INTO ".$tableName." ";
			$field = '';
			$value = '';
			foreach($values as $columName => $deger){
				$field .= $columName.",";
				$value .= "'".$deger."' ,";
			}
			$fieldName = substr($field, 0,-1);
			$val       = substr($value, 0,-1);
			$this->sql .= " (".$fieldName.") VALUES (".$val.")";
		}
		function delete(){
			$this->sql = "DELETE";
		}
		function update($values, $tableName){
			$this->sql = "UPDATE  ".$tableName." SET ";
			
			foreach($values as $columName => $deger){
				$this->sql .= $columName."='".$deger."',";
			}
			$this->sql = substr($this->sql, 0,-1);
		}
		function setSql($sorgu){
			$this->sql = $sorgu;
		}
		function query(){
			return mysqli_query($this->con,  $this->sql);
		}
		function fetchAllArray(){
			$result = mysqli_query($this->con,  $this->sql);
			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		}
		function fetchOneArray(){
			$result = mysqli_query($this->con,$this->sql);
			return mysqli_fetch_assoc($result);
		}
	}

?>