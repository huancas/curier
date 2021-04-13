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
$TAMANO_PAGINA = 15; 

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
             
             <li class="active"><a href="producto.php">Productos</a></li>
             <li><a href="servicio.php">Servicios</a></li>
            <li><a href="descarga.php">Descargas</a></li>
<li ><a href="nosotros.php">Nosotros</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div>
      </nav>
    </header>
  <?php include('../public/social/index.php') ?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="inicio.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Productos</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row">
              <div class="col-md-12 mb-5">
                <h3 class="text-black h5">Todos Nuestros Productos</h3>
              </div>
            </div>
            <div class="row mb-5">
                <?php
  
 
   $sql = " select * from producto ".$criterio." limit ".$inicio .",". $TAMANO_PAGINA ;
   
     
      
       foreach ($pdo->query($sql) as $row) {

                      ?>
                             <div class="col-md-4 col-sm-6 col-xs-6">
                                                        <div class="course block-4 text-center border" id="idtexto">
                                                                <a href="detalle-producto.php?id_tramite=<?php echo $row['id_pro']; ?>" class="course-img">
                                                                        <img src="../admin/vistas/imagenes/<?php echo $row['url_producto']; ?>" alt="" style="height: 180px;">
                                                                        <i id="" class="course-link-icon fa fa-link" style="color: blue;"></i>
                                                                        <?php if ($row['estado']==1) {
                                                                           echo '<img style="width: 130px;" class="flotante1" src="../public/imagen/oferta.png " />';
                                                                        } ?>
                                                                </a>
                                                                
                                                                <a style="font-size: 13px;" class="course-title"  href="#"><?php echo $row['nombre_pro']; ?></a>
                                                               
                                                                <?php if ($row['estado']==1) {
                                                               echo '<p id="idtacho"><p:p>';  echo "S/.";echo $row['precio']; 
                                                               echo '<p id="idt"><p:/p>'; echo "S/."; echo $row['oferta'];
                                                                }else{

                                                                  echo '<p id="idt"><p:/p>';echo "S/.";echo $row['precio'];
                                                                }  ?>
                                                              
                                                        
                                                        </div>
                                                </div>

          <?php
           
            }
        conexion::disconnect();
       ?>
    
            </div>
                       <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul class="pages">
                    <!--<li style=""><a href="#">&lt;</a></li>-->
                     <?php   //muestro los distintos índices de las páginas, si es que hay varias páginas 
                  
          if ($total_paginas > 1){ 
            for ($i=1;$i<=$total_paginas;$i++){ 
                if ($pagina == $i) 
            //si muestro el índice de la página actual, no coloco enlace 
                    if($total_paginas>10){
                   echo $pagina . " "; }
                   else{
                  echo '<li class="active stile" style="text-align: center;
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    border: 1px solid #ccc;">'.$pagina.'</li>';  }
                else 
            //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                if($total_paginas>10){
                   echo "<a href='producto.php?pagina=" . $i . "'>" . $i . "</a> ";  }
                   else{
                 echo '<li><a href="producto.php?pagina='.$i.'">'.$i.'</a></li>';  } 
            
        }  
             }                   
              ?>
                    <!--<li><a href="#">&gt;</a></li>-->
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <style> 
input[type=text] {
  width: 200px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('../public/imagen/busc.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
</style>
          <div class="col-md-3 order-1 mb-5 ">
            <div class="border p-4 rounded mb-1" style="margin-top:100px;">
               <form>
                <input class="input" type="text" name="search" placeholder="buscar...">
              </form><br>
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categoria</h3>
              <ul class="list-unstyled mb-0">
                <a href="producto.php" id="idbusca">TODO</a>
                 <?php
  
    $pdo = conexion::connect();
   $sql = "SELECT * FROM categoria where tipo_cat ='PRODUCTO' order by id_cat DESC ";
   $plus="";
   if(isset($_GET['search'])){
     $plus="&search=".$_GET['search'];
   }
      foreach ($pdo->query($sql) as $row) { 
                      ?>
                 <a class="category"  id="idbusca"href="producto.php?cat=<?php echo $row['id_cat'].$plus; ?>"><br><?php echo $row['nombre_cat']; ?></a>
                                 

          <?php
           
            }
        conexion::disconnect();
       ?>
              </ul>
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