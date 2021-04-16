<?php
class ArchivoController 
{
		public function registrarArchivo($model){
			$db=DB::conectar();
			$insert=$db->prepare('INSERT INTO archivos(url_file,url_name,solicitud_envio_ids) VALUES(?,?,?)');
			$insert->bindParam(1, $model->getUrl_file(), PDO::PARAM_STR);
		    $insert->bindParam(2, $model->getUrl_name(), PDO::PARAM_STR);
		    $insert->bindParam(3, $model->getSol_en_id(), PDO::PARAM_INT);
		  return $insert->execute();
     }
     public function listarByIdSolEnv($id){
			$db=Db::conectar();
			$select=$db->prepare('select * from archivos where solicitud_envio_ids = ? ');
			$select->bindParam(1, $id, PDO::PARAM_INT);
			$select->execute();
			return $select->fetchAll(PDO::FETCH_OBJ);
	}
    
}
?>