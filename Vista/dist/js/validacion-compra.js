function validar(){
    var nombre, precio, proveedor, cantidad,ex_nombre, ex_precio, ex_cantidad;

    nombre = document.getElementById('nombre').value;
    proveedor = document.getElementById('proveedor').value;
    cantidad = document.getElementById('cantidad').value;
    precio = document.getElementById('precio').value;
  
    ex_nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/; //letras y espacios
    ex_precio = /^\d{0,500}$/; // validar precio
    ex_cantidad = /^\d{0,500}$/; // validar cantidad
  
    if(nombre === "" || proveedor === "" || precio === "" || cantidad === ""){
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    else if (!ex_nombre.test(nombre)){
      alert("El campo nombre no puede contener numeros");
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
  