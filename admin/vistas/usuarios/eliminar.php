<?php
    require_once('../inc/header.php'); 
    $id_admin =0;
     
    if ( !empty($_GET['id_admin'])) {
        $id_admin = $_REQUEST['id_admin'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id_admin = $_POST['id_admin'];
         
        // delete data
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE  FROM usuario  WHERE id_user = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_admin));
        conexion::disconnect();
        echo "
			<script>
			window.location='listar.php';
			</script>
			";
         
    }
?>
<div class="wrapper">
  <!-- =============================================== -->
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Eliminar
        <small>vista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> inicio</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <!-- left column -->
        <div class="col-md-6">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Eliminar Usuario</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" action="eliminar.php" method="post">
                    <input type="hidden" name="id_admin" value="<?php echo $id_admin;?>"/>
                     <p class=""><h3 style="font-size: 25px">¿Estás seguro?</h3></p>
                     <p>¡No podrás revertir esto!</p>
                      <div class="form-actions">
                         <div class="box-footer">
                          <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Si, eliminalo</button>
                          <a class="btn btn-default " href="listar.php"><i class="fa fa-mail-reply"></i> No, Regresar</a>
                        </div>
         </form>
        </div>
      </div>
      <!-- /.box -->
         </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    require_once('../inc/footer.php'); 
	?>
