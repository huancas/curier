<?php 
      require_once ('../../inc/config/file.php');
      require_once ('../../inc/config/Conexion.php'); 
      require_once('../controller/UsuarioController.php'); 
      require_once('../model/UsuarioModel.php'); 
      session_start();
    
     if (isset($_POST['register'])) {
      
    $tipo_usuario = $_POST['tipo_usuario'];
    $no_doc = $_POST['no_doc'];
    $nombres = $_POST['nombres'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $dir = $_POST['direccion'];

    $user = new UsuarioModel();
    $user->setTipo_persona($tipo_usuario);
    $user->setNo_doc($no_doc);
    $user->setNombres($nombres);
    $user->setTelefono($celular);
    $user->setEmail($email);
    $user->setPassword($pass);
    $user->setCargo('CLIENTE');
    $user->setDireccion($dir);

   $dao = new UsuarioController();
   
    
    
   if(!$dao->registrarUsuario($user))
    {

     echo "<div class='alert'> 
                 <i class='fa fa-warning'></i> Ocurrió un Error , al registrar
                </div>";
    }
     else { header('location: login.php?s'); }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $t_admin; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../publico/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../publico/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../publico/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../publico/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../publico/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="hold-transition login-page" style="background-image: url('../publico/bg/bg_2.jpg');background-size: cover;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius: 15px;">
    <a href="#" class="r_contra" style="font-size: 20px;text-align: center"><?php echo $titulo;?></a><br> 
    <div style="position: relative;text-align: center;display: none">
      <i class="fas fa-user-circle" style="font-size: 20px;color:#045FB4;"></i><br> 
    </div>
    <p class="login-box-msg" style="font-size: 25px;"><strong>Registrarse</strong></p>
    <form id="login" name="login" method="post" method="post">
      <div class="form-group has-feedback">
      <label class="radio-inline">
      <input type="radio" name="tipo_usuario" value="N" checked>Persona
    </label>
    <label class="radio-inline">
      <input type="radio" name="tipo_usuario" value="J">Empresa
    </label>
      </div>
      <div class="form-group has-feedback">
        <input type="number" name="no_doc" class="form-control" placeholder="DNI" style="border-radius: 25px;" required="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "20">
        <span class="glyphicon glyphicon-user form-control-feedback" ></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="nombres" class="form-control" placeholder="Nombres Completos" style="border-radius: 25px;" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="tel" name="celular" class="form-control" placeholder="Celular" style="border-radius: 25px;" required="">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="direccion" class="form-control" placeholder="Dirección" style="border-radius: 25px;" required="">
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" style="border-radius: 25px;" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input onkeyup="validarFirst()"  type="password" name="password"  class="form-control" placeholder="Contraseña" style="border-radius: 25px;" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input onkeyup="validar()" type="password" name="password2"  class="form-control" placeholder="Repita la Contraseña" style="border-radius: 25px;" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <!-- notice -->
       <div id="avi" style="display: none;" class="alert alert-danger alert-dismissable"><button type="button" class="close" style="display: none" data-dismiss="alert" aria-hidden="true">&times;</button> <p id="msg"></p></div>
       <!-- /notice -->

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" OnClick="message()" class="btn my-btn btn-block btn-flat" id="btn-ingreso" style="border-radius: 25px;" name="register" >Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <div style="color: black">¿Ya tienes una cuenta?<a href="login.php" style="color: blue">Ingresa</a></div>
    </form>
    <br><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<style type="">
  .form-control{
    text-align: center;
  }
  .form-control:hover{
    text-align: center;
    border:1px solid #045FB4
  }
  .r_contra{
    color:#045FB4;
  }
  .r_contra:hover{
    color: #5882FA;
  }
  .my-btn{
  border: none;
  color: white;
  padding: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  background-image: linear-gradient(#045FB4, #5882FA);
  border-radius: 15px;
  }
  .my-btn:hover{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    background-image: linear-gradient(#81BEF7, #045FB4);
    color: #fff;
  }
  .alert {
  padding: 6px;
  background-color: #f44336;
  color: white;
  text-align: center;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}	
</style>
<!-- jQuery 3 -->
<script src="../publico/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../publico/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../publico/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  
    let form = document.querySelector('#login');
       let name = form.querySelector('input[name="nombres"]'); 
       var no_doc = form.querySelector('input[name="no_doc"]'); 

  var radios = document.forms["login"].elements["tipo_usuario"];
for(var i = 0, max = radios.length; i < max; i++) {
    radios[i].onclick = function() {
        //alert(this.value);
        if(this.value=='J'){
            name.placeholder = "Razon Social";
            no_doc.placeholder = "RUC";
        }
        if(this.value=='N'){
            name.placeholder = "Nombres Completos";
            no_doc.placeholder = "DNI";
        }
    }
  }
function validarFirst(){
   let espacios = false;
let cont = 0;
 let p1 = form.querySelector('input[name="password"]').value;
let str='';
let show_msg= document.getElementById("msg");
 let ale = document.getElementById('avi');
while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}
 
if (espacios) {
  /*alert ("La contraseña no puede contener espacios en blanco");*/
   str = "Las contraseñas no puede contener espacios en blanco!";
   ale.style.display = 'block';
   show_msg.innerHTML =str;
  return false;
}else{
  str = "";
   ale.style.display = 'none';
   show_msg.innerHTML =str;
  return false;
}
}

function validar(){
 let espacios = false;
let cont = 0;
 let p1 = form.querySelector('input[name="password"]').value;
let p2 = form.querySelector('input[name="password2"]').value;
let str='';
let show_msg= document.getElementById("msg");
 let ale = document.getElementById('avi');
while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}
 
if (espacios) {
  /*alert ("La contraseña no puede contener espacios en blanco");*/
   str = "Las contraseñas no puede contener espacios en blanco!";
   ale.style.display = 'block';
   show_msg.innerHTML =str;
  return false;
}
if (p1.length == 0 || p2.length == 0) {
/* alert("Los campos de la password no pueden quedar vacios ");  */
  str = "las contraseñas no puede quedar vacio!";
  ale.style.display = 'block';
  show_msg.innerHTML =str;
  return false;
}
if (p1 != p2) {
  /*alert("Las passwords deben de coincidir"); */
    str = "Las contraseñas deben de coincidir!";
    ale.style.display = 'block';
   show_msg.innerHTML =str;
   
  return false;
} else {
  /*alert("Todo esta correcto"); */
   str = "Todo esta correcto!";
   ale.style.display = 'block';

   ale.classList.remove('alert-danger')
   ale.classList.add('alert-info');
   show_msg.innerHTML =str;
  return true; 
}
}
</script>
</body>
</html>
