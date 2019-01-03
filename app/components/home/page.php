<?php $pagina="Login";include_once("headers/header.php"); ?>
<body>
    <div class="container-fluid">
        <?php include_once("headers/menu.php"); ?>
        <div class="col-md-7">
            <div class="panel-active connectedSortable">
                <h1> <i class="fas fa-clipboard-list"></i> <?=$msg->active_task_title?></h1>
                <?php include_once("components/home/views/active_tasks.php"); ?>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel-finished connectedSortable">
                <h1> <i class="fas fa-tasks"></i> <?=$msg->finished_task_title?> </h1>
                <?php include_once("components/home/views/finished_tasks.php"); ?>
            </div>
        </div>
        <div class="col-md-12">
            <a class='btn btn-success plus-task' data-toggle="modal" data-target="#modalNewTask">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

   	<!-- inicio modal New Task -->
	<div class="modal fade" id="modalNewTask" tabindex="-1" role="dialog" aria-labelledby="modalNewTaskLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					<h4 class="modal-title"><i class="fas fa-users"></i> <?=$msg->new_task_title?></h4>
				</div>
				<div class="modal-body">
                <?php include_once("components/home/views/new_task.php"); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- fim modal New Task -->



    <?php include_once("headers/footer.php"); ?>
<script type="text/javascript" src="components/home/views/functions_task.js"></script>
<script type="text/javascript">
$( function() {
    $( ".panel-active" ).sortable({
        connectWith: ".connectedSortable",
        receive:function(event, ui){
            idTask = ui.item[0].childNodes[1].id;
            idTask = idTask.substr(4, idTask.lenght);
            restartTask(idTask);
        }
    }).disableSelection();
    
    $( ".panel-finished" ).sortable({
        connectWith: ".connectedSortable",
        receive:function(event, ui){
            idTask = ui.item[0].childNodes[1].id;
            idTask = idTask.substr(4, idTask.lenght);
            finishTask(idTask);
        }
    }).disableSelection();
});
</script>
</body>
</html>