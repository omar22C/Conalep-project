<?php
//datos de la conexión:
$con = mysqli_connect("localhost","root","") or die("Error de conexión");
//echo'Conexión establecida!!';

//seleción de la base de datos:
mysqli_select_db($con,"inventario") or die("Error de base de datos");
//echo 'Se ha conectado a la base de datos';
 ?>
