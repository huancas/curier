<?php 
include ('../inc/config/Conexion.php');  


//inicializo el criterio y recibo cualquier cadena que se desee buscar 
$criterio = ""; 
if(isset($_GET["search"])){
if ($_GET["search"]!=""){ 
    $txt_criterio = $_GET["search"]; 
    $criterio = " where nombre_pro like '%" . $txt_criterio . "%' "; 

}

}

if(isset($_GET["cat"])){
if ($_GET["cat"]!=""){ 
    $txt_criterio = $_GET["cat"]; 
    $criterio = " where categoria_idcate = " . $txt_criterio . " "; 

}

}

if(isset($_GET["cat"]) && isset($_GET["search"])){
if ($_GET["cat"]!="" && $_GET["search"]!="" ){ 
    $op1 = $_GET["cat"]; 
    $op2 = $_GET["search"]; 
    $criterio = " where  (categoria_idcate = ". $op1 .") and  (nombre_pro like '%" .$op2. "%') "; 

}

}




   $pdo = conexion::connect();
    $sqlc="SELECT COUNT(*)   from producto ".$criterio ;
    $stmt=$pdo->prepare($sqlc);
    $filas=$stmt->execute();
    $filas=$stmt->fetchColumn();
     $num_total_registros =$filas;
//Limito la busqueda 
$TAMANO_PAGINA = 12; 

//examino la página a mostrar y el inicio del registro a mostrar 

$pagina =1;



if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
}
if (!$pagina) { 
    $inicio = 0; 
    $pagina=1; 
} 
else { 
    $inicio = ($pagina - 1) * $TAMANO_PAGINA; 
}

//calculo el total de páginas 
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 

//next y prev





?>
<!DOCTYPE html>
<html lang="es">
  <head>
     <style type="text/css">
                        
                        .flotante1 {

       position:absolute;
        top: 1px;                 
        bottom:0px;
        left:1px;
}
                        #idtacho{
                             position:absolute;
        top: 264px;                 
        bottom:0px;
        left:1px;
                          text-decoration:line-through;
                           display: grid;
  grid-template-columns: auto auto auto;
   padding-left: 120px;
   color: red;
  font-size: 12px;
  text-align: center;
                        }
                          #idt{
                       
        top: 334px;                 
        bottom:0px;
        left:1px;
                           display: grid;
  grid-template-columns: auto auto auto;
   padding-left: 5px;
  font-size: 16px;
  text-align: center;
                        }

                      </style>
    <title>InfotelSoluciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/magnific-popup.css">
    <link rel="stylesheet" href="../public/css/jquery-ui.css">
    <link rel="stylesheet" href="../public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../public/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../public/social/main.css">
    <link rel="stylesheet" href="../public/social/font.css">
    <link rel="stylesheet" href="../public/css/style_serv.css">

    <link rel="stylesheet" href="../public/css/aos.css">

    <link rel="stylesheet" href="../public/css/style.css">
    
  </head>
  <body>

    <style>
