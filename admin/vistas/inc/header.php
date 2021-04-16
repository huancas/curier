<?php
session_start(); 
require_once ('../../../inc/config/Conexion.php');
require_once ('../../../inc/config/file.php');
//
$pdo = conexion::connect();
$sql = 'SELECT * FROM usuario ORDER BY id_user ';
foreach ($pdo->query($sql) as $row) {
 }
conexion::disconnect();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $t_admin; ?></title>
  <link rel="stylesheet" href="../../publico/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../publico/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../publico/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../publico/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../publico/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../publico/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../publico/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../publico/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../publico/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../publico/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../publico/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../publico/dist/css/upload.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../publico/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php $resultado = substr($titulo, 0,1); echo $resultado; ?></b><?php $res = substr($titulo,-3); echo $res; ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $titulo; ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown messages-menu" style="color:white;font-size: 18px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-calendar"></i>
              <?php  
          date_default_timezone_set('America/Lima'); 
          $date = date('d/m/Y', time()); 
          echo $date;
          ?>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!-- <img  src="../../publico/dist/img/avatar5.png" class="user-image" alt="User Image"> -->
              <i style="font-size: 30px;" class="fa fa-user-circle"></i>
              <span class="hidden-xs"> <?php echo ($_SESSION['usuario']);  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <!-- <img src="../../publico/dist/img/avatar5.png" class="img-circle" alt="User Image"> -->
               <i style="font-size: 50px;" class="fa fa-user-circle"></i>

                <p>
                    <?php echo ($_SESSION['usuario']);  ?>
                  <small> <?php echo $titulo; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../../../inc/config/cerra_sesion.php" class="btn btn-default btn-flat"><i class="fa fa-power-off"> </i> Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <br> 
        <li>
          <a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-reply-all"></i><span>Ir a la web</span></a>
        </li>
       <!-- <li>
          <a href="../escritorio/index.php"><i class="fa fa-home"></i><span>Escritorio</span></a>
        </li> -->
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../usuarios/listarc.php"><i class="fa fa-circle-o"></i>Clientes</a></li>
            <li><a href="../usuarios/listar.php"><i class="fa fa-circle-o"></i>Administradores</a></li>
            <li><a href="../usuarios/agregar.php"><i class="fa fa-circle-o"></i>Agregar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../categorias/listar.php"><i class="fa fa-circle-o"></i>Lista</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-basket"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../productos/listar.php"><i class="fa fa-circle-o"></i>Lista</a></li>
            <li><a href="../productos/agregar.php"><i class="fa fa-circle-o"></i>Agregar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Servicios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../servicios/listar.php"><i class="fa fa-circle-o"></i>Lista</a></li>
            <li><a href="../servicios/agregar.php"><i class="fa fa-circle-o"></i>Agregar</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-cloud-download"></i> <span>Solicitud Pedido</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../download/listar.php"><i class="fa fa-circle-o"></i>Lista</a></li>
            <li><a href="../download/agregar.php"><i class="fa fa-circle-o"></i>Agregar</a></li>
          </ul>
        </li>
        <li>
          <a href="../contacto/listar.php"><i class="fa fa-info-circle"></i><span>Contacto</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>