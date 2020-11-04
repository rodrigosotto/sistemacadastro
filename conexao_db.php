<?php

/*conexão com o banco de dados*/
$servername = "127.0.0.1";
$username = "User_name";
$password = "senha";

$conn = new PDO("mysql:host=$servername;dbname=restaurante_db", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $conn = new PDO("mysql:host=$servername;dbname=restaurante_db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Conexão realizada com sucesso";

    //verifica se email e senha estão nao banco de dados e prepara a consulta
    $consulta = $conn->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=md5(:senha)");
    $consulta->bindParam(':email', $email, PDO::PARAM_STR);//vai ser substituida pela variavel $email
    $consulta->bindParam(':senha', $senha, PDO::PARAM_STR);//vai ser substituida pela variavel $senha
    $consulta->execute();

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

//fecha conexao com o DB
$conn = null;