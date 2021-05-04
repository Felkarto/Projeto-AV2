
<?php

session_start();
#print_r($_SESSION);

if (isset($_SESSION['login']) && isset($_SESSION['id'])) {

    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="publico/css/bootstrap.min.css">
  <link rel="stylesheet" href="publico/css/AdminLTE.min.css">
  <link rel="stylesheet" href="publico/css/all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ValConsulta</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle">
        </div>
        <div class="pull-left info">
          <p>Daniel Gomes</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="?modulo=skins&acao=listar">
            <i class="fa fa-list"></i> <span>Skins Listar</span>
          </a>
        </li>
        <li>
          <a href="?modulo=skins&acao=adicionar">
            <i class="fa fa-list"></i> <span>Skins Adicionar</span>
          </a>
        </li>

        <li>
          <a href="?modulo=armas&acao=listar">
            <i class="fa fa-list"></i> <span>Armas Listar</span>
          </a>
        </li>
        <li>
          <a href="?modulo=armas&acao=adicionar">
            <i class="fa fa-list"></i> <span>Armas Adicionar</span>
          </a>
        </li>

        <li>
          <a href="?modulo=agentes&acao=listar">
            <i class="fa fa-list"></i> <span>Agentes Listar</span>
          </a>
        </li>
        <li>
          <a href="?modulo=agentes&acao=adicionar">
            <i class="fa fa-list"></i> <span>Agentes Adicionar</span>
          </a>
        </li>

        <li>
          <a href="?modulo=mapas&acao=listar">
            <i class="fa fa-list"></i> <span>Mapas Listar</span>
          </a>
        </li>
        <li>
          <a href="?modulo=mapas&acao=adicionar">
            <i class="fa fa-list"></i> <span>Mapas Adicionar</span>
          </a>
        </li>

        <li>
          <a href="?modulo=personagens&acao=listar">
            <i class="fa fa-list"></i> <span>Personagens Listar</span>
          </a>
        </li>
        <li>
          <a href="?modulo=personagens&acao=adicionar">
            <i class="fa fa-list"></i> <span>Personagens Adicionar</span>
          </a>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<section class="content">
    <?php
if (isset($_GET['modulo'])) {$modulo = $_GET['modulo'];} else { $modulo = "dashboard";}
    if (isset($_GET['acao'])) {$acao = $_GET['acao'];} else { $acao = 'ver';}

    include "modulos/" . $modulo . "/" . $acao . ".php";
    ?>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2021 Daniel Figueira Gomes</strong> Todos os Direitos Reservados.
  </footer>
</div>
</body>
</html>

<?php

} else {
    echo "Você precisa efetuar o login. <a href='login.php'>VOLTAR</a>";
}

?>
