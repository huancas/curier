<?php  require_once('../inc/header.php');
$id_tramite = null;
    if ( !empty($_GET['id_tramite'])) {
        $id_tramite = $_REQUEST['id_tramite'];
    }
    if ( null==$id_tramite ) {
        header("Location: listar.php");
    }
     
    if ( !empty($_POST)) {

      $msg='';
       
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion =  $_POST['descripcion'];
        //$texto_boton = $_POST['texto_boton'];
        $url_boton = $_POST['url_boton'];
        $local_link = $_POST['local_link'];
        $target2 ="../pdf/".basename($_FILES['fchtecnica']['name']);
        $fchtecnica = $_FILES['fchtecnica']['name'];
        $fchselecion = $_POST['fchselecion'];
        $target = "../imagenes/".basename($_FILES['imagen']['name']);
        $imagen = $_FILES['imagen']['name'];
        $idcate =  $_POST['idcat'];
        $precio = $_POST['precio'];
		$oferta =  $_POST['oferta'];
        $estado = $_POST['estado'];

      if(empty($imagen)){
           $imagen =$_POST['imant'];
        }else{
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target)) {
            $imagenError =  "Image uploaded successfully";
          }
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
         
      /*  if (empty($descripcion)) {
            $msg .=  'Please enter descripcion';
            $valid = false;
        } */
         if (empty($url_boton)) {
            $msg .=  'Please enter URL boton';
            $valid = false;
        }
         if (empty($idcate)) {
            $msg .=  'Please enter idcate';
            $valid = false;
        }  
     /* echo $descripcion; */
        echo  $msg; 
        
        
     error_reporting(E_ALL);
      
     
         
        // update data
        if ($valid) {
            $pdo = conexion::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = " UPDATE descargas set nombre_des = ?, descripcion = ?,url_boton=?,fchtecnica=?,fchselecion=?,url_descarga=?,local_link=?,oferta=?,estado=?,precio=?,categoria_idcate =?  WHERE id_des = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion,$url_boton,$fchtecnica,$fchselecion, $imagen,$local_link,$oferta,$estado,$precio,$idcate, $id_tramite));

            conexion::disconnect();
          //  header("Location: listar.php");
			echo "<script>location.href='listar.php'</script>";
        }
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM descargas where id_des = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['nombre_des'];
        $descripcion = $data['descripcion'];
        $texto_boton = $data['texto_boton'];
        $url_boton = $data['url_boton'];
        $local_link = $data['local_link'];
        //$namelocal = $data['namelocal'];
        $fchtecnica = $data['fchtecnica'];
        $fchselecion = $data['fchselecion'];
        $idcatei = $data['categoria_idcate'];
        $imagen = $data['url_descarga'];
        $precio = $data['precio'];
		$oferta = $data['oferta'];
        $estado = $data['estado'];
        conexion::disconnect();
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
            <form role="form" action="actualizar.php?id_tramite=<?php echo $id_tramite?>" id="frm-tramite"  method="POST" enctype="multipart/form-data">
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
            <div class="col-md-4">
              <div class="form-group">
                <label>Precio(*):</label>
                <input id="precio"  name="precio" value="<?php echo !empty($precio)?$precio:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Oferta(*):</label>
                <select name="estado" class="form-control" required="true">
                 <option value="0">-SELECCIONAR-</option>
                 <option value="1"<?php if($estado==1){echo "selected";} ?>>SI</option>
                 <option value="0"<?php if($estado==0){echo "selected";} ?>>NO</option>   
          </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Precio Oferta:</label>
                <input id="oferta" name="oferta" value="<?php echo !empty($oferta)?$oferta:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
                        <div class="col-md-10">
              <div class="form-group">
                <label>Link del boton(*):</label>
                <input id="url_boton"  name="url_boton" value="<?php echo !empty($url_boton)?$url_boton:'';?>"   class="form-control"></input>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-2">
              <div class="form-group">
               <label for=""><br></label>
                <select name="local_link" class="form-control" >
                 <option value="1" >Link</option> 
          </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Categoria</label>
                <select name="idcat"  class="form-control select2" required="true">
                  <?php
                    $pdo = conexion::connect();
                   $sql2 = "SELECT * FROM categoria where tipo_cat='descargas' ORDER BY id_cat ASC ";
  
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
                <textarea  class="form-control" id="descripcion" name="descripcion"><?php echo !empty($descripcion)?$descripcion:'';?></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="image" class="custom-imagen-amarillo"> <i class="fa fa-upload" ></i> Seleccionar Imagen</label>
                 <input id="image" name="imagen"  type="file" class="upload" onchange="return validarExt()">
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
                <button type="submit" name="actualizar" class="btn btn-primary"><i class="fa fa-refresh"></i> Actualizar</button>
                <a href="#" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</a>
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
