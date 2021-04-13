<?php 
require_once ('../inc/header.php'); 

if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM personas2 WHERE id;");
$sentencia->execute($id);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-film"></i> Video
        <small>actualizar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> inicio</a></li>
        <li><a href="#">escritorio</a></li>
        <li class="active">video</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-refresh"></i> Actualizar Video</h3>
        </div>
        <div class="box-body">
        <section class="content">
        <div class="row">
        <!-- left column -->
        <div class="col-md-6">
		<?php include 'dpelicula.php'; ?>
		 </div>
        <!-- left column -->
        <div class="col-md-6">
			<form method="post" action="guardarDatosEditados.php">
		<!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
		<input type="hidden" name="id" value="<?php echo $persona->id; ?>">

		<label for="nombre">URL VIDEO:</label>
		<input class="form-control" value="<?php echo $persona->nombre ?>" name="nombre" required type="text" id="nombre" placeholder="Ingresa la URL del Video" id="idst">
		<br>
		<input type="submit" value="Guardar" class="btn btn-success">
      <a  class="btn btn-default" href="../escritorio/index.php">Regresar</a>
	      </form>
		 </div>
		</div>
	    </section>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php require_once ('../inc/footer.php'); ?>
