
$(obtener_registrosss());
function obtener_registrosss(productosss)
{
	$.ajax({
		url : 'usuarios.php',
		type : 'POST',
		dataType : 'html',
		data : { productosss: productosss },
	})
	.done(function(resultados){
		$("#tabla_resultadosss").html(resultados);
	})
}

$(document).on('keyup', '#termino', function()
{
	var valorBusqueda=$(this).val();
	
	if (valorBusqueda!="")
	{
		obtener_registrosss(valorBusqueda);
	}
	else
	{
		obtener_registrosss();
	}
});

