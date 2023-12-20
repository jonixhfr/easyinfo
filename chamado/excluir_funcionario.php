<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pontos</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<?php
include 'db_connection.php'; 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $funcionarioId = $_GET['id'];

    $sql = "DELETE FROM funcionarios WHERE id = $funcionarioId";

    if ($conn->query($sql) === TRUE) {
        echo "Excluído com sucesso!";
    } else {
        echo "Erro ao excluir funcionário: " . $conn->error;
    }
} else {
    echo "ID do funcionário não fornecido ou inválido.";
}
?>
<br>
<a href="index.php">Voltar para a página inicial</a>
</body>
</html>