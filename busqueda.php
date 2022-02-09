
<?php 

require_once "BD/conexion.php";
$tabla="";
$consulta=" SELECT * FROM producto";
$termino= "";
if(isset($_POST['productos']))
{
	$termino=$mysqli->real_escape_string($_POST['productos']);
	$consulta="SELECT * FROM producto WHERE 
	nombre LIKE '%".$termino."%' OR
	precio LIKE '%".$termino."%' OR
	ubicacion LIKE '%".$termino."%'";
}
$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
	echo "
	<table class='responsive-table table table-hover table-bordered'>
	<thead>
	<tr>
	<th style='background-color:#21BA47;' scope='col'>CODIGO</th>
	<th style='background-color:#21BA47;' scope='col'>CONCEPTO</th>
	<th style='background-color:#21BA47;' scope='col'>CANTIDAD</th>
	<th style='background-color:#21BA47;' scope='col'>UBICACION</th>
	
	</tr>
	</thead><br>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td>".$fila['nombre']."</td>	
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
?>