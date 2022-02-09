<?php
EliminarProducto($_GET['id']);
function EliminarProducto($id_c)
{
    include('conexion1.php');
    $sentencia="DELETE FROM producto WHERE id='".$id_c."'";
    mysqli_query($cone,$sentencia) or die(mysqli_error());
}
echo '<br>El consumible se elimino exitosamente';
echo "<td> <a href='editor.php'> <button type='button' class='btn btn-blue'>REGRESAR</button></a></td>";
?>