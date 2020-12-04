console.log("Hola mundo");

function validar(){
    
    var cantidadstock , cantidadagregada;
    
    cantidadstock = document.getElementById("CantidaStock").value;
    cantidadagregada = document.getElementById("cantidadA").value;

    if (cantidadstock < cantidadagregada){
        alert("Error bebe");
        return false;
    }
}

