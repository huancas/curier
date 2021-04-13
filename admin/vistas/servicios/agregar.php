<?php  require_once('../inc/header.php'); 
$msg = "";
    if (isset($_POST['registrar'])) {
        //$target = "../imagenes/".basename($_FILES['image']['name']);
        $db = conexion::connect();
       // $image = $_FILES['image']['name'];
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $idcat = $_POST['idcat'];
        $filename2 = $_FILES['file2']['name'];
        $fchselecion = $_POST['fchselecion'];
       
        $sql = "INSERT INTO servicio (titulo, descripcion,categoria_idcat,precio,fchtecnica,fchselecion) VALUES ('$nom_tramite', '$descripcion','$idcat','$precio','$filename2','$fchselecion')";
        $db->query($sql);
        ///final  insert  servicio
        //obtener id 
        $idse='';
  $sql2 = "SELECT max(id_ser) FROM servicio ";
      foreach ($db->query($sql2) as $row2) {
                         
               $idse= $row2['max(id_ser)'];
              }
            
       
       // Count total files
    

          // Looping all files
    $target = "../imagenes/";

 
  $filename = $_FILES['file']['name'];
 
  // Upload file
   $sql = "INSERT INTO foto (nombre_fo, servicio_idser) VALUES ('$filename', '$idse')";
        $db->query($sql);
  //move_uploaded_file($_FILES['file']['tmp_name'], $target.$filename);
         move_uploaded_file($_FILES['file2']['tmp_name'], $target.$filename2);

         if(move_uploaded_file($_FILES['file']['tmp_name'], $target.$filename)) {
            $msg = "Image uploaded successfully";
           echo "
			<script>
			window.location='listar.php';
			</script>
			";
        
        }
        else{
            echo '<script>alert("Fallo al guardar imagen '.$filename.') </script>';
        }
 
        
        
       
    }
    if (isset($_POST['registrarCat'])) {
       
        $db = conexion::connect();
      
        $nomc = $_POST['nom_cat'];
        $nom_cat= strtoupper ($nomc);
       
       
        $sql = "INSERT INTO categoria (nombre_cat, tipo_cat) VALUES ('$nom_cat','SERVICIO')";
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
              <h3 class="box-title"><i class="fa fa-plus-circle"></i> Nuevo Servicio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="frm-tramite" action="agregar.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Nombre(*):</label>
                 <input id="nom_tramite" name="nom_tramite" type="text"   class="form-control" required></input>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Precio(*):</label>
                <input id="nom_tramite" name="precio" type="text"   class="form-control"></input>
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
  
                   $st = "<option   value='' selected disabled >-SELECCIONE-</option>";
                     foreach ($pdo->query($sql2) as $row2) {
                         
            $st.= "<option   value='".$row2['id_cat']."' >".$row2['nombre_cat']."</option> ";
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
                 <option value="0" selected disabled>-SELECCIONAR-</option>
                 <option value="1">SI</option>
                 <option value="0">NO</option>  
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="image" class="custom-imagen-amarillo"> <i class="fa fa-upload" ></i> Seleccionar Imagen</label>
                 <input id="image" name="file"  type="file" class="upload" onchange="return validarExt()">
                <label for="file2" class="custom-imagen-rojo"> <i class="fa fa-file-pdf-o" ></i> Seleccionar PDF</label>
                 <input id="file2" name="file2"  type="file" class="upload" onchange="return validarExt()">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
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
         <img src="https://codigo-promocional-deportes.com/wp-content/themes/EMDtemplate/img/placeholder/500x500.gif" style="width: 20em;display: block;margin: auto;margin-bottom: 30px;margin-top: 30px;">
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
