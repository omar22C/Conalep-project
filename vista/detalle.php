<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SALIDAS</title>
        <script src="https://kit.fontawesome.com/18e932af55.js"></script>
	<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="../CSS/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../CSS/estilos.css">
    </head>
    <body>
<?php
require_once "../model/Data.php";
$idVenta = $_GET["id"];
$d = new Data();

$detalles = $d->getDetalles($idVenta);

echo "<h1>Detalles de salida ID: $idVenta </h1>";

echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>CODIGO</th>";
    echo "<th>CONCEPTO</th>";
    echo "<th>CANTIDAD</th>";
    echo "</tr>";

    $total = 0;
    foreach ($detalles as $det) {
        echo "<tr>";
            echo "<td>".$det->id."</td>";
            echo "<td>".$det->nomProducto."</td>";
            echo "<td>".$det->precio."</td>";
            echo "<td>".$det->cantidad."</td>";
            //echo "<td>$".$det->subTotal."</td>";
            $total += $det->subTotal;
        echo "</tr>";
    }
    echo "<tr>";
        //echo "<td colspan='3'><b>Total</b></td>";
        //echo "<td><b>$$total</b></td>";
    echo "</tr>";
echo "</table>";

echo "<a href='ventas.php'>Volver a ventas</a>";
?>
</body>
</html>
