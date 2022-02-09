<?php
include 'conexion1.php';
session_start();

if(!isset($_SESSION['matricula'])){
   

    
$email_sesion =$_SESSION['matricula'];
$query_sesion =("SELECT * FROM usuarios WHERE matricula = '$email_sesion'");
$r = mysqli_query($cone,$query_sesion) or die("Error de consulta");
if($r->num_rows>=1){

  while($fila=$r->fetch_array(MYSQLI_ASSOC)){
    echo $fila['nombre'];
		
  }
}

}

?>
<h1>BIENVENIDO A SU CUENTA</h1><br><br>
<a href="logout.php">Desconectar</a>