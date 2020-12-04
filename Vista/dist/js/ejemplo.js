const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, //letras y espacios
  apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, //letras y espacios
  documento: /^\d{1,15}$/, // numero de telefono de 1 a 15 numeros
  telefono: /^\d{7,10}$/, // numero de telefono de 7 a 10 numeros
  direccion: /\w\s/
}

const campos = {
  nombre: false,
  apellido: false,
  documento: false,
  telefono: false,
  direccion: false
}

const validarFormulario = (e) => {
   switch (e.target.name) {
     case "nombre":
        validarCampo(expresiones.nombre, e.target, 'nombre');
     break;
     case "apellido":
        validarCampo(expresiones.apellido, e.target, 'apellido');
     break;
     case "documento":
        validarCampo(expresiones.documento, e.target, 'documento');
     break;
     case "telefono":
        validarCampo(expresiones.telefono, e.target, 'telefono');
     break;
     case "direccion":
        validarCampo(expresiones.direccion, e.target, 'direccion');
     break;
   }

}

const validarCampo = (expresion, input, campo) => {
  if(expresion.test(input.value)){
     document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
     document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
     document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
     document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
     document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
     campos[campo] = true;
  } else {
     document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
     document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
     document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
     document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
     document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
     campos[campo] = false;

  }
}

inputs.forEach((input) => {
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);
});


formulario.addEventListener('submit', (e) => {
  e.preventDefault();

  if (campos.nombre && campos.apellido && campos.documento && campos.telefono && campos.direccion) {
    formulario.reset();

    document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
      icono.classList.remove('formulario__grupo-correcto');
      window.location="Tabla.html"

    });
  } else {
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    setTimeout(() => {
      document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
    }, 5000);

  }
});
