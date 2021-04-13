<?php
    require_once('../inc/header.php');
 
    $id_tramite = null;
    if ( !empty($_GET['id_tramite'])) {
        $id_tramite = $_REQUEST['id_tramite'];
    }
     
    if ( null==$id_tramite ) {
        echo "
			<script>
			window.location='listar.php';
			</script>
			";
    }
     
    if ( !empty($_POST)) {

      $msg='';
        $nom_tramite = $_POST['nom_tramite'];
        $idcate =  $_POST['idcat'];
        // validate input
        $valid = true;
        if (empty($nom_tramite)) {
             $msg .= 'Please enter Name';
            $valid = false;
        }
         
         if (empty($idcate)) {
            $msg .=  'Please enter idcate';
            $valid = false;
        }    
        // update data
        if ($valid) {
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE categoria set nombre_cat = ?,tipo_cat =?  WHERE id_cat = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$idcate, $id_tramite));
            conexion::disconnect();
            echo "
			<script>
			window.location='listar.php';
			</script>
			";
        }
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM categoria where id_cat = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['nombre_cat'];
        //$descripcion = $data['descripcion'];
        $idcatei = $data['tipo_cat'];
       //$imagen = $data['url_producto'];
        conexion::disconnect();
    }
?>
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Escritorio</a></li>
        <li class="active">Lista de productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
              <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Categoria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="editar.php?id_tramite=<?php echo $id_tramite?>" id="frm-tramite"  method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nom_tramite" value="<?php echo !empty($nom_tramite)?$nom_tramite:'';?>" class="form-control" placeholder="Nombre de la categoria.">
                </div>
            <!--<label class="col-sm-3 control-label">Categoria</label>-->
            <select name="idcat" class="form-control"  required="true">
               <option value="PRODUCTO"<?php if($idcatei=="PRODUCTO"){echo "selected";} ?>>PRODUCTO</option>
            <option value="SERVICIO"<?php if($idcatei=="SERVICIO"){echo "selected";} ?>>SERVICIO</option>
            <option value="DESCARGAS"<?php if($idcatei=="DESCARGAS"){echo "selected";} ?>>DESCARGAS</option>
          </select>  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                 <button type="submit" name="actualizar" class="btn btn-success "><i class="fa fa-rotate-left"></i> Actualizar</button>
                 <a href="listar.php" class="btn btn-default"><i class="fa fa-mail-reply"></i>Regresar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Todas las productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>N°</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <!--archivo php--->
                                <!--archivo php--->
                <?php
    $pdo = conexion::connect();
    $sql = "SELECT * FROM categoria ";
    if(isset ($_POST['buscar']))
    {    $buscar = $_POST["palabra"];
     $sql = "SELECT * FROM categoria WHERE nombre_cat like '%$buscar%'";
    }
      
      
       foreach ($pdo->query($sql) as $row) {
           
          
       ?>
                <?php
                 
                   
               
                            echo '<tr>';
                            echo '<td>'. $row['id_cat'] . '</td>';
                            echo '<td>'. $row['nombre_cat'] . '</td>';
                            echo '<td>'; echo ' <center>';
                            echo '<a class="btn btn-success" href="editar.php?id_tramite='.$row['id_cat'].'"><i class="fa fa-edit"></i>Editar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="eliminar.php?id_tramite='.$row['id_cat'].'"><i class="fa fa-trash"></i>Eliminar</a>';
            echo '</center> ';
                            echo '</td>';
                            echo '</tr>';
                 
                   
                  ?>
                  <?php 
        }
        conexion::disconnect();
    ?>
                <!---------------->
                </tbody>
                <tfoot>
                <tr>
                 <th>N°</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('../inc/footer.php'); ?>
