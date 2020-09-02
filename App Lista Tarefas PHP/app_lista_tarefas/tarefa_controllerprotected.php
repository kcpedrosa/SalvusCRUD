<?php 

	require "../../app_lista_tarefas/conexao.php";
	require "../../app_lista_tarefas/tarefa.model.php";
	require "../../app_lista_tarefas/tarefa.service.php";
	//require "tarefa_controller.php";


	/*//this is to check what POST bring us
	echo "<pre>";
	print_r($_POST);
	echo "</pre>"; 
*/
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	//print_r($_GET);
	/*this is to check what $acao bring us
	echo "<hr>";
	echo 'o valor de $acao que estamos recebendo é:  ';
	echo $acao;
	echo "<hr>";
*/
	if ($acao == 'inserir') {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa',$_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();
	/*//check the content of tarefaService
		echo "<pre>";
		print_r($tarefaService);
		echo "</pre>"; 
	*/
		//that parameter for $_GET inclusao = 1 is to trigger our modal
		header('Location: nova_tarefa.php?inclusao=1');

		
	} else if ($acao == 'recuperar') {
		
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefasListadas = $tarefaService->recuperar();
	
	} else if($acao == 'atualizar'){
		//acao=atualizar is passed as a parameter in todas_tarefas by func editar()
		/* bellow we've checked what we were receiving from POST
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		*/

		$tarefa = new Tarefa();
		$tarefa->__set('id',$_POST['id']);
		$tarefa->__set('tarefa',$_POST['tarefa']);
		//$tarefa->__set('id',$_POST['id'])->__set('tarefa',$_POST['tarefa']); //if there is return in set method of tarefa.model

		$conexao = new Conexao();

		$tarefaService = new tarefaService($conexao, $tarefa);
		$tarefaService->atualizar();//here 1 is returned if we were succssfl in the update, 1 means true, false is 0
		//echo 'o valor recebido em atualizar() é' . $tarefaService->atualizar();
		if($tarefaService->atualizar() == true && $_GET['direcao'] != 'index'){
			header('Location: todas_tarefas.php');

		} else if($tarefaService->atualizar() == true && $_GET['direcao'] == 'index'){
			header('Location: index.php');

		}
	} else if ($acao == 'remover') {
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();
		header('Location: todas_tarefas.php');

	} else if ($acao == 'marcarrealizada') {
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();
		if($_GET['direcao']=='index'){
			header('Location: index.php');
		}else{
			header('Location: todas_tarefas.php');
		};
		
	} else if ($acao == 'recuperarpendentes') {
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefasPendentes = $tarefaService->recuperarPendentes();
	}



 ?>