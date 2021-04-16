<?php
 require_once('conexion.php');
class SolicitudEnvioController{

	public function registrarSolicitud($model){
			$db=DB::conectar();
			$insert=$db->prepare('INSERT INTO solicitud_envio(no_documento,detalle,estado,observacion,
				fecha_hora,fecha_hora_update,usuario_idu) VALUES(?,?,?,?,now(), now(),?)');
			$insert->bindParam(1, $model->getNo_documento(), PDO::PARAM_STR);
		    $insert->bindParam(2, $model->getDetalle(), PDO::PARAM_STR);
		    $insert->bindParam(3, $model->getEstado(), PDO::PARAM_STR);
		    $insert->bindParam(4, $model->getObservacion(), PDO::PARAM_STR);
		    $insert->bindParam(5, $model->getUs_id(), PDO::PARAM_INT);
		    
           $res= array();
           $inserted= $insert->execute();
           $LAST_ID = $db->lastInsertId();
           $res[0]=$inserted;
           $res[1]=$LAST_ID;
           return $res;
        }
      public function listarSolicitudEnvio(){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * from solicitud_envio se
             left join usuario u on se.usuario_idu = u.idu');//AND clave=:clave
			$select->execute();
			return $select->fetchAll(PDO::FETCH_OBJ);
		}
		public function listarById($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * from solicitud_envio se
             left join usuario u on se.usuario_idu = u.idu where se.ids = ? ');
			$select->bindParam(1, $id, PDO::PARAM_INT);
			$select->execute();
			return $select->fetch(PDO::FETCH_OBJ);
		}
		public function deleteById($id){
			$db=DB::conectar();
			$delete=$db->prepare('delete from solicitud_envio where ids');
			$delete->bindParam(1, $id, PDO::PARAM_INT);
		    
          return $delete->execute();
        }  
       

}
?>