$(document).ready(function(){
    $('.send-form').click(function(){
            var form = $("#form-validado");
            $.post(form.attr('action'), form.serialize(), function(data){
                if(data.result == "success"){
                    $('#modal-pop-up').modal('hide');
                    location.reload();
                }
                else {
                    $("#modal-target .modal-content").html(data);
                }
            }).fail(function(){
                alert( "Error en la red" );
            });
        }
    );

    $('.send-formp').click(function(){
            var form = $("#form-validado");
            $.post(form.attr('action'), form.serialize(), function(data){
                if(data.result == "success"){
                    window.location.href = btn.attr("politico")
                }
                else {
                    
                }
            }).fail(function(){
                alert( "Error en la red" );
            });
        }
    );
});
