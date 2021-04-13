<?php  require_once('../inc/header.php');
    $id_informacion = null;
    if ( !empty($_GET['id_informacion'])) {
        $id_informacion = $_REQUEST['id_informacion'];
    }
     
    if ( null==$id_informacion ) {
        echo "
			<script>
			window.location='listar.php';
			</script>
			";
    }
     
    if ( !empty($_POST)) {
       
        
        $celular = $_POST['celular'];
        $correo1 =  $_POST['correo1'];
        $correo2 = $_POST['correo2'];
        $correo3 = $_POST['correo3'];
        $facebook = $_POST['facebook'];
        $facebooklink = $_POST['facebooklink'];
        $direccion = $_POST['direccion'];        
        $telefono = $_POST['telefono']; 
        $wat = $_POST['wat']; 
       
       
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE contacto  set celular = ?,facebook = ?, email = ?, email2 = ?,email3 = ?,  direccion =?, telefono = ?,facebook_link= ?,watsapp = ?  WHERE id_co = ?";

            
            $q = $pdo->prepare($sql);
            $q->execute(array($celular,$facebook, $correo1,$correo2,$correo3,$direccion,$telefono,$facebooklink,$wat ,$id_informacion));
            conexion::disconnect();
		    echo "
			<script>
			window.location='listar.php';
			</script>
			";
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM contacto where id_co = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_informacion));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $celular = $data['celular'];
        $facebook = $data['facebook'];
        $facebooklink = $data['facebook_link'];
        $correo1 = $data['email'];
        $correo2 = $data['email2'];
        $correo3 = $data['email3'];
        $direccion = $data['direccion'];
        $telefono =  $data['telefono'];
        $wat =  $data['watsapp'];
        
        conexion::disconnect();
    }
?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-info-circle"></i> Contacto
        <small>Formulario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Formulario</a></li>
        <li class="active">Contacto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-refresh"></i> Actualizar Contacto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="actualizar.php?id_informacion=<?php echo $id_informacion?>" id="frm-tramite"  method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dirección(*)</label>
                  <input id="idvol" value="<?php echo !empty($direccion)?$direccion:'';?>" class="form-control"  id="direccion" name="direccion"></input>
                </div>
                <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                <label>Teléfono(*)</label>
                <input id="idvol" value="<?php echo !empty($telefono)?$telefono:''; ?>" class="form-control"  id="telefono" name="telefono"></input>
                  </div>
              <!-- /.form-group -->
              </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Celular N1(*)</label>
                <input id="idvol" type="tel" id="celular" name="celular" value="<?php echo !empty($celular)?$celular:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Celular N2(*)</label>
                <input id="idvol" type="tel" id="dd" name="wat" value="<?php echo !empty($wat)?$wat:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                <label>Email N1(*)</label>
                <input  id="idvol" type="email" id="correo1" name="correo1" value="<?php echo !empty($correo1)?$correo1:'';?>"   class="form-control"></input>
                  </div>
              <!-- /.form-group -->
              </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Email N2(*)</label>
                 <input id="idvol" type="email" id="correo2" name="correo2" value="<?php echo !empty($correo2)?$correo2:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
             <div class="col-md-4">
              <div class="form-group">
                <label>Email N3(*)</label>
                <input id="idvol" type="email" id="correo3" name="correo3" value="<?php echo !empty($correo3)?$correo3:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                <label>Facebook(*)</label>
              <input id="idvol" id="facebook" name="facebook" value="<?php echo !empty($facebook)?$facebook:'';?>"   class="form-control"></input>
                  </div>
              <!-- /.form-group -->
              </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Enlace a Facebook(*)</label>
                <input id="idvol" id="facebook" name="facebooklink" value="<?php echo !empty($facebooklink)?$facebooklink:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="actualizar"  class="btn btn-success"><i class="fa fa-refresh"></i> Actualizar</button>
                <a href="listar.php" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php  require_once('../inc/footer.php'); ?>
