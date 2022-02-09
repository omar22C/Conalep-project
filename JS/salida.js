
$(obtener_registrossss());
function obtener_registrossss(productossss)
{
	$.ajax({
		url : 'nuevo.php',
		type : 'POST',
		dataType : 'html',
		data : { productossss: productossss },
	})
	.done(function(resultados){
		$("#tabla_resultadossss").html(resultados);
	})
}

$(document).on('keyup', '#termino', function()
{
	var valorBusqueda=$(this).val();
	
	if (valorBusqueda!="")
	{
		obtener_registrossss(valorBusqueda);
	}
	else
	{
		obtener_registrossss();
	}
});

