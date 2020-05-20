<?php
	class Database {
		private $con;
		private $dbhost="localhost";
		private $dbuser="id13468615_dbuser";
		private $dbpass="qP6=v(lRzbz1bh=o";
		private $dbname="id13468615_datacel";

		function __construct(){
			$this->connect_db();
		}
		
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión BD falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var) {
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}

		public function create($info) {
			$sql = "INSERT INTO `data` (info) VALUES ('$info')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			} else {
				return false;
			}
		}

		public function read() {
			$sql = "SELECT * FROM data";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id) {
			$sql = "SELECT * FROM data where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function update($info, $id) {
			$sql = "UPDATE data SET info='$info' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			} else {
				return false;
			}
		}

		public function delete($id) {
			$sql = "DELETE FROM data WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			} else {
				return false;
			}
		}
	}
?>	

