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

        $d = new Data();

        $ventas = $d->getVentas();

        echo "<h1>Listado de salidas</h1>";

        echo "<table border='1'>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Fecha</th>";
                //echo "<th>Total</th>";
                echo "<th>Detalle</th>";
            echo "<tr>";

        foreach ($ventas as $v) {
            echo "<tr>";
                echo "<td>".$v->id."</td>";
                echo "<td>".$v->fecha."</td>";
                //echo "<td>$".$v->total."</td>";
                echo "<td>";
                    echo "<a href='detalle.php?id=".$v->id."'>Ver detalle</a>";
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

        <a href='../salidas.php'>Volver</a>
        
        
    </body>
</html>
