<?php
include ("../admin/vistas/escritorio/config/conexion.php");
$active="active";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>InfotelSoluciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../public/social/main.css">
    <link rel="stylesheet" href="../public/social/font.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/magnific-popup.css">
    <link rel="stylesheet" href="../public/css/jquery-ui.css">
    <link rel="stylesheet" href="../public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/aos.css">
    <link rel="stylesheet" href="../public/css/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>
  <body>
  <!--------------imagen----------------------------------------------------------------------------------->
<style>
.clink{
	text-decoration: none;
}
.responsive2 {
  width: 100%;
  height: auto;
}
.social-bar{
  font-size:28px;
}
</style>
<img src="../public/imagen/ban_2.jpg" alt="Nature" class="responsive2" width="600" height="400">
<!-------------------->
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
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" style="text-decoration: none;" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
             <li class="active"><a href="inicio.php" style="text-decoration:none;font-size:13px;">Inicio</a></li>
             <li><a href="producto.php" style="text-decoration:none;font-size:13px;">Productos</a></li>
             <li><a href="servicio.php" style="text-decoration:none;font-size:13px;">Servicios</a></li>
            <li><a href="descarga.php" style="text-decoration:none;font-size:13px;">Descargas</a></li>
            <li><a href="nosotros.php" style="text-decoration:none;font-size:13px;">Nosotros</a></li>
            <li><a href="contacto.php" style="text-decoration:none;font-size:13px;">Contacto</a></li>
          </ul>
        </div>
      </nav>
    </header>
<!-------------------------------------------------------->
<div class="row-fluid">
     <div class="slider-area">
        <div class="" style="max-width: 4000px;">
      <div id="carousel-example-captions" class="carousel slide" data-ride="carousel" align="left"> 
        <?php
          $sql_slider=mysqli_query($con,"select * from slider where estado=1 order by orden");
          $nums_slides=mysqli_num_rows($sql_slider);
        ?>
          <ol class="carousel-indicators">
            <?php 
            for ($i=0; $i<$nums_slides; $i++){
              $active="active";
              ?>
              <li data-target="#carousel-example-captions" data-slide-to="<?php echo $i;?>" class="<?php echo $active;?>"></li>
              <?php
              $active="";
            }
            ?>
            
          </ol> 
        <div class="carousel-inner" role="listbox" style="max-width: 1400px;"> 
        <?php
          $active="active";
          while ($rw_slider=mysqli_fetch_array($sql_slider)){
        ?>
            <div class="item <?php echo $active;?>"> 
              <img data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="../admin/vistas/escritorio/img/slider/<?php echo $rw_slider['url_image'];?>" data-holder-rendered="true"style="width: 100%;max-height:500px;height: 100%;"> 
              <div class="carousel-caption"> 
                 
              </div> 
            </div>
            <?php
            $active="";
          }
        ?>
          
           
          
        </div> 
        <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
        <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
      </div>
        </div>
    </div>
  
