<?php  require_once('../inc/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-home"></i> Escritorio
        <small>panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Escritorio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
             <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuario(s):</span>
              <span class="info-box-number">
              	<?php 
                $pdo = conexion::connect();
                $sql = "SELECT COUNT(*) total FROM usuario";
                $result = $pdo->query($sql); //$pdo sería el objeto conexión
                $total = $result->fetchColumn();
                echo ' <h3>' . $total; echo ' </h3>'
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Servicio(s):</span>
              <span class="info-box-number"><?php 
                $pdo = conexion::connect();
                $sql = "SELECT COUNT(*) total FROM servicio";
                $result = $pdo->query($sql); //$pdo sería el objeto conexión
                $total = $result->fetchColumn();
                echo ' <h3>' . $total; echo ' </h3>'
                ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-shopping-basket"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Producto(s):</span>
              <span class="info-box-number">
              	<?php 
                $pdo = conexion::connect();
                $sql = "SELECT COUNT(*) total FROM producto";
                $result = $pdo->query($sql); //$pdo sería el objeto conexión
                $total = $result->fetchColumn();
                echo ' <h3>' . $total; echo ' </h3>'
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-cloud-download"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Descarga(s):</span>
              <span class="info-box-number">
              	<?php 
                $pdo = conexion::connect();
                $sql = "SELECT COUNT(*) total FROM descargas";
                $result = $pdo->query($sql); //$pdo sería el objeto conexión
                $total = $result->fetchColumn();
                echo ' <h3>' . $total; echo ' </h3>'
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <section class="col-lg-4 connectedSortable">

          <!-- Map box -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="https://scontent.flim10-1.fna.fbcdn.net/v/t1.0-9/p960x960/61099815_290168765271954_9139138871957651456_o.png?_nc_cat=108&_nc_ohc=jJCrHOf3Sl8AQm992fi1XN6y0qsSKwTcR0WlFjLbIUO_R6T-sA7W-7U4w&_nc_ht=scontent.flim10-1.fna&oh=6f5fbaf70d3844a90aea45b51eb50a77&oe=5E68C6C7" alt="User profile picture">

              <h4 class="profile-username text-center">Bienvenid@</h4>

              <p class="text-muted text-center" style="font-size: 15px;margin: 10px;"><?php echo $row['nombre']." ".$row['apellidos']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-user-circle"></i> Usuario: <?php echo $row['email']; ?></b> <a class="pull-right"></a>
                </li>
                <li class="list-group-item">
                  Como usuario usted Tiene acceso a la información importante de la empresa <strong style="color:blue;">"<?php echo $titulo;  ?>"</strong><a class="pull-right"></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- Left col -->
        <section class="col-lg-4">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-film"></i> Video </h3>
              <a href="../video1/editar.php?id=1" class="btn btn-warning" style="float: right;"><i class="fa fa-edit"></i>
                Editar
              </a>
            </div>
            <div class="box-body">
            <?php include'../video1/listarPersonas2.php'; ?>
            </div
          </div>
        </section>
        <!-- right col -->
        <!-- Left col -->
        <section class="col-lg-4">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-film"></i> Video </h3>
              <a href="../video2/editar.php?id=1" class="btn btn-warning" style="float: right;"><i class="fa fa-edit"></i>
                Editar
              </a>
            </div>
            <div class="box-body">
            <?php include'../video2/listarPersonas2.php'; ?>
            </div
          </div>
        </section>
        
        <section class="col-lg-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-photo"></i> Slider Administrable </h3>
              <a href='slidesadd.php' class="btn btn-success" style="float: right;" ><i class="fa fa-plus-circle"></i> Agregar Slide</a>
            </div>
            <div class="box-body">
            <?php include'sliderslist.php'; ?>
            </div
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <?php  require_once('../inc/footer.php'); ?>