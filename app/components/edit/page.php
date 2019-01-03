<?php $pagina="Login";include_once("headers/header.php"); ?>
<body>
    <div class="container-fluid">
        <?php include_once("headers/menu.php"); ?>
        <div class="col-md-12">
			<a href="home" class="btn btn-default btn-xs">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <div class="panel-active">
                <h1> <i class="fas fa-clipboard-list"></i> <?=$msg->edit_task_title?></h1>
                <?php include_once("components/edit/views/change_task.php"); ?>
            </div>
        </div>
    </div>

    <?php include_once("headers/footer.php"); ?>
</body>
</html>