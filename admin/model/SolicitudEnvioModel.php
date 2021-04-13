<?php
class SolicitudEnvioModel{
private $ids;
private $no_documento;
private $detalle;
private $estado;
private $observacion;
private $fecha_hora;
private $fecha_hora_update;
private $us_id;
function __construct(){}
function setIds($v){ $this->ids=$v;}
function getIds(){ return $this->ids;}
function setNo_documento($v){ $this->no_documento=$v;}
function getNo_documento(){ return $this->no_documento;}
function setDetalle($v){ $this->detalle=$v;}
function getDetalle(){ return $this->detalle;}
function setEstado($v){ $this->estado=$v;}
function getEstado(){ return $this->estado;}
function setObservacion($v){ $this->observacion=$v;}
function getObservacion(){ return $this->observacion;}
function setFecha_hora($v){ $this->fecha_hora=$v;}
function getFecha_hora(){ return $this->fecha_hora;}
function setFecha_hora_update($v){ $this->fecha_hora_update=$v;}
function getFecha_hora_update(){ return $this->fecha_hora_update;}
function setUs_id($v){ $this->us_id=$v;}
function getUs_id(){ return $this->us_id;}
}
?>