<?php
/**
 * 
 */
class UsuarioModel {
private $idu;
private $tipo_persona;
private $nombres;
private $no_doc;
private $email;
private $password;
private $direccion;
private $telefono;
private $fecha_registro;
private $ultimo_ingreso;
private $estado_usuario;
private $cargo;
function __construct(){}
function setIdu($v){ $this->idu=$v;}
function getIdu(){ return $this->idu;}
function setTipo_persona($v){ $this->tipo_persona=$v;}
function getTipo_persona(){ return $this->tipo_persona;}
function setNombres($v){ $this->nombres=$v;}
function getNombres(){ return $this->nombres;}
function setNo_doc($v){ $this->no_doc=$v;}
function getNo_doc(){ return $this->no_doc;}
function setEmail($v){ $this->email=$v;}
function getEmail(){ return $this->email;}
function setPassword($v){ $this->password=$v;}
function getPassword(){ return $this->password;}
function setDireccion($v){ $this->direccion=$v;}
function getDireccion(){ return $this->direccion;}
function setTelefono($v){ $this->telefono=$v;}
function getTelefono(){ return $this->telefono;}
function setFecha_registro($v){ $this->fecha_registro=$v;}
function getFecha_registro(){ return $this->fecha_registro;}
function setUltimo_ingreso($v){ $this->ultimo_ingreso=$v;}
function getUltimo_ingreso(){ return $this->ultimo_ingreso;}
function setEstado_usuario($v){ $this->estado_usuario=$v;}
function getEstado_usuario(){ return $this->estado_usuario;}
function setCargo($v){ $this->cargo=$v;}
function getCargo(){ return $this->cargo;}
}

?>