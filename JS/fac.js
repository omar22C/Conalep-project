
$(obtener_facturas());
function obtener_facturas(facturas)
{
	$.ajax({
		url : 'factura.php',
		type : 'POST',
		dataType : 'html',
		data : { facturas: facturas },
	})
	.done(function(fac){
		$("#tabla_facturas").html(fac);
	})
}

$(document).on('keyup', '#termino', function()
{
	var valorBusqueda=$(this).val();
	
	if (valorBusqueda!="")
	{
		obtener_facturas(valorBusqueda);
	}
	else
	{
		obtener_facturas();
	}
});

