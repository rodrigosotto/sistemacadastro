<?php
if (count($_GET > 0)) {

    $cod_prod = $_GET['codigo'];

//TODO pegar o codigo do usuario logado
    try {
        include("conexao_db.php");

        //update especifico na table situação do tipo ENUM
        $updateProduto = "UPDATE produto SET situacao='DESABILITADO' WHERE codigo=?";
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
 ?>
