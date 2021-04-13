<?php  require_once('../inc/header.php');
    if (isset($_POST['registrar'])) {
        
        $db = conexion::connect();
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "INSERT INTO usuario (nombre, apellidos, email, password) VALUES ('$nombre', '$apellidos', '$email', md5('$password'))";
        $db->query($sql);

      echo "
			<script>
			window.location='listar.php';
			</script>
			";
      
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
              <h3 class="box-title"><i class="fa fa-plus-circle"></i> Nuevo Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="frm-usuario" action="agregar.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre(*)</label>
               <input id="nombre" name="nombre" type="text"   class="form-control"placeholder="" required></input>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Apellido(*)</label>
                <input id="apellidos" name="apellidos" type="text"   class="form-control"placeholder="" required></input>
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
                <input id="email" name="email" type="email"   class="form-control"placeholder="" required></input>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password(*)</label>
                  <input id="passwd" name="password" type="password"   class="form-control"placeholder="" required></input>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Repetir Password(*)</label>
                  <input type="password" id="passwd2"  onkeyup="validar()" name="clave" class="form-control" placeholder="" required>
                </div>
                <div id="avi" style="display: none;" class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <p id="msg"></p></div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="registrar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
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
<script type="text/javascript">
 
      var espacios = false;
var cont = 0;

function validar(){

 var p1 = document.getElementById("passwd").value;
var p2 = document.getElementById("passwd2").value;

while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}
 
if (espacios) {
  /*alert ("La contraseña no puede contener espacios en blanco");*/
  var str = "La contraseña no puede contener espacios en blanco!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';
   document.getElementById("msg").innerHTML =str;
   
  return false;
}
if (p1.length == 0 || p2.length == 0) {
/* alert("Los campos de la password no pueden quedar vacios ");  */
  var str = "Los campos de la password no pueden quedar vacios!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';

   document.getElementById("msg").innerHTML =str;
   
  return false;
}
if (p1 != p2) {
  /*alert("Las passwords deben de coincidir"); */
    var str = "Las passwords deben de coincidir!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';
   document.getElementById("msg").innerHTML =str;
   
  return false;
} else {
  /*alert("Todo esta correcto"); */
   var str = "Todo esta correcto!";
  var ale = document.getElementById('avi');
  ale.style.display = 'block';
   document.getElementById("msg").innerHTML =str;
   
  return true; 
}
}
</script>
<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>