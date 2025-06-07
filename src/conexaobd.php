<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dataBase = "proj_impressoras";

    try {
        $pdo = new PDO("mysql:host=$server;dbname=$dataBase; charset=utf8", $user, $password);
        $pdo->exec("SET NAMES utf8");
        $pdo->exec("SET CHARACTER SET utf8");
        echo"Sucesso na conexão ao banco de dados.";
    } catch (PDOException $error) {
        echo "Erro ao conectar ao banco de dados: ". $error->getMessage();
    }
?>