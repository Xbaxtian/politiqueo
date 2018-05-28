$( document ).ready(function() {
        $('#modalorgano').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)
         var id = button.data('id')
         var modal = $(this)
         modal.find('#idorgano').val(id)
       })

       $( "#confirmacion" ).submit(function( event ) {
           event.preventDefault();
           var id = $("#idorgano").attr("value");
          $.ajax({
                 type: "POST",
                 url: "organo/borrar",
                 dataType:'json',
                 data: { idorgano:id }
           })

           .done(function(){
               alert("OK! Organo Borrado");
           })
           .fail(function(){
               alert("Error: No se pudo concretar");
           })
       })

       $('#regorgano').submit(function(event){
       event.preventDefault();
       var descripcion = $("input#descripcion").val();
       var titulo = $("input#titulo").val();
       var url = $("input#url").val();

       if(descripcion == " " || titulo == " " || url == " " )
       {
           alert("Hay algunos campos vacios");
           $("input#descripcion").focus();
           $("input#titulo").focus();
           $("input#url").focus();
           return false;
       }
       var parametros = {
           descripcion:$("input#descripcion").val(),
           titulo:$("input#titulo").val(),
           url:$("input#url").val()
       };
       var json = JSON.stringify(parametros);
       //alert(json);
       console.log(parametros);

               $.ajax({
                   type: "POST",
                   url: "organo/registrar",
                   contentType: "application/json; charset=utf-8",
                   dataType:'json',
                   data: json,
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
