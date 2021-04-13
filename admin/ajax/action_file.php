<?php
session_start();
require_once('../controller/CodigoTrackingController.php'); 
require_once('../model/CodigoTrackingModel.php');  
require_once('../controller/ArchivoController.php'); 
require_once('../model/ArchivoModel.php');  
require_once('../controller/SolicitudEnvioController.php'); 
require_once('../model/SolicitudEnvioModel.php'); 

if(isset($_POST['upload_onli'])){
$codAlea = generarCodigo($_SESSION['codigo']);
$path = "../../files/" . $codAlea . ".jpg";
$nameFile = $codAlea . ".jpg";
 $resul = array();
 $resul['file_name']=$nameFile;
 $resul['file_name_orig']=$_FILES['archivo']['name'];


 $res='';
if(move_uploaded_file($_FILES['archivo']['tmp_name'],$path)) {
             // return true;
	$res='OK';
              }else{
          $res='FAIL';
   }
  $resul['resultado']=$res;             
echo json_encode($resul);
}

if(isset($_POST['action'])){
	$file_path='../../files/'.$file_name =$_POST['file_name'];
	$resul = array();
// Use unlink() function to delete a file 
	$res='';
if (!unlink($file_path)) { 
   // echo ("$file_pointer cannot be deleted due to an error");
   $res='FAIL' ;
} 
else { 
   $res='OK';
}
$resul['resultado']=$res;
echo json_encode($resul);
die();
}
if(isset($_POST['registrar'])){
	$resul = array();

	$no_doc= $_POST['no_doc'];
	$detalle= $_POST['detalle'];

	$codigo= $_SESSION['codigo'];
	$cod_track= $_POST['cod_track'];
	$item_list= $_POST['item_list'];

	$sem=new SolicitudEnvioModel();
	$sem->setNo_documento($no_doc);
	$sem->setDetalle($detalle);
	$sem->setEstado('PENDIENTE');
	$sem->setObservacion(NULL);
	$sem->setUs_id($codigo);

     //controller
	$ac_dao = new ArchivoController();
	
	$ct_dao = new CodigoTrackingController();
	
	$semDao = new SolicitudEnvioController();
	$res =$semDao->registrarSolicitud($sem);
	$inserted=$res[0];
	$last_id=$res[1];
	//si se insertó correctamente
	$res='FAIL';
	if($inserted){
       
         foreach( $cod_track as $cod ) {
         	$ct_model = new CodigoTrackingModel();
         	$ct_model->setCodigo($cod);
         	$ct_model->setDescrip(NULL);
         	$ct_model->setFecha_llegada(NULL);
         	$ct_model->setSol_env_id($last_id);
            $ct_dao->registrarCodTraking($ct_model);
         }
         foreach( $item_list as $item ) {
         $obj=	json_decode($item);
         	$ac_model = new ArchivoModel();
         	$ac_model->setUrl_file($obj->file_name); 
         	$ac_model->setUrl_name($obj->file_name_orig);
         	$ac_model->setSol_en_id($last_id);
            $ac_dao->registrarArchivo($ac_model);
          }
           $res='OK';
     
	}
	$resul['resultado']=$res;
     echo json_encode($resul);
     die();
}

 function generarCodigo($cod)
	{   if(!isset($cod)){$cod='';}
        //$date = date('m-d-Y H:i:s', time());
		$fechaactual  = date("dHi");  //Fecha Actual       
		$no_aleatorio  = rand(100, 999); //Generamos dos Digitos aleatorios

		$letraAleatoria = chr(rand(ord("a"), ord("z")));
		$letraAleatoria .= chr(rand(ord("a"), ord("z")));
		$letraAleatoria .= chr(rand(ord("a"), ord("z")));
		$codigo = $letraAleatoria . $fechaactual . $no_aleatorio;
		return $cod.'_U_'.$codigo;
	}
?>