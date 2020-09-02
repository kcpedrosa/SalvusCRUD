<?php 
//for debugging
/*
if(isset($_GET['inclusao'])){
	print_r($_GET); 
}
*/
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<?php
		
		if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){ ?>


			<script>
            $('body').ready(() => {
                document.getElementById('modal_titulo').innerHTML = 'Registro inserido com sucesso'
                document.getElementById('modal_titulo_div').className = 'modal-header text-success'
                document.getElementById('modal_conteudo').innerHTML = 'Registro já está disponível para consulta'
                document.getElementById('modal_btn').innerHTML = 'Ok!'
                document.getElementById('modal_btn').className = 'btn btn-success'
 
                let botao = document.getElementById('modal_btn')
                botao.onclick = function() {
                    window.location.href="nova_tarefa.php"
                }
                //dialog de sucesso
                $('#registroSalvoComSucesso').modal('show')
            })
        </script>

		<?php };

		?>


		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />
								<!--PASSING parameter in action, with get method-->
								<form method="post" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input name="tarefa" type="text" class="form-control" placeholder="Exemplo: Lavar o carro">
										<!--if you forget to put a name the info will not be built and sent to backend, tarefa will turn into a index for the information sent-->
									</div>

									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Modal -->
    <div class="modal fade" id="registroSalvoComSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="modal_titulo_div">
                    <h5 class="modal-title" id="modal_titulo"></h5>
                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_conteudo"></div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" id="modal_btn">Voltar</button>
                </div>
            </div>
        </div>
    </div>
    	
	</body>
</html>