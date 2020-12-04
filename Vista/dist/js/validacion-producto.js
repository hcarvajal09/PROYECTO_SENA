function validar(){
    var nombre, precio, descripcion, cantidad,ex_nombre, ex_descripcion,
    ex_precio, ex_cantidad;

    nombre = document.getElementById('nombre').value;
    descripcion = document.getElementById('descripcion').value;
    cantidad = document.getElementById('cantidada_e').value;
    precio = document.getElementById('precio').value;
  
    ex_nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/; //letras y espacios
    ex_descripcion = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;  //letras y espacios
    ex_precio = /^\d{0,500}$/; // validar precio
    ex_cantidad = /^\d{0,500}$/; // validar cantidad
  
    if(nombre === "" || descripcion === "" || precio === "" || cantidad === ""){
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    else if (!ex_nombre.test(nombre)){
      alert("El campo nombre no puede contener numeros");
      return false;
    }
  
    else if (!ex_descripcion.test(descripcion)){
      alert("El campo descripcion no puede contener numeros");
      return false;
    }
  
    else if (!ex_precio.test(precio)){
      alert("El campo precio no puede contener valores negativos ni letras");
      return false;
    }
  
    else if (!ex_cantidad.test(cantidad)){
      alert("El campo cantidad no puede contener valores negativos ni letras");
      return false;
    }
  
  }
  