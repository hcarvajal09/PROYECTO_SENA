console.log("Hola mundo");

function validar(){

  var direccion, fecha, hora, cliente, ex_direccion;
  var f = new Date();
  var fecha_actual = f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();

  fecha = document.getElementById('fecha').value;
  hora = document.getElementById('hora').value;
  cliente = document.getElementById('cliente').value;
  direccion = document.getElementById('direccion').value;
  ex_direccion = /\w\s/; // Validar direccion

  if(fecha === "" || hora === "" || cliente === "" || direccion === ""){
    alert("Todos los campos son obligatorios");
    return false;
  }
 
  else if (fecha < fecha_actual){
    alert("Coloco una fecha anterior a la actual. Por favor verifique");
    return false;
  }

  else if (!ex_direccion.test(direccion)){
    alert("El campo direccion tiene que tener numeros y letras con espacios");
    return false;
  }

}


