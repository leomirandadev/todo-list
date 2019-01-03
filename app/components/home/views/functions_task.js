config = "";	$.getJSON('json/config.json', function(data){config = data;});

function removeTask(id){
	$.confirm({
		title: 'Atenção',
		content: msg.confirm_remove_task,
		buttons: {
			Sim: function () {
				$.post(config.link_api + "/task/remove", {id:id}, function(data, status){
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
				$.post(config.link_api + "/task/finish", {id:id}, function(data, status){
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
				$.post(config.link_api + "/task/restart", {id:id}, function(data, status){
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
	        },

	        Cancelar: function () {
	            $.alert('Cancelado!');
	        },
	    }
	});

}