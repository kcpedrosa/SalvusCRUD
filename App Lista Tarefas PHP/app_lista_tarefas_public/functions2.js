function editar(id, tarefaanterior){
			//alert('just testing')

			//create a form to edit data
			let form = document.createElement('form')
			form.action = 'index.php?direcao=index&acao=atualizar'
			form. method = 'post'
			form.className = 'row'

			//create a input
			let tarefaInput = document.createElement('input')
			tarefaInput.type = 'text'
			tarefaInput.name = 'tarefa'
			tarefaInput.className = 'col-9 form-control'
			tarefaInput.value = tarefaanterior

			//create a hidden input to store the id of the tarefa
			//this id is important to manage the data in db
			let inputHidden = document.createElement('input')
			inputHidden.type = 'hidden'
			inputHidden.name = 'id'
			inputHidden.value = id

			//create a button
			let buttonTarefa = document.createElement('button')
			//remember: the button sends the form when clicked
			buttonTarefa.type = 'submit'
			buttonTarefa.className = 'col-3  btn btn-info'
			//offset-1 as class, how to add space betw columns?
			buttonTarefa.innerHTML = 'Atualizar'


			//include tarefaInput in the form
			form.appendChild(tarefaInput)

			//include the hidden  input
			form.appendChild(inputHidden)

			//include buttonTarefa in the form
			form.appendChild(buttonTarefa)

			//console.log(form)
			//alert(id)
			let tarefa = document.getElementById('tarefa_'+id)
			//clean the content in div to insert the form 
			tarefa.innerHTML = ''

			//insert form on the page using insertBefore, wich allow insert elements tree in a already created element
			//tarefa has no childs, so we specify [0] to deploy the content of form onto it
			tarefa.insertBefore(form, tarefa[0])





		}

		function remover(id) {
			location.href= 'index.php?direcao=index&acao=remover&id='+id;
			//we're passing parameter via GET, check url
		}

		function marcarRealizada(id){
			location.href= 'index.php?direcao=index&acao=marcarrealizada&id='+id;
			//we're passing another parameter via GET
			//remember this is a function because we're using it out of the OO procedures/logic
		}

		//tooltips are working without this function bellow
		//check bootstrap tooltips 
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})