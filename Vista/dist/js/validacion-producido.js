function validar(){
    var cantidad, producto, ex_cantidad;

    producto = document.getElementById('producto').value;
    cantidad = document.getElementById('cantidad').value;
  
    ex_cantidad = /^\d{0,500}$/; // validar cantidad
  
    if(producto === "" || cantidad === ""){
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    else if (!ex_cantidad.test(cantidad)){
      alert("El campo cantidad no puede contener valores negativos ni letras");
      return false;
    }
  
  }
  