<?php 
    require_once('../inc/header.php');
    $msg = "";
    if (isset($_POST['registrar'])) {
        $target = "../imagenes/".basename($_FILES['image']['name']);
        $db = conexion::connect();
        $image = $_FILES['image']['name'];
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $oferta = $_POST['oferta'];
        $estado = $_POST['estado'];
        $target2 ="../pdf/".basename($_FILES['fchtecnica']['name']);
        $fchtecnica =$_FILES['fchtecnica']['name'];
        $fchselecion = $_POST['fchselecion'];
        $idcat = $_POST['idcat'];
       
        $sql = "INSERT INTO producto (nombre_pro, descripcion,precio,oferta,estado,url_producto,fchtecnica,fchselecion,categoria_idcate) 
        VALUES ('$nom_tramite', '$descripcion','$precio','$oferta','$estado','$image','$fchtecnica','$fchselecion','$idcat')";
        $db->query($sql);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            header ("location: listar.php");
        
        }
        else{
            $msg = "Theme was a problem uploading image";
        }
        if (move_uploaded_file($_FILES['fchtecnica']['tmp_name'], $target2)) {
            $msg = "fecha Tecnica uploaded successfully";
            header ("location: listar.php");
        
        }
        else{
            $msg = "Theme was a problem uploading fecha Tecnica";
        }
    }
    if (isset($_POST['registrarCat'])) {
       
        $db = conexion::connect();
      
        $nomc = $_POST['nom_cat'];
        $nom_cat= strtoupper ($nomc);
        $tipo_cat = $_POST['tipo_cat'];
       
        $sql = "INSERT INTO categoria (nombre_cat, tipo_cat) VALUES ('$nom_cat','$tipo_cat')";
        $db->query($sql);
        }
?>
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista Categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Escritorio</a></li>
        <li class="active">Lista de productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
              <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Categoria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nom_cat" class="form-control" id="exampleInputEmail1" placeholder="Nombre de la categoria." required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipo Categoria</label>
                 <select name="tipo_cat" class="form-control" required="true">
            <option value="PRODUCTO">PRODUCTO</option>
            <option value="SERVICIO">SERVICIO</option>
            <option value="DESCARGAS">DESCARGAS</option>
          </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="registrarCat" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Todas las Categorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>N°</th>
                  <th>Nombre</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <!--archivo php--->
                <?php
    $pdo = conexion::connect();
    $sql = "SELECT * FROM categoria ";
    if(isset ($_POST['buscar']))
    {    $buscar = $_POST["palabra"];
     $sql = "SELECT * FROM categoria WHERE nombre_cat like '%$buscar%'";
    }
      
      
       foreach ($pdo->query($sql) as $row) {
           
          
       ?>
                <?php
                 
                   
               
                            echo '<tr>';
                            echo '<td>'. $row['id_cat'] . '</td>';
                            echo '<td>'. $row['nombre_cat'] . '</td>';
                            echo '<td>'; echo ' <center>';
                            echo '<a class="btn btn-warning" href="editar.php?id_tramite='.$row['id_cat'].'"><i class="fa fa-edit"></i></a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="eliminar.php?id_tramite='.$row['id_cat'].'"><i class="fa fa-trash-o"></i></a>';
            echo '</center> ';
                            echo '</td>';
                            echo '</tr>';
                 
                   
                  ?>
                  <?php 
        }
        conexion::disconnect();
    ?>
                <!---------------->
                </tbody>
                <tfoot>
                <tr>
                 <th>N°</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once('../inc/footer.php'); ?>