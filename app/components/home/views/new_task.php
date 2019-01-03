<form id="newTask_form">

	<div class="row" id="enderecoEmpresa">
		<div class="col-md-12 form-group">
	  		<input type='text' required name='title' class='form-control' placeholder='Titulo' />
		</div>
		<div class="col-md-12 form-group">
			<textarea required name='description' class='form-control' placeholder="Descrição"></textarea>
		</div>
	</div>
	
	<!-- inicio id user -->
	<input type="hidden" name="id_user" value="<?=$_SESSION['user']?>">
	<!-- fim id user -->

	<div class="row">
		<div class="col-md-12">
			<p id="newTask_result"></p>
			<div class='form-group'>
				<button type="submit" class='btn btn-primary'>
                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cadastrar Tarefa
                </button>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">

	$("#newTask_form").submit(function(event){
		event.preventDefault();
		$('#newTask_result').html("<img src=\"imgs/icon.gif\" height=\"14\" /> Processando");
		var formDados = new FormData($(this)[0]);
		setTimeout(
			function (){
				var ajax = new AJAX();
				result = ajax.enviaController(formDados,"task/new","post");
				if (result.ok) {
					window.location.reload();
				}else{
					$('#newTask_result').html(
						'<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> '
						+msg.error_system
						+'</div>'
					);
				}
			}
		,100);
	});
</script>