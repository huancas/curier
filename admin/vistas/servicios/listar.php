<?php  require_once('../inc/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Servicios
        <small>tabla</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> INicio</a></li>
        <li><a href="#">lista</a></li>
        <li class="active">servicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list"></i> Stock de Servicios</h3>
              <a href="agregar.php" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nuevo Servicio</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Opciones</th>
                  <th>Imgen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>categoría</th>
                </tr>
                </thead>
                <tbody>
                <!-- Mostrar los datos de la lista en la tabla --->
<?php
    $pdo = conexion::connect();
    $sql = "SELECT s.id_ser,s.titulo,s.precio,c.nombre_cat as categoria FROM servicio s
	INNER JOIN categoria c WHERE s.categoria_idcat=c.id_cat ";
    if(isset ($_POST['buscar']))
    {    $buscar = $_POST["palabra"];
     $sql = "SELECT * FROM servicio WHERE titulo like '%$buscar%'";
    }
      
       $sqli = "SELECT * FROM foto WHERE servicio_idser = ";
       foreach ($pdo->query($sql) as $row) {
           
          
       ?>
                             <?php
                  echo '<tr>';
		   echo '<td>';
                            echo '<a class="btn btn-warning" href="actualizar.php?id_tramite='.$row['id_ser'].'"><i class="fa fa-edit"></i></a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="eliminar.php?id_tramite='.$row['id_ser'].'"><i class="fa fa-trash-o"></i> </a>';
                            echo '</td>';
		   echo '<td>';
                     foreach ($pdo->query($sqli.$row['id_ser']) as $roi) {
                          
                          
                     
                            echo '<a href="../imagenes/'.$roi['nombre_fo'].'"><img src="../imagenes/'.$roi['nombre_fo'].'" style="width: 60px; height: 60px;"/></a>';
                          
                        }
                         echo '</td>';
                            echo '<td>'. $row['titulo'] . '</td>';
                         echo '<td width="200" height="16">S/ '. $row['precio'] . '</td>';
                           
                            echo '<td>'. $row['categoria'] . '</td>';
                                                   
                            echo '</tr>';
                             ?>
     <?php 
        }
        conexion::disconnect();
    ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Opciones</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>categoría</th>
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
  <?php require_once ('../inc/footer.php'); ?>
