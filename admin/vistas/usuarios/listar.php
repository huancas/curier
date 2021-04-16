<?php 
require_once('../inc/header.php');  

require_once('../../controller/UsuarioController.php'); 
require_once('../../model/UsuarioModel.php');  
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-circle"></i> Usuarios
        <small>lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">tabla</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list"></i> Lista de Usuarios</h3></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>N° Doc.</th>
                  <th>Nombres</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>Dirección</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                   <!-- Mostrar los datos de la lista en la tabla --->
                  <?php 
                   $dao= new UsuarioController();
                  

                  $lista=$dao->listarByCargo('ADMINISTRADOR');
            foreach($lista as  $key=>$row){
                        $str='';
                          $str.= '<tr>';
                             $str.= '<td>'. $row->no_doc . '</td>';
                            $str.= '<td>'. $row->nombres . '</td>';
                           $str.= '<td>'. $row->email . '</td>';
                          $str.= '<td>'. $row->telefono . '</td>';
                           $str.= '<td>'. $row->direccion . '</td>';

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
                   <th>N° Doc.</th>
                  <th>Nombres</th>
                  <th>Email</th>
                  <th>Telefono</th>
                 <th>Dirección</th>
                  <th>Accion</th>
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
