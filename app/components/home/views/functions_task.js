config = ""; $.getJSON('json/config.json', function(data){config = data;});

function removeTask(id){
	$.confirm({
		title: 'Atenção',
		content: msg.confirm_remove_task,
		buttons: {
			Sim: function () {
				postTask("remove", id);
	        },

	        Cancelar: function () {
	            $.alert('Cancelado!');
	        },
	    }
	});

}

function finishTask(id){
	$.confirm({
		title: 'Atenção',
		content: msg.confirm_finish_task,
		buttons: {
			Sim: function () {
				postTask("finish", id)
	        },

	        Cancelar: function () {
	            $.alert('Cancelado!');
	        },
	    }
	});

}
function restartTask(id){
	$.confirm({
		title: 'Atenção',
		content: msg.confirm_restart_task,
		buttons: {
			Sim: function () {
				postTask("restart", id);
	        },

	        Cancelar: function () {
	            $.alert('Cancelado!');
	        },
	    }
	});

}

function postTask(route, id){
	$.post(config.link_api + "/task/" + route, {id:id}, function(data, status){
			result = JSON.parse(data);
			if (result.ok) {
				window.location.reload();
			}else{
				$.alert({
					title: 'Ops!',
					content: msg.error_system,
					buttons: {
						ok: function(){
							window.location.reload();
						}
					}
				});
			}
	});
}