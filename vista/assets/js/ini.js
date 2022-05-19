    function registrar_catalogo() {

         var titulo = document.getElementById("titulo").value;
         var autor = document.getElementById("autor").value;
         var portada = document.getElementById("portada").value;
         var categoria = document.getElementById("categoria").value;

          var parametros = {
                 "titulo"         :   titulo,
                 "autor"          :   autor,
                 "portada"        :   portada,
                 "categoria"      :   categoria,
          };

           $.ajax({
              type: "POST",
              url: "vista/modulos/ajax/registrar_catalogo.php",
              data: parametros,
               beforeSend: function(objeto){
                },
              success: function(datos){
              $("#tbody").html(datos);
              }
          });
    }
    function registrar_categoria() {

        var categoria = document.getElementById("categoria").value;

         var parametros = {
                "categoria"         :   categoria,
         };

          $.ajax({
             type: "POST",
             url: "vista/modulos/ajax/registrar_categoria.php",
             data: parametros,
              beforeSend: function(objeto){
               },
             success: function(datos){
             $("#tbody").html(datos);
             }
         });
   }

    function editar_catalogo(id) {
         var id = document.getElementById("mod_id"+id).value;
         var titulo = document.getElementById("titulo"+id).value;
         var autor = document.getElementById("autor"+id).value;
         var portada = document.getElementById("portada"+id).value;
         var categoria = document.getElementById("categoria"+id).value;

          var parametros = {
                 "id"             :   id,
                 "titulo"         :   titulo,
                 "autor"          :   autor,
                 "portada"        :   portada,
                 "categoria"      :   categoria,
          };

           $.ajax({
              type: "POST",
              url: "vista/modulos/ajax/editar_catalogo.php",
              data: parametros,
               beforeSend: function(objeto){
                },
              success: function(datos){
              $("#tbody").html(datos);
              }
          });
    }
    function editar_categoria(id) {
        var id = document.getElementById("mod_id"+id).value;
        var categoria = document.getElementById("categoria"+id).value;

        alert(categoria);

         var parametros = {
                "id"             :   id,
                "categoria"      :   categoria,
         };

          $.ajax({
             type: "POST",
             url: "vista/modulos/ajax/editar_categoria.php",
             data: parametros,
              beforeSend: function(objeto){
               },
             success: function(datos){
             $("#tbody").html(datos);
             }
         });
   }

        function eliminar_catalogo(id) {
         var id_del_catalogo = document.getElementById("mod_del_id"+id).value;

          var parametros = {
                 "id_del_catalogo"       :   id_del_catalogo,
          };

           $.ajax({
              type: "POST",
              url: "vista/modulos/ajax/eliminar_catalogo.php",
              data: parametros,
               beforeSend: function(objeto){
                },
              success: function(datos){
              $("#tbody").html(datos);
              }
          });
    }

    function eliminar_categoria(id) {
        var id_del_catalogo = document.getElementById("mod_del_id"+id).value;

         var parametros = {
                "id_del_catalogo"       :   id_del_catalogo,
         };

          $.ajax({
             type: "POST",
             url: "vista/modulos/ajax/eliminar_categoria.php",
             data: parametros,
              beforeSend: function(objeto){
               },
             success: function(datos){
             $("#tbody").html(datos);
             }
         });
   }