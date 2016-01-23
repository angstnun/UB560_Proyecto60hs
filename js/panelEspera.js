setInterval(function() {
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

function ActualizarTablaTurnos($tabla)
{
    $("#panelprincipal").empty();
    $("#panelprincipal").append(CargarTurnos());
}
