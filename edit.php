<?php
require_once 'config/database.php';

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$produto = $stmt->fetch();

if (!$produto) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Editar Produto</h1>

    <form action="actions/atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>

        <label>Descrição:</label>
        <textarea name="descricao" required><?= htmlspecialchars($produto['descricao']) ?></textarea>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>" required>

        <button type="submit" class="btn">Atualizar</button>
        <a href="index.php" class="btn-cancel">Voltar</a>
    </form>
</div>

</body>
</html>