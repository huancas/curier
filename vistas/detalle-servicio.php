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
     $targeta = '../admin/vistas/imagenes/';
    if ( !empty($_POST)) {

      $msg='';
       
     //   $target = "../imagenes/".basename($_FILES['imagen']['name']);
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion =  $_POST['descripcion'];
         $idcate =  $_POST['idcat'];
       


       

            // Count total files
     $countfiles = count($_FILES['file']['name']);

          // Looping all files
   // $target = "Admin/imagenes/";
    $target = 'admin/imagenes/';


     var_dump($_FILES['file']['name']);
     echo $countfiles;

    // $clave = array_search('', ['file']['name']); // $clave = 2;
  //  die();

   if($_FILES['file']['name'] != null){
     
        // Upload file
         //borramos las imagenes del servidor
           $pdo = conexion::connect();
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "SELECT * FROM foto where servicio_idser='$id_tramite' ";
             $q = $pdo->prepare($sql2);

              foreach ($pdo->query($sql2) as $row2) {
                        unlink($target.$row2['nombre_fo']);
              }
                conexion::disconnect();


           $db = conexion::connect();
          //borramos las imagenes anteriores del la bd

        $sql = "delete from foto where servicio_idser= '$id_tramite' ";
        $db->query($sql);


   for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['file']['name'][$i];
 
        
          
       
       
       //insertamos los nuevos a la bd
       $sql = "INSERT INTO foto (nombre_fo, servicio_idser) VALUES ('$filename', '$id_tramite')";
        $db->query($sql);
        //guardamos en el servidor
         move_uploaded_file($_FILES['file']['tmp_name'][$i], $target.$filename);

        
         if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target.$filename)) {
            $msg = "Image uploaded successfully";
           // header ("location: listar.php");
        
        }
        else{
            echo '<script>alert("Fallo al guardar imagen '.$filename.') </script>';
        }
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
            $sql = " UPDATE servicio set titulo = ?, descripcion = ?, precio = ?, categoria_idcat=?,
              WHERE id_ser = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion,$precio,$idcate, $id_tramite,));
            conexion::disconnect();
            header("Location: listar.php");
        }
    } else {
      if(isset($_GET['id_tramite'])){
                $var = $_GET['id_tramite'];
                $sql = " SELECT servicio.id_ser, foto.nombre_fo, servicio.titulo,servicio.precio,servicio.descripcion,servicio.fchtecnica,servicio.fchselecion, servicio.categoria_idcat
                     FROM servicio inner join foto ON servicio.id_ser=foto.servicio_idser 
                                  where servicio.id_ser = '$var' ";
              }else{
                 $sql = " SELECT servicio.id_ser, foto.nombre_fo, servicio.titulo,servicio.precio,servicio.descripcion, servicio.categoria_idcat
                     FROM servicio inner join foto ON servicio.id_ser=foto.servicio_idser 
                                   ";
              }
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['titulo'];
        $descripcion = $data['descripcion'];
        $precio = $data['precio'];
        $idcatei = $data['categoria_idcat'];
        $fchtecnica = $data['fchtecnica'];
        $fchselecion = $data['fchselecion'];

       
      
        conexion::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="es">
    <meta charset="utf-8">
    <title>InfotelSluciones</title>
    
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
             <li class="active"><a href="servicio.php">Servicios</a></li>
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

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          <img src="<?php echo $targeta.$data['nombre_fo']; ?>" style="height:100%;width: 100%;max-width: 400px;max-height: 400px;" alt="IMG"> 
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $nom_tramite; ?></h2>
            <p><?php echo $descripcion; ?></p>
            <p><strong class="text-primary h4"><?php echo "S/."; echo $precio; ?></strong></p>
            <div class="mb-5">

            </div>
              <?php if($fchselecion == 1) { ?>
             <a href="../admin/vistas/pdf/<?php echo $fchtecnica ?>"  target="_blank" class="buy-now btn btn-sm btn-primary">Más Información</a>;
            <?php } ?>
            <br><br>
            <img src="../public/imagen/pago.png" style="width:100%;">
            <br/>  <br/>
             <p><a href="https://api.whatsapp.com/send?phone=51985203000&text=Hola!%20Quiero%20mas%20información!" class="buy-now btn btn-sm btn-primary">Consultar</a> 
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
                  <li><a href="inicio.php" style="color:white;text-decoration:none;">Inicio</a></li>
                  <li><a href="servicio.php" style="color:white;text-decoration:none;">Servicios</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                   <li><a href="nosotros.php" style="color:white;text-decoration:none;">Nosotros</a></li>
                 <li><a href="producto.php"  style="color:white;text-decoration:none;">Productos</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
 <li><a href="descarga.php" style="color:white;text-decoration:none;">Descargas</a></li>
   <li><a href="contacto.php" style="color:white;text-decoration:none;">Contactenos</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4" style="color:white;text-decoration:none;">Contactanos Info</h3>
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