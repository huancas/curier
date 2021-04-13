<?php  
require_once('../inc/header.php'); 
    $id_tramite = null;
    if ( !empty($_GET['id_tramite'])) {
        $id_tramite = $_REQUEST['id_tramite'];
    }
     
    if ( null==$id_tramite ) {
        header("Location: listar.php");
    }
     
    if ( !empty($_POST)) {

      $msg='';
       
        $target = "../imagenes/".basename($_FILES['image']['name']);
        $target2 ="../pdf/".basename($_FILES['fchtecnica']['name']);
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion =  $_POST['descripcion'];
        $precio = $_POST['precio'];
        $oferta = $_POST['oferta'];
        $estado = $_POST['estado'];
        $idcate =  $_POST['idcat'];
        $image = $_FILES['image']['name'];
        $fchtecnica =$_FILES['fchtecnica']['name'];
        $fchselecion = $_POST['fchselecion'];

		if(empty($image)){
           $image =$_POST['imant'];
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $imageError =  "Image uploaded successfully";
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
         /* if($image==""){
$sql = " UPDATE producto set nombre_pro = ?, descripcion = ?, precio = ?, oferta = ?,estado = ?, descripcion1 = ?, descripcion2 = ?, descripcion3 = ?, descripcion4 = ?, descripcion5 = ?, descripcion6 = ?, descripcion7 = ?, descripcion8 = ?, descripcion9 = ?, fchtecnica = ?, fchselecion = ?,categoria_idcate =?  WHERE id_pro = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion,$precio,$oferta,$estado,$descripcion1,$descripcion2,$descripcion3,$descripcion4,$descripcion5,$descripcion6,$descripcion7,$descripcion8,$descripcion9,$fchtecnica,$fchselecion, $idcate, $id_tramite));
}
else{}*/
            $sql = " UPDATE producto set nombre_pro = ?, descripcion = ?, precio = ?, oferta = ?,estado = ?,url_producto=?, fchtecnica = ?, fchselecion = ?,categoria_idcate =?  WHERE id_pro = ?";

            $q = $pdo->prepare($sql);
            $q->execute(array($nom_tramite,$descripcion,$precio,$oferta,$estado,$image,$fchtecnica,$fchselecion, $idcate, $id_tramite));
            conexion::disconnect();
            //  header("Location: listar.php");
			echo "<script>location.href='listar.php'</script>";
        }
    } else {
        $pdo = conexion::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM producto where id_pro = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_tramite));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nom_tramite = $data['nombre_pro'];
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
        $idcatei = $data['categoria_idcate'];
        $image = $data['url_producto'];
        $precio = $data['precio'];
        $oferta = $data['oferta'];
        $estado = $data['estado'];
        $fchtecnica =$data['fchtecnica'];
        $fchselecion = $data['fchselecion'];
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
              <h3 class="box-title"><i class="fa fa-refresh"></i> Actualizar Producto</h3>
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
            <div class="col-md-4">
              <div class="form-group">
                <label>Precio(*):</label>
                <input id="precio" name="precio" value="<?php echo !empty($precio)?$precio:'';?>"   class="form-control"></input>
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Categoria</label>
               <select name="idcat" class="form-control select2" required="true">
                  <?php
                    $pdo = conexion::connect();
                   $sql2 = "SELECT * FROM categoria where tipo_cat='PRODUCTO' ORDER BY id_cat ASC ";
  
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
                 <textarea rows="4"  class="form-control" id="descripcion" name="descripcion"><?php echo !empty($descripcion)?$descripcion:'';?></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="image" class="custom-imagen-amarillo"> <i class="fa fa-upload" ></i> Seleccionar image</label>
                 <input id="image" name="image"  type="file" class="upload" onchange="return validarExt()">
                 <input type="hidden" name="imant" value="<?php echo !empty($image)?$image:'';?>" />
                 <input type="hidden" name="fant" value="<?php echo !empty($fchtecnica)?$fchtecnica:'';?>" />
                <label for="fchtecnica" class="custom-imagen-rojo"> <i class="fa fa-file-pdf-o" ></i> Seleccionar PDF</label>
                 <input id="fchtecnica" name="fchtecnica"  type="file" class="upload">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="actualizar" class="btn btn-success"><i class="fa fa-refresh"></i> Actualizar</button>
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
              <h3 class="box-title"><i class="fa fa-image"></i> image</h3>
            </div>
            <form class="form-horizontal">
              <div id="visorArchivo" style="width: 20em;display: block;margin: auto;margin-bottom: 30px;margin-top: 30px;">
        <!--Aqui se desplegará el fichero-->
         <img src="../imagenes/<?php echo $image;?>" style="width: 20em;display: block;margin: auto;margin-bottom: 30px;margin-top: 30px;">
          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <p>Asegurese que la image coincida con el archivo selecionado.</p>
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
