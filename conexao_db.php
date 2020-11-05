<?php

/*conexão com o banco de dados*/
$servername = "127.0.0.1";
$username = "nome";
$password = "senha";

$conn = new PDO("mysql:host=$servername;dbname=restaurante_db", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
