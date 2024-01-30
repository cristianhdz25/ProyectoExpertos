function cambiarColor() {

  var elementoCategoria = document.getElementById('categoria').value;
  var elementoSubcategoria = document.getElementById('subcategoria').value;
  actualizarPreferencia(elementoCategoria, elementoSubcategoria);

}

function actualizarPreferencia(categoria, subcategoria) {
  var parametros = {
    "categoria": categoria,
    "subcategoria": subcategoria
  }; //equivalente a un formulario
  $.ajax(
    {
      data: parametros, //datos que se envian a traves de ajax
      url: '?controlador=Index&accion=actualizarPreferencias', //controlador que recibe la peticion
      type: 'post', //método de envio
      beforeSend: function () {

      },
      success: function (response) {
        var colores = ["#EAEDED", "#7DCEA0", "#AEB6BF", "#85C1E9"];
        var body = document.body;

        // Obtener el valor seleccionado del elemento, convertirlo a entero
        var indiceElegido = parseInt(categoria, 10);

        // Verificar si el índice es válido
        if (!isNaN(indiceElegido) && indiceElegido >= 0 && indiceElegido < colores.length) {
          // Obtener el siguiente color de la lista
          var colorSiguiente = colores[indiceElegido];

          // Almacenar el índice en el almacenamiento local del navegador
          localStorage.setItem('colorIndice', indiceElegido);

          // Cambiar el color de fondo del body
          body.style.backgroundColor = colorSiguiente;
        } else {
          console.error("Índice no válido");
        }
        notifySuccess("Guardado", "Se han guardado las preferencias correctamente");
      }
    }
  );
}//getFamilies




