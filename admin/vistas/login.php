<?php 
session_start();
      require_once ('../../inc/config/file.php');
      require_once ('../../inc/config/Conexion.php'); 

      require_once('../controller/UsuarioController.php'); 
      if(isset($_GET['s'])){
        echo "<div class='alert' style='background-color:green'> 
                 <i class='fa fa-success'></i> Te has Registrado exitosamente
                </div>";
      }
    
   if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    $dao = new UsuarioController();
   $obj= $dao->loginUsuario($email,$pass);
    
    
   if(!isset($obj->idu))
    {

     echo "<div class='alert'> 
                 <i class='fa fa-warning'></i> El Usuario y/o Contraseña son incorrectos.
                </div>";
    }
     else
      {
        $_SESSION['codigo']=$obj->idu; 
        $_SESSION['cargo']=$obj->ncargo; 
        $_SESSION['usuario']=$obj->nombres; 

       header('location: escritorio/'); }
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
    <div style="position: relative;text-align: center;">
      <i class="fas fa-user-circle" style="font-size: 11em;color:#045FB4;"></i><br> 
    </div>
    <p class="login-box-msg" style="font-size: 25px;"><strong>Iniciar Sesión</strong></p>
    <form id="login" method="post" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" style="border-radius: 25px;">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password"  class="form-control" placeholder="Contraseña" style="border-radius: 25px;">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" OnClick="message()" class="btn my-btn btn-block btn-flat" id="btn-ingreso" style="border-radius: 25px;" name="login" >Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <div style="color: black">¿No tiene cuenta aún?<a href="register.php" style="color: blue">Registrarse</a></div>
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
</script>
</body>
</html>
