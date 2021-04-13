<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];

$sentencia = $base_de_datos->prepare("UPDATE personas SET nombre = '$nombre' WHERE id = '$id';");
$resultado = $sentencia->execute(); # Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "Cambios guardados";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
echo"<script> location.href='../escritorio/index.php'; </script>";
?>