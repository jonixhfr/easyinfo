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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionarioId = $_POST["funcionario"]; 
    $chamadoAberto = isset($_POST["chamado"]) ? $_POST["chamado"] : false; 

    $sql = "SELECT pontos FROM funcionarios WHERE id = $funcionarioId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pontosAtuais = $row["pontos"];

        if ($chamadoAberto) {
            $pontosAtualizados = $pontosAtuais + 15;
            echo "Chamado aberto. Adicionando +15 pontos.";
        } else {
            $pontosAtualizados = $pontosAtuais - 15;
            echo "Chamado não aberto. Subtraindo -15 pontos.";
        }

        $sql = "UPDATE funcionarios SET pontos = $pontosAtualizados WHERE id = $funcionarioId";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        exit();
        } else {
            echo "Erro ao atualizar pontos: " . $conn->error;
        }
    }
}
?>
</body>
</html>