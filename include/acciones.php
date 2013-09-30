<?php
	

	Class evento{
		
		protected $id_jugador;
		protected $tiempo_evento;
		
		public function __construct($id_jugador, $tiempo_evento, $obj_sql){
			$this->id=$id_jugador;
			$this->tiempo_evento=$tiempo_evento;
			$this->obj_sql=$obj_sql;
		}
		
		public function __destruct(){
			$this->obj_sql->close();
		}
	
	}
	
	Class mejora extends evento{
		public function __construct($id_jugador, $tiempo_evento, $obj_sql, $n_mejora){
			parent::__construct($id_jugador, $tiempo_evento, $obj_sql);
			
			$tiempo_total=time()-$this->$tiempo_evento;
			parent::$this->obj_sql->query("INSERT INTO cola_mejoras (id, mejora, tiempo) VALUES($this->id, '$n_mejora', $tiempo_total);");
		}
		
		public function mejoras_activas(){
			$ret=parent::$this->obj_sql->query("SELECT * FROM cola_mejoras WHERE id=$id;");
			return $ret;
		}
	}
	
	Class mision extends evento{
		protected $tipo_mision;
		
		public function __construct($id_jugador, $tiempo_evento, $obj_sql, $tipo_mision){
			
			parent::cosntruct($id_jugador, $tiempo_evento, $obj_sql, $tipo_mision);
			$this->tipo_mision=$tipo_mision;
			
		}
		
		public function atacar($id_jugador_atacado){
		
			parent::$this->obj_sql->query("INSERT INTO ataques VALUES(". parent::$this->id_jugador .","'',''
		
		}
	
	}
	
	
?>