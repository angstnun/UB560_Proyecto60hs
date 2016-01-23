$("#botonIngresoCliente").click(function() {
	CargarFormularioCliente();
});

$("#botonCancelarCliente").click(function() {
    CargarPantallaPrincipal();
})

$("#formularioIngresoCliente").submit(function(e) {
    e.preventDefault();
});

$("#botonAceptarCliente").click(function(e) {
    AgregarACola();
    CargarPantallaPrincipal();
})

function CargarFormularioCliente()
{
    $("#pantallaPrincipal").css("display", "none");
    $("#panelIngresoCliente").css("display", "block");
}

function CargarPantallaPrincipal()
{
    LimpiarCamposCliente();
    $("#panelIngresoCliente").css("display", "none");
    $("#pantallaPrincipal").css("display", "block");
}

function LimpiarCamposCliente()
{
	$(".campo").val("");
}

function ValidarEmailYNombre()
{
    var str = null;
    if($("#nombrePila").val() == "")
    {
        str = "Por favor complete su nombre";
    }
    if($("#eMailCliente").val() == "")
    {
        if(str)
        {
            str = str + " y su correo electronico";
        }
        else
        {
            str = "Por favor complete su correo electronico";
        }
    }
    if(str)
    {
        str = str + ".";
        alert(str);
        return false;
    }
    return true;
}

function AgregarACola() 
{
    if(ValidarEmailYNombre())
    {
        var nombrePila = $('#nombrePila').val();
        var emailCliente = $('#eMailCliente').val();
        var dataString = 'nombrePila='+nombrePila+'&emailCliente='+emailCliente;
        $.ajax({
        type:'POST',
        data:dataString,
        url:'abm/nuevoTurno.php',
        success:function(data) {
          if(data)
          {
            alert("Por favor espere a ser atendido.");
          }
          else
          {
            alert("Hubo un error al dar de alta su turno.");
          }
        },
        error: function (xmlHttpRequest, textStatus, errorThrown) {
             alert(errorThrown);
        }
        });
    }
}
