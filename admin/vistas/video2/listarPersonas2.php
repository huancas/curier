<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM personas2 WHERE id=1;");
$personas2 = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
			<?php foreach($personas2 as $persona){ ?>
			<?php } ?>
		</tbody>
	</table>
	<?php
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $persona->nombre, $matches);
    $id = $matches[1];
    $width = '100%';
    $height = '235px';
?>

<iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
    src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
    frameborder="0" allowfullscreen></iframe> 
</body>
</html>