function validar(){
  var nombre, apellido, documento, telefono, direccion, ex_nombre, ex_apellido,
  ex_documento, ex_telefono, ex_direccion;
  nombre = document.getElementById('nombre').value;
  apellido = document.getElementById('apellido').value;
  documento = document.getElementById('documento').value;
  telefono = document.getElementById('telefono').value;
  direccion = document.getElementById('direccion').value;

  ex_nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/; //letras y espacios
  ex_apellido = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;  //letras y espacios
  ex_documento = /^\d{1,15}$/; // numero de telefono de 1 a 15 numeros
  ex_telefono = /^\d{7,10}$/; // numero de telefono de 7 a 10 numeros
  ex_direccion = /\w\s/; // Validar direccion

  if(nombre === "" || apellido === "" || documento === "" || telefono === "" || direccion === ""){
    alert("Todos los campos son obligatorios");
    return false;
  }

  else if (!ex_nombre.test(nombre)){
    alert("El campo nombre no puede contener numeros");
    return false;
  }

  else if (!ex_apellido.test(apellido)){
    alert("El campo apellido no puede contener numeros");
    return false;
  }

  else if (!ex_documento.test(documento)){
    alert("El campo documento no puede contener valores negativos ni letras");
    return false;
  }

  else if (!ex_telefono.test(telefono)){
    alert("El campo telefono no puede contener valores negativos ni letras y tiene que ser de 7 a 10 numeros");
    return false;
  }

  else if (!ex_direccion.test(direccion)){
    alert("El campo direccion tiene que tener numeros y letras con espacios");
    return false;
  }


}
