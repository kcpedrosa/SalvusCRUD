<?php 

class Tarefa {
	private $id;
	private $id_status;
	private $tarefa;
	private $data_cadastrado;

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
		//return $this ;//it is possible to make this kind of return in order to change its atributes differently in tarefa_controllerprot 
	}
}

 ?>