<?php  require_once('../inc/header.php'); 
    $msg = "";
    if (isset($_POST['registrar'])) {
        $target = "../imagenes/".basename($_FILES['image']['name']);
        $db = conexion::connect();
        $image = $_FILES['image']['name'];
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion = $_POST['descripcion'];
        $descripcion1 = $_POST['descripcion1'];
        $descripcion2 = $_POST['descripcion2'];
        $descripcion3 = $_POST['descripcion3'];
        $descripcion4 = $_POST['descripcion4'];
        $descripcion5 = $_POST['descripcion5'];
        $descripcion6 = $_POST['descripcion6'];
        $descripcion7 = $_POST['descripcion7'];
        $descripcion8 = $_POST['descripcion8'];
        $descripcion9 = $_POST['descripcion9'];
        $precio = $_POST['precio'];
        $oferta = $_POST['oferta'];
        $estado = $_POST['estado'];
        $target2 ="../pdf/".basename($_FILES['fchtecnica']['name']);
        $fchtecnica =$_FILES['fchtecnica']['name'];
        $fchselecion = $_POST['fchselecion'];
        $idcat = $_POST['idcat'];
       
        $sql = "INSERT INTO producto (nombre_pro, descripcion,descripcion1,descripcion2,descripcion3,descripcion4,descripcion5,descripcion6,descripcion7,descripcion8,descripcion9,precio,oferta,estado,url_producto,fchtecnica,fchselecion,categoria_idcate) 
        VALUES ('$nom_tramite', '$descripcion','$descripcion1','$descripcion2','$descripcion3','$descripcion4','$descripcion5','$descripcion6','$descripcion7','$descripcion8','$descripcion9','$precio','$oferta','$estado','$image','$fchtecnica','$fchselecion','$idcat')";
        $db->query($sql);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
           echo "
			<script>
			window.location='listar.php';
			</script>
			";
        
        }
        else{
            $msg = "Theme was a problem uploading image";
        }
        if (move_uploaded_file($_FILES['fchtecnica']['tmp_name'], $target2)) {
            $msg = "fecha Tecnica uploaded successfully";
            echo "
			<script>
			window.location='listar.php';
			</script>
			";
        
        }
        else{
            $msg = "Theme was a problem uploading fecha Tecnica";
        }
    }
    if (isset($_POST['registrarCat'])) {
       
        $db = conexion::connect();
      
        $nomc = $_POST['nom_cat'];
        $nom_cat= strtoupper ($nomc);
       
       
        $sql = "INSERT INTO categoria (nombre_cat, tipo_cat) VALUES ('$nom_cat','PRODUCTO')";
        $db->query($sql);
        }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Producto
        <small>formulario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">formulario</a></li>
        <li class="active">Producto</li>
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
              <h3 class="box-title"><i class="fa fa-plus-circle"></i> Nuevo Producto</h3>
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
                <input id="nom_tramite" name="nom_tramite" type="text"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Precio(*):</label>
               <input id="precio" name="precio" type="text"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Oferta(*):</label>
                <select name="estado" class="form-control" required="true">
                 <option value="0">-SELECCIONAR-</option>
                 <option value="1">SI</option>
                 <option value="0">NO</option>  
          </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Precio Oferta:</label>
                <input id="oferta" name="oferta" type="text"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Categoria</label>
                 <select name="idcat" class="form-control select2" required="true">
                  <?php
                    $pdo = conexion::connect();
                   $sql2 = "SELECT * FROM categoria where tipo_cat='PRODUCTO' ORDER BY id_cat ASC ";
  
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
                <label>Ficha Tecnica(*)</label>
                <select name="fchselecion" class="form-control" required="true">
                 <option value="0">-SELECCIONAR-</option>
                 <option value="1">SI</option>
                 <option value="0">NO</option>  
          </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Descripción</label>
                <textarea rows="4" id="descripcion" name="descripcion" type="text"   class="form-control" ></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="image" class="custom-imagen-amarillo">
                   <i class="fa fa-upload" ></i> Seleccionar Imagen
                  </label>
                 <input id="image" name="image"  type="file" class="upload" onchange="return validarExt()">
                <label for="fchtecnica" class="custom-imagen-rojo"> <i class="fa fa-file-pdf-o" >
                </i> Seleccionar PDF</label>
                 <input id="fchtecnica" name="fchtecnica"  type="file" class="upload" onchange="return validarExt()">
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
