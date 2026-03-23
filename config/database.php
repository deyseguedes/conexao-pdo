<?php

$host = 'localhost';
$dbname = 'crud_pdo';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //essa linha é para mostrar os erros do banco de dados, caso haja algum
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //essa linha é para retornar os resultados como um array associativo, ou seja, com os nomes das colunas como chaves do array

} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}