<?php
require_once '../classes/clsCadastroEquipes.php';

$equipes = new clsCadastroEquipes();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIPE</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        switch ($acao) {
            case 'inserir_equipe':
                $equipes->inserir($_POST['nome']);
                echo 'Equipe inserida com sucesso';
                break;
            case 'atualizar_equipe':
                $equipes->selecionarTodos($_POST);
                break;
            case 'remover_equipe':
                $equipes->excluir($_POST['id']);
                echo 'Equipe removida com sucesso';
                break;
        }
    }
    ?>

    <a href="../index.php" class="back-button">Voltar</a>
    <div class="header">
        <h2>Gestão de Equipes</h2>
        <button id="addBtn">Adicionar nova equipe</button>
    </div>

    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Inserir Equipe</h2>
            <form method="POST" action="">
                <input type="hidden" name="acao" value="inserir_equipe">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                <button type="submit">Inserir Equipe</button>
            </form>
        </div>
    </div>

    <h2>Listar Equipes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $registros = $equipes->selecionarTodos();
            if ($registros) {
                foreach ($registros as $linha) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($linha['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
                    echo '<td>';
                    echo '<form method="POST" action="pagina_equipe.php" style="display:inline-block;">';
                    echo '<input type="hidden" name="acao" value="remover_equipe">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($linha['id']) . '">';
                    echo '<button type="submit">Remover</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3">Nenhum registro encontrado.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <script src="../script/script.js"></script>
</body>

</html>