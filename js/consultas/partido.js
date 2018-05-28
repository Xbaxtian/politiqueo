$( document ).ready(function() {
        $('#modalpartido').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)
         var id = button.data('id')
         var modal = $(this)
         modal.find('#idpartido').val(id)
       })

       $( "#confirmacion" ).submit(function( event ) {
           event.preventDefault();
           var id = $("#idpartido").attr("value");

          $.ajax({
                 type: "POST",
                 url: "partido/borrar",
                   dataType:'json',
                   data: { idpartido:id }
           })

           .done(function(){
               alert("OK! Partido Borrado");
           })
           .fail(function(){
               alert("Error: No se pudo concretar");
           })
       })

       $('#regpartido').submit(function(event){
       event.preventDefault();
       var nombre = $("input#nombre").val();
       var url = $("input#url").val();

       if(nombre == ""|| url == "" )
       {
           alert("Hay algunos campos vacios");
           $("input#descripcion").focus();
           $("input#titulo").focus();
           $("input#url").focus();
           return false;
       }
               $.ajax({
                   type: "POST",
                   url: "partido/registrar",
                   dataType:'json',
                   data: {nombre:nombre,
                           url:url},
                   success: function(data)
                   {
                       $('#resp').html(data);
                   }
               })
               .done(function(){
                   alert("OK! Político Borrado");
               })
               .fail(function(){
                   alert("Error: No se pudo concretar");
               })
           })

   });
