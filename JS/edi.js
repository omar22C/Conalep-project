
$(obtener_registross());
function obtener_registross(productoss)
{
	$.ajax({
		url : 'editar.php',
		type : 'POST',
		dataType : 'html',
		data : { productoss: productoss },
	})
	.done(function(resultados){
		$("#tabla_resultadoss").html(resultados);
	})
}

$(document).on('keyup', '#termino', function()
{
	var valorBusqueda=$(this).val();
	
	if (valorBusqueda!="")
	{
		obtener_registross(valorBusqueda);
	}
	else
	{
		obtener_registross();
	}
});

