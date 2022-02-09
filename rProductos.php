<?php

session_start();
if(!isset($_SESSION['rol_id'])){
    header('Location: index.php');
}else{
    if($_SESSION['rol_id'] != 1){
        header('Location: index.php');
    }
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
	<title>REGISTRO DE CONSUMIBLES</title>
    <script type="text/javascript">
      function mayusculas(e){
        e.value = e.value.toUpperCase();
      }
    </script>
    <style type="text/css">
        h3
        {
            color:green ;
        }

    </style>
    <script>
    //nombre de la función:
    function valideKey(evt){
    //obtener el valor ASCII de la tecla presionada:
    var code = (evt.which) ? evt.which : evt.keyCode;
  if(code == 8){  //el 8 es el valor de la tecla de retroceso (backspace)
      return true;
    }else if(code >= 48 && code <= 57){ //valores ASCII de los digitos del 0 al 9
      return true;
    }else{ //es el resultado FALSO para el resto de la teclas.
      return false;
    }
    }
    </script>
</head>
<body>
	<h1 align="center">REGISTRO DE CONSUMIBLES</h1>
  <h2 align="center"><a href="menu1.php">MENU</a></h2>
	<form action="rProducto.php" method="post">
	<h3 align="center">PARTIDA NUMERO: <input type="text" name="caja_PTA" onkeyup="mayusculas(this);" required placeholder="PTA0000" autocomplete="off"><br>
	CONCEPTO: <input type="text" name="caja_Concepto" onkeyup="mayusculas(this);" required placeholder="Consumible" autocomplete="off"> <br>
	CANTIDAD: <input type="text" name="caja_Cantidad" required placeholder="0" autocomplete="off" onkeypress="return valideKey(event);"> <br>
	UBICACION: <input type="text" name="caja_Ubicacion" onkeyup="mayusculas(this);" required placeholder="Ubicacion" autocomplete="off"> <br>
    FOLIO: <input type="text" name="caja_Folio" required placeholder="Numero de factura" autocomplete="off" onkeypress="return valideKey(event);"> <br>
	<button type="submit" name="btn_Enviar">Registrar producto</button></h3>
</form>
</body>
</html>
