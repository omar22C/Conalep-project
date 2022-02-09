
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SOLICITUD</title>
        <script src="https://kit.fontawesome.com/18e932af55.js"></script>
	<link rel="stylesheet" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/bootstrap-grid.min.css">
	<link rel="stylesheet" href="CSS/estilos.css">
    </head>
    <body>
        
        
        <table class='responsive-table table table-hover table-bordered'>
            <tr>
                <th class='bg-info' scope='col'>ID</th>
                <th class='bg-info' scope='col'>CODIGO</th>
                <th class='bg-info' scope='col'>CONCEPTO</th>
                <th class='bg-info' scope='col'>CANTIDAD</th>
                <th class='bg-info' scope='col'>AÑADIR</th>
                <th class='bg-info' scope='col'></th>
                
            </tr>

            <?php
            require_once "model/Data.php";

            $d = new Data();

            $productos = $d->getProductos();

            foreach ($productos as $p) {
                echo "<tr>";
                    echo "<td>".$p->id."</td>";
                    echo "<td>".$p->nombre."</td>";
                    echo "<td>".$p->precio."</td>";
                    echo "<td>".$p->stock."</td>";
                    echo "<td>";
                        echo "<form action='controller/agregar.php' method='post'>";
                            echo "<input type='hidden' name='txtId' value='".$p->id."'>";
                            echo "<input type='hidden' name='txtNombre' value='".$p->nombre."'>";
                            echo "<input type='hidden' name='txtPrecio' value='".$p->precio."'>";
                            echo "<input type='hidden' name='txtStock' value='".$p->stock."'>";
                            echo "<input type='number' name='txtCantidad' required='required'>";
                            echo "<td><input type='submit' name='btnAnadir' value='AGREGAR'></td>";
                        echo "</form>";
                    echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <a href="vista/ventas.php">VER SALIDAS  </a>
        <a href="menu1.php"> MENU</a>
        

        <?php
        if(isset($_GET["m"])){
            $m = $_GET["m"];

            switch($m){
                case "1":
                    echo "El producto no tiene stock";
                    break;
                case "2":
                    echo "La cantidad debe ser un número positivo";
                    break;
            }
        }
        ?>

        <?php
        session_start();

        if(isset($_SESSION["carrito"])){
            $carrito = $_SESSION["carrito"];


            echo "<h3>CONSUMIBLES SOLICITADOS</h3>";

            echo "<table class='responsive-table table table-hover table-bordered'>";
                echo "<tr>";
                    echo "<th class='bg-info' scope='col'>ID</th>";
                    echo "<th class='bg-info' scope='col'>CODIGO</th>";
                    echo "<th class='bg-info' scope='col'>CONCEPTO</th>";
                    echo "<th class='bg-info' scope='col'>CANTIDAD ACTUAL</th>";
                    echo "<th class='bg-info' scope='col'>CANTIDAD</th>";
                    //echo "<th>TOTAL</th>";
                    echo "<th class='bg-info' scope='col'>ELIMINAR</th>";
                    
                echo "<tr>";

                $total = 0;
                $i = 0;
                foreach ($carrito as $p) {
                    echo "<tr>";
                        echo "<td>".$p->id."</td>";
                        echo "<td>".$p->nombre."</td>";
                        echo "<td>".$p->precio."</td>";
                        echo "<td>".$p->stock."</td>";
                        echo "<td>".$p->cantidad."</td>";
                        //echo "<td>$".$p->subTotal."</td>";
                        echo "<td>";
                            echo "<a href='controller/eliminarProCar.php?in=$i'>Eliminar</a>";
                        echo "</td>";
                        $total += $p->subTotal;
                        $i++;
                    echo "</tr>";
                }
                echo "<tr>";
                    //echo "<td colspan='5'><b>Total:</b></td>";
                    //echo "<td colspan='2'><b>$$total</b></td>";
                    $_SESSION["total"] = $total;
                echo "</tr>";

                echo "<tr>";
                    echo "<td colspan='6'>";
                        echo "<form action='controller/generarVenta.php' method='post'>";
                            echo "<input type='submit' name='btngenerar' value='GENERAR SALIDA'>";
                        echo "</form>";
                    echo "</td>";
                echo "</tr>";
            echo "</table>";

            //echo "Cantidad de objetos: ".count($carrito);
        }
        ?>
    </body>
</html>
