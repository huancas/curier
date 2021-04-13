<?php  require_once('../inc/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-info-circle"></i> Contacto
        <small>lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">tabla</a></li>
        <li class="active">Contacto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list"></i> Lista de Contacto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Editar</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Celular</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Email</th>
                  <th>Email</th>
                  <th>Facebook</th>
                </tr>
                </thead>
                <tbody>
                <!-- Mostrar los datos de la lista en la tabla --->
                <?php
                   $pdo = conexion::connect();
                   $sql = 'SELECT * FROM contacto ORDER BY id_co ';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                             echo '<td>';
                            echo '<a class="btn btn-warning" href="actualizar.php?id_informacion='.$row['id_co'].'"><i class="fa fa-edit"></i></a>';
                            echo '</td>';
                            echo '<td>'. $row['direccion'] . '</td>';
                            echo '<td>'. $row['telefono'] . '</td>';
                            echo '<td>'. $row['celular'] . '</td>';
                            echo '<td>'. $row['watsapp'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['email2'] . '</td>';
					        echo '<td>'. $row['email3'] . '</td>';
                            echo '<td>'. $row['facebook'] . '</td>';
                            echo '</tr>';
                   }
                   conexion::disconnect();
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Editar</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Celular</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Email</th>
                  <th>Email</th>
                  <th>Facebook</th>
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
