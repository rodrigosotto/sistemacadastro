<?php
try {
    include("conexao_db.php");

    //SELECT pegar os produtos armazenados no banco de dados
    $consulta = $conn->prepare("SELECT * FROM produto WHERE situacao = 'HABILITADO';");
    $consulta->execute();

    $produtos = $consulta->fetchAll();

} catch (PDOException $e) {
    $inseridoSucesso["msg"] = "Erro de banco de dados ao selecionar -> " . $e->getMessage();
    $inseridoSucesso["cod"] = 0;
    $inseridoSucesso["style"] = "alert-danger";

}

$conn = null;

?>