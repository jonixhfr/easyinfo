<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Chamados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Lista de Funcionários</h3>
    <table>
        <tr>
            <th>Nome</th>
            <th>Pontos</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'funcionario.php'; 
        $funcionarioObj = new Funcionario($conn); 
        $funcionarios = Funcionario::getFuncionarios($conn); 

        foreach ($funcionarios as $funcionario) {
            echo "<tr>";
            echo "<td>{$funcionario['nome']}</td>";
            echo "<td>{$funcionario['pontos']}</td>";
            echo "<td><a href='excluir_funcionario.php?id={$funcionario['id']}'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h3>Registrar Atendimento</h3>
    <form action="registrar_atendimento.php" method="post">
        <label for="funcionario"><strong>Funcionário:</strong></label>
        <select name="funcionario" id="funcionario">
            <?php
            foreach ($funcionarios as $funcionario) {
                echo "<option value='{$funcionario['id']}'>{$funcionario['nome']}</option>";
            }
            ?> 
        </select>
        <label for="chamado"><strong>Chamado Aberto: </strong></label>
        <input type="checkbox" name="chamado" id="chamado">
        <input type="submit" class="btn" value="Registrar">
    </form>
   <button class="btn" onclick="window.location.href='adicionar_funcionario.php'">Adicionar Funcionário</button>
      
  
</body>
</html>
