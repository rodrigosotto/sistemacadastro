<?php

if ((isset($_POST['fotoProduto']))) {
    $formatosPermitidos = array("png", "jpg");
    $ext = pathinfo($_FILES['arquivo']['name']);

    if (in_array($ext, $formatosPermitidos)) {
        $pasta = "image/";
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid() . ".$ext";

        if (move_uploaded_file($temporario, $pasta . $novoNome)) {
            $mensagem[] = "upload feito com sucesso!";
        } else {
            $mensagem[] = "Erro, não foi possivel fazer o upload";
        }
    } else {
        $mensagem[] = "formato invalido!";
    }
}
?>