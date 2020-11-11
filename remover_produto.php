<?php

if (count($_POST > 0)) {

    $cod_prod = $_POST['codigo'];

//TODO pegar o codigo do usuario logado
    try {
        include("conexao_db.php");

        //update PRODUTOS NO BANCO DE DADOS
        $updateProduto = "UPDATE produto SET situacao = 'DESABILITADO' WHERE codigo = ?";
        $stmt = $conn->prepare($updateProduto);
        $stmt->execute([$cod_prod]);


        //Mensagens de inserção com sucesso
        $inseridoSucesso["msg"] = "produto removido com sucesso";
        $inseridoSucesso["cod"] = 1;
        $inseridoSucesso["style"] = "alert-sucess";

    } catch (PDOException $e) {
        $inseridoSucesso["msg"] = "Erro de banco de dados ao remover produto -> " . $e->getMessage();
        $inseridoSucesso["cod"] = 0;
        $inseridoSucesso["style"] = "alert-danger";
    }

    $conn = null;
}

include("lista_de_produtos.php");
?>
