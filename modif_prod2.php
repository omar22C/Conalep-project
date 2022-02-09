<?php


ModificarProducto($_POST['id'], $_POST['caja_PTA'], $_POST['caja_Concepto'], $_POST['caja_Cantidad'], $_POST['caja_Ubicacion']);
function ModificarProducto($id_c, $codi, $conce, $canti, $ubica){
include('conexion1.php');
    $sentencia="UPDATE producto SET nombre='".$codi."', precio='".$conce."', stock='".$canti."', ubicacion='".$ubica."' WHERE id='".$id_c."'";
    mysqli_query($cone,$sentencia) or die(mysqli_error());
}
echo '<br>El consumible se modifico con exito';
echo '<br><a href="buscador.php">Regresar al inventario</a>';
echo '<br><a href="editor.php">Modificar / Eliminar otro consumible</a>';

echo '<br><a href="menu1.html">Menu principal</a>';
?>

