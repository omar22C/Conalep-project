<?php
//datos de la conexión:
$cone = mysqli_connect("localhost","root","") or die("Error de conexión");
//echo'Conexión establecida!!<br>';

//seleción de la base de datos:
mysqli_select_db($cone,"inventario") or die("Error de base de datos");
//echo 'Se ha conectado a la base de datos<br>';
 ?>