</div>
<!-------------------------------------------------------------------------------------------------->
    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>¿Por qué Elegirnos?</h2>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
                <span class="fa fa-trophy"></span>
                <!--<span><img src="images/icon.png" style="width: 50px;"></span>-->
            </div>
            <div class="text">
              <h2 class="text-uppercase">Calidad</h2>
              <p>Contamos con un personal altamente calificado y con experiencia.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="fa fa-handshake-o"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Confianza</h2>
              <p>Contamos con una amplia gama de tecnología a nuestra disposición .</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="fa fa-clock-o"></span>
               <!--<span><img src="images/icon.png" style="width: 50px;"></span>-->
            </div>
            <div class="text">

              <h2 class="text-uppercase">Puntualidad</h2>
              <p>Sabemos que su tiempo es valioso, por eso siempre estamos a tiempo.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-------------------------------------------------------------------------------------------------->
    <div class="site-section block-3 site-blocks-2 bg-light " style="position: static;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 site-section-heading text-center pt-4">
            <h2>NUESTRAS ESPECIALIDADES</h2>
            <p style="font-size: 22px;">En Soporte Tecnico:<p>
          <img src="../public/imagen/diag.png" style="width: 100%;height: auto; ">
          </div>
        </div>
        <div class="row">
             <div class=" tab w3-content w3-section">
       <!--https://image.flaticon.com/icons/png/512/16/16404.png-->
        <style type="text/css">
         .textoclas{
         	font-size: 10px;
         }
        	@media (max-width: 1280px) {
            .textoclas { font-size: 14px; }
            }

           @media (max-width: 800px) {
           .textoclas { font-size: 12px; }
           }
        </style>
  <button class="tablinks mytraslate" onclick="openCity(event, 'London')" id="defaultOpen"><img src=""> IMPRESORAS</button>
  <button class="tablinks mytraslate" onclick="openCity(event, 'Paris')"><img src="" > CISS/CHIP VIRTUAL</button>
    <button class="tablinks mytraslate" onclick="openCity(event, 'Tokyo5')"><img src="" class="textoclas">FIRMWARE /RESET /BIN</button>
   <button class="tablinks mytraslate" onclick="openCity(event, 'Tokyo')"><img src="" > COMPUTADORAS /LAPTOPS </button>
  <button class="tablinks mytraslate" onclick="openCity(event, 'Tokyo2')"><img src=""> CONECTIVIDAD Y REDES</button>
    <button class="tablinks mytraslate" onclick="openCity(event, 'Tokyo4')"><img src="">SEGURIDAD ELECTRONICA</button>
  <button class="tablinks mytraslate" onclick="openCity(event, 'Tokyo3')"><img src="">SUMINISTROS / ACCESORIOS</button>

</div>
<div id="London" class="tabcontent mySlides2">
 <img src="../public/imagen/impresoras.jpg" style="width:100%;height:477px;">
</div>

<div id="Paris" class="tabcontent  mySlides2">
  <img src="../public/imagen/chip.jpg" style="width:100%;height:477px;">
</div>
<div id="Tokyo5" class="tabcontent  mySlides2">
  <img src="../public/imagen/firmware.jpg" style="width:100%;height:477px;">
</div>
<div id="Tokyo" class="tabcontent  mySlides2">
 <img src="assets/images/slider/4.jpg" style="width:100%;height:477px;">
</div>

<div id="Tokyo2" class="tabcontent mySlides2">
  <img src="../public/imagen/red1.jpg" style="width:100%;height:477px;">
</div>
<div id="Tokyo4" class="tabcontent  mySlides2">
  <img src="../public/imagen/seguridad.jpg" style="width:100%;height:477px;">
</div>
<div id="Tokyo3" class="tabcontent  mySlides2">
  <img src="../public/imagen/productos.png" style="width:100%;height:477px;">
</div>
<script>

