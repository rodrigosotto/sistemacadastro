function removeProduto() {

    $.ajax({
        url: 'remover_produto.php',
        complete: function(response) {
            alert(response.responseText);
        },
        error: function(){
            alert('ERRO');
        }
    });

    return false;

}