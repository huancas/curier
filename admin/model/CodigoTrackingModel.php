<?php
class CodigoTrackingModel 
{
private $idct;
private $codigo;
private $descrip;
private $fecha_llegada;
private $sol_env_id;
function __construct(){}
function setIdct($v){ $this->idct=$v;}
function getIdct(){ return $this->idct;}
function setCodigo($v){ $this->codigo=$v;}
function getCodigo(){ return $this->codigo;}
function setDescrip($v){ $this->descrip=$v;}
function getDescrip(){ return $this->descrip;}
function setFecha_llegada($v){ $this->fecha_llegada=$v;}
function getFecha_llegada(){ return $this->fecha_llegada;}
function setSol_env_id($v){ $this->sol_env_id=$v;}
function getSol_env_id(){ return $this->sol_env_id;}
}
?>
