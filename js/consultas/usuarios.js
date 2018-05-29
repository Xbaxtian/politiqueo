$( document ).ready(function() {
        /*$('#bsq').keyup(function(){
            var text =  $('#bsq').val();
            var lt = text.length;
            if ( lt > 1 )
            {
                $.post("usuarios/busqueda",
                {texto:text},
                function(data){
                    var obj = JSON.parse(data);
                    var output = " ";
                    $each(obj, function(i,item){
                        output++;
                        '<tr>'+
                        ' <td>'+item.id_usuario+'</td>'+
                        ' <td>'+item.nombres+'</td>'+
                        ' <td>'+item.apellidos+'</td>'+
                        ' <td>'+item.correo+'</td>'+
                        ' <td><button class="btn btn-peru eliminar" data-id="item.id_usuario" data-toggle="modal" data-target="#myModal" ?>Borrar</button></td></td>'+
                        '</tr>'

                    });
                    $('#bsq tbody').append(output);
                })
            }
        })*/


        $('#myModal').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) // Botón que activó el modal
         var id = button.data('id') // Extraer la información de atributos de datos
         var modal = $(this)
         modal.find('#idusuario').val(id)
       })

       $( "#confirmacion" ).submit(function( event ) {
           event.preventDefault();
           var id = $("#idusuario").attr("value");

           $.post("usuarios/borrar", {"idusuario": id}, function(data){
               console.log(data.result);
               if(data.result !== "success"){
                   console.log(data.result);
                   modal.hide();
                   alert("Error: No se pudo concretar");
               }
           });

        })

});
