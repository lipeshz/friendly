function enviarFormulario(){
    var formulario = $('#form-curtir');
    $.ajax({
        type: formulario.attr('method'), url: formulario.attr('../controller/curtir_post.php'), data: formulario.serialize(), success: function (data){
            $('#result').html(data);
        }
    })
}