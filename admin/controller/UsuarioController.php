<?php 
    require_once('conexion.php');
	class UsuarioController{

		public function __construct(){}

		//inserta los datos del usuario
		public function registrarUsuario($usuarioModel){
			$db=DB::conectar();
			$insert=$db->prepare('INSERT INTO usuario(nombres,no_doc,email,password,direccion,
				telefono ,fecha_registro,ultimo_ingreso,estado_usuario, cargo_idc) VALUES(?,?,?,sha1(?),?, ?,now(),now(),"ACTIVO",(select idc from cargo where ncargo = ? ))');
			//$insert->bindValue('nombre',$usuario->getNombre());
			//encripta la clave
			//$insert->bindValue('clave',$pass);
			$insert->bindParam(1, $usuarioModel->getNombres(), PDO::PARAM_STR);
		    $insert->bindParam(2, $usuarioModel->getNo_doc(), PDO::PARAM_INT);
		    $insert->bindParam(3, $usuarioModel->getEmail(), PDO::PARAM_STR);
		    $insert->bindParam(4, $usuarioModel->getPassword(), PDO::PARAM_STR);
		    $insert->bindParam(5, $usuarioModel->getDireccion(), PDO::PARAM_STR);
		    $insert->bindParam(6, $usuarioModel->getTelefono(), PDO::PARAM_STR);
		    $insert->bindParam(7, $usuarioModel->getCargo(), PDO::PARAM_STR);
            
           return $insert->execute();
        }
        	//obtiene el usuario para el login
		public function listarUsuario(){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * from usuario ');//AND clave=:clave
			$select->execute();
			return $select->fetchAll(PDO::FETCH_OBJ);
		}
		public function listarByCargo($cargo){
			$db=Db::conectar();
			$select=$db->prepare('select * from usuario u
left join cargo c on u.cargo_idc = c.idc 
where c.ncargo =?');//AND clave=:clave
			$select->bindParam(1, $cargo, PDO::PARAM_STR);
			$select->execute();
			return $select->fetchAll(PDO::FETCH_OBJ);
		}
		public function loginUsuario($email,$pass){
			$db=Db::conectar();
			$select=$db->prepare('select * from usuario u
left join cargo c on u.cargo_idc = c.idc 
where email = ? and password = sha1(?) ');
			$select->bindParam(1, $email, PDO::PARAM_STR);
			$select->bindParam(2, $pass, PDO::PARAM_STR);
			$select->execute();
			return $select->fetch(PDO::FETCH_OBJ);
		}
		
		//obtiene el usuario para el login
		public function obtenerPosts(){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM post');//AND clave=:clave
			$select->execute();
			$registro=$select->fetchAll(PDO::FETCH_OBJ);
			return $registro;
		}
		
		public function getDataByTable($table){
			$db=Db::conectar();
			$dname =DB_NAME;
			$select=$db->prepare('SELECT * from '.$table);//AND clave=:clave
			//$select->bindParam('s',$dname);
			$select->execute();
			$registro=$select->fetchAll();

			
			$re= $this->header($table);
			$count =$re[0];
			$header= $re[1];
			
			$res= array();
			$res['data']=$registro;
			$res['cantidad']=$count;
			$res['cabecera']=$header;

			return $res;
		}
		public function getDataById($table,$id,$cod){
			$db=Db::conectar();
			$dname =DB_NAME;
			 $sql ='SELECT * from '.$table.' where '.$id.' = '.$cod ;
           
			$select=$db->prepare($sql);//AND clave=:clave
			//$select->bindParam('s',$dname);
			$select->execute();
			$registro=$select->fetch();
          
			
			$re= $this->header($table);
			$count =$re[0];
			$header= $re[1];
			
			$res= array();
			$res['data']=$registro;
			
			
			$res['cantidad']=$count;
			$res['cabecera']=$header;

			return $res;
		}
		public function header($table){
			$db=Db::conectar();
			$select=$db->prepare('select count(*) from information_schema.columns  where table_name = "'.$table.'" and table_schema = "'.DB_NAME.'"');//AND clave=:clave
			//$select->bindParam('s',$dname);
			$res= array();
			$select->execute();
			$count=$select->fetch();
			$header= array();

			for($i=0;$i<$count[0];$i++){
				$ordi= $i+1;
				$select=$db->prepare('select column_name 
from information_schema.columns 
where table_name = "'.$table.'" and ordinal_position = '.$ordi.' and table_schema = "'.DB_NAME.'"');//AND clave=:clave
			//$select->bindParam('s',$dname);
			$select->execute();
			$head =$select->fetch();

            $header[$i]=$head[0];

			}
			$res[0] =$count;
			$res[1] =$header;
           return $res;
		}
		

		//busca el nombre del usuario si existe
		public function buscarUsuario($nombre){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM USUARIOS WHERE nombre=:nombre');
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			if($registro['Id']!=NULL){
				$usado=False;
			}else{
				$usado=True;
			}	
			return $usado;
		}
		public function listar(){
			

    	  $db=Db::conectar();
			$select=$db->prepare('SELECT * FROM USUARIO ');
		   $select->execute();
			$registro=$select->fetch();
			$usuario = new Usuario();
			//lista
			 $respuesta = array();
           $respuesta["Usuario"] = array();  
			//verifica si la clave es conrrecta
						
				//si es correcta, asigna los valores que trae desde la base de datos
				$usuario->setId($registro['idu']);
				$usuario->setNombre($registro['nombres']);
				$usuario->setClave($registro['celular']);

				  array_push($respuesta["Usuario"], $usuario);
						
			return $respuesta;
		}
	}
?>