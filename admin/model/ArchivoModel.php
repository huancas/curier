<?php
class ArchivoModel 
{
 private $ida;
private $url_file;
private $url_name;
private $sol_en_id;
function __construct(){}
function setIda($v){ $this->ida=$v;}
function getIda(){ return $this->ida;}
function setUrl_file($v){ $this->url_file=$v;}
function getUrl_file(){ return $this->url_file;}
function setUrl_name($v){ $this->url_name=$v;}
function getUrl_name(){ return $this->url_name;}
function setSol_en_id($v){ $this->sol_en_id=$v;}
function getSol_en_id(){ return $this->sol_en_id;}	
}
?>