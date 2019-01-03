class AJAX{
	config = "";
	// depende do jquery
	$.getJSON('json/config.json', function(data){config = data;});
	enviaController(formDados,route,metodo){

	 	var resultado	=	function(){
		    var	tmp	=	null;
			$.ajax({
		    	async:false,
				url:config.link_api + route,
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