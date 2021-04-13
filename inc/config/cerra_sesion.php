<?php
session_start();
    require_once ('file.php');
    unset ($SESSION['usuario']);
    unset ($SESSION['cargo']);
    unset ($SESSION['codigo']);
    session_destroy();
    header("location:../../admin/"); 
?>