setInterval(function() {
    CargarTurnoLlamado();
    ActualizarTablaTurnos();
}, 5000);

function CargarTurnos() 
{
    $.ajax({
    url:'abm/cargarTurnos.php',
    success:function(data) {
        return data;
    },
    error: function (xmlHttpRequest, textStatus, errorThrown) {
         return errorThrown;
    }
    });
}

function CargarTurnoLlamado()
{
    $.ajax({
    url:'abm/cargaTurnoLlamado.php',
    success:function(data) {
        ActualizarTurnoLlamado(data);
    },
    error: function (xmlHttpRequest, textStatus, errorThrown) {
         return errorThrown;
    }
    });
}

function ActualizarTablaTurnos()
{
    $("#panelprincipal").empty();
    $("#panelprincipal").append(CargarTurnos());
}

function ActualizarTurnoLlamado($tabla)
{
    $("#panelTurnoActual").empty();
    $("#panelTurnoActual").append($tabla);
}
