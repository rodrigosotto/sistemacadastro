<?php
//se os valores que vem do formulario for maior que 0 (se vier valores do form) grava nas variaveis abaixo
if (count($_POST > 0)) {

    /*VAMOS PEGAR O EMAIL E A SENHA VIA POST QUE FOI DIGITADA NO CAMPO DO FORM*/
    $email = $_POST["email"];
    $senha = $_POST["senha"];


// CRIANDO A CONEXÃO (EXISTE MUITOS EXEMPLOS W3SCHOOL ETC ETC)
    try {
        include ("conexao_db.php");

        $conn = new PDO("mysql:host=$servername;dbname=restaurante_db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Conexão realizada com sucesso";

        //verifica se email e senha estão nao banco de dados (prepara uma consulta um SQL)
        $consulta = $conn->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=md5(:senha)");
        $consulta->bindParam(':email', $email, PDO::PARAM_STR);//vai ser substituida pela variavel $email
        $consulta->bindParam(':senha', $senha, PDO::PARAM_STR);//vai ser substituida pela variavel $senha
        $consulta->execute();

        // set the resulting array to associative
        $result = $consulta->fetchAll();
        $qtd_user = count($result); //adiciono os user em uma variavel
//        var_dump($qtd_user);
        if ($qtd_user == 1) {
            header("Location: ./dashboard.php");

        } elseif ($qtd_user == 0) {
            //TODO criar uma area de cadastro e novos usuarios quando o usuario nao tem um email cadastrado no banco de dados
            $usrNaoEncontrado["msg"] = "email ou senha não encontrados, por favor tente novamente.";
            $usrNaoEncontrado["cod"] = 0;


        }

    } catch (PDOException $e) {
        echo "Conexão falhou: " . $e->getMessage();
    }

//fecha conexao com o banco de dados ainda mais quando o sistema é utilizado por muitas pessoas, isso evita de deixar a conexao com o banco de dados em aberto
    $conn = null;
}
include("index.php");