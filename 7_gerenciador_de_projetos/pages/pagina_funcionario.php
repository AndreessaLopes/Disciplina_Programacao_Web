<?php
require_once '../classes/clsCadastroFuncionario.php';
require_once '../classes/clsCadastroEquipes.php';


$funcionario = new clsCadastroFuncionario();
$equipesObj = new clsCadastroEquipes();

$equipes = $equipesObj->selecionarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUNCIONARIO</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        switch ($acao) {
            case 'inserir_funcionario':
                $funcionario->inserir($_POST['nome'], $_POST['email'], $_POST['id_equipe']);
                echo 'Funcionário inserido com sucesso!';
                break;
            case 'atualizar_funcionario':
                $funcionario->selecionarTodos($_POST);
            case 'remover_funcionario':
                $funcionario->excluir($_POST['id']);
                echo 'Funcionário removido com sucesso!';
                break;
        }
    }
    ?>
    <!-- Botão de voltar -->
    <a href="../index.php" class="back-button">Voltar</a> <!-- Altere a URL conforme necessário -->
    <div class="header">
        <h2>Gestão de Funcionários</h2>
        <button id="addBtn">Adicionar Funcionário</button>
    </div>
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Inserir Funcionário</h2>
            <form method="POST" action="">
                <input type="hidden" name="acao" value="inserir_funcionario">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="id_equipe">Equipe:</label>
                <select id="id_equipe" name="id_equipe" required>
                    <option value="">Selecione uma equipe</option>
                    <?php
                    // Preencher o dropdown com as equipes
                    foreach ($equipes as $equipe) {
                        echo '<option value="' . htmlspecialchars($equipe['id']) . '">' . htmlspecialchars($equipe['nome']) . '</option>';
                    }
                    ?>
                </select>
                <button type="submit">Inserir Funcionário</button>
            </form>
        </div>
    </div>

    <h2>Listar Funcionários</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Equipe</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $registros = $funcionario->selecionarTodos();
            if ($registros) {
                foreach ($registros as $linha) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($linha['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($linha['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($linha['id_equipe']) . '</td>';
                    echo '<td>';
                    echo '<form method="POST" action="" style="display:inline-block;">';
                    echo '<input type="hidden" name="acao" value="remover_funcionario">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($linha['id']) . '">';
                    echo '<button type="submit">Excluir</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">Nenhum registro encontrado.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <script src="../script/script.js"></script>
</body>

</html>