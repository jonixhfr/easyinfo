<?php
include 'db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $pontos = $_POST["pontos"];

    $sql = "INSERT INTO funcionarios (nome, pontos) VALUES ('$nome', $pontos)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Erro ao adicionar funcionário: " . $conn->error;
    }
}
?>
