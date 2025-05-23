<?php

$server = "";
$user = "root";
$password = "";
$dataBase = "";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$dataBase;charset=utf8",$user,$password);
    $pdo->exec("SET NAMES utf8");
    $pdo->exec("SET CHARACTER SET utf8");
    echo "Sucesso na conexão com o SGBD";
} catch (PDOException $erro) {
    echo "Erro na conexao com o SGBD:" . $erro->getMessage();
}
?>