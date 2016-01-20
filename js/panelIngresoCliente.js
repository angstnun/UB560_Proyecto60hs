$("#botonIngresoCliente").click(function() {
	$("#pantallaPrincipal").css("display", "none");
    $("#panelIngresoCliente").css("display", "block");
});

$("#botonCancelarCliente").click(function() {
	LimpiarCamposCliente();
	$("#panelIngresoCliente").css("display", "none");
	$("#pantallaPrincipal").css("display", "block");
})

function LimpiarCamposCliente()
{
	$(".campo").val("");
}