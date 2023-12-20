<!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="style.css">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Funcionário</title>
</head>
<body>
    <h1>Adicionar Novo Funcionário</h1>
    <form action="processar_adicao.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <label for="pontos">Pontos:</label>
        <input type="number" name="pontos" id="pontos" required>
        <input class="btn" type="submit" value="Adicionar">
    </form>
    <br>
    <a href="index.php">Voltar para a página inicial</a>
</body>
</html>
