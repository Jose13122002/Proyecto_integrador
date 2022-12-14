<?php
//indicar los parametros para la conexion
$server="localhost";
$user="root";
$password="Portal13122002";
$bd="oximetro";
//creamos la cadena de conexion
$conexion=new mysqli($server,$user,$password,$bd) or die ("Error en la conexion ".$conexion->error);
$conexion->set_charset("utf8");
?>