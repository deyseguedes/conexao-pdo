<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']); //trim é uma função do PHP que remove os espaços em branco do início e do final de uma string. Ele é comumente usado para limpar os dados de entrada do usuário, garantindo que não haja espaços extras que possam causar problemas na validação ou no armazenamento dos dados.
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade) 
            VALUES (:nome, :descricao, :preco, :quantidade)";

    $stmt = $pdo->prepare($sql);//prepare é um método do objeto PDO que prepara uma consulta SQL para execução. Ele retorna um objeto PDOStatement que pode ser usado para vincular parâmetros e executar a consulta de forma segura, evitando ataques de injeção SQL.
    $stmt->bindParam(':nome', $nome); //bindParam é usado para vincular os parâmetros da consulta SQL aos valores fornecidos pelo usuário. Ele ajuda a prevenir ataques de injeção SQL, garantindo que os valores sejam tratados como dados e não como parte da consulta SQL.
    $stmt->bindParam(':descricao', $descricao); //:descricao é um marcador de posição na consulta SQL que será substituído pelo valor da variável $descricao quando a consulta for executada. O bindParam associa o marcador de posição ao valor da variável, permitindo que o PDO trate o valor de forma segura e adequada.
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':quantidade', $quantidade);

    $stmt->execute();//execute é um método do objeto PDOStatement que executa a consulta SQL preparada. Ele processa a consulta com os valores vinculados e interage com o banco de dados para realizar a operação desejada, como inserir, atualizar ou excluir registros.

    header("Location: ../index.php");
    exit;
}