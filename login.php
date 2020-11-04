<?php
session_start();
//se os valores que vem do formulario for maior que 0 (se vier valores do form) grava nas variaveis abaixo
if (count($_POST > 0)) {

    /*VAMOS PEGAR O EMAIL E A SENHA VIA POST QUE FOI DIGITADA NO CAMPO DO FORM*/
    $email = $_POST["email"];
    $senha = $_POST["senha"];
}
include_once ("index.php");
include_once ("conexao_db.php");