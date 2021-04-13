<?php
 require_once('conexion.php');
class CodigoTrackingController 
{
	public function registrarCodTraking($model){
			$db=DB::conectar();
			$insert=$db->prepare('INSERT INTO codigo_tracking(codigo,descrip,fecha_llegada,solicitud_envio_ids) VALUES(?,?,?,?)');
			$insert->bindParam(1, $model->getCodigo(), PDO::PARAM_STR);
		    $insert->bindParam(2, $model->getDescrip(), PDO::PARAM_STR);
		    $insert->bindParam(3, $model->getFecha_llegada(), PDO::PARAM_STR);
		    $insert->bindParam(4, $model->getSol_env_id(), PDO::PARAM_INT);
		  return $insert->execute();
    }
    
}
?>