<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pontos</title>
    <link rel="stylesheet" href="style.css"> 
<body>
<?php
include 'db_connection.php'; 

class Funcionario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public static function getFuncionarios($conn) {
        $sql = "SELECT * FROM funcionarios";
        $result = $conn->query($sql);
        $funcionarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $funcionarios[] = $row;
            }
        }
        return $funcionarios;
    }

    public function registrarAtendimento($funcionarioId, $chamadoAberto) {
        $funcionario = $this->getFuncionarioById($funcionarioId);
        if (!$chamadoAberto) {
            $funcionario['pontos'] -= 15;
            if ($funcionario['pontos'] < 70) {
                $this->gerarRNC($funcionario['nome']);
            }
            $this->atualizarPontos($funcionario);
        }
    }

    private function getFuncionarioById($id) {
        $sql = "SELECT * FROM funcionarios WHERE id = $id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }


    private function atualizarPontos($funcionario) {
        $id = $funcionario['id'];
        $pontos = $funcionario['pontos'];
        $sql = "UPDATE funcionarios SET pontos = $pontos WHERE id = $id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Pontuação atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar pontuação: " . $this->conn->error;
        }
    }
}
?>
</body>
</html>