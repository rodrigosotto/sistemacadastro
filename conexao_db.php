<?php

/*conexão com o banco de dados*/
$servername = "localhost";
$username = "teste";
$password = "teste3";

$conn = new PDO("mysql:host=$servername;dbname=restaurante_db", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
