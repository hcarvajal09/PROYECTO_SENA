console.log("*** Hola mundo ***")

function validar(){ 

var nuevaclave, confirmarclave;

nuevaclave = document.getElementById('clavenueva').value;
confirmarclave = document.getElementById('confirmarclave').value;
 
    if(nuevaclave === "" || confirmarclave === ""){
        console.log("hola bebe")
          alert("Todos los campos son obligatorios");
          return false;
    }

    else if(nuevaclave != confirmarclave){
        alert("Las claves no coinciden");
        return false;
    }

}

