class AJAX{
	enviaController(formDados,route,metodo){

	 	var resultado	=	function(){
		    var	tmp	=	null;
			$.ajax({
		    	async:false,
				url:"http://localhost/supero-project/api/"+route,
				type:metodo,
				data:formDados,
				cache:false,
				contentType:false,
				processData:false,
				success: function(data){
					console.log(data);
					var logarUsuario = JSON.parse(data);
					tmp = logarUsuario;	
				},
				error: function(error) {
					//informa os erros através do console
					console.log(error);
				},
				dataType: "html"
			});
		    return tmp;
		}();
		return resultado;
	}
}