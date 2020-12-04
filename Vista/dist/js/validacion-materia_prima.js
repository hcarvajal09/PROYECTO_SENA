function validar(){
    var nombre, cantidad, ex_nombre, ex_cantidad;

    nombre = document.getElementById('nombre').value;
    cantidad = document.getElementById('cantidad').value;
  
    ex_nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/; //letras y espacios
    ex_cantidad = /^\d{0,500}$/; // validar cantidad
  
    if(nombre === "" || cantidad === ""){
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    else if (!ex_nombre.test(nombre)){
      alert("El campo nombre no puede contener numeros");
      return false;
    }
  
    else if (!ex_cantidad.test(cantidad)){
      alert("El campo cantidad no puede contener valores negativos ni letras");
      return false;
    }
  
  }
  