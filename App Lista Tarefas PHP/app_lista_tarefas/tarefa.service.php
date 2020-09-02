<?php 

//CRUD
class TarefaService {

	private $conexaoTS;
	private $tarefaTS;

	public function __construct(Conexao $conexaoparametro, Tarefa $tarefaparametro){
		//depois mudar os nomes para $tarefaparametro etc e testar se funciona
		$this->conexaoTS = $conexaoparametro->conectar();
		//above will return to us a PDO object after execution of the function conectar at conexao.php
		$this->tarefaTS = $tarefaparametro;
	}

	public function inserir() {//create
		$query = 'insert into tb_tarefas(tarefa) values (:tarefa)';
		$stmt = $this->conexaoTS->prepare($query);

		$stmt->bindValue(':tarefa', $this->tarefaTS->__get('tarefa')); 
		$stmt->execute();
	}
	public function recuperar() {//read
		$query1 = 'select t.id, s.status, t.tarefa FROM tb_tarefas as t LEFT JOIN tb_status as s on (t.id_status = s.id)';
		//when we make this left join, our object will come with the attributes id, status and tarefa
		//now at todas_tarefas we can access the status of each tarefa, as pendente, for example
		//prof searched for id, id_status, tarefa
		$stmt = $this->conexaoTS->prepare($query1);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
		
	}
	public function atualizar() {//update
		/*print_r given to check if we were receiving the data when updated in todas_tarefas
		echo '<pre>';
		print_r($this->tarefaTS);
		echo '<pre>';
		*/
		$query = 'update tb_tarefas set tarefa = :tarefa where id= :id ';
		$stmt = $this->conexaoTS->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefaTS->__get('tarefa'));
		$stmt->bindValue(':id', $this->tarefaTS->__get('id'));
		return $stmt->execute();
		/*OBS is possible to use ? instead of :tarefa, ex = ? where id = ?*
		and bindValue (1, $this-> etc) the 1 connects with the first ? and so on*/

	}
	public function remover() {//delete
		$query = 'delete from tb_tarefas where id= :id';
		$stmt = $this->conexaoTS->prepare($query);
		$stmt->bindValue(':id', $this->tarefaTS->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada() {
		//
		$query = 'update tb_tarefas set id_status = :id_status where id= :id ';
		$stmt = $this->conexaoTS->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefaTS->__get('id_status'));
		$stmt->bindValue(':id', $this->tarefaTS->__get('id'));
		return $stmt->execute();
	}

	public function recuperarPendentes() {
		//task
		$query1 = 'select tarefa, id FROM tb_tarefas where id_status = :id_status';
		//when we make this left join, our object will come with the attributes id, status and tarefa
		//now at todas_tarefas we can access the status of each tarefa, as pendente, for example
		//prof searched for id, id_status, tarefa
		$stmt = $this->conexaoTS->prepare($query1);
		$stmt->bindValue(':id_status', $this->tarefaTS->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


}


 ?>