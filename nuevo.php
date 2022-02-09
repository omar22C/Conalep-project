<?php 

require_once "BD/conexion.php";
$tabla="";
$consulta=" SELECT * FROM producto";
$termino= "";
if(isset($_POST['productossss']))
{
	$termino=$mysqli->real_escape_string($_POST['productossss']);
	$consulta="SELECT * FROM producto WHERE 
	nombre LIKE '%".$termino."%' OR
	precio LIKE '%".$termino."%' OR
	ubicacion LIKE '%".$termino."%'";
}
$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
	echo "
        
        
        <table class='responsive-table table table-hover table-bordered'>
            <tr>
                <th class='bg-info' scope='col'>ID</th>
                <th class='bg-info' scope='col'>CODIGO</th>
                <th class='bg-info' scope='col'>CONCEPTO</th>
                <th class='bg-info' scope='col'>CANTIDAD</th>
                <th class='bg-info' scope='col'>AÑADIR</th>
                <th class='bg-info' scope='col'></th>
                
            </tr>
            <tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
        echo "<tr>
		<td>".$fila['$p->id']."</td>	
		<td>".$fila['precio']."</td>
		<td>".$fila['stock']."</td>
		<td> ".$fila['ubicacion']."</td>
		
		</tr>";
	}
	echo "</tbody>
	</table>";
}else{
	echo "<center><h4>No hemos encotrado ningun registro con la palabra "."<strong class='text-uppercase'>".$termino."</strong><h4><center>";
}
        require_once "model/Data.php";

        $d = new Data();

        $productos = $d->getProductos();

        foreach ($productos as $p) {
            echo "<tr>";
            echo "<td >".$p->id."</td>";
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
