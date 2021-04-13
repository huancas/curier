<?php
/* Llamar la Cadena de Conexion*/ 
include ("../config/conexion.php");
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	//Elimino producto
	if (isset($_REQUEST['id'])){
		$id_slide=intval($_REQUEST['id']);
		if ($delete=mysqli_query($con,"delete from slider where id='$id_slide'")){
			$message= "Datos eliminados satisfactoriamente";
		} else {
			$error= "No se pudo eliminar los datos";
		}
	}
	
	
	$tables=" slider";
	$sWhere=" ";
	$sWhere.=" ";
	
	
	$sWhere.=" order by orden";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = 12; //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables  $sWhere ");
	if ($row= mysqli_fetch_array($count_query))
	{
	$numrows = $row['numrows'];
	}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$reload = './productslist.php';
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT * FROM  $tables  $sWhere LIMIT 0,6");
	
	if (isset($message)){
		?>
		<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<strong>Aviso!</strong> <?php echo $message;?>
		</div>
		
		<?php
	}
	if (isset($error)){
		?>
		<div class="alert alert-danger alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<strong>Error!</strong> <?php echo $error;?>
		</div>
		
		<?php
	}
	//loop through fetched data
	if ($numrows>0)	{
		?>
		
		 <div class="row">
			<?php
				while($row = mysqli_fetch_array($query)){
					$url_image=$row['url_image'];
					$titulo=$row['titulo'];
					$id_slide=$row['id'];
				
					?>
					
					  <div class="col-sm-6 col-md-4">
						<div class="thumbnail">
						  <img src="img/slider/<?php echo $url_image;?>" alt="..." style="width:100%;height:12.5em;">
						  <div class="caption"><br>
							<p class='text-right'><a href="slidesedit.php?id=<?php echo intval($id_slide);?>" class="btn btn-warning" role="button"><i class='fa fa-edit'></i> Editar</a> <button type="button" class="btn btn-danger" onclick="eliminar_slide('<?php echo $id_slide;?>');" role="button"><i class='fa fa-trash'></i> Eliminar</button></p>
						  </div>
						</div>
					  </div>
					
					<?php
				}
			?>
		  </div>
		<?php
	}
}
?>
