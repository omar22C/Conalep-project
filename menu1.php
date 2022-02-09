<?php
include 'conexion1.php';
session_start();

if(!isset($_SESSION['rol_id'])){
    header('Location: index.php');



///////ksdljhldal




}else{
    if($_SESSION['rol_id'] != 1){
        header('Location: index.php');
    }

}



//$email_sesion =$_SESSION['rol_id'];
//$query_sesion =("SELECT * FROM usuarios WHERE rol_id = '$email_sesion'");
//$r = mysqli_query($cone,$query_sesion) or die("Error de consulta");
//if($r->num_rows>=1){

  //while($fila=$r->fetch_array(MYSQLI_ASSOC)){
   // echo $fila['nombre'];
		
//  }
// }





?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
	  <link rel="stylesheet" href="CSS/bootstrap-grid.min.css">
	
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="CSS/estilos.css">
    <title>MENU</title>
    <style type="text/css">
      body{
        background-color: white;
        background-image:url(.\imagenes\fondo.jpg);
      }
        h1
        {
            
            color:rgb(11, 62, 119) ;
        }
        </style>
        <style type="text/css">  
            a
            {
                color:green ;
            }
            </style>
  </head>
  <body style="background: url('CSS//co.png') no-repeat; background-size: cover;">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<label for="" class="bran">
            <a href=""><img src="CSS//mex.png" alt=""></a>
            </label>
            <label for="" class="bra">
            <a href=""><img src="CSS//estado.png" alt=""></a>
            </label>
            
            
            
            <label for="" class="brand">
            <a href=""><img src="CSS//conalep.png" alt=""></a>
            </label>
            </nav>


    <br></br>
    
        
    
    <h1 align="center">REGISTRO DE OPERACIONES</h1> 
    
     
    <ul type="disc">
        
      <h2 align="left"><a href="rProductos.php">NUEVO REGISTRO</a></h2>
      <!--<li><a href="regUsuarios.html">Registrar usuarios</a></li>-->
      <h2 align="center"><a href="buscador.php">VER INVENTARIO</a></h2>
      <h2 align="center"><a href="register.php">REGISTRAR USUARIOS</a></h2>
      <h2 align="center"><a href="usuario.php">VER USUARIOS</a></h2>
      <h2 align="center"><a href="salidas.php">SOLICITAR CONSUMIBLES</a></h2>
      <h2 align="center"><a href="facturas.php">VER FACTURAS </a></h2>
      <br><br>
      <h1 align="right"><a href="logout.php">Cerrar Sesion</a></h1>
      <!--<li><a href="verUsuarios.php">Ver usuarios</a></li>-->

     
      </ul>
  </body>
</html>