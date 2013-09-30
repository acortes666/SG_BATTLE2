<?php

class sql extends mysqli{
	protected $ip;
	protected $usuario;
	protected $pass;
	protected $db;
	protected $sql;
	
	public function __construct($ip, $usuario, $pass, $db){
		$this->ip=$ip;
		$this->usuario=$ip;
		$this->pass=$pass;
		$this->db=$db;
		
		if(!$this->sql=new mysqli($ip, $usuario, $pass, $db)){
			echo "Hubo un error al conectar con la base de datos.";
		}
	}
	
	public function consultar($sql){
		if($row=$this->sql->query($sql)){
			return $row->fetch_all(MYSQLI_ASSOC);
		}else{
			echo "Error al realizar la consulta.";
		}
	}
	
	public function insertar($sql){
		if(!$sql->query($sql)){
			echo "Error al  insertar.";
		}
	}
	
	public function __destruct(){
		$this->sql->close();
	}
}

?>