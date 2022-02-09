<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscador Ajax</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
</html>
<?php
EliminarUsuario($_GET['id']);
function EliminarUsuario($id_u)
{
    include('conexion1.php');
    $sentencia="DELETE FROM usuarios WHERE id='".$id_u."'";
    mysqli_query($cone,$sentencia) or die(mysqli_error());
}
echo '<br><br>El usuario se elimino exitosamente';
echo "<br>";
echo "<br> <a href='usuario.php'> <button name=submit class=btn>REGRESAR</button></a></br>";

?>
