<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home"><img src="<?=$config->urlLogoEmblema?>"></a>
      <p class="navbar-text">Bem vindo(a) <?=$_SESSION['primeiro_nome_usuario']?></p>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li <?php if($pagina=="Home")echo"class=\"active\"";?> ><a href="home"><i class="fas fa-home"></i> Home</a></li>
        <?php if($_SESSION['nivel_usuario']!=3): ?>
          <li <?php if($pagina=="Empresas")echo"class=\"active\"";?> ><a href="empresas"><i class="fas fa-building"></i> Empresas</a></li>
          <li <?php if($pagina=="Clientes Individual")echo"class=\"active\"";?> ><a href="clientes-individual"><i class="fas fa-users"></i> Clientes Individual</a></li>
          <li <?php if($pagina=="Movimentações")echo"class=\"active\"";?> ><a href="movimentacoes"><i class="fas fa-exchange-alt"></i> Movimentações</a></li>
        <?php endif; ?>
        <li <?php if($pagina=="Alterar Senha")echo"class=\"active\"";?> ><a href="alterar-senha"><i class="fas fa-key"></i> Alterar Senha</a></li>
        <li><a href="controllers/logoff.php"><i class="fas fa-power-off"></i> Sair</a></li>
      </ul>
    </div>
  </div>
</nav>