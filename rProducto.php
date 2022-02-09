<?php
//enlace del archivo de conexión
include('conexion1.php');

//rescatar los valores del formulario:
$nombre = $_POST['caja_PTA'];
$cantidad = $_POST['caja_Concepto'];
$pc = $_POST['caja_Cantidad'];
$pv = $_POST['caja_Ubicacion'];
$folio = $_POST['caja_Folio'];
date_default_timezone_set('America/Mexico_City');
$dia = date('d');
$mes = date('m');
$anio = date('Y');
$fecha = $anio."-".$mes."-".$dia;
//$H = date('H');
//$min = date('i');
//$seg = date('s');
//$hora = $anio."-".$mes."-".$dia;
$hora = date("H:i:s");
//prepara la sentencia:
$query = 'SELECT * FROM producto WHERE nombre="'.$nombre.'";';

//$query = 'INSERT INTO consumibles(codigo,concepto,cantidad,ubicacion) VALUES("'.$nombre.'","'.$cantidad.'",'.$pc.',"'.$pv.'");';

//echo 'QUERY'.$query;
/*
//ejecutar la query en el sgbd
 mysqli_query($cone,$query) or die("Error de query");
  echo '<br>La consulta se ejecutó con éxito';
  echo '<br><a href="rProductos.html">Ingresar otro producto</a>';
  echo '<br><a href="buscador.php">Ver Inventario</a>';
*/
$r = mysqli_query($cone,$query) or die("Error de consulta");

//validar el resultado:
if(mysqli_num_rows($r) == 1){
  $update = 'UPDATE producto SET stock = stock +'.$pc.' WHERE nombre="'.$nombre.'";';
  //echo'UPDAT'.$update;
  //echo'FECHA'.$fecha;
  //echo'HORA'.$hora;
  $query1 = 'INSERT INTO facturas(codigo,concepto,cantidad,folio,fecha,hora) VALUES("'.$nombre.'","'.$cantidad.'",'.$pc.',"'.$folio.'","'.$fecha.'","'.$hora.'");';

$r = mysqli_query($cone,$update) or die(mysqli_error());
$r = mysqli_query($cone,$query1) or die(mysqli_error());
echo '<br>La cantidad se actualizo con éxito';
echo '<br><a href="rProductos.php">Ingresar otro producto</a>';
echo '<br><a href="buscador.php">Ver Inventario</a>';

}else{
//aqui va el insert normal como ya lo haz usado.
$query = 'INSERT INTO producto(nombre,precio,stock,ubicacion) VALUES("'.$nombre.'","'.$cantidad.'",'.$pc.',"'.$pv.'");';
$query1 = 'INSERT INTO facturas(codigo,concepto,cantidad,folio,fecha,hora) VALUES("'.$nombre.'","'.$cantidad.'",'.$pc.',"'.$folio.'","'.$fecha.'","'.$hora.'");';

//echo 'QUERY'.$query;

//ejecutar la query en el sgbd
mysqli_query($cone,$query) or die("Error de query");
 
mysqli_query($cone,$query1) or die(mysqli_error());
  echo '<br>La consulta se ejecutó con éxito';
  echo '<br><a href="rProductos.php">Ingresar otro producto</a>';
  echo '<br><a href="buscador.php">Ver Inventario</a>';
}

//cerrar la conexión:
mysqli_close($cone);

 ?>
