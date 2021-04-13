<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM personas WHERE id = 1;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla de ejemplo</title>
</head>
<body>
	<table>
		
		<tbody>
			<!--
				Atención aquí, sólo esto cambiará
				Pd: no ignores las llaves de inicio y cierre {}
			-->
			<?php foreach($personas as $persona){ ?>
			<tr>
				<td><?php  $persona->id ?></td>
				<td><?php  $persona->nombre ?></td>
				<td><a href="<?php  "editar.php?id=" . $persona->id?>"></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $persona->nombre, $matches);
    $id = $matches[1];
    $width = '100%';
    $height = '350px';
?>
<iframe style="max-width:500px;" id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
    src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
    frameborder="0" allowfullscreen></iframe> 
</body>
</html>