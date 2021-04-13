<?php
session_start();
    include ('../inc/config/Conexion.php');  
 
    $id_tramite = null;
    if ( !empty($_GET['id_tramite'])) {
        $id_tramite = $_REQUEST['id_tramite'];
    }
     
    if ( null==$id_tramite ) {
        header("Location: listar.php");
    }
     
    if ( !empty($_POST)) {

      $msg='';
       
        $target = "../imagenes/".basename($_FILES['imagen']['name']);
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion =  $_POST['descripcion'];
         $idcate =  $_POST['idcat'];
        $imagen = $_FILES['imagen']['name'];


        if(empty($imagen)){
           $imagen =$_POST['imant'];
        }else{
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target)) {
            $imagenError =  "Image uploaded successfully";
            
        }
        else{
            $imagenError = "Theme was a problem uploading image";
        }
        
        }
        // validate input
        $valid = true;
        if (empty($nom_tramite)) {
             $msg .= 'Please enter Name';
            $valid = false;
        }
         
        if (empty($descripcion)) {
            $msg .=  'Please enter descripcion';
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
            $sql = " UPDATE producto set nombre_pro = ?, descripcion = ?, url_producto=?,categoria_idcate =?  WHERE id_pro = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion, $imagen,$idcate, $id_tramite));
            conexion::disconnect();
            
        }
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM producto where id_pro = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['nombre_pro'];
        $precio = $data['precio'];
        $estado = $data['estado'];
        $fchselecion = $data['fchselecion'];
        $oferta = $data['oferta'];
        $garantia = $data['garantia'];
        $descripcion = $data['descripcion'];
        $descripcion1 = $data['descripcion1'];
        $descripcion2 = $data['descripcion2'];
        $descripcion3 = $data['descripcion3'];
          $descripcion4 = $data['descripcion4'];
            $descripcion5 = $data['descripcion5'];
              $descripcion6 = $data['descripcion6'];
                $descripcion7 = $data['descripcion7'];
                  $descripcion8 = $data['descripcion8'];
                    $descripcion9 = $data['descripcion9'];
                      $descripcion10 = $data['descripcion10'];
       $idcatei = $data['categoria_idcate'];
       $imagen = $data['url_producto'];
       $fchtecnica = $data['fchtecnica'];
        conexion::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="es">


  <head>
   <meta charset="utf-8">
     
    <title>InfotelSoluciones</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../public/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/magnific-popup.css">
    <link rel="stylesheet" href="../public/css/jquery-ui.css">
    <link rel="stylesheet" href="../public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../public/css/owl.theme.default.min.css">


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
<img src="../public/imagen/ban_2.jpg" alt="Nature" class="responsive" width="600" height="400">
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
             <li class="active"><a href="producto.php">Productos</a></li>
             <li><a href="servicio.php">Servicios</a></li>
            <li><a href="descarga.php">Descargas</a></li>
<li ><a href="nosotros.php">Nosotros</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="inicio.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Descripcion producto</strong></div>
        </div>
      </div>
    </div>  
    <style type="text/css">
                        
      .flotante1 {
        position:absolute;
        top:1px;                 
        bottom:0px;
        left:15px;
        }
                        
                      </style>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php if ($estado == 1) {
                    echo '<img style="width: 160px;" class="flotante1" src="../public/imagen/oferta.png " />';
                } ?>
                 <img src="../admin/vistas/imagenes/<?php echo $imagen;?>" alt="" class="block-4 text-center border" style="height:100%;width: 100%;max-width: 400px;max-height: 400px;">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $nom_tramite; ?></h2>
             <p><?php echo $descripcion; ?></p>
            <p><strong class="text-primary h4"><?php
             if ($estado ==0) {
             echo "S/."; echo $precio;
            } else{
                 echo"S/. ";echo $oferta;
                 echo' ';
                 echo"<s style='color:#000;font-size: 16px;'>S/. ";echo $precio;echo"</s>";
            }?></strong></p>
            <div class="mb-5">
              <style type="text/css">
                                       #idtacho{
        position:absolute;
        top: 304px;                    
        bottom:0px;
        left:1px;
                          text-decoration:line-through;
                           display: grid;
  grid-template-columns: auto auto auto;
   padding-left: 30%;
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
            </div>
            <p>
            <?php if($fchselecion == 1) { ?>
             <a href="admin/pdf/<?php echo $fchtecnica ?>"  target="_blank" class="buy-now btn btn-sm btn-primary">Ficha Tecnica</a>;
            <?php } ?>
            <br><br>
               <!--<a href="admin/pdf/<?php echo $fchtecnica ?>" id="idfcht" target="_blank"class="buy-now btn btn-sm btn-primary">M¨¢s Informaci¨®n</a>;-->
            <img src="../public/imagen/pago.png" class="responsive">
            <br/>  <br/>
             <p><a href="https://api.whatsapp.com/send?phone=51985203000&text=Hola!%20Quiero%20mas%20informacion!" class="buy-now btn btn-sm btn-primary">Comprar</a></p>
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
              <p><a href="admin/index.php" style="color:white;">Administrador</a></p>
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
  <script src="../public/s/jquery-ui.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/owl.carousel.min.js"></script>
  <script src="../public/js/jquery.magnific-popup.min.js"></script>
  <script src="../public/js/aos.js"></script>

  <script src="../public/js/main.js"></script>
    
  </body>
</html>