.responsive {
  width: 100%;
  height: auto;
}
</style>
<img src="../public/imagen/ban_1.jpg" alt="Nature" class="responsive" width="600" height="400">
  <div class="site-wrap">
         <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            </div>
            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
               <li ><a href="inicio.php">Inicio</a></li>
             <li><a href="producto.php">Productos</a></li>
             <li><a href="servicio.php">Servicios</a></li>
            <li><a href="descarga.php">Descargas</a></li>
            <li ><a href="nosotros.php">Nosotros</a></li>
            <li class="active"><a href="contacto.php">Contacto</a></li>
          </ul>
        </div>
      </nav>
    </header>
  <?php include('../public/social/index.php') ?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="inicio.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contacto</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Contactenos</h2>
          </div>
          <div class="col-md-7">

            <form action="send_form_email.php" method="POST">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                     <input  type="text" name="first_name" class="form-control" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Apellido <span class="text-danger">*</span></label>
                    <input  type="text" name="last_name" class="form-control" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                   <input  type="text" name="email" class="form-control" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Tema <span class="text-danger">*</span></label>
                    <input  type="text" name="telephone" class="form-control" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Mensaje <span class="text-danger">*</span></label>
                    <textarea  name="message" class="form-control" maxlength="1000" cols="25" rows="6" required=""></textarea>
                  </div>
                </div>
                <td colspan="2" style="text-align:center">
  <input type="submit" value="Enviar" class="btn btn-primary btn-lg btn-block">
 </td>
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3" >
               <?php
  
    $pdo = conexion::connect();
   $sql = "SELECT * FROM contacto  ";
   
      
      
       foreach ($pdo->query($sql) as $row) {

                if($row['direccion']!=''){
                    echo '<li style="list-style:none;"><i class="fa fa-map-marker" style="background-color: #7971ea; margin:5px;padding:11px;border-radius:50%;color:#fff;"></i><a style="color:#000;font-size:20px;" href="https://www.google.com/maps/search/'.$row['direccion'].'" target="_blank" >'.$row['direccion'].'</a></li>';
                }
                  if($row['telefono']!=''){
                    echo '<li style="list-style:none;"><i class="fa fa-phone" style="background-color: #7971ea; margin:5px;padding:11px;border-radius:50%;color:#fff;"></i><a style="color:#000;font-size:20px;" href="#">' .$row['telefono'].'</a></li>';
                  }
                   if($row['celular']!=''){
                     echo '<li style="list-style:none;"><i class="fa fa-whatsapp" style="background-color: #7971ea; margin:5px;padding:11px;border-radius:50%;color:#fff;"></i><a  style="color:#000;font-size:20px;"href="https://api.whatsapp.com/send?phone=51'.$row['celular'].'"   target="_blank" >'.$row['celular'].'</a></li>';
                  }
                   if($row['watsapp']!=''){
                    echo '<li style="list-style:none;"><i class="fa fa-whatsapp" style="background-color: #7971ea; margin:5px;padding:11px;border-radius:50%;color:#fff;"></i><a style="color:#000;font-size:20px;"href="https://api.whatsapp.com/send?phone=51'.$row['watsapp'].'"   target="_blank" >'.$row['watsapp'].'</a></li>';
                  }
                   if($row['email']!=''){
                  echo '<li style="list-style:none;"><i class="fa fa-envelope" style="background-color: #7971ea; margin:5px;padding:11px;border-radius:50%;color:#fff;"></i>'.$row['email'].'</li>';
                  }
                   if($row['email2']!=''){
                   echo '<li style="list-style:none;"><i class="fa fa-envelope" style="background-color: #7971ea; margin:5px;padding:11px;border-radius:50%;color:#fff;"></i>'.$row['email2'].'</li>';
                  }
                   if($row['email3']!=''){
                   echo '<li style="list-style:none;"><i class="fa fa-envelope" style="background-color: #7971ea; margin:5px;padding:11px;border-radius:50%;color:#fff;"></i>'.$row['email3'].'</li>';
                  }
                   if($row['facebook']!=''){
                    echo '<li style="list-style:none;"><i class="fa fa-facebook" style="background-color: #7971ea; margin:6px;padding:11px;border-radius:50%;color:#fff;"></i><a style="color:#000;font-size:20px;" href="'.$row['facebook_link'].'" target="_blank" >'.$row['facebook'].'</a></li>';
                  }
           
            }
        conexion::disconnect();
       ?>
                            
                        </ul>
                                             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.8030227951413!2d-77.04120248561782!3d-12.057069845373942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c6a7ac3357%3A0x9339ab4dad178639!2sInfotel+Soluciones!5e0!3m2!1ses!2spe!4v1562454730311!5m2!1ses!2spe" width="400" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer border-top" style="background:#000;color:white;">
      <div class="container">
        <div class="row">
                   <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="inicio.php" style="color:white;">Inicio</a></li>
                  <li><a href="servicio.php" style="color:white;">Servicios</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                   <li><a href="nosotros.php" style="color:white;">Nosotros</a></li>
                 <li><a href="producto.php"  style="color:white;">Productos</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
 <li><a href="descarga.php" style="color:white;">Descargas</a></li>
   <li><a href="contacto.php" style="color:white;">Contactenos</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4" style="color:white;">Contactanos Info</h3>
              <p><a href="../admin/index.php" style="color:white;">Administrador</a></p>
              <ul class="list-unstyled">
                <li class="phone" style="color:white;"><a href="tel://51985203000">985203000</a></li>
                <li class="email" style="color:white;">informes@infotelsoluciones.com</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
               <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FInfotelSoluciones%2F&tabs=timeline&width=300&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | infotelsoluciones creado en <a href="https://progsiste.com" target="_blank" class="text-primary">Progsistem</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="../public/js/jquery-3.3.1.min.js"></script>
  <script src="../public/js/jquery-ui.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/owl.carousel.min.js"></script>
  <script src="../public/js/jquery.magnific-popup.min.js"></script>
  <script src="../public/js/aos.js"></script>

  <script src="../public/js/main.js"></script>
    
  </body>
</html>