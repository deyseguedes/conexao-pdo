<?php
require_once 'config/database.php';

// busca os produtos
$sql = "SELECT * FROM produtos ORDER BY id DESC";
$stmt = $pdo->query($sql); //query é um método do objeto PDO que executa uma consulta SQL diretamente, sem a necessidade de preparar a consulta. Ele é útil para consultas simples e rápidas, mas não é recomendado para consultas que envolvem dados fornecidos pelo usuário, pois pode ser vulnerável a ataques de injeção SQL.
$produtos = $stmt->fetchAll(); //fetchAll é um método do objeto PDOStatement que retorna todas as linhas resultantes de uma consulta SQL como um array. Ele é comumente usado para obter todos os registros de uma tabela ou resultado de uma consulta, permitindo que você trabalhe com os dados de forma mais fácil e eficiente.
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>

<h1>Lista de Produtos</h1>

<a href="create.php">+ Novo Produto</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?= $produto['id'] ?></td> 
            <td><?= $produto['nome'] ?></td>
            <td>R$ <?= $produto['preco'] ?></td>
            <td>
                <a href="edit.php?id=<?= $produto['id'] ?>">Editar</a>
                <a href="excluir.php?id=<?= $produto['id'] ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>