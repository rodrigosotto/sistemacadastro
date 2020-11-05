<?php

if (count($_POST > 0)) {
    //1 pegar valores do formulário input
    $nomeProduto = $_POST["nomeProduto"];
    $categoriaProduto = $_POST["categoriaProduto"];
    $valorProduto = $_POST["valorProduto"];
    $fotoProduto = $_FILES["fotoProduto"];
    $infoProduto = $_POST["infoProduto"];

//TODO pegar o codigo do usuario logado
    try {
        include("conexao_db.php");

        //INSERT PRODUTOS NO BANCO DE DADOS
        $cadastraProduto = "INSERT INTO produto ( nome, categoria, valor, foto, info_adicional, codigo_usuario) VALUES (?,?,?,?,?,?)"; //cada interrogação representa uma coluna na tabela
        $stmt = $conn->prepare($cadastraProduto);
        $stmt->execute([$nomeProduto, $categoriaProduto, str_replace(",", ".", $valorProduto), $fotoProduto, $infoProduto, null]);

        //Mensagens de inserção com sucesso
        $inseridoSucesso["msg"] = "produto cadastrado com sucesso";
        $inseridoSucesso["cod"] = 1;
        $inseridoSucesso["style"] = "alert-sucess";

    } catch (PDOException $e) {
        $inseridoSucesso["msg"] = "Erro de banco de dados ou inserir produto -> " . $e->getMessage();
        $inseridoSucesso["cod"] = 0;
        $inseridoSucesso["style"] = "alert-danger";
    }
    $conn = null;
}

include("produto.php");
?>
