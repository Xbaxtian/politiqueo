$(document).ready(function(){
    $('.send-form').click(function(){
            var form = $("#form-validado");
            $.post(form.attr('action'), form.serialize(), function(data){
                if(data.result == "success"){
                    $('#modal-pop-up').modal('hide');
                }
                else {
                    $("#modal-target .modal-content").html(data);
                }
            }).fail(function(){
                alert( "Error en la red" );
            });
        }
    );
});
