<?php  
require_once('../inc/header.php'); 
$id_admin = null;
    if ( !empty($_GET['id_admin'])) {
        $id_admin = $_REQUEST['id_admin'];
    }
     
    if ( null==$id_admin ) {
        echo "
			<script>
			window.location='listar.php';
			</script>
			";
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nombreError = null;
        $apellidosError = null;
        $emailError = null;
        $passwordError = null;
        // keep track post values
        $nombre = $_POST['nombre'];
        $apellidos =  $_POST['apellidos'];
        $email= $_POST['email'];        
        $password = $_POST['password'];
        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nombreError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($apellidos)) {
            $apellidosError = 'Please enter Name';
            $valid = false;
        }
        
        
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        
        if (empty($password)) {
            $passwordError = 'Please enter Name';
            $valid = false;
        }
     
         
        // update data
        if ($valid) {
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuario set nombre = ?, apellidos = ?, email = ?, password = md5(? ) WHERE id_user = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$apellidos,$email,$password, $id_admin));
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
        $sql = "SELECT * FROM usuario where id_user = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_admin));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $email = $data['email'];
        $password = $data['password'];
        conexion::disconnect();
    }
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-circle"></i> Usuarios
        <small>Formulario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Formulario</a></li>
        <li class="active">Usraios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-refresh"></i> Actualizar Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="actualizar.php?id_admin=<?php echo $id_admin?>" id="frm-usuario"  method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre(*)</label>
                <input style="font-size: 15px;" id="nombre" name="nombre" value="<?php echo !empty($nombre)?$nombre:'';?>"   class="form-control"></input>
                <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Apellido(*)</label>
                <input style="font-size: 15px;" value="<?php echo !empty($apellidos)?$apellidos:'';?>" class="form-control"  id="apellidos" name="apellidos"></input>
                <?php if (!empty($apellidosError)): ?>
                                <span class="help-inline"><?php echo $apellidosError;?></span>
                            <?php endif; ?>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
                <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Email(*)</label>
               <input style="font-size: 15px;" id="email" name="email" value="<?php echo !empty($email)?$email:'';?>" type="email"   class="form-control"></input>
              	<?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif; ?>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password(*)</label>
                  <input style="font-size: 15px;" id="password" name="password" value="<?php echo !empty($password)?$password:'';?>"  type="password"  class="form-control"></input>
              	<?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif; ?>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-warning"><i class="fa fa-refresh"></i> Actualizar</button>
                <a href="listar.php" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php  require_once('../inc/footer.php'); ?>
