<?php  require_once('../inc/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Productos
			<small>lista</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="#">lista</a></li>
			<li class="active">productos</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-list"></i> Stock de Productos</h3>
						<a href="agregar.php" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nuevo Producto</a>
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
    $pdo = conexion::connect();
    $sql = "SELECT p.id_pro,p.url_producto,p.nombre_pro,p.precio,c.nombre_cat as categoria FROM producto p 
	INNER JOIN categoria c WHERE c.id_cat = p.categoria_idcate";
    if(isset ($_POST['buscar']))
    {    $buscar = $_POST["palabra"];
     $sql = "SELECT * FROM producto WHERE nombre_pro like '%$buscar%'";
    }
      
      
       foreach ($pdo->query($sql) as $row) {
           
          
       ?>
								<?php
                 
                   
               
                            echo '<tr>';
		   echo '<td>';
                            echo '<a class="btn btn-warning" href="actualizar.php?id_tramite='.$row['id_pro'].'"><i class="fa fa-edit"></i></a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="eliminar.php?id_tramite='.$row['id_pro'].'"><i class="fa fa-trash-o"></i></a>';
                            echo '</td>';
                        
                            echo '<td><a href="../imagenes/'.$row['url_producto'].'"><img src="../imagenes/'.$row['url_producto'].'" style="width: 60px; height: 60px;"/></a></td>';
                            
                            echo '<td>'. $row['nombre_pro'] . '</td>';
                            echo '<td width="200" height="16">S/. '. $row['precio'] . '</td>';
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
