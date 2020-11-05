<?php

    if (count($_POST > 0))
    {
        $nomeProduto = $_POST["nomeProduto"];// TUDO NAME DOS INPUTS
        $qtdProduto = $_POST["qtdProduto"];
        $precoProduto = $_POST["precoProduto"];
        $obsProduto = $_POST["obsProduto"];
    }
    //TODO pegar o codigo do usuario logado
try {
   include ("conexao_db.php");

    $insercao = "INSERT INTO item_pedido (cod_usuario, nome_produto, observacao, preco_unid, quantidade) VALUES (?,?,?,?,?)"; //cada interrogação representa uma coluna na tabela
    $stmt= $conn->prepare($insercao);
    $stmt->execute([null, $nomeProduto, $obsProduto, str_replace(",", ".", $precoProduto), $qtdProduto ]);

    $inseridoSucesso["msg"] = "Item inserido com sucesso";
    $inseridoSucesso["cod"] = 1;

} catch (PDOException $e) {
    $inseridoSucesso["msg"] = "Inserção no banco de dados falhou: " . $e->getMessage();
    $inseridoSucesso["cod"] = 0;
}

//fecha conexao com o banco de dados ainda mais quando o sistema é utilizado por muitas pessoas, isso evita de deixar a conexao com o banco de dados em aberto
$conn = null;

include ("pedido.php");
?>
