<form id="logarUsuario_form" class="forms-edit">
	<!-- contato -->
	<div class="row">
		<div class="col-md-12 form-group">
			<div class="input-group">
	  			<span class="input-group-addon" id="basic-addon1"><i class="fas fa-user"></i></span>
				<input type='email' name='email' class='form-control' placeholder='E-mail'/>
			</div>
		</div>
		<div class="col-md-12 form-group">
			<div class="input-group">
	  			<span class="input-group-addon" id="basic-addon1"><i class="fas fa-key"></i></span>
				<input type='password' name='password' class='form-control' placeholder='Senha'/>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p id="logarUsuario_result"></p>
			<div class='form-group'>
				<button type="submit" class='btn btn-primary'><i class="fas fa-sign-in-alt"></i> Logar</button>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	$("#logarUsuario_form").submit(function(event){
		event.preventDefault();
		$('#logarUsuario_result').html("<img src=\"imgs/icon.gif\" height=\"14\" /> Processando");
		var formDados = new FormData($(this)[0]);

		setTimeout(
			function (){				
				/*-------------------------------------------- ENVIO VIA AJAX -------------------------------------*/
				var ajax = new AJAX();
				result = ajax.enviaController(formDados,"user/login","post");

				if (result.ok) {
					window.location.replace("home");
				}else{
					$('#logarUsuario_result').html(
						'<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i>'
						+msg.error_login
						+'</div>'
					);
				}
			}
		,100);
	});
</script>