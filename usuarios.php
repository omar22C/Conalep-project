<?php 

require_once "BD/conexion.php";
$tabla="";
$consulta=" SELECT * FROM usuarios";
$termino= "";
if(isset($_POST['productosss']))
{
	$termino=$mysqli->real_escape_string($_POST['productosss']);
	$consulta="SELECT * FROM usuarios WHERE 
	nombre LIKE '%".$termino."%' OR
	paterno LIKE '%".$termino."%' OR
	matricula LIKE '%".$termino."%'";
}
$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
	echo "
	<table class='responsive-table table table-hover table-bordered'>
	<thead>
	<tr>
	<th style='background-color:#21BA47;' scope='col'>NOMBRE</th>
	<th style='background-color:#21BA47;' scope='col'>APELLIDO PATERNO</th>
	<th style='background-color:#21BA47;' scope='col'>APELLIDO MATERNO</th>
	<th style='background-color:#21BA47;' scope='col'>MATRICULA</th>
    <th style='background-color:#21BA47;' scope='col'></th>
	
	</tr>
	</thead><br>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td>".$fila['nombre']."</td>	
		<td>".$fila['paterno']."</td>
		<td>".$fila['materno']."</td>
		<td> ".$fila['matricula']."</td>
		<td> <a href='eliminaru.php?id=".$fila['id']."'> <button type='button' class='btn btn-danger'>Eliminar</button></a></td>
		</tr>";
	}
	echo "</tbody>
	</table>";
}else{
	echo "<center><h4>No hemos encotrado ningun registro con la palabra "."<strong class='text-uppercase'>".$termino."</strong><h4><center>";
}
?>
