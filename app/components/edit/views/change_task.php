<form id="newTask_form">

	<div class="row" id="enderecoEmpresa">
		<div class="col-md-12 form-group">
	  		<input type='text' required name='title' class='form-control' placeholder='Titulo' value="<?=$this->title?>"/>
		</div>
		<div class="col-md-12 form-group">
			<textarea required name='description' class='form-control' placeholder="Descrição"><?=$this->description?></textarea>
		</div>
	</div>
	
	<!-- inicio id user -->
	<input type="hidden" name="id" value="<?=$this->id?>">
	<!-- fim id user -->

	<div class="row">
		<div class="col-md-12">
			<p id="newTask_result"></p>
			<div class='form-group'>
				<button type="submit" class='btn btn-primary'>
                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
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
				result = ajax.enviaController(formDados,"task/change","post");
				if (result.ok) {
					window.location.replace('home');
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