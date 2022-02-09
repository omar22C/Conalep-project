<?php 

require_once "BD/conexion.php";
$tabla="";
$consulta=" SELECT * FROM facturas";
$termino= "";
if(isset($_POST['facturas']))
{
	$termino=$mysqli->real_escape_string($_POST['facturas']);
	$consulta="SELECT * FROM facturas WHERE 
	folio LIKE '%".$termino."%'";
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
	<th style='background-color:#21BA47;' scope='col'>FOLIO</th>
    <th style='background-color:#21BA47;' scope='col'>FECHA</th>
    <th style='background-color:#21BA47;' scope='col'>HORA</th>
	
	</tr>
	</thead><br>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td>".$fila['codigo']."</td>	
		<td>".$fila['concepto']."</td>
		<td>".$fila['cantidad']."</td>
		<td> ".$fila['folio']."</td>
        <td> ".$fila['fecha']."</td>
        <td> ".$fila['hora']."</td>
		
		</tr>";
	}
	echo "</tbody>
	</table>";
}else{
	echo "<center><h4>No hemos encotrado ningun registro con el folio "."<strong class='text-uppercase'>".$termino."</strong><h4><center>";
}
?>