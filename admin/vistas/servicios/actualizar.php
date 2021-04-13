<?php  require_once('../inc/header.php'); 
$id_tramite = null;
    if ( !empty($_GET['id_tramite'])) {
        $id_tramite = $_REQUEST['id_tramite'];
    }
     
    if ( null==$id_tramite ) {
        echo "
			<script>
			window.location='listar.php';
			</script>
			";
    }
     
    if ( !empty($_POST)) {

      $msg='';
       
     //   $target = "../imagenes/".basename($_FILES['imagen']['name']);
        $target2 ="../pdf/".basename($_FILES['fchtecnica']['name']);
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion =  $_POST['descripcion'];
        $precio =  $_POST['precio'];
        $fchtecnica =$_FILES['fchtecnica']['name'];
        $fchselecion = $_POST['fchselecion'];
        $idcate =  $_POST['idcat'];
       
        // Count total files
     

          // Looping all files
    $target = "../imagenes/";

     #var_dump($_FILES['file']['name']);
     #echo $countfiles;

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
                        #unlink($target.$row2['nombre_fo']);
              }
                conexion::disconnect();


           $db = conexion::connect();
          //borramos las imagenes anteriores del la bd

        $sql = "delete from foto where servicio_idser= '$id_tramite' ";
        $db->query($sql);


  
      $filename = $_FILES['file']['name'];

       if($filename !=''){
         
       //insertamos los nuevos a la bd
       $sql = "INSERT INTO foto (nombre_fo, servicio_idser) VALUES ('$filename', '$id_tramite')";
        $db->query($sql);

          if(move_uploaded_file($_FILES['file']['tmp_name'], $target.$filename)) {
            $msg = "Image uploaded successfully";
           // header ("location: listar.php");
		   echo "<script>location.href='listar.php'</script>";
        
        }
        else{
            echo '<script>alert("Fallo al guardar imagen '.$filename.') </script>';
        }
      }
     
	 //guardamos en el servidor
       /*if($_FILES['fchtecnica']['tmp_name']!=''){
        if (move_uploaded_file($_FILES['fchtecnica']['tmp_name'], $target2)) {
            $imagenError =  "PDF uploaded successfully";
            
        } else{
            echo '<script>alert("Fallo al guardar pdf '.$fchtecnica.') </script>';
        }
      }*/
	  
   }
     
	 if(empty($fchtecnica)){
           $fchtecnica =$_POST['fant'];
        }else{
          if (move_uploaded_file($_FILES['fchtecnica']['tmp_name'], $target2)) {
            $msg = "Image uploaded successfully";
           
		  }else{
			  $msg = "filed  upload fhctwcnica";
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
		
		 echo  $msg; 
		 error_reporting(E_ALL);
 
        // update data
        if ($valid) {
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = " UPDATE servicio set titulo = ?, descripcion = ?,precio = ?, fchtecnica = ?,fchselecion = ?, categoria_idcat=? WHERE id_ser = ?";
            /*if($fchtecnica==""){
              $fchtecnica = $_POST['ant'];
            }*/
            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion,$precio,$fchtecnica,$fchselecion,$idcate, $id_tramite));
            conexion::disconnect();
            // header("Location: listar.php");
	    echo "<script>location.href='listar.php'</script>";
        }
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *,foto.nombre_fo as imagen From servicio INNER JOIN foto ON servicio.id_ser = foto.servicio_idser WHERE id_ser = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['titulo'];
        $descripcion = $data['descripcion'];
        $precio = $data['precio'];
        $idcatei = $data['categoria_idcat'];
        $fchtecnica =$data['fchtecnica'];
        $fchselecion = $data['fchselecion'];
		$imagen = $data['imagen'];
      
        conexion::disconnect();
    }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Servicio
        <small>formulario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">formulario</a></li>
        <li class="active">Servicio</li>
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
              <h3 class="box-title"><i class="fa fa-refresh"></i> Actualizar Servicio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="actualizar.php?id_tramite=<?php echo $id_tramite?>" id="frm-tramite"  method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Nombre(*):</label>
                <input id="nom_tramite" name="nom_tramite" value="<?php echo !empty($nom_tramite)?$nom_tramite:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Precio(*):</label>
                <div class="input-group">
                <span class="input-group-addon">s/.</span>
                 <input id="precio" name="precio" value="<?php echo !empty($precio)?$precio:'';?>"   class="form-control"></input>
                <span class="input-group-addon">.00</span>
              </div>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Categoria</label>
                <select name="idcat" class="form-control select2" required="true">
                  <?php
                    $pdo = conexion::connect();
                   $sql2 = "SELECT * FROM categoria where tipo_cat='SERVICIO' ORDER BY id_cat ASC ";
  
                   $st = "";
                   $sel='';
                     foreach ($pdo->query($sql2) as $row2) {
                      if($idcatei==$row2['id_cat']){
                        $sel = 'selected="true" ';
                      }                        
            $st.= "<option ".$sel."  value='".$row2['id_cat']."' >".$row2['nombre_cat']."</option> ";
                $sel='';
              }
            echo $st;
            ?>
          </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Ficha Tecnica</label>
                <select name="fchselecion" class="form-control" required="true">
                 <option value="0">-SELECCIONAR-</option>
                <option value="1"<?php if($fchselecion==1){echo "selected";} ?>>SI</option>
                 <option value="0"<?php if($fchselecion==0){echo "selected";} ?>>NO</option>    
          </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Descripción</label>
               <textarea  class="form-control" rows="4"  id="descripcion" name="descripcion"><?php echo !empty($descripcion)?$descripcion:'';?></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="image" class="custom-imagen-amarillo"> <i class="fa fa-upload" ></i> Seleccionar Imagen</label>
                 <input id="image" name="file"  type="file" class="upload" onchange="return validarExt()">
                <input type="hidden" name="fant" value="<?php echo !empty($fchtecnica)?$fchtecnica:'';?>" />
			<input type="hidden" name="imant" value="<?php echo !empty($imagen)?$imagen:'';?>" />
                <label for="fchtecnica" class="custom-imagen-rojo"> <i class="fa fa-file-pdf-o" ></i> Seleccionar PDF</label>
                 <input id="fchtecnica" name="fchtecnica"  type="file" class="upload" onchange="return validarExt()">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="actualizar" class="btn btn-warning"><i class="fa fa-refresh"></i> Actualizar</button>
                <a href="listar.php" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-image"></i> Imagen</h3>
            </div>
            <form class="form-horizontal">
              <div id="visorArchivo" style="width: 20em;display: block;margin: auto;margin-bottom: 30px;margin-top: 30px;">
        <!--Aqui se desplegará el fichero--> 
         <img src="../imagenes/<?php echo $imagen; ?>" style="width: 20em;display: block;margin: auto;margin-bottom: 30px;margin-top: 30px;">
          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <p>Asegurese que la imagen coincida con el archivo selecionado.</p>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php  require_once('../inc/footer.php'); ?>
