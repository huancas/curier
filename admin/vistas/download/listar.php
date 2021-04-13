<?php  
require_once('../inc/header.php');
require_once('../../controller/SolicitudEnvioController.php'); 
require_once('../../model/SolicitudEnvioModel.php');  
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Descargas
        <small>tabla</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">lista</a></li>
        <li class="active">descarga</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list"></i> Stock de Descargas</h3>
              <a href="agregar.php" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nueva Descarga</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Opciones</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Categoría</th>
                </tr>
                </thead>
                <tbody>
                <!-- Mostrar los datos de la lista en la tabla --->
             <?php 
                   $dao= new SolicitudEnvioController();
                  

                  $lista=$dao->listarSolicitudEnvio();
            foreach($lista as  $key=>$row){
                        $str='';
                          $str.= '<tr>';
                             $str.= '<td>'. $row->no_documento . '</td>';
                            $str.= '<td>'. $row->detalle . '</td>';
                           $str.= '<td>'. $row->estado . '</td>';
                          $str.= '<td>'. $row->observacion . '</td>';
                           $str.= '<td>'. $row->fecha_hora . '</td>';

                            $str.='<td width=70>';
                            $str.= '<a class="btn btn-warning btn-sm" href="actualizar.php?id_admin='.$row->idu.'"><i class="fa fa-edit"></i></a>';
                           $str.= ' ';
                           $str.= '<a class="btn btn-danger btn-sm" href="eliminar.php?id_admin='.$row->idu.'"><i class="fa fa-trash-o"></i></a>';
                          $str.= '</td>';

                           $str.= '</tr>';
                        echo ($str);   
                   }
                   
                 
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Opciones</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Categoría</th>
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
