<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Cadastrar Produto</h1>

    <form action="actions/salvar.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" required>

        <button type="submit" class="btn">Salvar</button>
        <a href="index.php" class="btn-cancel">Voltar</a>
    </form>
</div>

</body>
</html>