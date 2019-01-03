<?php $pagina="Login";include_once("headers/header.php"); ?>
<body>
    <div class="container-fluid">
        <div class="col-md-4 col-xs-12 col-sm-offset-4 col-sm-4">
            <div class="panel-login">
                <img src='<?=$config->urlLogo?>' class="img-responsive" >
                <br>
                <?php include_once("components/login/views/login_user.php"); ?>
            </div>
        </div>
    </div>
    <?php include_once("headers/footer.php"); ?>	
</body>
</html>