function openCity(evt, cityName,cam) {
  var i, tabcontent, tablinks, carouselito;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  if (tabcontent == Tokyo4) {
     document.getElementById('tablinks').style.background="#fff";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
   // tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(cityName).style.display = "block";
  //evt.currentTarget.className += " active";
  // evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
 //document.getElementById("defaultOpen").click();
var myIndex = 0;
carousel();

function carousel() {
  var a;
  var x = document.getElementsByClassName("mySlides2");
  for (a = 0; a < x.length; a++) {
    x[a].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block"; 

 var porClassName=document.getElementsByClassName("tablinks mytraslate")[myIndex-1];
 if(myIndex > 1){
 var antes=document.getElementsByClassName("tablinks mytraslate")[myIndex-2];
 antes.style.backgroundColor = "#A9BCF5";
}
 //alert(myIndex);
 //var porClassName2=document.getElementsByClassName("tablinks mytraslate")[myIndex-2];
     porClassName.className += " active";
     porClassName.style.backgroundColor = "#2E64FE";
    // porClassName2.className = "";
  setTimeout(carousel, 10000); // Change image every 2 seconds
  /*var porClassName=document.getElementsByClassName("tablinks mytraslate")[myIndex-1];
     porClassName.className = " "; */
}
</script>

<script>
var myInd = 0;
caro();

function caro() {
  var e;
  var x = document.getElementsByClassName("mytraslate");
  for (e = 0; e < x.length; e++) {
    x[e].style.display = "none";  
  }
  myInd++;
  if (myInd > x.length) {myInd = 1}    
  x[myInd-1].style.d-lg-flex = "block";  
  setTimeout(caro, 10000); // Change image every 2 seconds
}
</script>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
     </div>
    </div>
    <br>
    <hr>
<!-------------------------------------------------------------------------------------------------->
   
          <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
              	<div class="w3-content w3-section" style="max-width:600px">
  <img class="myCambio" src="../public/imagen/ini.jpg" style="width:100%;height: 370px;">
  <img class="myCambio" src="../public/imagen/ini.jpg" style="width:100%;height: 370px;">
</div>
<script>
var myIndexo = 0;
carouseli();

function carouseli() {
  var e;
  var x = document.getElementsByClassName("myCambio");
  for (e = 0; e < x.length; e++) {
    x[e].style.display = "none";  
  }
  myIndexo++;
  if (myIndexo > x.length) {myIndexo = 1}    
  x[myIndexo-1].style.display = "block";  
  setTimeout(carouseli, 2000); // Change image every 2 seconds
}
</script>


              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            
            
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">INFOTEL SOLUCIONES </h2>
            </div>
             <p style="text-align:justify;font-size:20px;">Somos una Empresa que nuestro principal objetivo, con nuestros clientes es la satisfacción total en  soporte técnico y ventas. Tenemos la Capacidad y Experiencia en brindarle múltiples soluciones.</p>
            <img src="../public/imagen/envio.png" style="width:100%;max-width: 450px;">
          </div>
        </div>
      </div>
    </div>

   <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Nuestros Videos</h2>
          </div>
        </div>
        <div class="">
          <div class="col-md-12 col-lg-6 mb-5">
          <?php include('../admin/vistas/video1/video.php')  ?>
          </div>
          <div class="col-md-12 col-lg-6 mb-5">
          <?php include('../admin/vistas/video2/video.php')  ?>
          </div>
        </div>
      </div>
    </div>
   <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Lo Mejor para tus Equipos</h2>
      <p style="font-size:16px;"><p>
          </div>
        </div>
        <div class="row">
            <div class="">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <h3 class="block-38-heading h4"></h3> <br>
                </div>
                <div class="">
        <p style="text-align:center;font-size:20px;">Utilizamos productos de las mejores marcas para nuestros servicios<br> de Reparación y Mantenimiento de Computadoras, Impresoras, laptops, Redes, Cámaras de Vigilancia, Venta de Computo.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../public/imagen/slides-m/n1.jpg" alt="Los Angeles" style="width:100%;height: 90px;">
      </div>

      <div class="item">
        <img src="../public/imagen/slides-m/n2.jpg" alt="Chicago" style="width:100%;height: 90px;">
      </div>
      <div class="item">
        <img src="../public/imagen/slides-m/n3.jpg" alt="Chicago" style="width:100%;height: 90px;">
      </div>
    
    </div>

    <!-- Left and right controls -->
  </div>
  <div class="social-bar">
    <a href="https://www.facebook.com/InfotelSoluciones/?ref=br_rs" class="icon icon-facebook" target="_blank" 
    style="text-decoration:none;color: #fff;"
    >
    </a>
    <a href="https://www.youtube.com/channel/UCg94W6QS_i42y3ToXuaHp9g" class="icon icon-youtube" target="_blank"
    style="text-decoration:none;color: #fff;"
    >
    </a>
    <a href=" https://api.whatsapp.com/send?phone=51985203000&text=Hola!%20Quiero%20mas%20información!" class="icon icon-whatsapp" target="_blank"
    style="text-decoration:none;color: #fff;"
    >	
    </a>
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
  <!--------------------------->
    <style>
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 900px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  display: table;
  clear: both;
}
</style>
    <style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  background-color: #A9BCF5;
  width: 30%;
  height: 100px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}
@media (max-width: 1280px) {
 .tab button { font-size: 14px; }
}

@media (max-width: 800px) {
 .tab button { font-size: 10px; }
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #2E64FE;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #2E64FE;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  width: 70%;
  border-left: none;
  height: 300px;
}
</style>
  </body>
</html>