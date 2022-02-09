<?php


  
$consulta = ConsultarProducto($_GET['id']);

function ConsultarProducto($id_cod)
{
    include('conexion1.php');
    $sentencia="SELECT * FROM producto WHERE id='".$id_cod."'";#WHERE id_co='".$id_cod."' 
    $resultado = mysqli_query($cone,$sentencia) or die("Error de query");
    $dato = mysqli_fetch_assoc($resultado);
    return[
        $dato['nombre'],
        $dato['precio'],
        $dato['stock'],
        $dato['ubicacion']

    ];
}

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>MODIFICAR CONSUMIBLE</title>
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
	<h1 align="center">MODIFICAR CONSUMIBLES</h1>
	<form action="modif_prod2.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
	<h3 align="center">PARTIDA NUMERO: <input type="text" name="caja_PTA" required placeholder="PTA0000" autocomplete="off" value="<?php echo $consulta[0]?>"><br>
	CONCEPTO: <input type="text" name="caja_Concepto" required placeholder="Consumible" autocomplete="off" value="<?php echo $consulta[1]?>"> <br>
	CANTIDAD: <input type="text" name="caja_Cantidad" required placeholder="0" autocomplete="off" onkeypress="return valideKey(event);" value="<?php echo $consulta[2]?>"> <br>
	UBICACION: <input type="text" name="caja_Ubicacion" required placeholder="Ubicacion" autocomplete="off" value="<?php echo $consulta[3]?>"> <br>
	<button type="submit" name="btn_Enviar">Modificar</button></h3>
</form>
</body>
</html>
